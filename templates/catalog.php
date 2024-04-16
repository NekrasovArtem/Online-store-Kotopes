<main class="catalog">
    <section class="catalog__filter">
        <?php $subcategories = $KotoPes->getAllCategories(); ?>
        <div class="catalog__filter-wrapper">
            <?php foreach ($subcategories['sub'] as $subcategory): ?>
                <label class="catalog__filter-item" for="subcategory-<?= $subcategory['id'] ?>">
                    <input type="checkbox" name="check-category" id="subcategory-<?= $subcategory['id'] ?>" value="<?= $subcategory['en_name'] ?>">
                    <?= $subcategory['name'] ?>
                </label>
            <?php endforeach; ?>
            <button onclick="renderCatalog()">Применить</button>
        </div>
    </section>
    <section class="catalog__wrapper">
        <?php foreach ($products as $product): ?>
            <div class="catalog__item <?= $product['subcat_enname'] ?>">
                <div class="catalog__item-name">
                    <img src="/images/products/<?= $product['image'] ?>" alt="Фото товара">
                    <a href="/product/?id=<?= $product['id'] ?>"><?= mb_substr($product['name'], 0, 32) ?>...</a>
                </div>
                <div class="catalog__item-price">
                    <span><?= $product['price'] ?> руб.</span>
                    <button onclick="addProductInBusket(<?= $product['id'] ?>)">В корзину</button>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</main>