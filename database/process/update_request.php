<?php

require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the POST request
    $bookID = isset($_POST['bookID']) ? $_POST['bookID'] : '';
    $bookTitle = isset($_POST['bookTitle']) ? trim(htmlspecialchars($_POST['bookTitle'])) : '';
    $lastName = isset($_POST['lastName']) ? trim(htmlspecialchars($_POST['lastName'])) : '';
    $firstName = isset($_POST['firstName']) ? trim(htmlspecialchars($_POST['firstName'])) : '';
    $dateBorrowed = isset($_POST['dateBorrowed']) ? $_POST['dateBorrowed'] : '';
    $dateReturned = isset($_POST['dateReturned']) ? $_POST['dateReturned'] : '';

    // First, check if the book exists in the books table
    $checkBookStmt = $conn->prepare("SELECT book_id FROM books_tbl WHERE book_id = ?");
    $checkBookStmt->bind_param("i", $bookID);
    $checkBookStmt->execute();
    $bookResult = $checkBookStmt->get_result();

    if ($bookResult->num_rows == 0) {
        $checkBookStmt->close();
        http_response_code(400);
        echo json_encode(['error' => 'Book does not exist.']);
        exit;
    }
    $checkBookStmt->close();

    // Next, check if the request exists in the requests table
    $checkRequestStmt = $conn->prepare("SELECT book_id FROM request_tbl WHERE book_id = ?");
    $checkRequestStmt->bind_param("i", $bookID);
    $checkRequestStmt->execute();
    $requestResult = $checkRequestStmt->get_result();

    if ($requestResult->num_rows == 0) {
        $checkRequestStmt->close();
        http_response_code(400);
        echo json_encode(['error' => 'Request not found. Create a new request first.']);
        exit;
    }
    $checkRequestStmt->close();

    // Prepare the update statement
    $updateStmt = $conn->prepare("UPDATE request_tbl SET book_title = ?, last_name = ?, first_name = ?, date_borrowed = ?, date_returned = ? WHERE book_id = ?");
    $updateStmt->bind_param("sssssi", $bookTitle, $lastName, $firstName, $dateBorrowed, $dateReturned, $bookID);

    // Execute the update
    if ($updateStmt->execute()) {
        if ($updateStmt->affected_rows > 0) {
            http_response_code(200);
            echo json_encode(['success' => 'Request updated successfully']);
        } else {
            http_response_code(200);
            echo json_encode(['success' => 'No changes were made']);
        }
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $conn->error]);
    }

    $updateStmt->close();
    $conn->close();
}
?>