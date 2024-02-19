<?php

use Core\App;
use Core\Database;
use Core\ResetPassword as CoreResetPassword;
use Core\Session;
use Http\Forms\ResetPassword;

$db = App::resolve(Database::class);

$form = ResetPassword::validate($attributes = [
    'email' => $_POST['email'],
]);

$emailExists = (new CoreResetPassword)->attempt(
    $attributes['email']
);

if(!$emailExists) {
    $form->error(
        'email', 'No matching account found for that email address.'
    )->throw();
}

$_SESSION['success'] = "Reset password link has been sent to your email.";
redirect('/forgot-password');

// if((int)$_SESSION['user']['role_id'] === Role::SALES_MANAGER) {
//     return redirect('/dashboard');
// } elseif((int)$_SESSION['user']['role_id'] === Role::SALES) {
//     return redirect('/');
// } else {
//     return redirect('/admin');
// }