<?php

use Core\App;
use Core\Validator;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');

$roles = $db->query("SELECT id, name FROM role")->get();
// dd($roles);
$errors = [];

$validator = new Validator();

if(! $validator->string($_POST['name'])) {
    $errors['name'] = "Name is required";
}

if(! $validator->email($_POST['email'])) {
    $errors['email'] = "Invalid email address";
}

if(! empty($errors)) {
    return view("user/create.php", [
        'heading' => 'Create User',
        'roles' => $roles,
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO user(name, email, address, phone, password, role_id) VALUES(:name, :email, :address, :phone, :password, :role_id)", [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'address' => $_POST['address'],
    'phone' => $_POST['phone'],
    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
    'role_id' => $_POST['role_id'],
]);

$_SESSION['success'] = "User ". $_POST['name'] . " Created";
redirect('/users');