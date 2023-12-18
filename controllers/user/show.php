<?php

use Core\App;
$db = App::container()->resolve('Core\Database');

$user = $db->query("SELECT user.*, role.name as role FROM user JOIN role ON user.role_id = role.id WHERE user.id = :id",
            ['id' => $_GET['id']
        ])->find();

view("user/show.php", [
    'heading' => "User Information",
    'user' => $user
]);