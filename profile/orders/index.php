<?php
session_start();

require "../../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

if (isset($_SESSION['id'])) {
    $user = $KotoPes->getUserData($_SESSION['id']);
    $title = $user['surname'] . ' ' . $user['name'] . ' - покупки';
} else {
    Header("Location: /");
}

$pagePath = "/profile/orders";
$whiteMenu = false;
$pageDescription = "Список заказанных товаров пользователя интернет-магазина Котопес";

$orders = $KotoPes->getUserOrders($_SESSION['id']);
?>
<?php require "../../templates/header.php"; ?>
<main>
    <section class="orders-list">
        <div class="orders-list__head">
            <h2>Ваши покупки</h2>
            <a href="../">Назад</a>
        </div>
        <div class="orders-list__wrapper">
            <?php foreach ($orders as $order): ?>
                <div class="catalog__item">
                    <div class="catalog__item-name">
                        <img src="/images/products/<?= $order['image'] ?>" alt="Фото товара">
                        <a href="/product/?id=<?= $order['id'] ?>"><?= mb_substr($order['name'], 0, 32) ?>...</a>
                    </div>
                    <div class="catalog__item-price">
                        <span><?= $order['price'] ?> руб.</span>
                    </div>
                </div>
            <?php endforeach;; ?>
        </div>
    </section>
</main>
<?php require "../../templates/footer.php"; ?>
