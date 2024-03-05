<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::SALES_MANAGER);

$currentUserTeamId = $db->query("SELECT id FROM team WHERE manager_id = :manager_id", [
    'manager_id' => $_SESSION['user']['id']
])->find()['id'] ?? '';

$sales = $db->query("SELECT user.*, role.name as role FROM user JOIN role ON user.role_id = role.id WHERE user.role_id = :role_id AND user.team_id = :team_id ORDER BY name asc", [
    'role_id' => Role::SALES,
    'team_id' => $currentUserTeamId,
])->get();
// dd($sales);

view("sales_agent/index.view.php", [
    'heading' => "Sales Representatives",
    'sales' => $sales,
]);