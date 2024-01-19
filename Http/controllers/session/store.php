<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Role;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);

if(!$signedIn) {
    $form->error(
        'email', 'No matching account found for that email address and password.'
    )->throw();
}

if($_SESSION['user']['role_id'] === Role::SALES_MANAGER) {
    return redirect('/dashboard');
} elseif($_SESSION['user']['role_id'] === Role::SALES) {
    return redirect('/');
} else {
    return redirect('/admin');
}