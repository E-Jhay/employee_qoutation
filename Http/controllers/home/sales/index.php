<?php

use Core\App;
use Core\Database;
use Core\QoutationStatus;
use Core\Role;

$db = App::resolve(Database::class);

authorize($_SESSION['user']['role_id'] === Role::SALES);

$heading = "Sales Dashboard";

$currentUserId = $_SESSION['user']['id'];

$salesThisMonth = $db->query("SELECT SUM(product_qoutation.approved_price) as total FROM qoutation LEFT JOIN product_qoutation ON qoutation.id = product_qoutation.qoutation_id WHERE created_by = :created_by AND status = :status AND MONTH(qoutation.created_at) = MONTH(CURDATE()) AND YEAR(qoutation.created_at) = YEAR(CURDATE())", [
    'created_by' => $currentUserId,
    'status' => QoutationStatus::APPROVED,
])->find()['total'];
// dd($salesThisMonth);

$salesLastMonth = $db->query("SELECT SUM(product_qoutation.approved_price) as total FROM qoutation LEFT JOIN product_qoutation ON qoutation.id = product_qoutation.qoutation_id WHERE created_by = :created_by AND status = :status AND
(YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE()) - 1)
OR
(YEAR(created_at) = YEAR(CURDATE()) - 1 AND MONTH(created_at) = 12 AND MONTH(CURDATE()) = 1)", [
    'created_by' => $currentUserId,
    'status' => QoutationStatus::APPROVED,
])->find()['total'] ?? 0;
// dd($salesLastMonth);


function calculatePercentageIncrease($oldValue, $newValue) {
    if ($oldValue != 0) {
        $percentageIncrease = (($newValue - $oldValue) / $oldValue) * 100;
        return $percentageIncrease;
    } else {
        // Handle the case where the old value is zero to avoid division by zero
        return 100;
    }
}

$pendingQoutations = $db->query("SELECT COUNT(*) as count FROM qoutation WHERE created_by = :created_by AND status = :status",[
    'created_by' => $currentUserId,
    'status' => QoutationStatus::PENDING,
])->find()['count'];

$approvedQoutations = $db->query("SELECT COUNT(*) as count FROM qoutation WHERE created_by = :created_by AND status = :status AND
MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())",[
    'created_by' => $currentUserId,
    'status' => QoutationStatus::APPROVED,
])->find()['count'];

$disapprovedQoutations = $db->query("SELECT COUNT(*) as count FROM qoutation WHERE created_by = :created_by AND status = :status",[
    'created_by' => $currentUserId,
    'status' => QoutationStatus::DISAPPROVED,
])->find()['count'];

$salesThisYear = $db->query("SELECT SUM(approved_price) as total, MONTHNAME(qoutation.created_at) as month_name FROM product_qoutation LEFT JOIN qoutation ON 
product_qoutation.qoutation_id = qoutation.id WHERE created_by = :created_by AND qoutation.status = :status AND YEAR(qoutation.created_at) = YEAR(CURDATE()) GROUP BY MONTH(created_at)", [
    'created_by' => $currentUserId,
    'status' => QoutationStatus::APPROVED,
])->get();


// dd(json_encode($salesThisYear));
// dd($salesThisMonth);

$percentageIncrease = calculatePercentageIncrease($salesLastMonth, $salesThisMonth);

// dd($salesThisMonth);
view("home/sales/index.view.php", [
    'heading' => $heading,
    'salesThisMonth' => number_format($salesThisMonth, 2, '.', ','),
    'percentageIncrease' => number_format($percentageIncrease, 2) . '%',
    'isPositive' => $percentageIncrease >= 0 ? 1 : 0,
    'pendingQoutations' => $pendingQoutations,
    'approvedQoutations' => $approvedQoutations,
    'disapprovedQoutations' => $disapprovedQoutations,
    'salesThisYear' => json_encode($salesThisYear),
]);