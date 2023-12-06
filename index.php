<?php
include "core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$title = "КотоПес";
$url = "https://localhost/kotopes/";
$pagePath = $url . "";

$posterSlides = ['/slide_one.png', '/slide_two.png', '/slide_three.png'];
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
    <link rel="stylesheet" href="./styles/style.css" />
    <title><?= $title ?></title>
</head>
<body>
    <?php include "./templates/header.php"; ?>
    <main>
        <section class="poster">
            <div class="swiper" id="posterSwiper">
                <div>
                    <button id="prevSlide">
                        <img src="./images/prevButton.svg">
                    </button>
                    <button id="nextSlide">
                        <img src="./images/nextButton.svg">
                    </button>
                </div>
                <div class="swiper-wrapper">
                    <?php foreach ($posterSlides as $slide): ?>
                    <div class="swiper-slide">
                        <img src="./images<?= $slide ?>" alt="">
                    </div>
                    <?php endforeach; ?>
                </div>
                <div id="poster__pagination">

                </div>
            </div>
        </section>
        <section>
            <div>
                <h2>Новинки</h2>
            </div>
            <div class="swiper swiper__noveltys">
                <div class="swiper-wrapper"></div>
            </div>
        </section>
        <section>
            <div>
                <h2>Акции</h2>
            </div>
            <div class="swiper swiper__stocks">
                <div class="swiper-wrapper"></div>
            </div>
        </section>
        <section>
            <div>
                <h2>Популярные товары</h2>
            </div>
            <div class="swiper swiper__popular">
                <div class="swiper-wrapper"></div>
            </div>
        </section>
        <section>
            <div class="about_us"></div>
        </section>
    </main>
    <?php include "./templates/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./scripts/main.js"></script>
</body>
</html>