<?php

require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the book ID from the POST request
    $bookID = isset($_POST['bookID']) ? $_POST['bookID'] : '';

    // Validate required data
    if (empty($bookID)) {
        http_response_code(400);
        echo json_encode(['error' => 'Book ID is required.']);
        exit;
    }

    // Check if the request exists before attempting to delete
    $checkStmt = $conn->prepare("SELECT book_id FROM request_tbl WHERE book_id = ?");
    $checkStmt->bind_param("i", $bookID);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows == 0) {
        $checkStmt->close();
        http_response_code(400);
        echo json_encode(['error' => 'Request not found. Cannot delete.']);
        exit;
    }
    $checkStmt->close();

    // Prepare the delete statement
    $deleteStmt = $conn->prepare("DELETE FROM request_tbl WHERE book_id = ?");
    $deleteStmt->bind_param("i", $bookID);

    // Execute the delete
    if ($deleteStmt->execute()) {
        if ($deleteStmt->affected_rows > 0) {
            http_response_code(200);
            echo json_encode(['success' => 'Request deleted successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to delete request']);
        }
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $conn->error]);
    }

    $deleteStmt->close();
    $conn->close();
}
?>