<?php

use Core\App;
$db = App::container()->resolve('Core\Database');

$roles = $db->query("SELECT id, name FROM role")->get();

$user = $db->query("SELECT * FROM user WHERE id = :id",
            ['id' => $_GET['id']
        ])->findOrFail();
// dd($user);

// dd("aaaa");

view("user/edit.php", [
    'heading' => "Edit User",
    'roles' => $roles,
    'user' => $user
]);