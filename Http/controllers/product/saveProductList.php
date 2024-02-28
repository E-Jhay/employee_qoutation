<?php
$data = file_get_contents("php://input");
$file = base_path('/public/data/products.txt');
file_put_contents($file, $data);
?>
