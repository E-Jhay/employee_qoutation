<?php

use Core\App;
use Core\Mailer;
use Core\QoutationStatus;
use Core\Role;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');

authorize($_SESSION['user']['role_id'] === Role::SALES_MANAGER);

$id = $_POST['id'];
$mode = $_POST['mode'];
$status = QoutationStatus::PENDING;

try {
    $mode == 'Approve' ? $status = QoutationStatus::APPROVED : ($mode == 'Disapprove' ? $status = QoutationStatus::DISAPPROVED : $status = QoutationStatus::PENDING);
    
    if($mode == 'Disapprove') {
        $approvedPrices = json_decode($_POST['approvedPrices'], true);
        foreach($approvedPrices as $prices) {
            $db->query("UPDATE product_qoutation SET approved_price = :approved_price WHERE id = :id", [
                'id' => $prices['id'],
                'approved_price' => $prices['approved_price'],
            ]);
        }
    }
    $db->query("UPDATE qoutation SET status = :status WHERE id = :id", [
        'status' => $status,
        'id' => $id,
    ]);

    if($mode == 'Approve') {
        $validity = $db->query("SELECT * FROM validity ORDER BY id DESC LIMIT 1")->find()['validity'];
        $db->query("UPDATE qoutation SET updated_at = :updated_at, expired_at = :expired_at, validity = :validity WHERE id = :id", [
            'validity' => $validity,
            'updated_at' => date('Y-m-d H:i:s'),
            'expired_at' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'). ' + 30 days')),
            'id' => $id,
        ]);
    }


    $config = require base_path("config.php");
    $mailer = new Mailer($config['mail']);
    if($status == QoutationStatus::DISAPPROVED) {
        // $to = ['bumacodejhay@gmail.com'];

        $to = (array)$db->query("SELECT user.email as created_by_email FROM qoutation LEFT JOIN user ON qoutation.created_by = user.id WHERE qoutation.id = :id", ['id' => $id])->find()['created_by_email'];

        // // Read HTML content from a file and replace placeholders with data
        $htmlContent = getHtmlContent('../views/mail/disapprovedQoutation.html', [
            'manager' => $_SESSION['user']['name'],
            'id' => $id
        ]);
        // $mail->Body = $htmlContent;

        $mailer->sendMail($to, 'PMC Qoutation', $htmlContent);
    } elseif($status == QoutationStatus::APPROVED) {
        // $to = ['bumacodejhay@gmail.com'];

        $to = (array)$db->query("SELECT customer.email as customer_email FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id WHERE qoutation.id = :id", ['id' => $id])->find()['customer_email'];
        
        $cc = (array)$db->query("SELECT user.email as created_by_email FROM qoutation LEFT JOIN user ON qoutation.created_by = user.id WHERE qoutation.id = :id", ['id' => $id])->find()['created_by_email'];

        // // Read HTML content from a file and replace placeholders with data
        $htmlContent = getHtmlContent('../views/mail/approvedQoutation.html', [
            'id' => $id
        ]);
        // // $mail->Body = $htmlContent;

        $mailer->sendMail($to, 'PMC Qoutation', $htmlContent);
    }
    $response = array('success' => true, 'message' => "Qoutation {$_POST['mode']}d");
    echo json_encode($response);
} catch(Exception $e) {

    $response = array('success' => false, 'message' => $e->getMessage());
    echo json_encode($response);
    // throw new Exception('There\'s something wrong happened upon creating team.');
}

// Session::flash('success', "Team '{$_POST["name"]}' Created.");
// redirect('/teams');