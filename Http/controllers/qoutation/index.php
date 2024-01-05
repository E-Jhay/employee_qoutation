<?php

use Core\App;
$db = App::resolve('Core\Database');
// dd("Qoutations");

$qoutations = $db->query("SELECT qoutation.*, customer.name as customer_name, user.name as created_by FROM qoutation LEFT JOIN customer ON qoutation.customer_id = customer.id LEFT JOIN user ON qoutation.created_by = user.id")->get();

// dd($qoutations);

view("qoutation/index.view.php", [
    'heading' => "Qoutations",
    'qoutations' => $qoutations,
]);