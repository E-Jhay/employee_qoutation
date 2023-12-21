<?php

use Core\App;
use Core\Session;
use Core\Validator;
use Http\Forms\UserCreateForm;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');

$roles = $db->query("SELECT id, name FROM role")->get();
// dd($roles);
// $errors = [];

// $validator = new Validator();

// if(! $validator->string($_POST['name'])) {
//     $errors['name'] = "Name is required";
// }

// if(! $validator->email($_POST['email'])) {
//     $errors['email'] = "Invalid email address";
// }

$form = UserCreateForm::validate($attributes = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'address' => $_POST['address'],
    'phone' => $_POST['phone'],
    'role_id' => $_POST['role_id'],
    'password' => $_POST['password'],
    're-type-password' => $_POST['re-type-password'],
]);

if(! empty($form->errors())) {
    return view("user/create.view.php", [
        'heading' => 'Create User',
        'roles' => $roles,
        'errors' => $errors
    ]);
}

try {
    $db->query("INSERT INTO user(name, email, address, phone, password, role_id) VALUES(:name, :email, :address, :phone, :password, :role_id)", [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'phone' => $_POST['phone'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        'role_id' => $_POST['role_id'],
    ]);
} catch(Exception $e) {
    throw new Exception('There\'s something wrong happened upon creating user.');
}

Session::flash('success', "User '{$_POST["name"]}' Created.");
redirect('/users');