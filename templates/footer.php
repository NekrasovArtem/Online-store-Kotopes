<footer>
    <div class="footer__wrapper">
        <div class="footer__column">
            <h5>Категории</h5>
            <nav>
                <?php foreach (CATEGORIES as $category): ?>
                    <a href="<?= $category['link'] ?>"><?= $category['name'] ?></a>
                <?php endforeach; ?>
            </nav>
        </div>
    </div>
</footer>