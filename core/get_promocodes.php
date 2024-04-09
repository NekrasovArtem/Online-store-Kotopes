<?php
require './core.php';
header('Content-Type: application/json');
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$promocodes = $KotoPes->getPromocodes();

foreach ($promocodes as $promo) {
    $result[] = $promo;
}

echo json_encode($result);
?>