<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] === Role::ADMIN);

$team = $db->query("SELECT team.*, user.id as user_id, user.name as manager FROM team LEFT JOIN user on team.manager_id = user.id WHERE team.id = :id", [
    'id' => $_GET['id']
])->find();

view("team/show.view.php", [
    'heading' => "Team Information",
    'team' => $team
]);