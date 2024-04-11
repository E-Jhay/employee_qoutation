<?php

use Core\App;
use Core\Role;
use Core\Session;
use Http\Forms\UserEditForm;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$roles = $db->query("SELECT id, name FROM role")->get();

$form = UserEditForm::validate($attributes = [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'address' => $_POST['address'],
    // 'phone' => $_POST['phone'],
    'role_id' => $_POST['role_id'],
]);

if(! empty($form->errors())) {
    return view("user/edit.view.php", [
        'heading' => 'Edit User',
        'roles' => $roles,
        'errors' => $errors
    ]);
}

$user = $db->query("UPDATE user SET name = :name, email = :email, address = :address, phone = :phone, role_id = :role_id, team_id = :team_id, updated_at = :updated_at WHERE id = :id", [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'address' => $_POST['address'],
    'phone' => $_POST['phone'],
    // 'password' => $_POST['password'],
    'role_id' => $_POST['role_id'],
    'team_id' => $_POST['team_id'] !== '' ? $_POST['team_id'] : NULL,
    'updated_at' => date('Y-m-d H:i:s'),
]);

if($user) {
    Session::flash('success', "User '{$_POST["name"]}' Updated.");
}

redirect('/users');