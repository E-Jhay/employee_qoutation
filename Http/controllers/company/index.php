<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');
authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$companies = $db->query("SELECT * FROM company ORDER by isActive DESC")->get();
view("company/index.view.php", [
    'heading' => "Companies",
    'companies' => $companies,
    'errors' => Session::get('errors')
]);