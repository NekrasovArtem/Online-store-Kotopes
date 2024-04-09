<?php
session_start();

require "./core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$title = 'Ошибка 404';
$pagePath = $serverPath . '404.php';
$whiteMenu = false;
?>
<?php require "./templates/header.php"; ?>
<main>
    <img src="/images/404.svg" />
    <h1>Ой, такой страницы не существует :(</h1>
</main>
<?php require "./templates/footer.php"; ?>