<?php
session_start();

require "../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$title = "О нас";
$pagePath = "/about";
$whiteMenu = false;
$pageDescription = "Информация о интернет-магазине Котопес.";
?>
<?php require "../templates/header.php"; ?>
<main>

</main>
<?php require "../templates/footer.php"; ?>
