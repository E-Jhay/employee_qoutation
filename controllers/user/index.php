<?php

use Core\App;
$db = App::resolve('Core\Database');

$users = $db->query("SELECT user.*, role.name as role FROM user JOIN role ON user.role_id = role.id ORDER BY name asc")->get();

view("user/index.php", [
    'heading' => "Users",
    'users' => $users,
]);