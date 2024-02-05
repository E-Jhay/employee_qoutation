<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] === Role::ADMIN);

$db->query("DELETE FROM user WHERE id = :id", ['id' => $_POST['id']]);

Session::flash('success', "User Deleted.");
redirect('/users');