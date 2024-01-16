<?php

use Core\App;
use Core\QoutationStatus;
use Core\Role;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');

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

    if($_SESSION['user']['role_id'] == Role::SALES_MANAGER) {
        $team_id = $db->query("SELECT id FROM team WHERE manager_id = :id", [
            'id' => $_SESSION['user']['id']
        ])->find()['id'];
    } else {
        $team_id = $_SESSION['user']['team_id'];
    }

    $db->query("INSERT INTO qoutation (control_no, created_by, customer_id, territory, tel_no, validity, delivery, terms, status, team_id, needed_at) VALUES(:control_no, :created_by, :customer_id, :territory, :tel_no, :validity, :delivery, :terms, :status, :team_id, :needed_at)", [
        'control_no' => rand(1, 1000),
        'created_by' => $_SESSION['user']['id'],
        'customer_id' => $lastInsertId,
        'territory' => $_POST['territory'],
        'tel_no' => $_POST['tel_no'],
        'validity' => $_POST['validity'],
        'delivery' => $_POST['delivery'],
        'terms' => $_POST['terms'],
        'status' => QoutationStatus::PENDING,
        'team_id' => $team_id,
        'needed_at' => $_POST['needed_at'],
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