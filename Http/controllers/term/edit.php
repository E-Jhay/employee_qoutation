<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);
$term = $db->query("SELECT * FROM term WHERE id = :id", [
    'id' => $_GET['id']
])->findOrFail();
// dd($user);

// dd("aaaa");

view("term/edit.view.php", [
    'heading' => "Edit Term",
    'term' => $term,
    'errors' => Session::get('errors')
]);