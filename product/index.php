<?php
session_start();

require "../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$title = "КотоПес - Подробнее о товаре";
$pagePath = "/product";
$whiteMune = false;
$pageDescription = 'Описание товара';

$novelties = $KotoPes->getNoveltyProducts();

?>
<?php require "../templates/header.php"; ?>
    <main>
        <section class="card">
<?php foreach ($novelties as $novelty): ?>
            <div class="box_img">
                <img class = "product_img" src="/images/products/<?= $novelty['image'] ?>" alt="Изображение товара" / >
                <div class="product_name"><span class="text">Farmina Vet Life Struvite Management диетический сухой корм для кошек при мочекаменной болезни, с курицей, 400г</span></div>
                <span class="product_price"><?= $novelty['price'] ?> ₽</span> <span class="product_kolvo">Кол-во: <?= $novelty['price'] ?>/шт</span>

                <button class="product_button" onclick="addProductInBusket(<?= $novelty['id'] ?>)">В корзину</button>
                <div class="tovar"> О товаре
                   <div class="description"> <span class="text_description">Farmina Vet Life Struvite Management – диетический сухой корм для кошек для профилактики образования струвитных уролитов и при идиопатическом цистите.</span>
                   </div>
                </div>
                <div class="сharact"> Характеристики
                    <div class="charact_brend">Бренд: <span class="text_tovar"> kapsula</span></div>
                    <div class="charact_country">Страна: <span class="text_tovar"> Россия</span></div>
                    <div class="charact_weight">Вес товара:<span class="text_tovar"> 1000 г</span></div>
                </div>
            </div>
        </section>
    </main>
<?php require "../templates/footer.php"; ?>