<?php

use Core\App;
use Core\Role;
use Http\Forms\CompanyCreateForm;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

$form = CompanyCreateForm::validate($attributes = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'address_line_1' => $_POST['address_line_1'],
    'city' => $_POST['city'],
    'province' => $_POST['province'],
    'status' => $_POST['status'],
]);

try {
    if($_POST['status']) {
        $db->query("UPDATE company SET isActive = 0");
    }
    $db->query("INSERT INTO company(name, email, address_line_1, address_line_2, city, province, tel_no, mobile_no, isActive) VALUES(:name, :email, :address_line_1, :address_line_2, :city, :province, :tel_no, :mobile_no, :isActive)", [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'address_line_1' => $_POST['address_line_1'],
        'address_line_2' => $_POST['address_line_2'],
        'city' => $_POST['city'],
        'province' => $_POST['province'],
        'tel_no' => $_POST['tel_no'],
        'mobile_no' => $_POST['mobile_no'],
        'isActive' => $_POST['status'],
    ]);
} catch(Exception $e) {
    throw new Exception($e);
}

$_SESSION['success'] = "Company ". $_POST['name'] . " Created.";
redirect('/companies');