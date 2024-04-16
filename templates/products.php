<?php
$categories = $KotoPes->getAllCategories();
$products = $KotoPes->getAllProducts();
?>
<main>
    <div class="modal-window" id="addProductModal">
        <h2 class="modal-window__title">Добавить новый товар</h2>
        <form class="modal-window__form" method="post" enctype="multipart/form-data">
            <div class="form__section">
                <div class="form__group">
                    <label for="name">Наименивание:</label>
                    <input type="text" name="name" id="name" />
                </div>
                <div class="form__group">
                    <label for="brand">Брэнд:</label>
                    <input type="text" name="brand" id="name" />
                </div>
                <div class="form__group">
                    <label for="category">Категория:</label>
                    <select name="category">
                        <option value="null"></option>
                        <?php foreach ($categories['main'] as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form__group">
                    <label for="subcategory">Подкатегория:</label>
                    <select name="subcategory">
                        <option value="null"></option>
                        <?php foreach ($categories['sub'] as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form__group">
                    <label for="quantity">Кол-во:</label>
                    <input type="text" name="quantity" id="name" />
                </div>
                <div class="form__group">
                    <label for="price">Цена:</label>
                    <input type="text" name="price" id="name" />
                </div>
                <div class="form__group">
                    <label for="country">Страна производителя:</label>
                    <input type="text" name="country" id="name" />
                </div>
                <div class="form__group">
                    <label for="weight">Вес:</label>
                    <input type="text" name="weight" id="name" />
                </div>
                <div class="form__group">
                    <label for="image">Изображение:</label>
                    <input type="file" name="image" id="name" />
                </div>
                <div class="form__group">
                    <label for="description">Описание:</label>
                    <textarea name="description" id="name"></textarea>
                </div>
            </div>
            <button type="submit" name="addNewProduct">Добавить</button>
        </form>
    </div>
    <section class="products">
        <div class="heading">
            <h2>Товары</h2>
            <div>
                <button class="insert" data-izimodal-open="#addProductModal" data-izimodal-transitionin="fadeInDown">Добавить</button>
                <button class="delete">Удалить</button>
            </div>
        </div>
        <table class="categories">
            <thead>
            <tr>
                <td>ID</td>
                <td>Наименование</td>
                <td>Изображение</td>
                <td>Категория</td>
                <td>Подкатегория</td>
                <td>Брэнд</td>
                <td>Кол-во</td>
                <td>Цена</td>
                <td>Подробнее</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><img src="<?= '/images/products/' . $product['image'] ?>" /></td>
                    <td><?= $product['category'] ?></td>
                    <td><?= $product['subcategory'] ?></td>
                    <td><?= $product['brand'] ?>
                    <td><?= $product['quantity'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><a href="?products&productId=<?= $product['id'] ?>">Подробнее</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>