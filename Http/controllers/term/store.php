<?php

use Core\App;
use Core\Role;
use Core\Session;
use Http\Forms\TermCreateForm;

require base_path("Core/Validator.php");
$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);
$form = TermCreateForm::validate($attributes = [
    'description' => $_POST['description'],
]);

if(! empty($form->errors())) {
    return view("term/create.view.php", [
        'heading' => 'Create term',
    ]);
}

try {
    $db->query("INSERT INTO term(description) VALUES(:description)", [
        'description' => $_POST['description'],
    ]);
} catch(Exception $e) {
    throw new Exception('There\'s something wrong happened upon creating term.');
}

Session::flash('success', "Term Created.");
redirect('/terms');