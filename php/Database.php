<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';       // Default XAMPP username
    private $password = '';       // Default XAMPP password (empty)
    private $database = 'game_store'; // Your database name
    private $port = 3306;         // Default MySQL port
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->database,
            $this->port
        );

        if ($this->conn->connect_error) {
            // Dùng exception thay vì die()
            throw new Exception("Kết nối thất bại: " . $this->conn->connect_error);
        }

        $this->conn->set_charset("utf8mb4");
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    public function __clone() {}
    public function __wakeup() {}
}
