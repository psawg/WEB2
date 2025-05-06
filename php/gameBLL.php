<?php
require_once 'Database.php'; // Include the Database class we created earlier

class GameBLL {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Get all games from the database
     * @return array List of games
     */
    public function getGameList() {
        $conn = $this->db->getConnection();
        $games = [];
        
        try {
            $query = "SELECT game_id, title, description, price, release_date, 
                             developer_id, platform, cover_image, trailer_url 
                      FROM games 
                      ORDER BY release_date DESC";
            
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            
            while ($row = $result->fetch_assoc()) {
                // Format data before returning
                $row['price'] = number_format($row['price'], 2);
                $row['release_date'] = date('M d, Y', strtotime($row['release_date']));
                $row['platforms'] = explode(',', $row['platform']);
                $games[] = $row;
            }
            
            $stmt->close();
        } catch (Exception $e) {
            error_log("Error getting game list: " . $e->getMessage());
            throw new Exception("Could not retrieve game list");
        } finally {
            $this->db->closeConnection();
        }
        
        return $games;
    }

    /**
     * Get a single game by ID
     * @param int $gameId The game ID to retrieve
     * @return array|null The game data or null if not found
     */
    public function getGameById($gameId) {
        $conn = $this->db->getConnection();
        $game = null;
        
        try {
            $query = "SELECT game_id, title, description, price, release_date, 
                             developer_id, platform, cover_image, trailer_url, created_at 
                      FROM games 
                      WHERE game_id = ?";
            
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $gameId);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $game = $result->fetch_assoc();
                
                // Format data
                $game['price'] = number_format($game['price'], 2);
                $game['release_date'] = date('M d, Y', strtotime($game['release_date']));
                $game['created_at'] = date('M d, Y', strtotime($game['created_at']));
                $game['platforms'] = explode(',', $game['platform']);
            }
            
            $stmt->close();
        } catch (Exception $e) {
            error_log("Error getting game by ID: " . $e->getMessage());
            throw new Exception("Could not retrieve game details");
        } finally {
            $this->db->closeConnection();
        }
        
        return $game;
    }

    /**
     * Search games by title
     * @param string $searchTerm The search term
     * @return array List of matching games
     */
    public function searchGames($searchTerm) {
        $conn = $this->db->getConnection();
        $games = [];
        
        try {
            $query = "SELECT game_id, title, price, cover_image 
                      FROM games 
                      WHERE title LIKE ? 
                      ORDER BY title";
            
            $stmt = $conn->prepare($query);
            $searchTerm = "%" . $searchTerm . "%";
            $stmt->bind_param("s", $searchTerm);
            $stmt->execute();
            $result = $stmt->get_result();
            
            while ($row = $result->fetch_assoc()) {
                $row['price'] = number_format($row['price'], 2);
                $games[] = $row;
            }
            
            $stmt->close();
        } catch (Exception $e) {
            error_log("Error searching games: " . $e->getMessage());
            throw new Exception("Search failed");
        } finally {
            $this->db->closeConnection();
        }
        
        return $games;
    }
}