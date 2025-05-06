<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';       // Default XAMPP username
    private $password = '';       // Default XAMPP password (empty)
    private $database = 'game_store'; // Your database name
    private $port = 3306;         // Default MySQL port
    private $conn;

    // Constructor to establish connection
    public function __construct() {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->database,
            $this->port
        );

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
        // Set charset to utf8mb4 for proper encoding
        $this->conn->set_charset("utf8mb4");
    }

    // Method to get the connection
    public function getConnection() {
        return $this->conn;
    }

    // Method to close the connection
    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    // Prevent cloning and unserialization
    public function __clone() {}
    public function __wakeup() {}
}

// Usage example:
try {
    // Create database instance
    $db = new Database();
    
    // Get connection object
    $conn = $db->getConnection();
    
    // Example query
    $query = "SELECT * FROM games WHERE game_id = ?";
    $stmt = $conn->prepare($query);
    $gameId = 1; // Example game ID
    $stmt->bind_param("i", $gameId);
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Process your data
            echo "Game: " . htmlspecialchars($row['title']) . "<br>";
        }
    } else {
        echo "No games found";
    }
    
    // Close statement and connection
    $stmt->close();
    $db->closeConnection();
    
} catch (Exception $e) {
    die("Database error: " . $e->getMessage());
}