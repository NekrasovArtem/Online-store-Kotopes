<?php
require './core.php';
header('Content-Type: application/json');
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$numbersArray = [38, 37, 40, 39, 38, 40];
$resultIds = [];

// Собираем количество товаров
for ($i = 0; $i < count($numbersArray); $i++) {
    if (isset($resultIds[$numbersArray[$i]])) {
        $resultIds[strval($numbersArray[$i])] = $resultIds[strval($numbersArray[$i])]+1;
    } else {
        $resultIds[$numbersArray[$i]] = 1;
    }
}

// Получаем товары
$products = $KotoPes->getProducts($numbersArray);

// Собираем массив товаров
$result = [];
foreach ($products as $product) {
    $result[] = [
        'id' => $product['id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'url' => $product['image'],
        'count' => $resultIds[strval($product['id'])]
    ];
}

// Возвращаем массив товаров
echo json_encode($result);
?>