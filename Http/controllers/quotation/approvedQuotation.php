<?php

use Core\App;
use Core\Session;

$db = App::resolve('Core\Database');

$quotation = $db->query("SELECT quotation.*, customer.name as customer_name, customer.address_line_1 as customer_address_line_1, customer.address_line_2 as customer_address_line_2, customer.city as customer_city, customer.province as customer_province, customer.contact_person as customer_contact_person, customer.position as customer_position, customer.email as customer_email, user.name as created_by, user.email as sales_email, user.phone as sales_phone, quotation_status.name as status_name, term.description as terms FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id LEFT JOIN term ON quotation.term_id = term.id WHERE quotation.id = :id", [
    'id' => $_GET['id']
])->find();

$products = $db->query("SELECT * FROM product_quotation WHERE quotation_id = :id", [
    'id' => $_GET['id']
])->get();


$attachments = $db->query("SELECT * FROM file_quotation WHERE quotation_id = :id", [
    'id' => $_GET['id']
])->get();

$grand_total = $db->query("SELECT SUM(total) as grand_total FROM product_quotation WHERE quotation_id = :id", [
    'id' => $_GET['id']
])->find()['grand_total'];
// dd("approved-quotation");
// dd("create Quotation");
// $managers = $db->query("SELECT id, name FROM user WHERE role_id = :role_id", [
//     'role_id' => 2
// ])->get();
// $regions = $db->query("SELECT id, name FROM region")->get();

view("quotation/approvedQuotation.view.php", [
    'heading' => "Quotation Information",
    'quotation' => $quotation,
    'products' => $products,
    'grand_total' => $grand_total,
    'attachments' => $attachments,
]);