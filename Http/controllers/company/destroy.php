<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$isActive = $db->query("SELECT isActive FROM company WHERE id = :id", ['id' => $_POST['id']])->findOrFail()['isActive'];
if($isActive) {
    Session::put('errors', "Can't Delete currently active company, set active to others first.");
    redirect('/companies');
}

$db->query("DELETE FROM company WHERE id = :id", ['id' => $_POST['id']]);

$_SESSION['success'] = "Company Deleted";
redirect('/companies');