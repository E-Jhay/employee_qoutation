<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');

$quotationCreatedBy = $db->query("SELECT created_by FROM quotation WHERE id = :id", [
    'id' => $_POST['id']
])->find()['created_by'];
// dd($quotationCreatedBy);
authorize((int)$_SESSION['user']['role_id'] === Role::SALES && $_SESSION['user']['id'] === $quotationCreatedBy);

$db->query("DELETE FROM quotation WHERE id = :id", ['id' => $_POST['id']]);

Session::flash('success', "Quotation Deleted.");
redirect('/quotations');