<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$term = $db->query("SELECT * FROM term WHERE id = :id", [
    'id' => $_GET['id']
])->find();

view("term/show.view.php", [
    'heading' => "Term Information",
    'term' => $term
]);