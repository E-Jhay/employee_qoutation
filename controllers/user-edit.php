<?php

$config = require "config.php";
$db = new Database($config['database']);

$heading = "User Edit";
$roles = $db->query("SELECT id, name FROM role")->get();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query("UPDATE user SET name = :name, email = :email, address = :address, phone = :phone, role_id = :role_id WHERE id = :id", [
        'id' => $_GET['id'],
        'name' => $_POST['full_name'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'phone' => $_POST['phone'],
        // 'password' => $_POST['password'],
        'role_id' => $_POST['role_id'],
    ]);
}

$user = $db->query("SELECT * FROM user WHERE id = :id",
            ['id' => $_GET['id']
        ])->findOrFail();
// dd($user);

// dd("aaaa");

require "views/user-edit.view.php";