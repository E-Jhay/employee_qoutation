<?php

use Core\App;
use Core\Validator;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');

// dd($roles);
$errors = [];

if(! Validator::string($_POST['name'])) {
    $errors['name'] = "Role name is required";
}

if(! empty($errors)) {
    return view("role/create.php", [
        'heading' => 'Create Role',
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO role(name) VALUES(:name)", [
    'name' => $_POST['name'],
]);

$_SESSION['success'] = "Role ". $_POST['name'] . " Created";
header('Location: /roles');
exit();