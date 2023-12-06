<?php
session_start();

include "../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

if (isset($_SESSION['id'])) {
    Header("Location: /profile/");
}

$title = "Авторизация";
$sitePath = "https://localhost/kotopes/";
$pagePath = $sitePath . "login.php";
$whiteMenu = false;

if (isset($_POST['form-auth'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $KotoPes->authorization($email, $password);
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
    <meta property="og:image" content="http://localhost/kotopes/images/ogIcon.webp" />
    <meta property="og:url" content="<?= $pagePath ?>" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../styles/main.css" />
    <title><?= $title ?></title>
</head>
<body>
<?php include "../templates/header.php"; ?>
<main>
    <section>
        <form method="post">
            <h2>Авторизация</h2>
            <input type="hidden" name="form-auth">
            <input type="email" name="email" placeholder="Почта">
            <input type="password" name="password" placeholder="Пароль">
            <div class="form-group">
                <input type="checkbox" name="savePassword">
                <label>Запомнить пароль</label>
            </div>
            <div class="g-recaptcha" data-sitekey="6Lf2axwpAAAAACPyEJ7mBXB7bMlnbzHXAUU9scR1"></div>
            <button class="submit" type="submit" name="authRequest">Войти</button>
            <span>Нет аккаунта? <a href="../registration">Зарегистрироваться</a></span>
        </form>
    </section>
</main>
<?php include "../templates/footer.php"; ?>
<script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>