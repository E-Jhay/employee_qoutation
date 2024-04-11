<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

$user = $db->query("SELECT user.*, role.name as role FROM user JOIN role ON user.role_id = role.id WHERE user.id = :id",
            ['id' => $_SESSION['user']['id']
        ])->find();

view("profile/index.view.php", [
    'heading' => "My Information",
    'user' => $user
]);