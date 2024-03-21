<?php

use Core\App;
use Core\Mailer;
use Core\QuotationStatus;
use Core\Role;
use Http\Forms\QuotationCreateForm;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::SALES);

// $form = QuotationCreateForm::validate($attributes = [
//     'name' => $_POST['customer_name'],
//     'email' => $_POST['email'],
//     'address' => $_POST['address'],
//     'contact_person' => $_POST['contact_person'],
//     'position' => $_POST['position'],
// ]);

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

    $db->query("INSERT INTO customer (name, address_line_1, address_line_2, city, province, contact_person, position, email) VALUES(:name, :address_line_1, :address_line_2, :city, :province, :contact_person, :position, :email)", [
        'name' => $_POST['customer_name'],
        'email' => $_POST['email'],
        'address_line_1' => $_POST['address_line_1'],
        'address_line_2' => $_POST['address_line_2'],
        'city' => $_POST['city'],
        'province' => $_POST['province'],
        'contact_person' => $_POST['contact_person'],
        'position' => $_POST['position'],
    ]);
    $customerInsertedId = $db->connection()->lastInsertId();

    if($_SESSION['user']['role_id'] == Role::SALES_MANAGER) {
        $team_id = $db->query("SELECT id FROM team WHERE manager_id = :id", [
            'id' => $_SESSION['user']['id']
        ])->find()['id'];
    } else {
        $team_id = $_SESSION['user']['team_id'];
    }

    $latestControlNo = $db->query("SELECT control_no FROM `quotation` WHERE YEAR(created_at) = YEAR(CURDATE()) ORDER BY id DESC LIMIT 1")->find()['control_no'] ?? 'Q-0-' . substr(date('Y'), 2);

    
    $validity = $db->query("SELECT * FROM validity ORDER BY id DESC LIMIT 1")->find()['validity'];
    $db->query("INSERT INTO quotation (control_no, created_by, customer_id, delivery, term_id, validity, vat, region, status, team_id, needed_at, expired_at) VALUES(:control_no, :created_by, :customer_id, :delivery, :term_id, :validity, :vat, :region, :status, :team_id, :needed_at, :expired_at)", [
        'control_no' => generateControlNumber($latestControlNo),
        'created_by' => $_SESSION['user']['id'],
        'customer_id' => $customerInsertedId,
        // 'territory' => $_POST['territory'],
        // 'tel_no' => $_POST['tel_no'],
        'validity' => $validity,
        'delivery' => $_POST['delivery'],
        'term_id' => $_POST['term_id'],
        'status' => QuotationStatus::PENDING,
        'team_id' => $team_id,
        'vat' => $_POST['vat'],
        'region' => $_POST['region'],
        'needed_at' => $_POST['needed_at'],
        'expired_at' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'). " + {$validity} days")),
    ]);
    $quotationInsertId = $db->connection()->lastInsertId();
    
    $products = json_decode($_POST['products'], true);

    foreach($products as $product) {
        $db->query("INSERT INTO product_quotation (quotation_id, code, description, comment, quantity, uom, comparative_price, catalog_price, proposed_price, applied_discount, wo_scd_price, total) VALUES(:quotation_id, :code, :description, :comment, :quantity, :uom, :comparative_price, :catalog_price, :proposed_price, :applied_discount, :wo_scd_price, :total)", [
            'quotation_id' => $quotationInsertId,
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
            // 'proposed_price_discount' => $product['proposed_price_discount'],
            // 'approved_price' => $product['approved_price'],
            'total' => $product['product_total'],
            // 'deal_equivalent' => $product['deal_equivalent'],
        ]);
    }

    if($_FILES['attachments']['size'][0] > 0) {
        $files = $_FILES['attachments'];

        // move the files
        for($i = 0; $i < count($files['name']); $i++) {
            // $path = pathinfo($files[$i]);
            // $ext = $path['extension'];
            $filename = $files['name'][$i];
            $tmp = $files['tmp_name'][$i];
            
            if(pathinfo($filename, PATHINFO_EXTENSION) !== 'pdf') {
                throw new Exception("Only accepts pdf file.");
                exit;
            }
    
            // set the filename as the basename + extension
            $uploaded_file = pathinfo($filename, PATHINFO_FILENAME) . '-' . time() . '.' . pathinfo($filename, PATHINFO_EXTENSION);
            // new filepath
            $filepath = './images/quotation/' . $uploaded_file;
    
            // move the file to the upload dir
            if (file_exists($filepath)) {
                throw new Exception("Sorry, file already exists.");
                exit;
            }else{
                if(move_uploaded_file($tmp, $filepath)) {
                    $db->query("INSERT INTO file_quotation (name, quotation_id) VALUES(:name, :quotation_id)", [
                        'name' => $uploaded_file,
                        'quotation_id' => $quotationInsertId,
                    ]);
                }
            }
    
        }
    }
    
    $config = require base_path("config.php");
    $mailer = new Mailer($config['mail']);
    $manager_email = (array)$db->query("SELECT email FROM team LEFT JOIN user ON team.manager_id = user.id WHERE team.id = :team_id", [
        'team_id' => $_SESSION['user']['team_id'],
    ])->find()['email'] ?? '';
    $to = $manager_email;
    // $to = ['bumacodejhay@gmail.com'];

    // Read HTML content from a file and replace placeholders with data
    $htmlContent = getHtmlContent('../views/mail/storeQuotation.html', [
        'APP_URL' => $config['server']['APP_URL'],
        'created_by' => $_SESSION['user']['name'],
        'id' => $quotationInsertId
    ]);
    // $mail->Body = $htmlContent;

    $mailer->sendMail($to, 'PMC Quotation ' . generateControlNumber($latestControlNo), $htmlContent);

    $db->commit();

    $response = array('success' => true, 'message' => 'Quotation added');
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