<?php

use Core\App;
use Core\Database;
use Core\QuotationStatus;
use Core\Role;

$db = App::resolve(Database::class);

authorize((int)$_SESSION['user']['role_id'] == Role::SALES);

$heading = "Sales Dashboard";

$currentUserId = $_SESSION['user']['id'];

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
                                quotation
                            WHERE
                                updated_at IS NOT NULL
                            AND created_by = :created_by
                            AND status = :status
                            ",
                            [
                                'created_by' => $currentUserId,
                                'status' => QuotationStatus::APPROVED,
                            ])
                        ->find()['avg_approval_time'] ?? 'N/A';

// $salesThisMonth = $db->query("SELECT SUM(product_quotation.total) as total FROM quotation LEFT JOIN product_quotation ON quotation.id = product_quotation.quotation_id WHERE created_by = :created_by AND status = :status AND MONTH(quotation.created_at) = MONTH(CURDATE()) AND YEAR(quotation.created_at) = YEAR(CURDATE())", [
//     'created_by' => $currentUserId,
//     'status' => QuotationStatus::APPROVED,
// ])->find()['total'];
// // dd($salesThisMonth);

// $salesLastMonth = $db->query("SELECT SUM(product_quotation.total) as total FROM quotation LEFT JOIN product_quotation ON quotation.id = product_quotation.quotation_id WHERE created_by = :created_by AND status = :status AND
// (YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE()) - 1)
// OR
// (YEAR(created_at) = YEAR(CURDATE()) - 1 AND MONTH(created_at) = 12 AND MONTH(CURDATE()) = 1)", [
//     'created_by' => $currentUserId,
//     'status' => QuotationStatus::APPROVED,
// ])->find()['total'] ?? 0;
// // dd($salesLastMonth);


// function calculatePercentageIncrease($oldValue, $newValue) {
//     if ($oldValue != 0) {
//         $percentageIncrease = (($newValue - $oldValue) / $oldValue) * 100;
//         return $percentageIncrease;
//     } else {
//         // Handle the case where the old value is zero to avoid division by zero
//         return 100;
//     }
// }

$pendingQuotations = $db->query("SELECT COUNT(*) as count FROM quotation WHERE created_by = :created_by AND status = :status",[
    'created_by' => $currentUserId,
    'status' => QuotationStatus::PENDING,
])->find()['count'];

$approvedQuotations = $db->query("SELECT COUNT(*) as count FROM quotation WHERE created_by = :created_by AND status = :status AND
MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())",[
    'created_by' => $currentUserId,
    'status' => QuotationStatus::APPROVED,
])->find()['count'];

$disapprovedQuotations = $db->query("SELECT COUNT(*) as count FROM quotation WHERE created_by = :created_by AND status = :status",[
    'created_by' => $currentUserId,
    'status' => QuotationStatus::DISAPPROVED,
])->find()['count'];

// $salesThisYear = $db->query("SELECT SUM(total) as total, MONTHNAME(quotation.created_at) as month_name FROM product_quotation LEFT JOIN quotation ON 
// product_quotation.quotation_id = quotation.id WHERE created_by = :created_by AND quotation.status = :status AND YEAR(quotation.created_at) = YEAR(CURDATE()) GROUP BY MONTH(created_at)", [
//     'created_by' => $currentUserId,
//     'status' => QuotationStatus::APPROVED,
// ])->get();

$qoutedThisYear = $db->query("SELECT COUNT(*) as total, MONTHNAME(created_at) as month_name FROM quotation WHERE created_by = :created_by AND status = :status AND YEAR(quotation.created_at) = YEAR(CURDATE()) GROUP BY MONTH(created_at)", [
    'created_by' => $currentUserId,
    'status' => QuotationStatus::APPROVED,
])->get();


// dd(json_encode($salesThisYear));
// dd($salesThisMonth);

// $percentageIncrease = calculatePercentageIncrease($salesLastMonth, $salesThisMonth);

// dd($salesThisMonth);
view("home/sales/index.view.php", [
    'heading' => $heading,
    'averageApprovalTime' => $averageApprovalTime,
    // 'salesThisMonth' => number_format($salesThisMonth, 2, '.', ','),
    // 'percentageIncrease' => number_format($percentageIncrease, 2) . '%',
    // 'isPositive' => $percentageIncrease >= 0 ? 1 : 0,
    'pendingQuotations' => $pendingQuotations,
    'approvedQuotations' => $approvedQuotations,
    'disapprovedQuotations' => $disapprovedQuotations,
    'qoutedThisYear' => json_encode($qoutedThisYear),
]);