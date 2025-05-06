<?php
require_once './Database.php';

function getGames($limit, $offset) {
    $db = new Database();
    $conn = $db->getConnection();
    
    // Truy vấn lấy danh sách game với phân trang
    $sql = "SELECT * FROM games LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $limit, $offset);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $games = [];
    while ($row = $result->fetch_assoc()) {
        $games[] = $row;
    }
    
    $stmt->close();
    $db->closeConnection();
    
    return $games;
}

function getTotalGames() {
    $db = new Database();
    $conn = $db->getConnection();
    
    // Truy vấn lấy tổng số game
    $sql = "SELECT COUNT(*) as total FROM games";
    $result = $conn->query($sql);
    $total = $result->fetch_assoc()['total'];
    
    $db->closeConnection();
    
    return $total;
}
?>
