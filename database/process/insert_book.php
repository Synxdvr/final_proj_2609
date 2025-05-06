<?php

require_once '../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $bookId = isset($_POST['bookId']) ? $_POST['bookId'] : '';
    $bookTitle = isset($_POST['bookTitle']) ? $_POST['bookTitle'] : '';
    $bookAuthor = isset($_POST['bookAuthor']) ? $_POST['bookAuthor'] : '';

    $check_stmt = $conn->prepare("SELECT book_id FROM books_tbl WHERE book_id = ?");
    $check_stmt->bind_param("i", $bookId);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    
    if ($result->num_rows > 0) {
        http_response_code(409);
        echo json_encode(['error' => 'Book ID already exists. Use update instead.']);
        $check_stmt->close();
        $conn->close();
        exit;
    }
    $check_stmt->close();

    $stmt = $conn->prepare("INSERT INTO books_tbl (book_id, book_title, book_author) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $bookId, $bookTitle, $bookAuthor);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(['success' => 'Book inserted successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $conn->error]);
    }
    
    $stmt->close();
    $conn->close();
}

?>