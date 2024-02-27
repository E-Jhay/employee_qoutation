<?php
$file = base_path('/public/data/products.txt');

// Read contents of the file
$data = file_get_contents($file);

// Output the data
echo $data;
?>
