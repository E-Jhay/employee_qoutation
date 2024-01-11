<?php

use Core\App;
use Core\Database;
use Core\QoutationStatus;
use Core\Role;

$db = App::resolve(Database::class);

$heading = "Dashboard";

// -- Total for This Month
;

// -- Total for Last Month
// SELECT SUM(total) as total_sum_last_month
// FROM your_table_name
// WHERE 
//     (YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE()) - 1)
//     OR
//     (YEAR(created_at) = YEAR(CURDATE()) - 1 AND MONTH(created_at) = 12 AND MONTH(CURDATE()) = 1);

$currentUserTeamId = $db->query("SELECT id FROM team WHERE manager_id = :manager_id", [
    'manager_id' => $_SESSION['user']['id']
])->find()['id'];

$salesThisMonth = $db->query("SELECT SUM(approved_price) as total FROM product_qoutation LEFT JOIN qoutation ON 
product_qoutation.qoutation_id = qoutation.id WHERE qoutation.team_id = :team_id AND qoutation.status = :status AND
MONTH(qoutation.created_at) = MONTH(CURDATE()) AND YEAR(qoutation.created_at) = YEAR(CURDATE())", [
    'team_id' => $currentUserTeamId,
    'status' => QoutationStatus::APPROVED,
])->find()['total'];

$salesLastMonth = $db->query("SELECT SUM(approved_price) as total FROM product_qoutation LEFT JOIN qoutation ON 
product_qoutation.qoutation_id = qoutation.id WHERE qoutation.team_id = :team_id AND qoutation.status = :status AND
(YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE()) - 1)
OR
(YEAR(created_at) = YEAR(CURDATE()) - 1 AND MONTH(created_at) = 12 AND MONTH(CURDATE()) = 1)", [
    'team_id' => $currentUserTeamId,
    'status' => QoutationStatus::APPROVED,
])->find()['total'] ?? 0;


function calculatePercentageIncrease($oldValue, $newValue) {
    if ($oldValue != 0) {
        $percentageIncrease = (($newValue - $oldValue) / $oldValue) * 100;
        return $percentageIncrease;
    } else {
        // Handle the case where the old value is zero to avoid division by zero
        return 100;
    }
}

$pendingQoutations = $db->query("SELECT COUNT(*) as count FROM qoutation WHERE team_id = :team_id AND status = :status",[
    'team_id' => $currentUserTeamId,
    'status' => QoutationStatus::PENDING,
])->find()['count'];

$approvedQoutations = $db->query("SELECT COUNT(*) as count FROM qoutation WHERE team_id = :team_id AND status = :status AND
MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())",[
    'team_id' => $currentUserTeamId,
    'status' => QoutationStatus::APPROVED,
])->find()['count'];

$agentsCount = $db->query("SELECT COUNT(*) as count FROM user WHERE team_id = :team_id AND role_id = :role_id",[
    'team_id' => $currentUserTeamId,
    'role_id' => Role::SALES,
])->find()['count'];

$latestCustomers = $db->query("SELECT DISTINCT (customer.name), customer.address FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id WHERE team_id = :team_id AND status = :status ORDER BY customer.id DESC LIMIT 5",[
    'team_id' => $currentUserTeamId,
    'status' => QoutationStatus::APPROVED,
])->get();

$totalAmount = $db->query("SELECT SUM(product_qoutation.approved_price) as total FROM qoutation LEFT JOIN product_qoutation ON qoutation.id = product_qoutation.qoutation_id
                            WHERE qoutation.status = :status AND MONTH(qoutation.created_at) = MONTH(CURDATE()) AND YEAR(qoutation.created_at) = YEAR(CURDATE())", [
                                'status' =>QoutationStatus::APPROVED
                            ])->find()['total'];

$topAgents = $db->query("SELECT customer.name, SUM(product_qoutation.approved_price) as total, (SUM(product_qoutation.approved_price) / :total_amount) * 100 AS percentage FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN product_qoutation ON qoutation.id = product_qoutation.qoutation_id WHERE team_id = :team_id AND status = :status AND
MONTH(qoutation.created_at) = MONTH(CURDATE()) AND YEAR(qoutation.created_at) = YEAR(CURDATE()) GROUP BY qoutation.created_by ORDER BY total DESC LIMIT 5",[
    'team_id' => $currentUserTeamId,
    'status' => QoutationStatus::APPROVED,
    'total_amount' => $totalAmount,
])->get();

$salesThisYear = $db->query("SELECT SUM(approved_price) as total, MONTHNAME(qoutation.created_at) as month_name FROM product_qoutation LEFT JOIN qoutation ON 
product_qoutation.qoutation_id = qoutation.id WHERE qoutation.team_id = :team_id AND qoutation.status = :status AND YEAR(qoutation.created_at) = YEAR(CURDATE()) GROUP BY MONTH(created_at)", [
    'team_id' => $currentUserTeamId,
    'status' => QoutationStatus::APPROVED,
])->get();


// dd(json_encode($salesThisYear));

$percentageIncrease = calculatePercentageIncrease($salesLastMonth, $salesThisMonth);

// dd($salesThisMonth);
view("index.view.php", [
    'heading' => $heading,
    'salesThisMonth' => number_format($salesThisMonth, 2, '.', ','),
    'percentageIncrease' => number_format($percentageIncrease, 2) . '%',
    'isPositive' => $percentageIncrease >= 0 ? 1 : 0,
    'pendingQoutations' => $pendingQoutations,
    'approvedQoutations' => $approvedQoutations,
    'agentsCount' => $agentsCount,
    'latestCustomers' => $latestCustomers,
    'topAgents' => $topAgents,
    'salesThisYear' => json_encode($salesThisYear),
]);