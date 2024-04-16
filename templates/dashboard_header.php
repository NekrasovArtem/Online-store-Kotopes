<?php
$serverPath = $_SERVER['DOCUMENT_ROOT'];
$path = $serverPath . $pagePath;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="КотоПес - товары для животных" />
    <meta property="og:description" content="Интернет-магазин товаров для животных" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?= $serverPath ?>/images/ogIcon.webp" />
    <meta property="og:url" content="<?= $path ?>" />
    <link rel="shortcut icon" href="<?= $serverPath ?>/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://kotopes.lh1.in/styles/main.css" />
    <link rel="stylesheet" href="https://kotopes.lh1.in/styles/admin.css" />
    <link rel="stylesheet" href="https://kotopes.lh1.in/styles/iziModal.css" />
    <title><?= $title ?></title>
</head>
<body>
<header>
    <div class="header__wrapper">
        <div class="header__logo">
            <a href="/"><img src="/images/logo.svg" alt="На главную" /></a>
            <?php if ($_SESSION['user_image']): ?>
            <a href="/profile"><img class="admin-image" src="/images/users/<?= $_SESSION['user_image'] ?>" alt="Профиль" /></a>
            <?php else: ?>
            <a href="/profile"><img class="admin-image" src="/images/profile.svg" alt="Профиль" /></a>
            <?php endif; ?>
        </div>
        <nav>
            <a href="?">Главная</a>
            <a href="?template=products">Товары</a>
            <a href="?template=categories">Категории</a>
            <!-- <a href="?template=slider">Слайдер</a> -->
            <a href="?template=orders">Заказы</a>
            <a href="?template=promocodes">Промокоды</a>
            <a href="?template=clients">Клиенты</a>
            <a href="/core/logout.php">Выход</a>
        </nav>
    </div>
</header>