<?php

const CATEGORIES = [
    [
        "name" => "Кошки",
        "link" => "catalog.php",
    ],
    [
        "name" => "Собаки",
        "link" => "catalog.php",
    ],
    [
        "name" => "Грызуны",
        "link" => "catalog.php",
    ],
    [
        "name" => "Птицы",
        "link" => "catalog.php",
    ],
    [
        "name" => "Рыбы",
        "link" => "catalog.php",
    ],
    [
        "name" => "Рептилии",
        "link" => "catalog.php",
    ],
    [
        "name" => "Ветаптека",
        "link" => "catalog.php",
    ],
];
?>
<header>
    <section class="header__top">
        <div class="header__logo">
            <img src="./images/menu.svg" alt="Меню">
            <img src="./images/logo.svg" alt="КотоПес">
        </div>
        <div class="header__searc">
            <input type="search" name="" id="" placeholder="Поиск">
            <span><img src="./images/search.svg"></span>
        </div>
        <div>
            <div class="header__busket">
                <img src="./images/busket.svg" alt="Корзина">
                <span>Корзина</span>
            </div>
            <div class="header__profile">
                <img src="./images/profile.svg" alt="Аккаунт">
                <span>Аккаунт</span>
            </div>
        </div>
    </section>
    <section class="header__down">
        <nav>
            <?php foreach (CATEGORIES as $category): ?>
                <a href="<?= $category['link'] ?>"><?= $category['name'] ?></a>
            <?php endforeach; ?>
        </nav>
    </section>
</header>