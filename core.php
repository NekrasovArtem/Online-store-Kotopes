<?php
class KotoPes {
    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASSWORD = '';
    private const DB_NAME = 'kotopes';
    private mysqli|false $connection;
    public function getConnection() {
        $this->connection = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
        echo "успешно";
        return $this->connection;
    }
}