<?php

use Core\App;
use Core\QuotationStatus;
use Core\Role;

$db = App::resolve('Core\Database');
// dd("Index 2");
$itemsPerPage = $_GET['itemsPerPage'] ?? 10; // Set the number of items to display per page

$status = $_GET['status'] ?? QuotationStatus::PENDING;

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
        $quotationsData = paginateQuery($db,
        "SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE status = :status AND created_by = :created_by_id
        AND
        (quotation.control_no LIKE CONCAT('%', :searchTerm, '%')
        OR customer.name LIKE CONCAT('%', :searchTerm, '%')) ORDER BY id asc",
            $currentPage,
            $itemsPerPage,
            [
                'searchTerm' => $searchTerm,
                'status' => $status,
                'created_by_id' => $currentUserId
            ]
        );
        $quotations = $quotationsData['results'];
        $totalPagesquotations = $quotationsData['totalPages'];
    } elseif($_SESSION['user']['role_id'] == Role::SALES_MANAGER) {
        $currentUserTeamId = $db->query("SELECT id FROM team WHERE manager_id = :manager_id", [
            'manager_id' => $_SESSION['user']['id']
        ])->find()['id'] ?? '';

        $quotationsData = paginateQuery($db,
            "SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE status = :status AND quotation.team_id = :team_id
            AND
            (quotation.control_no LIKE CONCAT('%', :searchTerm, '%')
            OR customer.name LIKE CONCAT('%', :searchTerm, '%')) ORDER BY id asc",
            $currentPage,
            $itemsPerPage,
            [
                'searchTerm' => $searchTerm,
                'status' => $status,
                'team_id' => $currentUserTeamId
            ]
        );
        $quotations = $quotationsData['results'];
        $totalPagesquotations = $quotationsData['totalPages'];
    } else {

        $quotationsData = paginateQuery($db,
            "SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE status = :status
            AND
            (quotation.control_no LIKE CONCAT('%', :searchTerm, '%')
            OR customer.name LIKE CONCAT('%', :searchTerm, '%')) ORDER BY id asc",
            $currentPage,
            $itemsPerPage,
            [
                'searchTerm' => $searchTerm,
                'status' => $status,
            ]
        );
        $quotations = $quotationsData['results'];
        $totalPagesquotations = $quotationsData['totalPages'];
    }
} else {
    if((int)$_SESSION['user']['role_id'] == Role::SALES) {
        $quotationsData = paginateQuery($db,
            "SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id
            WHERE 
            created_by = :created_by_id
            AND
            (quotation.control_no LIKE CONCAT('%', :searchTerm, '%')
            OR customer.name LIKE CONCAT('%', :searchTerm, '%')) ORDER BY id asc",
            $currentPage,
            $itemsPerPage,
            [
                'searchTerm' => $searchTerm,
                'created_by_id' => $currentUserId
            ]
        );
        $quotations = $quotationsData['results'];
        $totalPagesquotations = $quotationsData['totalPages'];
    } elseif((int)$_SESSION['user']['role_id'] == Role::SALES_MANAGER) {
        $currentUserTeamId = $db->query("SELECT id FROM team WHERE manager_id = :manager_id", [
            'manager_id' => $_SESSION['user']['id']
        ])->find()['id'] ?? '';

        $quotationsData = paginateQuery($db,
            "SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE quotation.team_id = :team_id
            AND
            (quotation.control_no LIKE CONCAT('%', :searchTerm, '%')
            OR customer.name LIKE CONCAT('%', :searchTerm, '%')) ORDER BY id asc",
            $currentPage,
            $itemsPerPage,
            [
                'searchTerm' => $searchTerm,
                'team_id' => $currentUserTeamId
            ]
        );
        $quotations = $quotationsData['results'];
        $totalPagesquotations = $quotationsData['totalPages'];
    } else {
        $currentUserTeamId = $db->query("SELECT id FROM team WHERE manager_id = :manager_id", [
            'manager_id' => $_SESSION['user']['id']
        ])->find()['id'] ?? '';

        $quotationsData = paginateQuery($db,
            "SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE quotation.status != :status
            AND
            (quotation.control_no LIKE CONCAT('%', :searchTerm, '%')
            OR customer.name LIKE CONCAT('%', :searchTerm, '%')) ORDER BY id asc",
            $currentPage,
            $itemsPerPage,
            [
                'status' => QuotationStatus::PENDING,
                'searchTerm' => $searchTerm,
            ]
        );
        $quotations = $quotationsData['results'];
        $totalPagesquotations = $quotationsData['totalPages'];
    }
}


// view("quotation/index2.view.php", [
//     'heading' => "Pending Quotations",
//     'quotations' => $quotations,
//     'totalPagesQuotations' => $totalPagesquotations,
//     'currentPage' => $currentPage
// ]);
echo json_encode([
        // 'heading' => "Pending Quotations",
        'quotations' => $quotations,
        'totalPages' => $totalPagesquotations,
        'currentPage' => $currentPage
    ]);