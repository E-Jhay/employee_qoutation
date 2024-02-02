<?php

use Core\App;
use Core\Session;
$db = App::resolve('Core\Database');
// dd("create Qoutation");
// $managers = $db->query("SELECT id, name FROM user WHERE role_id = :role_id", [
//     'role_id' => 2
// ])->get();
// $regions = $db->query("SELECT id, name FROM region")->get();

view("qoutation/create.view.php", [
    'heading' => 'Create Qoutation',
    // 'managers' => $managers,
    // 'regions' => $regions,
    'errors' => Session::get('errors')
]);