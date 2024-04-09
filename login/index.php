<?php
session_start();

require "../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

if (isset($_SESSION['id'])) {
    Header("Location: /profile/");
}

$title = "КотоПес - Авторизация";
$pagePath = "/login";
$whiteMenu = false;
$pageDescription = 'Авторизация в аккаунт пользователя интернет-магазина "Котопес"';

if (isset($_POST['form-auth'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $KotoPes->authorization($email, $password);
}
?>
<?php require "../templates/header.php"; ?>
<main>
    <section>
        <form method="post">
            <h2>Авторизация</h2>
            <input type="hidden" name="form-auth">
            <input type="email" name="email" autocomplete="on" placeholder="Почта">
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
<?php require "../templates/footer.php"; ?>