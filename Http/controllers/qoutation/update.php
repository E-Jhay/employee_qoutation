<?php

use Core\App;
use Core\Session;
use Http\Forms\TeamCreateForm;

$db = App::resolve('Core\Database');

$managers = $db->query("SELECT id, name FROM user WHERE role_id = :role_id", [
    'role_id' => 2
])->get();
$regions = $db->query("SELECT id, name FROM region")->get();

$form = TeamCreateForm::validate($attributes = [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'address' => $_POST['address'],
    'region_id' => $_POST['region_id'],
    'manager_id' => $_POST['manager_id'],
]);

if(! empty($form->errors())) {
    return view("team/create.view.php", [
        'heading' => 'Create Team',
        'managers' => $managers,
        'regions' => $regions
    ]);
}

try {
    $db->query("UPDATE team SET name = :name, address = :address, region_id = :region_id, manager_id = :manager_id WHERE id = :id", [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'address' => $_POST['address'],
        'region_id' => $_POST['region_id'],
        'manager_id' => $_POST['manager_id'] !== '' ? $_POST['manager_id'] : NULL,
    ]);
} catch(Exception $e) {
    throw new Exception('There\'s something wrong happened upon updating team.');
}

Session::flash('success', "Team '{$_POST["name"]}' Created.");
redirect('/teams');