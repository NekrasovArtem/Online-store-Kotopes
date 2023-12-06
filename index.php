<?php
session_start();

include "./core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$title = "КотоПес";
$sitePath = "https://localhost/kotopes/";
$pagePath = $sitePath . "";
$whiteMenu = true;

$posterSlides = ['/slide_one.webp', '/slide_two.webp', '/slide_three.webp'];

const TOVARS = [
    [
        'title'=> 'Probalance корм для кошек',
        'type'=> 'Корм для кошек',
        'cost'=> '500',
        'src'=> './images/korm.png',
    ],
    [
        'title'=> 'Probalance корм для кошек',
        'type'=> 'Корм для кошек',
        'cost'=> '500',
        'src'=> './images/korm.png',
    ],
    [
        'title'=> 'Probalance корм для кошек',
        'type'=> 'Корм для кошек',
        'cost'=> '500',
        'src'=> './images/korm.png',
    ],
    [
        'title'=> 'Probalance корм для кошек',
        'type'=> 'Корм для кошек',
        'cost'=> '500',
        'src'=> './images/korm.png',
    ],
    [
        'title'=> 'Probalance корм для кошек',
        'type'=> 'Корм для кошек',
        'cost'=> '500',
        'src'=> './images/korm.png',
    ],
    [
        'title'=> 'Probalance корм для кошек',
        'type'=> 'Корм для кошек',
        'cost'=> '500',
        'src'=> './images/korm.png',
    ],
    [
        'title'=> 'Probalance корм для кошек',
        'type'=> 'Корм для кошек',
        'cost'=> '500',
        'src'=> './images/korm.png',
    ],
];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="КотоПес - товары для животных" />
    <meta property="og:description" content="Интернет-магазин товаров для животных" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?= $pagePath ?>images/ogIcon.webp" />
    <meta property="og:url" content="<?= $pagePath ?>" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./styles/main.css" />
    <link rel="stylesheet" href="./styles/index.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title><?= $title ?></title>
</head>
<body>
    <?php include "./templates/header.php"; ?>
    <main>
        <section class="poster">
            <div class="swiper posterSwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($posterSlides as $slide): ?>
                    <div class="swiper-slide">
                        <img src="./images<?= $slide ?>" alt="">
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="poster__pagination"></div>
            </div>
        </section>
        <section class="section">
            <section class="section__tovars">
                <div class="section__name">
                    <h2>Новинки</h2>
                </div>
                <div class="swiper swiper__tovars swiper__noveltys">
                    <div class="swiper-wrapper">
                        <?php foreach (TOVARS as $tovar): ?>
                        <div class="swiper-slide slide__tovar">
                            <img src="<?= $tovar['src'] ?>" alt="<?= $tovar['type'] ?>">
                            <h3><?= $tovar['title'] ?></h3>
                            <div class="slide__div">
                                <span><?= $tovar['cost'] ?> ₽</span>
                                <button class="slide__button">В корзину</button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper__buttons">
                    <button class="swiper-prev-tovar">
                        <img src="./images/ChevronLeft.svg">
                    </button>
                    <button class="swiper-next-tovar">
                        <img src="./images/ChevronRight.svg">
                    </button>
                </div>
            </section>
            <section class="section__tovars">
                <div class="section__name">
                    <h2>Акции</h2>
                </div>
                <div class="swiper swiper__tovars swiper__actions">
                    <div class="swiper-wrapper">
                        <?php foreach (TOVARS as $tovar): ?>
                            <div class="swiper-slide slide__tovar">
                                <img src="<?= $tovar['src'] ?>" alt="<?= $tovar['type'] ?>">
                                <h3><?= $tovar['title'] ?></h3>
                                <div class="slide__div">
                                    <span><?= $tovar['cost'] ?> ₽</span>
                                    <button class="slide__button">В корзину</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper__buttons">
                    <button class="actions-prev-tovar">
                        <img src="./images/ChevronLeft.svg">
                    </button>
                    <button class="actions-next-tovar">
                        <img src="./images/ChevronRight.svg">
                    </button>
                </div>
            </section>
            <section class="section__tovars">
                <div class="section__name">
                    <h2>Популярные товары</h2>
                </div>
                <div class="swiper swiper__tovars swiper__popular">
                    <div class="swiper-wrapper">
                        <?php foreach (TOVARS as $tovar): ?>
                            <div class="swiper-slide slide__tovar">
                                <img src="<?= $tovar['src'] ?>" alt="<?= $tovar['type'] ?>">
                                <h3><?= $tovar['title'] ?></h3>
                                <div class="slide__div">
                                    <span><?= $tovar['cost'] ?> ₽</span>
                                    <button class="slide__button">В корзину</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper__buttons">
                    <button class="popular-prev-tovar">
                        <img src="./images/ChevronLeft.svg">
                    </button>
                    <button class="popular-next-tovar">
                        <img src="./images/ChevronRight.svg">
                    </button>
                </div>
            </section>
        </section>
    </main>
    <?php include "./templates/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./scripts/main.js"></script>
</body>
</html>