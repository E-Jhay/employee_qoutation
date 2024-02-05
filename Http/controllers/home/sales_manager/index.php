<?php

use Core\App;
use Core\Database;
use Core\QoutationStatus;
use Core\Role;

$db = App::resolve(Database::class);

authorize((int)$_SESSION['user']['role_id'] === Role::SALES_MANAGER);

$heading = "Sales Manager Dashboard";

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
])->find()['id'] ?? '';

$averageApprovalTime = $db->query("SELECT 
                            -- YEAR(created_at) AS year,
                            -- MONTH(created_at) AS month,
                            CASE
                                WHEN AVG(TIMESTAMPDIFF(SECOND, created_at, updated_at)) >= (60 * 60 * 24) THEN 
                                    CONCAT(FLOOR(AVG(TIMESTAMPDIFF(SECOND, created_at, updated_at)) / (60 * 60 * 24)), ' day(s)')
                                ELSE 
                                    CONCAT(FLOOR(AVG(TIMESTAMPDIFF(SECOND, created_at, updated_at)) / (60 * 60)), ' hour(s)')
                            END AS avg_approval_time
                            FROM 
                                qoutation
                            WHERE
                                updated_at IS NOT NULL
                            AND team_id = :team_id
                            AND status = :status
                            -- AND YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE())
                            ",
                                [
                                    'team_id' => $currentUserTeamId,
                                    'status' => QoutationStatus::APPROVED,
                                ])->find()['avg_approval_time'];

                        // dd($averageApprovalTime);

// $salesThisMonth = $db->query("SELECT SUM(total) as total FROM product_qoutation LEFT JOIN qoutation ON 
// product_qoutation.qoutation_id = qoutation.id WHERE qoutation.team_id = :team_id AND qoutation.status = :status AND
// MONTH(qoutation.created_at) = MONTH(CURDATE()) AND YEAR(qoutation.created_at) = YEAR(CURDATE())", [
//     'team_id' => $currentUserTeamId,
//     'status' => QoutationStatus::APPROVED,
// ])->find()['total'];

// $salesLastMonth = $db->query("SELECT SUM(total) as total FROM product_qoutation LEFT JOIN qoutation ON 
// product_qoutation.qoutation_id = qoutation.id WHERE qoutation.team_id = :team_id AND qoutation.status = :status AND
// (YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE()) - 1)
// OR
// (YEAR(created_at) = YEAR(CURDATE()) - 1 AND MONTH(created_at) = 12 AND MONTH(CURDATE()) = 1)", [
//     'team_id' => $currentUserTeamId,
//     'status' => QoutationStatus::APPROVED,
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

// $totalAmount = $db->query("SELECT SUM(product_qoutation.total) as total FROM qoutation LEFT JOIN product_qoutation ON qoutation.id = product_qoutation.qoutation_id
//                             WHERE qoutation.status = :status AND MONTH(qoutation.created_at) = MONTH(CURDATE()) AND YEAR(qoutation.created_at) = YEAR(CURDATE())", [
//                                 'status' =>QoutationStatus::APPROVED
//                             ])->find()['total'];

$topAgents = $db->query("SELECT user.name, COUNT(*) as total, (COUNT(*) / :approved_qoutations) * 100 AS percentage FROM qoutation LEFT JOIN user ON qoutation.created_by = user.id WHERE qoutation.team_id = :team_id AND status = :status AND
MONTH(qoutation.created_at) = MONTH(CURDATE()) AND YEAR(qoutation.created_at) = YEAR(CURDATE()) GROUP BY qoutation.created_by ORDER BY total DESC LIMIT 5",[
    'team_id' => $currentUserTeamId,
    'status' => QoutationStatus::APPROVED,
    'approved_qoutations' => $approvedQoutations,
])->get();

$qoutedThisYear = $db->query("SELECT COUNT(*) as total, MONTHNAME(created_at) as month_name FROM qoutation WHERE team_id = :team_id AND status = :status AND YEAR(qoutation.created_at) = YEAR(CURDATE()) GROUP BY MONTH(created_at)", [
    'team_id' => $currentUserTeamId,
    'status' => QoutationStatus::APPROVED,
])->get();


// dd(json_encode($qoutedThisYear));
// dd($salesThisMonth);

// $percentageIncrease = calculatePercentageIncrease($salesLastMonth, $salesThisMonth);

// dd($salesThisMonth);
view("home/sales_manager/index.view.php", [
    'heading' => $heading,
    'averageApprovalTime' => $averageApprovalTime,
    // 'salesThisMonth' => number_format($salesThisMonth, 2, '.', ','),
    // 'percentageIncrease' => number_format($percentageIncrease, 2) . '%',
    // 'isPositive' => $percentageIncrease >= 0 ? 1 : 0,
    'pendingQoutations' => $pendingQoutations,
    'approvedQoutations' => $approvedQoutations,
    'agentsCount' => $agentsCount,
    'latestCustomers' => $latestCustomers,
    'topAgents' => $topAgents,
    'qoutedThisYear' => json_encode($qoutedThisYear),
]);