<?php
session_start();

require "../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$title = 'КотоПёс - Каталог';
$pagePath = "/catalog";
$whiteMenu = false;
$pageDescription = "Каталог товаров интернет-магазина - Котопес";

$products = $KotoPes->getCatalog();
?>
<?php require "../templates/header.php"; ?>
<?php require "../templates/catalog.php"; ?>
<?php require "../templates/footer.php"; ?>