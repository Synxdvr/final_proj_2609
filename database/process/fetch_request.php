<?php

require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookID = isset($_POST['bookID']) ? $_POST['bookID'] : '';

    if (empty($bookID)) {
        http_response_code(400);
        echo json_encode(['error' => 'Book ID is required.']);
        exit;
    }

    $response = [];

    // Check if book exists and get its details
    $bookStmt = $conn->prepare("SELECT book_id, title FROM books_tbl WHERE book_id = ?");
    $bookStmt->bind_param("i", $bookID);
    $bookStmt->execute();
    $bookResult = $bookStmt->get_result();

    if ($bookResult->num_rows > 0) {
        $response['book'] = $bookResult->fetch_assoc();
    } else {
        $bookStmt->close();
        http_response_code(404);
        echo json_encode(['error' => 'Book not found.']);
        exit;
    }
    $bookStmt->close();

    // Check if there's an existing request for this book
    $requestStmt = $conn->prepare("SELECT book_id, book_title, last_name, first_name, date_borrowed, date_returned 
                                  FROM request_tbl WHERE book_id = ?");
    $requestStmt->bind_param("i", $bookID);
    $requestStmt->execute();
    $requestResult = $requestStmt->get_result();

    if ($requestResult->num_rows > 0) {
        $response['request'] = $requestResult->fetch_assoc();
    }
    $requestStmt->close();

    http_response_code(200);
    echo json_encode($response);
    
    $conn->close();
}
?>