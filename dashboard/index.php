<?php
session_start();

require '../core/core.php';
$KotoPes = new KotoPes();
$KotoPes->getConnection();

if ($_SESSION['role'] !== 'admin') {
    Header("Location: /");
} else {
    $admin = $KotoPes->getUserData($_SESSION['id']);
}

$title = 'Котопес - панель администратора';
$pagePath = "/dashboard";
$pageDescription = 'Панель администритора интернет-магазина "Котопес"';

if (isset($_POST['addNewCategory'])) {
    $KotoPes->addNewCategory($_POST['categoryName']);
    Header("Location: /dashboard/?categories");
}

if (isset($_POST['addNewSubcategory'])) {
    $KotoPes->addNewSubcategory($_POST['subcategoryName']);
    Header("Location: /dashboard/?categories");
}

if (isset($_POST['addNewProduct'])) {
    $newProduct['name'] = trim($_POST['name']);
    $newProduct['category'] = $_POST['category'];
    $newProduct['subcategory'] = $_POST['subcategory'];
    $newProduct['quantity'] = $_POST['quantity'];
    $newProduct['price'] = $_POST['price'];
    $newProduct['date'] = strtotime(date('Y-m-d H:i:s'));
    $newProduct['brand'] = trim($_POST['brand']);
    $newProduct['country'] = trim($_POST['country']);
    $newProduct['weight'] = $_POST['weight'];
    $newProduct['description'] = trim($_POST['description']);

    if (isset($_FILES['image'])) {
        $newProduct['image'] = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/products/'.$_FILES['image']['name']);
    } else {
        $newProduct['image'] = 'undefined.webp';
    }

    $KotoPes->addNewProduct($newProduct);
    Header("Location: /dashboard/?products");
}
?>

<?php require "../templates/dashboard_header.php"; ?>

<?php
if (isset($_GET['template'])) {
    require "../templates/" . $_GET['template'] . ".php";
} else {
    require "../templates/dashboard.php";
}
?>

<?php require "../templates/dashboard_footer.php"; ?>