<?php

use Core\App;
use Core\Session;

$db = App::resolve('Core\Database');

authorize('admin' === 'admin');

$db->query("DELETE FROM team WHERE id = :id", ['id' => $_POST['id']]);

Session::flash('success', "Team Deleted.");
redirect('/teams');