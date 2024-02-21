<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$users = $db->query("SELECT user.*, role.name as role FROM user JOIN role ON user.role_id = role.id ORDER BY name asc")->get();

view("user/index.view.php", [
    'heading' => "Users",
    'users' => $users,
]);