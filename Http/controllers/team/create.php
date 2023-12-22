<?php

use Core\App;
use Core\Session;

$db = App::resolve('Core\Database');

$managers = $db->query("SELECT id, name FROM user WHERE role_id = :role_id", [
    'role_id' => 2
])->get();
$regions = $db->query("SELECT id, name FROM region")->get();

view("team/create.view.php", [
    'heading' => 'Create Team',
    'managers' => $managers,
    'regions' => $regions,
    'errors' => Session::get('errors')
]);