<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');
// Retrieve data from the request payload
$data = json_decode(file_get_contents("php://input"), true);

// Access the data
$id = $data['id'];

try {

    $qoutationCreatedBy = $db->query("SELECT created_by FROM qoutation WHERE id = :id", [
        'id' => $id
    ])->find()['created_by'];
    // dd($qoutationCreatedBy);
    authorize((int)$_SESSION['user']['role_id'] === Role::SALES && $_SESSION['user']['id'] === $qoutationCreatedBy);
    
    $db->query("DELETE FROM qoutation WHERE id = :id", ['id' => $id]);
    echo json_encode(['success' => true, 'message' => 'Qoutation Deleted.']);
} catch (\Exception $e) {
    //throw $th;
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

// Session::flash('success', "Qoutation Deleted.");
// redirect('/qoutations');