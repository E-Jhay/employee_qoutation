<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$terms = $db->query("SELECT * FROM term")->get();
// dd($terms);

// dd($term['term']);

view("term/index.view.php", [
    'heading' => "Purchase terms",
    'terms' => $terms
]);