<?php

use Core\App;
$db = App::resolve('Core\Database');

$team = $db->query("SELECT team.*, user.id as user_id, user.name as manager FROM team LEFT JOIN user on team.manager_id = user.id WHERE team.id = :id", [
    'id' => $_GET['id']
])->find();

view("team/show.view.php", [
    'heading' => "Team Information",
    'team' => $team
]);