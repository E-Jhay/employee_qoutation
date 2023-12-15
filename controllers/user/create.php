<?php

use Core\Database;
use Core\Validator;

require base_path("Core/Validator.php");
$config = require base_path("config.php");
$db = new Database($config['database']);

$roles = $db->query("SELECT id, name FROM role")->get();
// dd($roles);
$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $validator = new Validator();

    if(! $validator->string($_POST['name'])) {
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

        $_SESSION['success'] = "User ". $_POST['name'] . " Created";
        header('Location: /users');
        exit();
    }
}



// $user = $db->query("SELECT * FROM user WHERE id = :id",
//             ['id' => $_GET['id']
//         ])->find();
// dd($user);

// dd("aaaa");

view("user/create.php", [
    'heading' => 'Create User',
    'roles' => $roles,
    'errors' => $errors
]);