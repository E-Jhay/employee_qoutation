<?php

use Core\App;
$db = App::resolve('Core\Database');

$validity = $db->query("SELECT * FROM validity ORDER BY id DESC LIMIT 1")->find();
// dd($user);

// dd($validity['validity']);

view("validity/index.view.php", [
    'heading' => "Set Qoutation Validity",
    'validity' => $validity
]);