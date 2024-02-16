<?php

use Core\App;
use Core\Role;
use Core\Session;
$db = App::resolve('Core\Database');
// dd("create Quotation");
// $managers = $db->query("SELECT id, name FROM user WHERE role_id = :role_id", [
//     'role_id' => 2
// ])->get();
// $regions = $db->query("SELECT id, name FROM region")->get();

authorize((int)$_SESSION['user']['role_id'] === Role::SALES);
view("quotation/create.view.php", [
    'heading' => 'Create Quotation',
    // 'managers' => $managers,
    // 'regions' => $regions,
    'errors' => Session::get('errors')
]);