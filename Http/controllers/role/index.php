<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] === Role::ADMIN);

$roles = $db->query("SELECT * FROM role")->get();

view("role/index.view.php", [
    'heading' => "Roles",
    'roles' => $roles,
]);