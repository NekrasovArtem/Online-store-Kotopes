<?php
$serverPath = $_SERVER['DOCUMENT_ROOT'];
$sitePath = 'https://kotopes.lh1.in';
$pageUrl = $sitePath . $pagePath;
$path = $serverPath . $pagePath;

const CATEGORIES = [
    [
        "name" => "Кошки",
        "link" => "/cats",
    ],
    [
        "name" => "Собаки",
        "link" => "/dogs",
    ],
    [
        "name" => "Грызуны",
        "link" => "/rodents",
    ],
    [
        "name" => "Птицы",
        "link" => "/birds",
    ],
    [
        "name" => "Рыбы",
        "link" => "/fishes",
    ],
    [
        "name" => "Рептилии",
        "link" => "/reptiles",
    ],
    [
        "name" => "Ветаптека",
        "link" => "/vetapteka",
    ],
];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?= $pageDescription ?>" />
    <meta property="og:title" content="КотоПес - товары для животных" />
    <meta property="og:description" content="Интернет-магазин товаров для животных" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?= $sitePath ?>/images/ogIcon.webp" />
    <meta property="og:url" content="<?= $pageUrl ?>" />
    <link rel="shortcut icon" href="<?= $sitePath ?>/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?= $sitePath ?>/styles/main.css" />
    <link rel="stylesheet" href="<?= $sitePath ?>/styles/product.css" />
    <?php if ($path === $serverPath . ''): ?>
        <link rel="stylesheet" href="<?= $sitePath ?>/styles/index.css" />
        <link rel="stylesheet" href="<?= $sitePath ?>/styles/swiper-bundle.min.css" />
    <?php endif; ?>
    <title><?= $title ?></title>
</head>
<body>
<header>
    <section class="header__top">
        <div class="header__left">
            <a href="/catalog">
                <?php if ($path === $serverPath . ''): ?>
                <img src="/images/burger_menu.svg" alt="Меню">
                <?php else: ?>
                <img src="/images/main_burger_menu.svg" alt="Меню">
                <?php endif; ?>
            </a>
            <a href="/"><img src="/images/logo.svg" alt="КотоПес"></a>
        </div>
        <div class="header__search">
            <input type="search" name="searchInput" id="searchInput" placeholder="Поиск">
            <?php if ($path === $serverPath . ''): ?>
            <span><img src="/images/search.svg" alt="Поиск" /></span>
            <?php else: ?>
            <span><img src="/images/search.svg" alt="Поиск" /></span>
            <?php endif; ?>
        </div>
        <div class="header__right">
            <a href="/basket" class="header__busket">
                <img src="/images/busket.svg" alt="Корзина">
                <span class="basket__counter">0</span>
            </a>
            <?php if (isset($_SESSION['user_image'])): ?>
            <a href="/login" class="header__profile">
                <img src="/images/users/<?= $_SESSION['user_image'] ?>" alt="Аккаунт">
            </a>
            <?php else: ?>
            <a href="/login" class="header__profile">
                <img src="/images/profile.svg" alt="Аккаунт">
            </a>
            <?php endif; ?>
        </div>
    </section>
    <section class="header__down">
        <nav>
            <?php foreach (CATEGORIES as $category): ?>
                <a href="<?= '/catalog' . $category['link'] ?>"><?= $category['name'] ?></a>
            <?php endforeach; ?>
        </nav>
    </section>
</header>