<?php

use Core\App;
use Core\Session;

$db = App::resolve('Core\Database');

$qoutation = $db->query("SELECT qoutation.*, customer.name as customer_name, customer.address as customer_address, customer.contact_person as customer_contact_person, customer.position as customer_position, customer.email as customer_email, user.name as created_by, user.email as sales_email, user.phone as sales_phone, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE qoutation.id = :id", [
    'id' => $_GET['id']
])->find();

$products = $db->query("SELECT * FROM product_qoutation WHERE qoutation_id = :id", [
    'id' => $_GET['id']
])->get();
// dd("approved-qoutation");
// dd("create Qoutation");
// $managers = $db->query("SELECT id, name FROM user WHERE role_id = :role_id", [
//     'role_id' => 2
// ])->get();
// $regions = $db->query("SELECT id, name FROM region")->get();

view("qoutation/approvedQoutation.view.php", [
    'heading' => "Qoutation Information",
    'qoutation' => $qoutation,
    'products' => $products,
]);