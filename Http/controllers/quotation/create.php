<?php

use Core\App;
use Core\Role;
use Core\Session;
$db = App::resolve('Core\Database');
// dd("create Quotation");
// $managers = $db->query("SELECT id, name FROM user WHERE role_id = :role_id", [
//     'role_id' => 2
// ])->get();
$terms = $db->query("SELECT id, description FROM term")->get();

authorize((int)$_SESSION['user']['role_id'] == Role::SALES);
view("quotation/create.view.php", [
    'heading' => 'Create Quotation',
    'terms' => $terms,
    'errors' => Session::get('errors')
]);