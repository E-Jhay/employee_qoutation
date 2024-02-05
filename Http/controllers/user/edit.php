<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] === Role::ADMIN);

$roles = $db->query("SELECT id, name FROM role")->get();

$user = $db->query("SELECT * FROM user WHERE id = :id",
            ['id' => $_GET['id']
        ])->findOrFail();
// dd($user);

// dd("aaaa");

view("user/edit.view.php", [
    'heading' => "Edit User",
    'roles' => $roles,
    'user' => $user,
    'errors' => Session::get('errors')
]);