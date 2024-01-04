<?php

use Core\App;
use Core\Session;

$db = App::resolve('Core\Database');

$managers = $db->query("SELECT id, name FROM user WHERE role_id = :role_id", [
    'role_id' => 2
])->get();
$regions = $db->query("SELECT id, name FROM region")->get();

$team = $db->query("SELECT team.*, region.id as region_id, region.name as region, user.id as user_id, user.name as manager FROM team JOIN region on team.region_id = region.id LEFT JOIN user on team.manager_id = user.id WHERE team.id = :id", [
    'id' => $_GET['id']
])->findOrFail();
// dd($user);

// dd("aaaa");

view("team/edit.view.php", [
    'heading' => "Edit User",
    'managers' => $managers,
    'regions' => $regions,
    'team' => $team,
    'errors' => Session::get('errors')
]);