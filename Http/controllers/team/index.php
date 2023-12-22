<?php

use Core\App;
$db = App::resolve('Core\Database');

$teams = $db->query("SELECT team.*, region.id as region_id, region.name as region, user.id as user_id, user.name as manager FROM team JOIN region on team.region_id = region.id LEFT JOIN user on team.manager_id = user.id")->get();

view("team/index.view.php", [
    'heading' => "Teams",
    'teams' => $teams,
]);