<?php
session_start();

require "../core/core.php";
$KotoPes = new KotoPes();
$connection = $KotoPes->getConnection();

if (isset($_SESSION['id'])) {
    $user = $KotoPes->getUserData($_SESSION['id']);
    $title = $user['surname'] . ' ' . $user['name'] . ' - Профиль';
} else {
    Header("Location: /");
}

$pagePath = $sitePath . "profile/";
$whiteMenu = false;
$pageDescription = 'Личный кабинет покупателя интернет-магазина "Котопес"';

if (isset($_POST['userEdit'])) {
    $userInfo['id'] = $_SESSION['id'];
    $userInfo['name'] = trim($_POST['name']);
    $userInfo['surname'] = trim($_POST['surname']);
    $userInfo['patronymic'] = trim($_POST['patronymic']);
    $userInfo['phone'] = trim($_POST['phone']);
    $userInfo['email'] = trim($_POST['email']);
    $userInfo['address'] = trim($_POST['address']);


    if (isset($_FILES['image'])) {
        $userInfo['image'] = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/users/'.$_FILES['image']['name']);
    } else {
        $userInfo['image'] = 'undefined.webp';
    }

    $KotoPes->updateUserInfo($userInfo);
    Header("Location: /profile");
}
?>
<?php require "../templates/header.php"; ?>
<?php
require $serverPath . '/templates/profile.php';
?>
<?php require "../templates/footer.php"; ?>