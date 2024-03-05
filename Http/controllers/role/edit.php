<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$role = $db->query("SELECT * FROM role WHERE id = :id",
            ['id' => $_GET['id']
        ])->findOrFail();
// dd($user);

// dd("aaaa");

view("role/edit.view.php", [
    'heading' => "Edit Role",
    'role' => $role
]);