<?php
header('Content-Type: application/json');

$response = [
    'isLoggedIn' => isset($_SESSION['currentUser'])
];

echo json_encode($response);
?>