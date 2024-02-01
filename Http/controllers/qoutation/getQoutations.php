<?php

use Core\App;
use Core\QoutationStatus;
use Core\Role;

$db = App::resolve('Core\Database');
// dd("Index 2");
$itemsPerPage = $_GET['itemsPerPage'] ?? 10; // Set the number of items to display per page

$status = $_GET['status'] ?? QoutationStatus::PENDING;

$searchTerm = $_GET['searchTerm'] ?? '';
// Get the current page number from the query parameters
$currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$currentUserId = $_SESSION['user']['id'];

// Function to perform pagination for a given query
function paginateQuery($db, $query, $currentPage, $itemsPerPage, $bindings = []) {
    // Clone the bindings array to avoid modifying the original
    $totalCountBindings = $bindings;

    // Count the total number of rows without LIMIT and OFFSET
    $totalCountQuery = "SELECT COUNT(*) as total FROM ($query) as subquery";
    $totalCount = $db->query($totalCountQuery, $totalCountBindings)->find()['total'];

    // dd($totalCount);
    // Calculate the total pages
    $totalPages = ceil($totalCount / $itemsPerPage);
    // Calculate the starting index for the current page
    $startIndex = ($currentPage - 1) * $itemsPerPage;

    // Add LIMIT and OFFSET to the query
    $query .= " LIMIT $itemsPerPage OFFSET $startIndex";
    // dd($query);

    // // Add bindings for LIMIT and OFFSET
    // $bindings['limit'] = $itemsPerPage;
    // $bindings['offset'] = $startIndex;
    
    // Execute the modified query
    $results =  $db->query($query, $bindings)->get();
    // Return both the paginated results and total pages
    return ['results' => $results, 'totalPages' => $totalPages];
}
if($status !== 'all'){
    if($_SESSION['user']['role_id'] == Role::SALES) {
        $qoutationsData = paginateQuery($db,
        "SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status AND created_by = :created_by_id
        AND
        (qoutation.control_no LIKE CONCAT('%', :searchTerm, '%')
        OR customer.name LIKE CONCAT('%', :searchTerm, '%')) ORDER BY id desc",
            $currentPage,
            $itemsPerPage,
            [
                'searchTerm' => $searchTerm,
                'status' => $status,
                'created_by_id' => $currentUserId
            ]
        );
        $qoutations = $qoutationsData['results'];
        $totalPagesqoutations = $qoutationsData['totalPages'];
    } elseif($_SESSION['user']['role_id'] == Role::SALES_MANAGER) {
        $currentUserTeamId = $db->query("SELECT id FROM team WHERE manager_id = :manager_id", [
            'manager_id' => $_SESSION['user']['id']
        ])->find()['id'] ?? '';

        $qoutationsData = paginateQuery($db,
            "SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status AND qoutation.team_id = :team_id
            AND
            (qoutation.control_no LIKE CONCAT('%', :searchTerm, '%')
            OR customer.name LIKE CONCAT('%', :searchTerm, '%')) ORDER BY id desc",
            $currentPage,
            $itemsPerPage,
            [
                'searchTerm' => $searchTerm,
                'status' => $status,
                'team_id' => $currentUserTeamId
            ]
        );
        $qoutations = $qoutationsData['results'];
        $totalPagesqoutations = $qoutationsData['totalPages'];
    } else {

        $qoutationsData = paginateQuery($db,
            "SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status
            AND
            (qoutation.control_no LIKE CONCAT('%', :searchTerm, '%')
            OR customer.name LIKE CONCAT('%', :searchTerm, '%')) ORDER BY id desc",
            $currentPage,
            $itemsPerPage,
            [
                'searchTerm' => $searchTerm,
                'status' => $status,
            ]
        );
        $qoutations = $qoutationsData['results'];
        $totalPagesqoutations = $qoutationsData['totalPages'];
    }
} else {
    $qoutationsData = paginateQuery($db,
        "SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id
        WHERE 
        created_by = :created_by_id
        AND
        (qoutation.control_no LIKE CONCAT('%', :searchTerm, '%')
        OR customer.name LIKE CONCAT('%', :searchTerm, '%')) ORDER BY id desc",
        $currentPage,
        $itemsPerPage,
        [
            'searchTerm' => $searchTerm,
            'created_by_id' => $currentUserId
        ]
    );
    $qoutations = $qoutationsData['results'];
    $totalPagesqoutations = $qoutationsData['totalPages'];
}


// view("qoutation/index2.view.php", [
//     'heading' => "Pending Qoutations",
//     'qoutations' => $qoutations,
//     'totalPagesQoutations' => $totalPagesqoutations,
//     'currentPage' => $currentPage
// ]);
echo json_encode([
        // 'heading' => "Pending Qoutations",
        'qoutations' => $qoutations,
        'totalPagesQoutations' => $totalPagesqoutations,
        'currentPage' => $currentPage
    ]);