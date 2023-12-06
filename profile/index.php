<?php
session_start();

include "../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

$title = "Фамилия Имя - Профиль";
$sitePath = "https://localhost/kotopes/";
$pagePath = $sitePath . "profile/";
$whiteMenu = false;

if (isset($_SESSION['id'])) {
    $user = $KotoPes->getUserData($_SESSION['id']);
    if ($user['role'] == 'admin') {
        $isAdmin = true;
    } else {
        $isAdmin = false;
    }
}

//$categories = $KotoPes->getCategories();
//$subcategories = $KotoPes->getSubCategories();

if (isset($_POST['form-add-tovar'])) {
    $newTovar['name'] = $_POST['name'];
    $newTovar['category'] = $_POST['category'];
    $newTovar['subcategory'] = $_POST['subcategory'];
    $newTovar['quantity'] = $_POST['quantity'];
    $newTovar['price'] = $_POST['price'];
    $newTovar['date'] = $_POST['date'];
    $newTovar['brand'] = $_POST['brand'];
    $newTovar['country'] = $_POST['country'];
    $newTovar['weight'] = $_POST['weight'];
    $newTovar['description'] = $_POST['description'];

    $KotoPes->addNewTovar($newTovar);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="КотоПес - товары для животных" />
    <meta property="og:description" content="Интернет-магазин товаров для животных" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?= $pagePath ?>images/ogIcon.webp" />
    <meta property="og:url" content="<?= $pagePath ?>" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/styles/main.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title><?= $title ?></title>
</head>
<body>
    <?php include "../templates/header.php"; ?>
    <?php if ($isAdmin): ?>
    <main>
        <form method="post">
            <h2>Добавление товара</h2>
            <input type="hidden" name="form-add-tovar">
            <input type="text" name="name" required placeholder="Наименование">
            <div>
                <label>Категория:</label>
                <select name="category">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label>Подкатегория:</label>
                <select name="subcategory">
                    <?php foreach ($subcategories as $subcategory): ?>
                        <option value="<?= $subcategory['id'] ?>"><?= $subcategory['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="text" name="quantity" required placeholder="Количество">
            <input type="text" name="price" required placeholder="Цена">
            <input type="date" name="date">
            <input type="text" name="brand" required  placeholder="Брэнд">
            <input type="text" name="country" required placeholder="Страна производителя">
            <input type="text" name="weight" required  placeholder="Вес">
            <input type="text" name="description" required placeholder="Описание">
            <button class="submit" type="submit">Добавить</button>
        </form>
        <a href="/core/logout.php"><button>Выйти</button></a>
    </main>
    <?php else: ?>
    <main>
        <h1>Имя: <?= $user['name'] ?></h1>
        <a href="/core/logout.php"><button>Выйти</button></a>
    </main>
    <?php endif; ?>
    <?php include "../templates/footer.php"; ?>
</body>
</html>