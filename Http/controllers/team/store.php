<?php

use Core\App;
use Core\Role;
use Core\Session;
use Core\Validator;
use Http\Forms\TeamCreateForm;
use Http\Forms\UserCreateForm;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$managers = $db->query("SELECT id, name FROM user WHERE role_id = :role_id", [
    'role_id' => Role::SALES_MANAGER
])->get();
// $regions = $db->query("SELECT id, name FROM region")->get();

$form = TeamCreateForm::validate($attributes = [
    'name' => $_POST['name'],
    'address' => $_POST['address'],
    // 'region_id' => $_POST['region_id'],
    'manager_id' => $_POST['manager_id'],
]);

if(! empty($form->errors())) {
    return view("team/create.view.php", [
        'heading' => 'Create Team',
        'managers' => $managers,
        // 'regions' => $regions
    ]);
}

try {
    $db->query("INSERT INTO team(name, address, manager_id) VALUES(:name, :address, :manager_id)", [
        'name' => $_POST['name'],
        'address' => $_POST['address'],
        // 'region_id' => $_POST['region_id'],
        'manager_id' => $_POST['manager_id'] !== '' ? $_POST['manager_id'] : NULL,
    ]);
} catch(Exception $e) {
    throw new Exception('There\'s something wrong happened upon creating team.');
}

Session::flash('success', "Team '{$_POST["name"]}' Created.");
redirect('/teams');