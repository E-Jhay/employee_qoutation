<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');

$qoutationCreatedBy = $db->query("SELECT created_by FROM qoutation WHERE id = :id", [
    'id' => $_POST['id']
])->find()['created_by'];
// dd($qoutationCreatedBy);
authorize($_SESSION['user']['role_id'] === Role::SALES && $_SESSION['user']['id'] === $qoutationCreatedBy);

$db->query("DELETE FROM qoutation WHERE id = :id", ['id' => $_POST['id']]);

Session::flash('success', "Qoutation Deleted.");
redirect('/qoutations');