<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$company = $db->query("SELECT * FROM company LIMIT 1")->find();

view("company/show.view.php", [
    'heading' => "Company Information",
    'company' => $company
]);