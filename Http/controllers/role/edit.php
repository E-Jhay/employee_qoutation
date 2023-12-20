<?php

use Core\App;
$db = App::resolve('Core\Database');

$role = $db->query("SELECT * FROM role WHERE id = :id",
            ['id' => $_GET['id']
        ])->findOrFail();
// dd($user);

// dd("aaaa");

view("role/edit.view.php", [
    'heading' => "Edit Role",
    'role' => $role
]);