<?php
session_start();

require "../../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

if (isset($_SESSION['id'])) {
    $user = $KotoPes->getUserData($_SESSION['id']);
    $title = $user['surname'] . ' ' . $user['name'] . ' - чеки';
} else {
    Header("Location: /");
}

$pagePath = "/receipts/orders";
$whiteMenu = false;
$pageDescription = "Список чеков пользователя интернет-магазина Котопес";

$receipts = $KotoPes->getUserReceipts($_SESSION['id']);
?>
<?php require "../../templates/header.php"; ?>
<main>
    <section class="receipts">
        <div class="receipts__head">
            <h2>Ваши чеки</h2>
            <a href="../">Назад</a>
        </div>
        <table class="receipts__table">
            <thead>
                <tr>
                    <td>Статус</td>
                    <td>Стоимость</td>
                    <td>Адресс</td>
                    <td>Дата заказа</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($receipts as $receipt): ?>
                    <tr>
                        <td><?= $receipt['status'] === 'ontheway' ? 'В пути' : ($receipt['status'] === 'waiting' ? 'В ожидании' : ($receipt['status'] === 'delivered' ? 'В ожидании' : 'Отменен')) ?></td>
                        <td><?= $receipt['order_price'] ?> руб.</td>
                        <td><?= $receipt['address'] ?></td>
                        <td><?= $receipt['date'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>
<?php require "../../templates/footer.php"; ?>
