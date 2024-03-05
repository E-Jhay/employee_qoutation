<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$user = $db->query("SELECT user.*, role.name as role FROM user JOIN role ON user.role_id = role.id WHERE user.id = :id",
            ['id' => $_GET['id']
        ])->find();

view("user/show.view.php", [
    'heading' => "User Information",
    'user' => $user
]);