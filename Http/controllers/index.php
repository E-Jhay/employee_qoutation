<?php

use Core\App;
use Core\Database;

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

$salesThisMonth = $db->query("SELECT SUM(approved_price) as total FROM product_qoutation LEFT JOIN qoutation ON 
product_qoutation.qoutation_id = qoutation.id WHERE qoutation.team_id = 2 AND qoutation.status = 1 AND
MONTH(qoutation.created_at) = MONTH(CURDATE()) AND YEAR(qoutation.created_at) = YEAR(CURDATE())")->find()['total'];

$salesLastMonth = $db->query("SELECT SUM(approved_price) as total FROM product_qoutation LEFT JOIN qoutation ON 
product_qoutation.qoutation_id = qoutation.id WHERE qoutation.team_id = 2 AND qoutation.status = 1 AND
(YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE()) - 1)
OR
(YEAR(created_at) = YEAR(CURDATE()) - 1 AND MONTH(created_at) = 12 AND MONTH(CURDATE()) = 1)")->find()['total'] ?? 0;


function calculatePercentageIncrease($oldValue, $newValue) {
    if ($oldValue != 0) {
        $percentageIncrease = (($newValue - $oldValue) / $oldValue) * 100;
        return $percentageIncrease;
    } else {
        // Handle the case where the old value is zero to avoid division by zero
        return 100;
    }
}


// dd(calculatePercentageIncrease(2000, $salesThisMonth));

$percentageIncrease = calculatePercentageIncrease($salesLastMonth, $salesThisMonth);

// dd($salesThisMonth);
view("index.view.php", [
    'heading' => $heading,
    'salesThisMonth' => number_format($salesThisMonth, 2, '.', ','),
    'percentageIncrease' => number_format($percentageIncrease, 2) . '%',
    'isPositive' => $percentageIncrease >= 0 ? 1 : 0
]);