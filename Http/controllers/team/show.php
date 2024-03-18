<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$team = $db->query("SELECT team.*, user.id as user_id, user.name as manager FROM team LEFT JOIN user on team.manager_id = user.id WHERE team.id = :id", [
    'id' => $_GET['id']
])->find();

$users = $db->query("SELECT user.*, role.name as role FROM user JOIN role ON user.role_id = role.id WHERE user.team_id = :team_id ORDER BY name asc", [
    'team_id' => $_GET['id']
])->get();

view("team/show.view.php", [
    'heading' => "Team Information",
    'team' => $team,
    'users' => $users
]);