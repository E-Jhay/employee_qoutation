<?php

use Core\App;
$db = App::resolve('Core\Database');

$roles = $db->query("SELECT id, name FROM role")->get();

$user = $db->query("UPDATE user SET name = :name, email = :email, address = :address, phone = :phone, role_id = :role_id WHERE id = :id", [
    'id' => $_POST['id'],
    'name' => $_POST['full_name'],
    'email' => $_POST['email'],
    'address' => $_POST['address'],
    'phone' => $_POST['phone'],
    // 'password' => $_POST['password'],
    'role_id' => $_POST['role_id'],
]);

if($user) {
    $_SESSION['success'] = "User Updated.";
}

header("Location: /users");
exit();