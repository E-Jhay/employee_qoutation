<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] === Role::ADMIN);

$db->query("DELETE FROM role WHERE id = :id", ['id' => $_POST['id']]);

$_SESSION['success'] = "Role Deleted";
redirect('/roles');