<?php

use Core\App;
use Core\Database;
use Core\QuotationStatus;
use Core\Role;

$db = App::resolve(Database::class);

authorize((int)$_SESSION['user']['role_id'] === Role::ADMIN);

$heading = "Admin Dashboard";

// -- Total for This Month
;

// -- Total for Last Month
// SELECT SUM(total) as total_sum_last_month
// FROM your_table_name
// WHERE 
//     (YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE()) - 1)
//     OR
//     (YEAR(created_at) = YEAR(CURDATE()) - 1 AND MONTH(created_at) = 12 AND MONTH(CURDATE()) = 1);

$teams = $db->query("SELECT COUNT(id) as count FROM team")->find()['count'];
$roles = $db->query("SELECT COUNT(id) as count FROM role")->find()['count'];
$salesManager = $db->query("SELECT COUNT(id) as count FROM user WHERE role_id = :role_id", [
    'role_id' => Role::SALES_MANAGER
])->find()['count'];
$sales = $db->query("SELECT COUNT(id) as count FROM user WHERE role_id = :role_id", [
    'role_id' => Role::SALES
])->find()['count'];
// dd($sales);

// $currentUserTeamId = $db->query("SELECT id FROM team WHERE manager_id = :manager_id", [
//     'manager_id' => $_SESSION['user']['id']
// ])->find()['id'] ?? '';

// $salesThisMonth = $db->query("SELECT SUM(approved_price) as total FROM product_quotation LEFT JOIN quotation ON 
// product_quotation.quotation_id = quotation.id WHERE quotation.team_id = :team_id AND quotation.status = :status AND
// MONTH(quotation.created_at) = MONTH(CURDATE()) AND YEAR(quotation.created_at) = YEAR(CURDATE())", [
//     'team_id' => $currentUserTeamId,
//     'status' => QuotationStatus::APPROVED,
// ])->find()['total'];

// $salesLastMonth = $db->query("SELECT SUM(approved_price) as total FROM product_quotation LEFT JOIN quotation ON 
// product_quotation.quotation_id = quotation.id WHERE quotation.team_id = :team_id AND quotation.status = :status AND
// (YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE()) - 1)
// OR
// (YEAR(created_at) = YEAR(CURDATE()) - 1 AND MONTH(created_at) = 12 AND MONTH(CURDATE()) = 1)", [
//     'team_id' => $currentUserTeamId,
//     'status' => QuotationStatus::APPROVED,
// ])->find()['total'] ?? 0;


// function calculatePercentageIncrease($oldValue, $newValue) {
//     if ($oldValue != 0) {
//         $percentageIncrease = (($newValue - $oldValue) / $oldValue) * 100;
//         return $percentageIncrease;
//     } else {
//         // Handle the case where the old value is zero to avoid division by zero
//         return 100;
//     }
// }

// $pendingQuotations = $db->query("SELECT COUNT(*) as count FROM quotation WHERE team_id = :team_id AND status = :status",[
//     'team_id' => $currentUserTeamId,
//     'status' => QuotationStatus::PENDING,
// ])->find()['count'];

// $approvedQuotations = $db->query("SELECT COUNT(*) as count FROM quotation WHERE team_id = :team_id AND status = :status AND
// MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())",[
//     'team_id' => $currentUserTeamId,
//     'status' => QuotationStatus::APPROVED,
// ])->find()['count'];

// $agentsCount = $db->query("SELECT COUNT(*) as count FROM user WHERE team_id = :team_id AND role_id = :role_id",[
//     'team_id' => $currentUserTeamId,
//     'role_id' => Role::SALES,
// ])->find()['count'];

// $latestCustomers = $db->query("SELECT DISTINCT (customer.name), customer.address FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id WHERE team_id = :team_id AND status = :status ORDER BY customer.id DESC LIMIT 5",[
//     'team_id' => $currentUserTeamId,
//     'status' => QuotationStatus::APPROVED,
// ])->get();

// // $totalAmount = $db->query("SELECT SUM(product_quotation.approved_price) as total FROM quotation LEFT JOIN product_quotation ON quotation.id = product_quotation.quotation_id
// //                             WHERE quotation.status = :status AND MONTH(quotation.created_at) = MONTH(CURDATE()) AND YEAR(quotation.created_at) = YEAR(CURDATE())", [
// //                                 'status' =>QuotationStatus::APPROVED
// //                             ])->find()['total'];

// $topAgents = $db->query("SELECT user.name, SUM(product_quotation.approved_price) as total, (SUM(product_quotation.approved_price) / :total_amount) * 100 AS percentage FROM quotation LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN product_quotation ON quotation.id = product_quotation.quotation_id WHERE quotation.team_id = :team_id AND status = :status AND
// MONTH(quotation.created_at) = MONTH(CURDATE()) AND YEAR(quotation.created_at) = YEAR(CURDATE()) GROUP BY quotation.created_by ORDER BY total DESC LIMIT 5",[
//     'team_id' => $currentUserTeamId,
//     'status' => QuotationStatus::APPROVED,
//     'total_amount' => $salesThisMonth,
// ])->get();

// $salesThisYear = $db->query("SELECT SUM(approved_price) as total, MONTHNAME(quotation.created_at) as month_name FROM product_quotation LEFT JOIN quotation ON 
// product_quotation.quotation_id = quotation.id WHERE quotation.team_id = :team_id AND quotation.status = :status AND YEAR(quotation.created_at) = YEAR(CURDATE()) GROUP BY MONTH(created_at)", [
//     'team_id' => $currentUserTeamId,
//     'status' => QuotationStatus::APPROVED,
// ])->get();


// // dd(json_encode($salesThisYear));
// // dd($salesThisMonth);

// $percentageIncrease = calculatePercentageIncrease($salesLastMonth, $salesThisMonth);

// dd($salesThisMonth);
view("home/admin/index.view.php", [
    'heading' => $heading,
    'roles' => $roles,
    'teams' => $teams,
    'sales' => $sales,
    'salesManager' => $salesManager,
]);