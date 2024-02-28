<?php

use Core\App;
use Core\Mailer;
use Core\QuotationStatus;
use Core\Role;
use Core\Session;
use Http\Forms\QuotationCreateForm;
use Http\Forms\TeamCreateForm;

$db = App::resolve('Core\Database');

// $response = array('success' => true, 'message' => $_POST['email']);
// echo json_encode($response);

$quotationCreatedBy = $db->query("SELECT created_by FROM quotation WHERE id = :id", [
    'id' => $_POST['quotation_id']
])->find()['created_by'];
// dd($quotationCreatedBy);
authorize((int)$_SESSION['user']['role_id'] == Role::SALES && $_SESSION['user']['id'] == $quotationCreatedBy);

$attributes = [
    'name' => $_POST['customer_name'],
    'email' => $_POST['email'],
    'confirm_email' => $_POST['confirm_email'],
    'address_line_1' => $_POST['address_line_1'],
    'city' => $_POST['city'],
    'province' => $_POST['province'],
    'contact_person' => $_POST['contact_person'],
    'position' => $_POST['position'],
    'region' => $_POST['region'],
    // 'territory' => $_POST['territory'],
    // 'tel_no' => $_POST['tel_no'],
    // 'validity' => $_POST['validity'],
    // 'delivery' => $_POST['delivery'],
    'term_id' => $_POST['term_id'],
    'vat' => $_POST['vat'],
    'delivery' => $_POST['delivery'],
    'needed_at' => $_POST['needed_at'],
];

$form = QuotationCreateForm::validate($attributes);

if(count($form->errors()) > 0) {
    $response = array('success' => false, 'message' => $form->errors());
    echo json_encode($response);
    exit;
}


try {
    $db->beginTransaction();

    $quotation = $db->query("SELECT * FROM quotation WHERE id = :id", [
        'id' => $_POST['quotation_id']
    ])->findOrFail();

    $db->query("UPDATE customer SET name = :name, address_line_1 = :address_line_1, address_line_2 = :address_line_2, city = :city, province = :province, contact_person = :contact_person, position = :position, email = :email WHERE id = :id", [
        'id' => $quotation['customer_id'],
        'name' => $_POST['customer_name'],
        'email' => $_POST['email'],
        'address_line_1' => $_POST['address_line_1'],
        'address_line_2' => $_POST['address_line_2'],
        'city' => $_POST['city'],
        'province' => $_POST['province'],
        'contact_person' => $_POST['contact_person'],
        'position' => $_POST['position'],
    ]);
    
    // $lastInsertId = $db->connection()->lastInsertId();

    $db->query("UPDATE quotation SET created_by = :created_by, term_id = :term_id, delivery = :delivery, vat = :vat, region = :region, needed_at = :needed_at WHERE id = :id", [
        'id' => $_POST['quotation_id'],
        'created_by' => $_SESSION['user']['id'],
        // 'territory' => 'territory2',
        // 'tel_no' => '091234567892',
        // 'validity' => 'valid2',
        // 'delivery' => 'delivery2',
        'delivery' => $_POST['delivery'],
        'term_id' => $_POST['term_id'],
        'term_id' => $_POST['term_id'],
        'vat' => $_POST['vat'],
        'region' => $_POST['region'],
        'needed_at' => $_POST['needed_at'],
    ]);
    // $lastInsertId = $db->connection()->lastInsertId();
    
    
    $db->query("DELETE FROM product_quotation WHERE quotation_id = :quotation_id", [
        'quotation_id' => $_POST['quotation_id']
    ]);
    
    $products = json_decode($_POST['products'], true);
    foreach($products as $product) {
        $db->query("INSERT INTO product_quotation (quotation_id, code, description, comment, quantity, uom, comparative_price, catalog_price, proposed_price, applied_discount, wo_scd_price, total) VALUES(:quotation_id, :code, :description, :comment, :quantity, :uom, :comparative_price, :catalog_price, :proposed_price, :applied_discount, :wo_scd_price, :total)", [
            'quotation_id' => $_POST['quotation_id'],
            // 'unit' => $product['product_unit'],
            'code' => $product['product_code'],
            'description' => $product['product_description'],
            'comment' => $product['product_comment'],
            'quantity' => $product['product_qty'],
            'uom' => $product['uom'],
            // 'stock' => $product['stock'],
            'comparative_price' => $product['comparative_price'],
            'catalog_price' => $product['catalog_price'],
            'proposed_price' => $product['proposed_price'],
            'applied_discount' => $product['applied_discount'],
            'wo_scd_price' => $product['wo_scd_price'],
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

        $config = require base_path("config.php");
        $mailer = new Mailer($config['mail']);
        $manager_email = (array)$db->query("SELECT email FROM team LEFT JOIN user ON team.manager_id = user.id WHERE team.id = :team_id", [
            'team_id' => $_SESSION['user']['team_id'],
        ])->find()['email'] ?? '';
        $to = $manager_email;
        // $to = ['bumacodejhay@gmail.com'];

        // Read HTML content from a file and replace placeholders with data
        $htmlContent = getHtmlContent('../views/mail/initiallyApprovedQuotation.html', [
            // 'created_by' => $_SESSION['user']['name'],
            'id' => $quotation['id']
        ]);
        // $mail->Body = $htmlContent;

        $mailer->sendMail($to, 'PMC Quotation ' . $quotation['control_no'], $htmlContent);
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