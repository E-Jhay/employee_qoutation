<?php

use Core\App;
use Core\QoutationStatus;
$db = App::resolve('Core\Database');
// dd("Qoutations");

$allQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id ORDER BY id desc")->get();

$pendingQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status ORDER BY id desc", [
    'status' => QoutationStatus::PENDING,
])->get();

$approvedQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status ORDER BY id desc", [
    'status' => QoutationStatus::APPROVED,
])->get();

$disapprovedQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status ORDER BY id desc", [
    'status' => QoutationStatus::DISAPPROVED,
])->get();

// dd($qoutations);

view("qoutation/index.view.php", [
    'heading' => "Qoutations",
    'allQoutations' => $allQoutations,
    'pendingQoutations' => $pendingQoutations,
    'approvedQoutations' => $approvedQoutations,
    'disapprovedQoutations' => $disapprovedQoutations,
]);