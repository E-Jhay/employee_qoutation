<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] === Role::ADMIN);

$validity = $db->query("SELECT * FROM validity ORDER BY id DESC LIMIT 1")->find();
// dd($user);

// dd($validity['validity']);

view("validity/index.view.php", [
    'heading' => "Set Quotation Validity",
    'validity' => $validity
]);