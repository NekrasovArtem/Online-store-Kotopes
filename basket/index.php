<?php
session_start();

require "../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

//if (!isset($_SESSION['id'])) {
//  Header("Location: /");
//}

$title = 'КотоПёс - Корзина';
$pagePath = "/basket";
$whiteMenu = false;
$pageDescription = "Страница добавленных товаров в корзину клиента интернет-магазина Котопес";
?>
<?php require "../templates/header.php"; ?>
<?php require "../templates/basket.php"; ?>
<?php require "../templates/footer.php"; ?>