<?php

use Core\App;
use Core\Role;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] === Role::ADMIN);

$role = $db->query("UPDATE role SET name = :name, updated_at = :updated_at WHERE id = :id", [
    'id' => $_POST['id'],
    'name' => $_POST['full_name'],
    'updated_at' => date('Y-m-d H:i:s'),
]);

if($role) {
    $_SESSION['success'] = "Role Updated.";
}

redirect('/roles');