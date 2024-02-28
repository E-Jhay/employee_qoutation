<?php

use Core\App;
use Core\Mailer;
use Core\QuotationStatus;
use Core\Role;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');

// authorize((int)$_SESSION['user']['role_id'] != Role::SALES);

$id = $_POST['id'];
$mode = $_POST['mode'];
$remarks = $_POST['remarks'];
$currentStatus = $_POST['current_status'];
$status = QuotationStatus::PENDING;

try {
    $db->beginTransaction();
    if($mode == 'Approve') {
        if($currentStatus == 'pending') {
            $status = QuotationStatus::INITIAL_APPROVED;
        } else {
            $status = QuotationStatus::APPROVED;
        }
    } else {
        $status = QuotationStatus::DISAPPROVED;
    }
    // $mode == 'Approve' ? $status = QuotationStatus::APPROVED : ($mode == 'Disapprove' ? $status = QuotationStatus::DISAPPROVED : $status = QuotationStatus::PENDING);
    
    // if($mode == 'Disapprove') {
    //     $approvedPrices = json_decode($_POST['approvedPrices'], true);
    //     foreach($approvedPrices as $prices) {
    //         $db->query("UPDATE product_quotation SET approved_price = :approved_price WHERE id = :id", [
    //             'id' => $prices['id'],
    //             'approved_price' => $prices['approved_price'],
    //         ]);
    //     }
    // }
    // $db->query("UPDATE quotation SET status = :status, remarks = :remarks WHERE id = :id", [
    //     'status' => $status,
    //     'remarks' => $remarks,
    //     'id' => $id,
    // ]);
    $db->query("UPDATE quotation SET status = :status WHERE id = :id", [
        'status' => $status,
        'id' => $id,
    ]);

    $commented_by = $db->query("SELECT id FROM user WHERE role_id = :role_id", [
        'role_id' => Role::GENERAL_MANAGER
    ])->find()['id'];

    if($_SESSION) {
        $commented_by = $_SESSION['user']['id'];
    }
    if($remarks){
        // Add comments
        $db->query("INSERT INTO comment_quotation (quotation_id, user_id, description) VALUES (:quotation_id, :user_id, :description)", [
            'quotation_id' => $id,
            'user_id' => $commented_by,
            'description' => $remarks,
        ]);
    }

    if($mode == 'Approve') {
        $validity = $db->query("SELECT * FROM validity ORDER BY id DESC LIMIT 1")->find()['validity'];
        $db->query("UPDATE quotation SET updated_at = :updated_at, expired_at = :expired_at, validity = :validity WHERE id = :id", [
            'validity' => $validity,
            'updated_at' => date('Y-m-d H:i:s'),
            'expired_at' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'). " + {$validity} days")),
            'id' => $id,
        ]);
    }


    $config = require base_path("config.php");
    $mailer = new Mailer($config['mail']);
    if($status == QuotationStatus::DISAPPROVED) {
        // $to = ['bumacodejhay@gmail.com'];

        $to = (array)$db->query("SELECT user.email as created_by_email FROM quotation LEFT JOIN user ON quotation.created_by = user.id WHERE quotation.id = :id", ['id' => $id])->find()['created_by_email'];

        // // Read HTML content from a file and replace placeholders with data
        $htmlContent = getHtmlContent('../views/mail/disapprovedQuotation.html', [
            'manager' => $_SESSION ? $_SESSION['user']['name'] : 'Susan T. Panugayan',
            'id' => $id
        ]);
        // $mail->Body = $htmlContent;

        $mailer->sendMail($to, 'PMC Quotation', $htmlContent);
    } elseif($status == QuotationStatus::APPROVED) {
        // $to = ['bumacodejhay@gmail.com'];

        $to = (array)$db->query("SELECT customer.email as customer_email FROM quotation LEFT JOIN customer ON quotation.customer_id = customer.id WHERE quotation.id = :id", ['id' => $id])->find()['customer_email'];
        
        $cc = (array)$db->query("SELECT user.email as created_by_email FROM quotation LEFT JOIN user ON quotation.created_by = user.id WHERE quotation.id = :id", ['id' => $id])->find()['created_by_email'];

        // // Read HTML content from a file and replace placeholders with data
        $htmlContent = getHtmlContent('../views/mail/approvedQuotation.html', [
            'id' => $id
        ]);
        // // $mail->Body = $htmlContent;

        $mailer->sendMail($to, 'PMC Quotation', $htmlContent);
    } else {
        $to = (array)$db->query("SELECT email FROM user WHERE role_id = :role_id", ['role_id' => Role::GENERAL_MANAGER])->find()['email'];
        $to = ['bumacodejhay@gmail.com'];

        // // Read HTML content from a file and replace placeholders with data
        $htmlContent = getHtmlContent('../views/mail/initiallyApprovedQuotation.html', [
            'id' => $id
        ]);
        
        $mailer->sendMail($to, 'PMC Quotation', $htmlContent);
    }
    $db->commit();
    $response = array('success' => true, 'message' => "Quotation {$_POST['mode']}d");
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