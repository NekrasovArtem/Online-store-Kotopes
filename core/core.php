<?php
class KotoPes {
    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASSWORD = 'root';
    private const DB_NAME = 'db_kotopes';
    private mysqli|false $connection;
    public function getConnection() {
        $this->connection = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
        return $this->connection;
    }
    public function getCategories() {
        $sql = "CALL get_categories()";
        $result = $this->connection->query($sql);
        return $result;
    }
    public function getSubCategories() {
//        $sql = "CALL get_subcategories()";
        $sql = "SELECT * FROM subcategories";
        $result = $this->connection->query($sql);
        print_r($result);
        return $result;
    }
    public function addNewUser($user) {
        $sql = "INSERT INTO users (name, surname, phone, email, hash_password, role) VALUES ('".$user['name']."', '".$user['surname']."', '".$user['phone']."', '".$user['email']."', '".$user['hash']."', '".$user['role']."')";
        if ($this->connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function getUserData($id) {
        $sql = "SELECT * FROM users WHERE id='".$id."'";
        $result = $this->connection->query($sql)->fetch_assoc();
        return $result;
    }
    public function authorization($email, $password) {
        $sql = "SELECT * FROM users WHERE email='".$email."'";
        $userData = $this->connection->query($sql)->fetch_assoc();
        if (password_verify($password, $userData['hash_password'])) {
            $_SESSION['id'] = $userData['id'];
            Header("Location: /profile");
        } else {
            echo "Введены неправильные данные.";
        }
    }
    public function addNewProduct($newProduct) {
        $sql = "INSERT INTO products (name, id_cat, id_subcat, quantity, price, date, brand, country, weight, description) VALUES ('".$newProduct['name']."', '".$newProduct['category']."', '".$newProduct['subcategory']."', '".$newProduct['quantity']."', '".$newProduct['price']."', '".$newProduct['date']."', '".$newProduct['brand']."', '".$newProduct['country']."', '".$newProduct['weight']."', '".$newProduct['description']."',)";
        if ($this->connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}