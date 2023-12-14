<?php

require "Validator.php";
$config = require "config.php";
$db = new Database($config['database']);

$heading = "User Create";
$roles = $db->query("SELECT id, name FROM role")->get();
// dd($roles);

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    $validator = new Validator();

    if(! $validator->string($_POST['name'], 1, 3)) {
        $errors['name'] = "Name is required";
    }

    if(! $validator->email($_POST['email'])) {
        $errors['email'] = "Invalid email address";
    }

    if(empty($errors)) {
        $db->query("INSERT INTO user(name, email, address, phone, password, role_id) VALUES(:name, :email, :address, :phone, :password, :role_id)", [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'password' => $_POST['password'],
            'role_id' => $_POST['role_id'],
        ]);
    }
}



// $user = $db->query("SELECT * FROM user WHERE id = :id",
//             ['id' => $_GET['id']
//         ])->find();
// dd($user);

// dd("aaaa");

require "views/user-create.view.php";