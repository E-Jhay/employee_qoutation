<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');

authorize($_SESSION['user']['role_id'] === Role::SALES);

$db->query("DELETE FROM qoutation WHERE id = :id", ['id' => $_POST['id']]);

Session::flash('success', "Qoutation Deleted.");
redirect('/qoutations');