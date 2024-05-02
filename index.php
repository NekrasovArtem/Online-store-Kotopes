<?php
session_start();

require "./core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$title = "КотоПес - Главная";
$pagePath = "";
$whiteMenu = true;
$pageDescription = "Интернет-магазин Котопес предоставляет широкий ассортимент товаров для ваших домашних животных.";

$posterSlides = ['/slide_one.webp', '/slide_two.webp', '/slide_three.webp'];

$novelties = $KotoPes->getNoveltyProducts();
?>
<?php require "./templates/header.php"; ?>
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
        <section class="section__products">
            <div class="section__name">
                <h2>Новинки</h2>
            </div>
            <div class="swiper swiper__products swiper__novelties">
                <div class="swiper-wrapper">
                    <?php foreach ($novelties as $novelty): ?>
                        <div class="slide__product swiper-slide">
                            <div class="product__wrapper">
                                <img class="product__image" src="/images/products/<?= $novelty['image'] ?>" alt="Изображение товара" />
                                <span class="product__price"><?= $novelty['price'] ?> ₽</span>
                                <a href="/product/?id=<?= $novelty['id'] ?>" class="product__name"><?= mb_substr($novelty['name'], 0, 28) . '...' ?></a>
                                <button class="product__button" onclick="addProductInBusket(<?= $novelty['id'] ?>)">В корзину</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper__buttons">
                <button class="products-prev-tovar">
                    <img src="/images/ChevronLeft.svg" alt="Листать влево">
                </button>
                <button class="products-next-tovar">
                    <img src="/images/ChevronRight.svg" alt="Листать вправо">
                </button>
            </div>
        </section>
        <section class="section__products">
            <div class="section__name">
                <h2>Акции</h2>
            </div>
            <div class="swiper swiper__products swiper__actions">
                <div class="swiper-wrapper">
                    <?php foreach ($novelties as $novelty): ?>
                        <div class="slide__product swiper-slide">
                            <div class="product__wrapper">
                                <img class="product__image" src="/images/products/<?= $novelty['image'] ?>" alt="Изображение товара" loading="lazy" />
                                <span class="product__price"><?= $novelty['price'] ?> ₽</span>
                                <a href="/product/?id=<?= $novelty['id'] ?>" class="product__name"><?= mb_substr($novelty['name'], 0, 28) . '...' ?></a>
                                <button class="product__button">В корзину</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper__buttons">
                <button class="actions-prev-tovar">
                    <img src="/images/ChevronLeft.svg" alt="Листать влево">
                </button>
                <button class="actions-next-tovar">
                    <img src="/images/ChevronRight.svg" alt="Листать вправо">
                </button>
            </div>
        </section>
        <section class="section__products">
            <div class="section__name">
                <h2>Популярные товары</h2>
            </div>
            <div class="swiper swiper__products swiper__popular">
                <div class="swiper-wrapper">
                    <?php foreach ($novelties as $novelty): ?>
                        <div class="slide__product swiper-slide">
                            <div class="product__wrapper">
                                <img class="product__image" src="/images/products/<?= $novelty['image'] ?>" alt="Изображение товара" loading="lazy" />
                                <span class="product__price"><?= $novelty['price'] ?> ₽</span>
                                <a href="/product/?id=<?= $novelty['id'] ?>" class="product__name"><?= mb_substr($novelty['name'], 0, 28) . '...' ?></a>
                                <button class="product__button">В корзину</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper__buttons">
                <button class="popular-prev-tovar">
                    <img src="/images/ChevronLeft.svg" alt="Листать влево">
                </button>
                <button class="popular-next-tovar">
                    <img src="/images/ChevronRight.svg" alt="Листать вправо">
                </button>
            </div>
        </section>
    </section>
    </main>
<?php require "./templates/footer.php"; ?>