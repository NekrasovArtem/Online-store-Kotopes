<?php
session_start();

if (!isset($_GET['id'])) {
    Header('Location: /');
}

require "../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$novelty = $KotoPes->getProduct($_GET['id']);

$title = "КотоПес - Подробнее о товаре";
$pagePath = "/product";
$whiteMune = false;
$pageDescription = mb_substr($novelty['description'], 0, 100);

?>
<?php require "../templates/header.php"; ?>
    <main>
        <section class="product">
            <div class="product__wrapper">
                <div class="product__head">
                    <div class="product__image">
                        <img src="/images/products/<?= $novelty['image'] ?>" alt="ото товара" />
                    </div>
                    <div class="product__title">
                        <h2><?= $novelty['name'] ?></h2>
                        <table class="product__info">
                            <tbody>
                                <tr>
                                    <td>Категория</td>
                                    <td><?= $novelty['category'] ?></td>
                                </tr>
                                <tr>
                                    <td>Подкатегория</td>
                                    <td><?= $novelty['subcategory'] ?></td>
                                </tr>
                                <tr>
                                    <td>Брэнд</td>
                                    <td><?= $novelty['brand'] ?></td>
                                </tr>
                                <tr>
                                    <td>Страна производитель</td>
                                    <td><?= $novelty['country'] ?></td>
                                </tr>
                                <tr>
                                    <td>Вес</td>
                                    <td><?= $novelty['weight'] ?> г.</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="product__price">
                            <span><?= $novelty['price'] ?> ₽</span>
                            <span><?= $novelty['quantity'] > 0 ? 'В наличии' : 'Нет в наличии' ?></span>
                            <button onclick="addProductInBusket(<?= $novelty['id'] ?>)">В корзину</button>
                        </div>
                    </div>
                </div>
                <div class="product__description">
                    <h3>Описание товара:</h3>
                    <p><?= $novelty['description'] ?></p>
                </div>
            </div>
        </section>
    </main>
<?php require "../templates/footer.php"; ?>