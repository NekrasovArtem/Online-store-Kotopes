<?php
require './core.php';
header('Content-Type: application/json');
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$numbersArray = json_decode(file_get_contents('php://input'), true);
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
        'count' => $resultIds[strval($product['id'])],
        'url' => $product['image'],
        'description' => $product['description'],
    ];
}

// Возвращаем массив товаров
echo json_encode($result);
?>