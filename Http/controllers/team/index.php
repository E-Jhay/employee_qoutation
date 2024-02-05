<?php

use Core\App;
$db = App::resolve('Core\Database');

$teams = $db->query("SELECT team.*, user.id as user_id, user.name as manager FROM team LEFT JOIN user on team.manager_id = user.id")->get();

view("team/index.view.php", [
    'heading' => "Teams",
    'teams' => $teams,
]);