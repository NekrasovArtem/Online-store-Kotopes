<?php
session_start();

require ".../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$title = 'КотоПес - Кошки';
$pagePath = $serverPath . 'cats';
$whiteMenu = false;
?>
<?php require "./templates/header.php"; ?>
<main>

</main>
<?php require "./templates/footer.php"; ?>
