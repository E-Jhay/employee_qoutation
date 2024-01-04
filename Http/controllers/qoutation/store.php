<?php

use Core\App;
use Core\Session;
use Core\Validator;
use Http\Forms\TeamCreateForm;
use Http\Forms\UserCreateForm;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');
// dd('aaa');
// foreach($_POST['products'] as $products) {
//     echo $product
// }

// Decode the JSON data

try {
    $db->beginTransaction();

    $db->query("INSERT INTO customer (name, address, contact_person, position, email) VALUES(:name, :address, :contact_person, :position, :email)", [
        'name' => $_POST['customer_name'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'contact_person' => $_POST['contact_person'],
        'position' => $_POST['position'],
    ]);
    $lastInsertId = $db->connection()->lastInsertId();

    $db->query("INSERT INTO qoutation (control_no, created_by, customer_id, territory, tel_no, validity, delivery, terms) VALUES(:control_no, :created_by, :customer_id, :territory, :tel_no, :validity, :delivery, :terms)", [
        'control_no' => "0001",
        'created_by' => 3,
        'customer_id' => $lastInsertId,
        'territory' => 'territory',
        'tel_no' => '09123456789',
        'validity' => 'valid',
        'delivery' => 'delivery',
        'terms' => 'terms',
    ]);
    $lastInsertId = $db->connection()->lastInsertId();
    
    $products = json_decode($_POST['products'], true);

    foreach($products as $product) {
        $db->query("INSERT INTO product_qoutation (qoutation_id, unit, code, description, quantity, stock, comparative_price, catalog_price, proposed_price, approved_price, total, deal_equivalent) VALUES(:qoutation_id, :unit, :code, :description, :quantity, :stock, :comparative_price, :catalog_price, :proposed_price, :approved_price, :total, :deal_equivalent)", [
            'qoutation_id' => $lastInsertId,
            'unit' => $product['product_unit'],
            'code' => $product['product_code'],
            'description' => $product['product_description'],
            'quantity' => $product['product_qty'],
            'stock' => $product['stock'],
            'comparative_price' => $product['comparative_price'],
            'catalog_price' => $product['catalog_price'],
            'proposed_price' => $product['proposed_price'],
            'approved_price' => $product['approved_price'],
            'total' => $product['product_total'],
            'deal_equivalent' => $product['deal_equivalent'],
        ]);
    }

    $db->commit();
    $response = array('success' => true, 'message' => 'Qoutation added');
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

// Session::flash('success', "Team '{$_POST["name"]}' Created.");
// redirect('/teams');