<?php

require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $bookID = isset($_POST['bookID']) ? $_POST['bookID'] : '';
    $bookTitle = isset($_POST['bookTitle']) ? trim(htmlspecialchars($_POST['bookTitle'])) : '';
    $lastName = isset($_POST['lastName']) ? trim(htmlspecialchars($_POST['lastName'])) : '';
    $firstName = isset($_POST['firstName']) ? trim(htmlspecialchars($_POST['firstName'])) : '';
    $dateBorrowed = isset($_POST['dateBorrowed']) ? $_POST['dateBorrowed'] : '';
    $dateReturned = isset($_POST['dateReturned']) ? $_POST['dateReturned'] : '';

    $checkStmt = $conn->prepare("SELECT book_id FROM books_tbl WHERE book_id = ?");
    $checkStmt->bind_param("i", $bookID);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows == 0) {
        http_response_code(400);
        echo json_encode(['error' => 'Book does not exist.']);
        exit;
    }
    $checkStmt->close();

    $stmt = $conn->prepare("INSERT INTO request_tbl (book_id, book_title, last_name, first_name, date_borrowed, date_returned) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $bookID, $bookTitle, $lastName, $firstName, $dateBorrowed, $dateReturned);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(['success' => 'Request inserted successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $conn->error]);
    }

    $stmt->close();
    $conn->close();
}

?>