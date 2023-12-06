<?php
session_start();

include "../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

if (isset($_SESSION['id'])) {
    Header("Location: /profile/");
}

$title = "Регистрация";
$sitePath = "https://localhost/kotopes/";
$pagePath = $sitePath . "registration.php";
$whiteMune = false;

$error = '';

if (isset($_POST['form-reg'])) {
    $user['name'] = trim(strip_tags($_POST['name']));
    $user['surname'] = trim(strip_tags($_POST['surname']));
    $user['phone'] = trim(strip_tags($_POST['phone']));
    $user['email'] = trim(strip_tags($_POST['email']));
    $password = trim(strip_tags($_POST['password']));
    $password_repeat = trim(strip_tags($_POST['password_repeat']));
    $user['role'] = "user";

    if ($password !== $password_repeat) {
        echo "Пароли не совпадают";
    } else {
        $user['hash'] = password_hash($password, PASSWORD_BCRYPT);
        if ($KotoPes->addNewUser($user)) {
            Header("Location: ../login");
        } else {
            $error = 'Что-то произошло не так!';
        }

    }
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
            <?= $error ?>
            <h2>Регистрация</h2>
            <input type="hidden" name="form-reg">
            <input type="text" name="name" placeholder="Имя" required>
            <input type="text" name="surname" placeholder="Фамилия" required>
            <input type="tel" name="phone" placeholder="Телефон" required>
            <input type="email" name="email" placeholder="Почта" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <input type="password" name="password_repeat" placeholder="Подтвердите пароль" required>
            <div class="g-recaptcha" data-sitekey="6Lf2axwpAAAAACPyEJ7mBXB7bMlnbzHXAUU9scR1"></div>
            <button class="submit" type="submit" name="authRequest">Зарегистрироваться</button>
            <span>Уже есть аккаунт? <a href="../login">Войти</a></span>
        </form>
    </section>
</main>
<?php include "../templates/footer.php"; ?>
<script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>