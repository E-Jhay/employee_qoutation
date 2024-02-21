<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');


$quotationCreatedBy = $db->query("SELECT created_by FROM quotation WHERE id = :id", [
    'id' => $_GET['id']
])->find()['created_by'];
// dd($quotationCreatedBy);
authorize((int)$_SESSION['user']['role_id'] == Role::SALES && $_SESSION['user']['id'] == $quotationCreatedBy);

$quotation = $db->query("SELECT quotation.*, customer.name as customer_name, customer.address as customer_address, customer.contact_person as customer_contact_person, customer.position as customer_position, customer.email as customer_email, user.name as created_by, user.email as sales_email, user.phone as sales_phone, quotation_status.name as status_name FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id WHERE quotation.id = :id", [
    'id' => $_GET['id']
])->find();


$products = $db->query("SELECT *, quantity as product_qty, total as product_total, unit as product_unit, code as product_code, description as product_description, comment as product_comment FROM product_quotation WHERE quotation_id = :id", [
    'id' => $_GET['id']
])->get();
// dd($products);

view("quotation/edit.view.php", [
    'heading' => "Quotation Information",
    'quotation' => $quotation,
    'products' => json_encode($products),
]);