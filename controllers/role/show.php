<?php

use Core\App;
$db = App::resolve('Core\Database');

$role = $db->query("SELECT *FROM role WHERE id = :id",
            ['id' => $_GET['id']
        ])->find();

view("role/show.view.php", [
    'heading' => "Role Information",
    'role' => $role
]);