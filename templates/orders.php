<?php
$orders = $KotoPes->getAllOrders();
?>
<main>
    <section class="orders">
        <div class="heading">
            <h2>Заказы</h2>
            <!-- <div>
                <button class="insert" data-izimodal-open="#addCategoryModal" data-izimodal-transitionin="fadeInDown">Добавить</button>
                <button class="delete">Удалить</button>
            </div> -->
        </div>
        <table class="orders">
            <thead>
                <tr>
                    <td>ID заказа</td>
                    <td>E-mail</td>
                    <td>Цена</td>
                    <td>Дата</td>
                    <td>Адресс доставки</td>
                    <td>Тип доставки</td>
                    <td>Оплата</td>
                    <td>Статус</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id_order'] ?></td>
                    <td><?= $order['email'] ?></td>
                    <td><?= $order['order_price'] ?></td>
                    <td><?= $order['date'] ?></td>
                    <td><?= $order['address'] ?></td>
                    <td><?php if ($order['order_type'] === 'point') echo 'Пункт выдачи'; else echo 'Доставка'; ?></td>
                    <td><?= $order['pay_method'] ?></td>
                    <td><?= $order['status'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>