<?php
include "core.php";

$title = "Регистрация";
$url = "https://localhost/kotopes/";
$pagePath = $url . "registration.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="КотоПес - товары для животных" />
    <meta property="og:description" content="Интернет-магазин товаров для животных" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://localhost/kotopes/images/ogIcon.webp" />
    <meta property="og:url" content="<?= $pagePath ?>" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./styles/style.css" />
    <title><?= $title ?></title>
</head>
<body>
<main>
    <form method="post">
        <input type="text" name="firstName" placeholder="Имя">
        <input type="text" name="lastName" placeholder="Фамилия">
        <input type="tel" name="phone" placeholder="Телефон">
        <input type="email" name="email" placeholder="Почта">
        <input type="password" name="password" placeholder="Пароль">
        <input type="password" name="passwordRepeat" placeholder="Подтвердите пароль">
        <div class="g-recaptcha" data-sitekey="6LehTBUpAAAAAGJ3MPlfY4-nlmMGwDTJmQJl_cx7"></div>
        <button type="submit" name="regRequest">Зарегистрироваться</button>
    </form>
</main>
<script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>