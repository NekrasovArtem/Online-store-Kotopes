<?php
session_start();

require "../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$title = "КотоПес - Подробнее о товаре";
$pagePath = "/product";
$whiteMune = false;
$pageDescription = 'Описание товара';
if (!isset($_GET['id'])) {
    Header('Location: /');
}
$novelty = $KotoPes->getProduct($_GET['id']);

?>
<?php require "../templates/header.php"; ?>
    <main>
        <section class="card">
            <div class="box_img">
                <img class = "product_img" src="/images/products/<?= $novelty['image'] ?>" alt="Изображение товара" / >
                <div class="product_name"><span class="text"><?= $novelty['name'] ?></span></div>
                <div class="card_kol">
                <span class="product_price"><?= $novelty['price'] ?> ₽</span> <span class="product_kolvo">Кол-во: <?= $novelty['quantity'] ?>шт</span>
                </div>
                <button class="product_button" onclick="addProductInBusket(<?= $novelty['id'] ?>)">В корзину</button>
                <div class="tovar"> О товаре
                   <div class="description"> <span class="text_description"><?= $novelty['description'] ?></span>
                   </div>
                </div>
                <div class="сharact"> Характеристики
                    <div class="charact_brend">Бренд: <span class="text_tovar"> <?= $novelty['brand'] ?></span></div>
                    <div class="charact_country">Страна: <span class="text_tovar"> <?= $novelty['country'] ?></span></div>
                    <div class="charact_weight">Вес товара:<span class="text_tovar"> <?= $novelty['weight'] ?> г</span></div>
                </div>
            </div>
        </section>
    </main>
<?php require "../templates/footer.php"; ?>