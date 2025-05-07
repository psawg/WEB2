<?php
require_once 'Database.php'; // Đảm bảo bạn đã có file Database.php để kết nối cơ sở dữ liệu

// Lấy các tham số từ request (page, search, sort)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc'; // Mặc định sắp xếp theo giá tăng dần

// Thiết lập số game mỗi trang
$games_per_page = 6;
$offset = ($page - 1) * $games_per_page;

try {
    // Tạo đối tượng Database và lấy kết nối
    $db = new Database();
    $conn = $db->getConnection();

    // Truy vấn SQL để lấy danh sách game
    $query = "SELECT * FROM games WHERE title LIKE ? ORDER BY price $sort LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($query);
    $search_term = "%$search%";  // Thêm ký tự % để tìm kiếm theo tên game
    $stmt->bind_param('sii', $search_term, $games_per_page, $offset);
    $stmt->execute();
    $result = $stmt->get_result();

    // Lấy tổng số game (để tính số trang phân trang)
    $count_query = "SELECT COUNT(*) AS total FROM games WHERE title LIKE ?";
    $count_stmt = $conn->prepare($count_query);
    $count_stmt->bind_param('s', $search_term);
    $count_stmt->execute();
    $count_result = $count_stmt->get_result();
    $total_rows = $count_result->fetch_assoc()['total'];
    $total_pages = ceil($total_rows / $games_per_page);

    // Mảng để lưu kết quả game
    $games = [];

    // Lặp qua các game và thêm vào mảng $games
    while ($row = $result->fetch_assoc()) {
        $games[] = [
            'game_id' => $row['game_id'],
            'title' => $row['title'],
            'description' => $row['description'],
            'price' => $row['price'],
            'cover_image' => $row['cover_image']
        ];
    }

    // Đóng kết nối
    $stmt->close();
    $count_stmt->close();
    $db->closeConnection();

    // Trả về kết quả dưới dạng JSON
    echo json_encode([
        'games' => $games,
        'totalPages' => $total_pages,
        'query' => $query
    ]);
} catch (Exception $e) {
    // Xử lý lỗi nếu có
    echo json_encode(['error' => 'Có lỗi trong quá trình truy vấn dữ liệu: ' . $e->getMessage()]);
}
?>
