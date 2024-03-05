<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');
authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$company = $db->query("SELECT * FROM company WHERE id = :id", ['id' => $_GET['id']])->findOrFail();

view("company/edit.view.php", [
    'heading' => "Edit company",
    'company' => $company,
    'errors' => Session::get('errors')
]);