<?php

require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $bookId = isset($_POST['bookId']) ? $_POST['bookId'] : '';

    $check_stmt = $conn->prepare("SELECT book_id FROM books_tbl WHERE book_id = ?");
    $check_stmt->bind_param("i", $bookId);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    
    if ($result->num_rows === 0) {
        http_response_code(404);
        echo json_encode(['error' => 'Book ID not found. Cannot delete.']);
        $check_stmt->close();
        $conn->close();
        exit;
    }
    $check_stmt->close();
    
    $stmt = $conn->prepare("DELETE FROM books_tbl WHERE book_id = ?");
    $stmt->bind_param("i", $bookId);
    
    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(['success' => 'Book deleted successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $conn->error]);
    }
    
    $stmt->close();
    $conn->close();
}

?>