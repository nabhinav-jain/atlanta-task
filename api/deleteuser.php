<?php
header('Content-Type: application/json');

include('../dbconnect.php');

$id = (int)$_GET['id'];

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'User deleted']);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'User not found']);
    }
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to delete user']);
}

$stmt->close();
