<?php

use Core\App;
use Core\Session;

$db = App::resolve('Core\Database');

$roles = $db->query("SELECT id, name FROM role")->get();
$teams = $db->query("SELECT id, name FROM team")->get();

view("user/create.view.php", [
    'heading' => 'Create User',
    'roles' => $roles,
    'teams' => $teams,
    'errors' => Session::get('errors')
]);