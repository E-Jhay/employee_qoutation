<?php

use Core\App;
use Core\QoutationStatus;
use Core\Role;

$db = App::resolve('Core\Database');
// dd("Qoutations");

if($_SESSION['user']['role_id'] == Role::SALES) {
    $currentUserId = $_SESSION['user']['id'];
    $allQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE created_by = :created_by_id ORDER BY id desc", [
        'created_by_id' => $currentUserId
    ])->get();
    
    $pendingQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status AND created_by = :created_by_id ORDER BY id desc", [
        'status' => QoutationStatus::PENDING,
        'created_by_id' => $currentUserId
    ])->get();
    
    $approvedQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status AND created_by = :created_by_id ORDER BY id desc", [
        'status' => QoutationStatus::APPROVED,
        'created_by_id' => $currentUserId
    ])->get();
    
    $disapprovedQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status AND created_by = :created_by_id ORDER BY id desc", [
        'status' => QoutationStatus::DISAPPROVED,
        'created_by_id' => $currentUserId
    ])->get();
} elseif($_SESSION['user']['role_id'] == Role::SALES_MANAGER) {
    $currentUserTeamId = $db->query("SELECT id FROM team WHERE manager_id = :manager_id", [
        'manager_id' => $_SESSION['user']['id']
    ])->find()['id'];
    // dd($currentUserTeamId);

    $allQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE qoutation.team_id = :team_id ORDER BY id desc", [
        'team_id' => $currentUserTeamId
    ])->get();
    
    $pendingQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status AND qoutation.team_id = :team_id ORDER BY id desc", [
        'status' => QoutationStatus::PENDING,
        'team_id' => $currentUserTeamId
    ])->get();
    
    $approvedQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status AND qoutation.team_id = :team_id ORDER BY id desc", [
        'status' => QoutationStatus::APPROVED,
        'team_id' => $currentUserTeamId
    ])->get();
    
    $disapprovedQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status AND qoutation.team_id = :team_id ORDER BY id desc", [
        'status' => QoutationStatus::DISAPPROVED,
        'team_id' => $currentUserTeamId
    ])->get();
} else {
    $allQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id ORDER BY id desc")->get();
    
    $pendingQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status ORDER BY id desc", [
        'status' => QoutationStatus::PENDING,
    ])->get();
    
    $approvedQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status ORDER BY id desc", [
        'status' => QoutationStatus::APPROVED,
    ])->get();
    
    $disapprovedQoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by_name, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE status = :status ORDER BY id desc", [
        'status' => QoutationStatus::DISAPPROVED,
    ])->get();
}


// dd($qoutations);

view("qoutation/index.view.php", [
    'heading' => "Qoutations",
    'allQoutations' => $allQoutations,
    'pendingQoutations' => $pendingQoutations,
    'approvedQoutations' => $approvedQoutations,
    'disapprovedQoutations' => $disapprovedQoutations,
]);