<?php
$categories = $KotoPes->getAllCategories();
?>
<main>
    <div class="modal-window" id="addCategoryModal">
        <h2 class="modal-window__title">Добавить категорию</h2>
        <form class="modal-window__form">
            <div class="form__group">
                <label for="name">Наименивание:</label>
                <input name="categoryName" id="name" />
            </div>
            <button type="submit" name="addNewCategory">Добавить</button>
        </form>
    </div>
    <div class="modal-window" id="addSubcategoryModal">
        <h2>Добавить подкатегорию</h2>
        <form>
            <div class="form__group">
                <label for="name">Наименивание:</label>
                <input name="subcategoryName" id="name" />
            </div>
            <button type="submit" name="addNewSubcategory">Добавить</button>
        </form>
    </div>
    <section class="categories">
        <div class="heading">
            <h2>Категории</h2>
            <div>
                <button class="insert" data-izimodal-open="#addCategoryModal" data-izimodal-transitionin="fadeInDown">Добавить</button>
                <button class="delete">Удалить</button>
            </div>
        </div>
        <table class="categories">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Наименование</td>
                    <td>Удалить</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories['main'] as $category): ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td><?= $category['name'] ?></td>
                    <td><input type="checkbox" name="catDelete[]" value="<?= $category['id'] ?>" /></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section class="subcategories">
        <div class="heading">
            <h2>Подкатегории</h2>
            <div>
                <button class="insert" data-izimodal-open="#addSubcategoryModal" data-izimodal-transitionin="fadeInDown">Добавить</button>
                <button class="delete">Удалить</button>
            </div>
        </div>
        <table class="categories">
            <thead>
            <tr>
                <td>ID</td>
                <td>Наименование</td>
                <td>Удалить</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories['sub'] as $category): ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td><?= $category['name'] ?></td>
                    <td><input type="checkbox" name="catDelete[]" value="<?= $category['id'] ?>" /></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>