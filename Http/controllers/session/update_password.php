<?php

use Core\App;
use Core\Database;
use Core\ResetPassword as CoreResetPassword;
use Http\Forms\UpdatePassword;

$db = App::resolve(Database::class);

$form = UpdatePassword::validate($attributes = [
    'otp' => $_POST['otp'],
    'password' => $_POST['password'],
    'confirm_password' => $_POST['confirm_password'],
    'email' => $_POST['email'],
]);

$updatePassword = $db->query("UPDATE user SET password = :password WHERE email = :email", [
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
]);

if($updatePassword) {
    $_SESSION['success'] = "Password updated successfully, </br> click here to sign in. <a class='text-blue-500 hover:underline' href='/login'>PMC - login</a>";
} else {
    $_SESSION['error'] = "There's an error upon updating your password.";
}

redirect('/reset-password');

// if((int)$_SESSION['user']['role_id'] == Role::SALES_MANAGER) {
//     return redirect('/dashboard');
// } elseif((int)$_SESSION['user']['role_id'] == Role::SALES) {
//     return redirect('/');
// } else {
//     return redirect('/admin');
// }