<?php

use Core\App;
use Core\Session;

$db = App::resolve('Core\Database');

authorize('admin' === 'admin');

$db->query("DELETE FROM user WHERE id = :id", ['id' => $_POST['id']]);

Session::flash('success', "User Deleted.");
redirect('/users');