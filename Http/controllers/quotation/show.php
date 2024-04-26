<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

$quotation = $db->query("SELECT quotation.*, quotation.created_by as created_by_id, customer.name as customer_name, customer.address_line_1 as customer_address_line_1, customer.address_line_2 as customer_address_line_2, customer.city as customer_city, customer.province as customer_province, customer.contact_person as customer_contact_person, customer.position as customer_position, customer.email as customer_email, user.name as created_by, user.email as sales_email, user.phone as sales_phone, quotation_status.name as status_name, term.description as terms FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id LEFT JOIN user ON quotation.created_by = user.id LEFT JOIN quotation_status ON quotation.status = quotation_status.id LEFT JOIN term ON quotation.term_id = term.id WHERE quotation.id = :id", [
    'id' => $_GET['id']
])->find();

$approversName = $db->query("SELECT user.name as approversName FROM team LEFT JOIN user ON user.id = team.manager_id WHERE team.id = :id", [
    'id' => $quotation['team_id']
])->find()['approversName'];

$products = $db->query("SELECT * FROM product_quotation WHERE quotation_id = :id", [
    'id' => $_GET['id']
])->get();

$attachments = $db->query("SELECT * FROM file_quotation WHERE quotation_id = :id", [
    'id' => $_GET['id']
])->get();

$comments = $db->query("SELECT comment_quotation.user_id as comment_by, CONCAT('Comments from ', user.name) as comment_heading,
GROUP_CONCAT(comment_quotation.description SEPARATOR '</br>') as comments FROM comment_quotation LEFT JOIN user ON comment_quotation.user_id = user.id WHERE quotation_id = :id GROUP BY comment_quotation.user_id ORDER BY 
    CASE 
        WHEN comment_quotation.user_id = :gm_id THEN 0 
        ELSE 1 
    END,
    comment_by", [
    'id' => $_GET['id'],
    'gm_id' => $db->query("SELECT id FROM user WHERE role_id = :role_id", ['role_id' => Role::GENERAL_MANAGER])->find()['id'],
])->get();

// dd($comments);

$company = $db->query("SELECT * FROM company WHERE isActive = 1 LIMIT 1")->find();

$grand_total = $db->query("SELECT SUM(total) as grand_total FROM product_quotation WHERE quotation_id = :id", [
    'id' => $_GET['id']
])->find()['grand_total'];

// dd($attachments);

view("quotation/show.view.php", [
    'heading' => "Quotation Information",
    'quotation' => $quotation,
    'products' => $products,
    'grand_total' => $grand_total,
    'attachments' => $attachments,
    'comments' => $comments,
    'company' => $company,
    'approversName' => $approversName,
]);