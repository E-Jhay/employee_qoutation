<?php

use Core\App;
use Core\QuotationStatus;
use Core\Role;

$db = App::resolve('Core\Database');
// dd("Quotations");

if($_SESSION['user']['role_id'] == Role::SALES) {
    $currentUserId = $_SESSION['user']['id'];
    $allQuotations = $db->query("SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE created_by = :created_by_id ORDER BY id desc", [
        'created_by_id' => $currentUserId
    ])->get();
    
    $pendingQuotations = $db->query("SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE status = :status AND created_by = :created_by_id ORDER BY id desc", [
        'status' => QuotationStatus::PENDING,
        'created_by_id' => $currentUserId
    ])->get();
    
    $approvedQuotations = $db->query("SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE status = :status AND created_by = :created_by_id ORDER BY id desc", [
        'status' => QuotationStatus::APPROVED,
        'created_by_id' => $currentUserId
    ])->get();
    
    $disapprovedQuotations = $db->query("SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE status = :status AND created_by = :created_by_id ORDER BY id desc", [
        'status' => QuotationStatus::DISAPPROVED,
        'created_by_id' => $currentUserId
    ])->get();
} elseif($_SESSION['user']['role_id'] == Role::SALES_MANAGER) {
    $currentUserTeamId = $db->query("SELECT id FROM team WHERE manager_id = :manager_id", [
        'manager_id' => $_SESSION['user']['id']
    ])->find()['id'] ?? '';
    // dd($currentUserTeamId);

    $allQuotations = $db->query("SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE quotation.team_id = :team_id ORDER BY id desc", [
        'team_id' => $currentUserTeamId
    ])->get();
    
    $pendingQuotations = $db->query("SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE status = :status AND quotation.team_id = :team_id ORDER BY id desc", [
        'status' => QuotationStatus::PENDING,
        'team_id' => $currentUserTeamId
    ])->get();
    
    $approvedQuotations = $db->query("SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE status = :status AND quotation.team_id = :team_id ORDER BY id desc", [
        'status' => QuotationStatus::APPROVED,
        'team_id' => $currentUserTeamId
    ])->get();
    
    $disapprovedQuotations = $db->query("SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE status = :status AND quotation.team_id = :team_id ORDER BY id desc", [
        'status' => QuotationStatus::DISAPPROVED,
        'team_id' => $currentUserTeamId
    ])->get();
} else {
    $allQuotations = $db->query("SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id ORDER BY id desc")->get();
    
    $pendingQuotations = $db->query("SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE status = :status ORDER BY id desc", [
        'status' => QuotationStatus::PENDING,
    ])->get();
    
    $approvedQuotations = $db->query("SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE status = :status ORDER BY id desc", [
        'status' => QuotationStatus::APPROVED,
    ])->get();
    
    $disapprovedQuotations = $db->query("SELECT quotation.*, customer.name as customer_name, user.name as created_by_name, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE status = :status ORDER BY id desc", [
        'status' => QuotationStatus::DISAPPROVED,
    ])->get();
}


// dd($quotations);

view("quotation/index.view.php", [
    'heading' => "Quotations",
    'allQuotations' => $allQuotations,
    'pendingQuotations' => $pendingQuotations,
    'approvedQuotations' => $approvedQuotations,
    'disapprovedQuotations' => $disapprovedQuotations,
]);