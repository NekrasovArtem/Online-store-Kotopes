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
<?php if (!isset($_SESSION['id'])): ?>
    <main>
        <section>
            <h2>Вы не авторизованны</h2>
        </section>
    </main>
<?php else: ?>
<?php require "../templates/basket.php"; ?>
<?php endif; ?>
<?php require "../templates/footer.php"; ?>