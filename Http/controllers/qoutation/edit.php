<?php

use Core\App;
use Core\Session;

$db = App::resolve('Core\Database');

$qoutation = $db->query("SELECT qoutation.*, customer.name as customer_name, customer.address as customer_address, customer.contact_person as customer_contact_person, customer.position as customer_position, customer.email as customer_email, user.name as created_by, user.email as sales_email, user.phone as sales_phone, qoutation_status.name as status_name FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id LEFT JOIN qoutation_status ON qoutation.status = qoutation_status.id WHERE qoutation.id = :id", [
    'id' => $_GET['id']
])->find();


$products = $db->query("SELECT *, quantity as product_qty, total as product_total, unit as product_unit, code as product_code, description as product_description FROM product_qoutation WHERE qoutation_id = :id", [
    'id' => $_GET['id']
])->get();
// dd($products);

view("qoutation/edit.view.php", [
    'heading' => "Qoutation Information",
    'qoutation' => $qoutation,
    'products' => json_encode($products),
]);