<?php

use Core\App;
use Core\Role;
use Core\Session;
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
    } else {
        $activeCompany = $db->query("SELECT id FROM company WHERE isActive = 1 AND id != :id LIMIT 1", ['id' => $_POST['id']])->find();
        if(! $activeCompany) {
            throw new Exception("Can't Update status to Inactive, there should be 1 active company.");
        }
    }
    $db->query("UPDATE company SET name = :name, email = :email, address_line_1 = :address_line_1, address_line_2 = :address_line_2, city = :city, province = :province, tel_no = :tel_no, mobile_no = :mobile_no, isActive = :isActive, updated_at = :updated_at WHERE id = :id", [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'address_line_1' => $_POST['address_line_1'],
        'address_line_2' => $_POST['address_line_2'],
        'city' => $_POST['city'],
        'province' => $_POST['province'],
        'tel_no' => $_POST['tel_no'],
        'mobile_no' => $_POST['mobile_no'],
        'isActive' => $_POST['status'],
        'updated_at' => date('Y-m-d H:i:s'),
    ]);
    $_SESSION['success'] = "Company ". $_POST['name'] . " Updated.";
} catch(Exception $e) {
    Session::put('errors', $e->getMessage());
    redirect(parse_url($_SERVER['HTTP_REFERER'])['path'].'?'.parse_url($_SERVER['HTTP_REFERER'])['query']);
}

redirect('/companies');