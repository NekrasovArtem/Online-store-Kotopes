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
        <div class="header__left">
            <?php if ($whiteMenu): ?>
            <img src="/images/burger_menu.svg" alt="Меню">
            <?php else: ?>
            <img src="/images/main_burger_menu.svg" alt="Меню">
            <?php endif; ?>
            <a href="/"><img src="/images/logo.svg" alt="КотоПес"></a>
        </div>
        <div class="header__searc">
            <input type="search" name="" id="" placeholder="Поиск">
            <span><img src="/images/search.svg"></span>
        </div>
        <div class="header__right">
            <a href="/busket" class="header__busket">
                <img src="/images/busket.svg" alt="Корзина">
            </a>
            <a href="/login" class="header__profile">
                <img src="/images/profile.svg" alt="Аккаунт">
            </a>
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