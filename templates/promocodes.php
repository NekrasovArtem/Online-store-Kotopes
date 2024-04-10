<main>
    <?php $promocodes = $KotoPes->getPromocodes(); ?>
    <div class="modal-window" id="addNewPromocode">
        <h2 class="modal-window__title">Добавить категорию</h2>
        <form class="modal-window__form" method="POST">
            <div class="form__group">
                <label for="name">Наименивание:</label>
                <input name="promo" id="name" />
            </div>
            <div class="form__group">
                <label for="name">Скидка в процентах:</label>
                <input name="discount" id="discount" />
            </div>
            <button type="submit" name="addNewPromocode">Добавить</button>
        </form>
    </div>
    <section class="promocodes">
        <div class="heading">
            <h2>Промокоды</h2>
            <div>
                <button class="insert" data-izimodal-open="#addNewPromocode" data-izimodal-transitionin="fadeInDown">Добавить</button>
                <button class="delete">Удалить</button>
            </div>
        </div>
        <table class="categories">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Наименование</td>
                    <td>Скидка</td>
                    <td>Удалить</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($promocodes as $promocode): ?>
                <tr>
                    <td><?= $promocode['id'] ?></td>
                    <td><?= $promocode['promo'] ?></td>
                    <td><?= $promocode['discount'] ?>%</td>
                    <td><input type="checkbox" name="catDelete[]" value="<?= $promocode['id'] ?>" /></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>