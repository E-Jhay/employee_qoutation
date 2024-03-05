<?php

use Core\App;
use Core\Role;
use Core\ValidationException;
use Core\Validator;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

// dd($roles);
$errors = [];

if(! Validator::string($_POST['name'])) {
    $errors['name'] = "Role name is required";
}

if(! empty($errors)) {
    ValidationException::throw($errors, $_POST);
}

$db->query("INSERT INTO role(name) VALUES(:name)", [
    'name' => $_POST['name'],
]);

$_SESSION['success'] = "Role ". $_POST['name'] . " Created";
redirect('/roles');