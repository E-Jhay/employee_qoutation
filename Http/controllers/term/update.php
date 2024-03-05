<?php

use Core\App;
use Core\Role;
use Core\Session;
use Http\Forms\TermCreateForm;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$form = TermCreateForm::validate($attributes = [
    'description' => $_POST['description'],
]);

if(! empty($form->errors())) {
    return view("term/create.view.php", [
        'heading' => 'Create Term',
    ]);
}

try {
    $db->query("UPDATE term SET description = :description WHERE id = :id", [
        'id' => $_POST['id'],
        'description' => $_POST['description'],
    ]);
} catch(Exception $e) {
    throw new Exception('There\'s something wrong happened upon updating term.');
}

Session::flash('success', "Term Updated.");
redirect('/terms');