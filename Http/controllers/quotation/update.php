<?php

use Core\App;
use Core\QuotationStatus;
use Core\Role;
use Core\Session;
use Http\Forms\TeamCreateForm;

$db = App::resolve('Core\Database');

// $response = array('success' => true, 'message' => $_POST['email']);
// echo json_encode($response);

$quotationCreatedBy = $db->query("SELECT created_by FROM quotation WHERE id = :id", [
    'id' => $_POST['quotation_id']
])->find()['created_by'];
// dd($quotationCreatedBy);
authorize((int)$_SESSION['user']['role_id'] == Role::SALES && $_SESSION['user']['id'] == $quotationCreatedBy);


try {
    $db->beginTransaction();

    $quotation = $db->query("SELECT * FROM quotation WHERE id = :id", [
        'id' => $_POST['quotation_id']
    ])->findOrFail();

    $db->query("UPDATE customer SET name = :name, address = :address, contact_person = :contact_person, position = :position, email = :email WHERE id = :id", [
        'id' => $quotation['customer_id'],
        'name' => $_POST['customer_name'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'contact_person' => $_POST['contact_person'],
        'position' => $_POST['position'],
    ]);
    
    // $lastInsertId = $db->connection()->lastInsertId();

    $db->query("UPDATE quotation SET created_by = :created_by, terms = :terms, needed_at = :needed_at WHERE id = :id", [
        'id' => $_POST['quotation_id'],
        'created_by' => $_SESSION['user']['id'],
        // 'territory' => 'territory2',
        // 'tel_no' => '091234567892',
        // 'validity' => 'valid2',
        // 'delivery' => 'delivery2',
        'terms' => $_POST['terms'],
        'needed_at' => $_POST['needed_at'],
    ]);
    // $lastInsertId = $db->connection()->lastInsertId();
    
    
    $db->query("DELETE FROM product_quotation WHERE quotation_id = :quotation_id", [
        'quotation_id' => $_POST['quotation_id']
    ]);
    
    $products = json_decode($_POST['products'], true);
    foreach($products as $product) {
        $db->query("INSERT INTO product_quotation (quotation_id, code, description, comment, quantity, comparative_price, catalog_price, proposed_price, proposed_price_discount, total) VALUES(:quotation_id, :code, :description, :comment, :quantity, :comparative_price, :catalog_price, :proposed_price, :proposed_price_discount, :total)", [
            'quotation_id' => $_POST['quotation_id'],
            // 'unit' => $product['product_unit'],
            'code' => $product['product_code'],
            'description' => $product['product_description'],
            'comment' => $product['product_comment'],
            'quantity' => $product['product_qty'],
            // 'stock' => $product['stock'],
            'comparative_price' => $product['comparative_price'],
            'catalog_price' => $product['catalog_price'],
            'proposed_price' => $product['proposed_price'],
            'proposed_price_discount' => $product['proposed_price_discount'],
            // 'approved_price' => $product['approved_price'],
            'total' => $product['product_total'],
            // 'deal_equivalent' => $product['deal_equivalent'],
        ]);
    }

    if($quotation['status'] == QuotationStatus::DISAPPROVED) {
        $db->query("UPDATE quotation SET status = :status WHERE id = :id", [
            'id' => $quotation['id'],
            'status' => QuotationStatus::PENDING,
        ]);
    }

    $db->commit();
    $response = array('success' => true, 'message' => 'Quotation updated');
    echo json_encode($response);
} catch(Exception $e) {
    // An error occurred, rollback the transaction
    if ($db->connection() !== null) {
        $db->rollback();
    }
    $response = array('success' => false, 'message' => $e->getMessage());
    echo json_encode($response);
    // throw new Exception('There\'s something wrong happened upon creating team.');
}