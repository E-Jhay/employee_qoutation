<?php

use Core\App;
use Core\QoutationStatus;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');

$id = $_POST['id'];
$mode = $_POST['mode'];
$status = QoutationStatus::PENDING;

try {
    $mode == 'Approve' ? $status = QoutationStatus::APPROVED : ($mode == 'Disapprove' ? $status = QoutationStatus::DISAPPROVED : $status = QoutationStatus::PENDING);

    $db->query("UPDATE qoutation SET status = :status WHERE id = :id", [
        'status' => $status,
        'id' => $id,
    ]);
    
    $response = array('success' => true, 'message' => "Qoutation {$_POST['mode']}d");
    echo json_encode($response);
} catch(Exception $e) {

    $response = array('success' => false, 'message' => $e->getMessage());
    echo json_encode($response);
    // throw new Exception('There\'s something wrong happened upon creating team.');
}

// Session::flash('success', "Team '{$_POST["name"]}' Created.");
// redirect('/teams');