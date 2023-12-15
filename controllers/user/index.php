<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config['database']);

$users = $db->query("SELECT user.*, role.name as role FROM user JOIN role ON user.role_id = role.id ORDER BY name asc")->get();

view("user/index.php", [
    'heading' => "Users",
    'users' => $users,
]);