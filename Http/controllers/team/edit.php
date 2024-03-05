<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$managers = $db->query("SELECT id, name FROM user WHERE role_id = :role_id", [
    'role_id' => Role::SALES_MANAGER
])->get();
// $regions = $db->query("SELECT id, name FROM region")->get();

$team = $db->query("SELECT team.*, user.id as user_id, user.name as manager FROM team LEFT JOIN user on team.manager_id = user.id WHERE team.id = :id", [
    'id' => $_GET['id']
])->findOrFail();
// dd($user);

// dd("aaaa");

view("team/edit.view.php", [
    'heading' => "Edit User",
    'managers' => $managers,
    // 'regions' => $regions,
    'team' => $team,
    'errors' => Session::get('errors')
]);