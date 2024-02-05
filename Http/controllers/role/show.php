<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] === Role::ADMIN);

$role = $db->query("SELECT *FROM role WHERE id = :id",
            ['id' => $_GET['id']
        ])->find();

view("role/show.view.php", [
    'heading' => "Role Information",
    'role' => $role
]);