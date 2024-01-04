<?php

use Core\App;
$db = App::resolve('Core\Database');
// dd("Qoutations");

$qoutations = $db->query("SELECT * FROM qoutation")->get();

view("qoutation/index.view.php", [
    'heading' => "Qoutations",
    'qoutations' => $qoutations,
]);