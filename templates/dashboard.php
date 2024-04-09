<main>
    <section class="statistics">
        <div class="revenue">
            <img src="/images/dashboard-rub.svg" alt="" />
            <div class="statistics__">
                <span>Выручка</span>
                <span>450000 ₽</span>
            </div>
        </div>
        <div class="sold">
            <img src="/images/dashboard-busket.svg" alt="" />
            <div>
                <span>Продано товаров</span>
                <span>245</span>
            </div>
        </div>
        <div class="traffic">
            <img src="/images/dashboard-user.svg" alt="" />
            <div>
                <span>Посещаемость</span>
                <span>40</span>
            </div>
        </div>
    </section>
</main>

<!--<main>-->
<!--    <div>-->
<!--        <a href="/profile/?sendMail=true">Отправить письмо</a>-->
<!--    </div>-->
<!--    <form method="post">-->
<!--        <h2>Добавление товара</h2>-->
<!--        <input type="hidden" name="form-add-tovar">-->
<!--        <input type="text" name="name" required placeholder="Наименование">-->
<!--        <div>-->
<!--            <label>Категория:</label>-->
<!--            <select name="category">-->
<!--                --><?php //foreach ($categories as $category): ?>
<!--                    <option value="--><?php //= $category['id'] ?><!--">--><?php //= $category['name'] ?><!--</option>-->
<!--                --><?php //endforeach; ?>
<!--            </select>-->
<!--        </div>-->
<!--        <div>-->
<!--            <label>Подкатегория:</label>-->
<!--            <select name="subcategory">-->
<!--                --><?php //foreach ($subcategories as $subcategory): ?>
<!--                    <option value="--><?php //= $subcategory['id'] ?><!--">--><?php //= $subcategory['name'] ?><!--</option>-->
<!--                --><?php //endforeach; ?>
<!--            </select>-->
<!--        </div>-->
<!--        <input type="text" name="quantity" required placeholder="Количество">-->
<!--        <input type="text" name="price" required placeholder="Цена">-->
<!--        <input type="date" name="date">-->
<!--        <input type="text" name="brand" required  placeholder="Брэнд">-->
<!--        <input type="text" name="country" required placeholder="Страна производителя">-->
<!--        <input type="text" name="weight" required  placeholder="Вес">-->
<!--        <input type="text" name="description" required placeholder="Описание">-->
<!--        <button class="submit" type="submit">Добавить</button>-->
<!--        --><?php
//        if (isset($_GET['productAdded']) && $_GET['productAdded'] === true) {
//            echo "Товар успешно добавлен";
//        } else if (isset($_GET['productAdded']) && $_GET['productAdded'] === false) {
//            echo "Не удалось добавить товар";
//        }
//        ?>
<!--    </form>-->
<!--    <a href="/core/logout.php"><button>Выйти</button></a>-->
<!--</main>-->