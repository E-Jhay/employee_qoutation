<?php

use Core\App;
$db = App::resolve('Core\Database');
// dd("Update");

// $role = $db->query("UPDATE role SET name = :name, updated_at = :updated_at WHERE id = :id", [
//     'id' => $_POST['id'],
//     'name' => $_POST['full_name'],
//     'updated_at' => date('Y-m-d H:i:s'),
// ]);

// if($role) {
//     $_SESSION['success'] = "Role Updated.";
// }

// redirect('/roles');
try{
    $role = $db->query("UPDATE validity SET validity = :validity, updated_at = :updated_at WHERE id = :id", [
        'id' => $_POST['id'],
        'validity' => $_POST['validity'],
        'updated_at' => date('Y-m-d H:i:s'),
    ]);
    
    $response = array('success' => true, 'message' => 'Validity Updated');
    echo json_encode($response);
} catch(Exception $e) {
    $response = array('success' => false, 'message' => 'There\'s an error updating the validity.');
    echo json_encode($response);
}
