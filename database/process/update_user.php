<?php

require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $studentID = isset($_POST['studentID']) ? $_POST['studentID'] : '';
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $check_stmt = $conn->prepare("SELECT student_id FROM users_tbl WHERE student_id = ?");
    $check_stmt->bind_param("i", $studentID);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows === 0) {
        http_response_code(404);
        echo json_encode(['error' => 'Student ID not found. Cannot update.']);
        $check_stmt->close();
        $conn->close();
        exit;
    }
    $check_stmt->close();

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users_tbl SET first_name = ?, last_name = ?, password = ? WHERE student_id = ?");
    $stmt->bind_param("sssi", $firstName, $lastName, $hashedPassword, $studentID);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(['success' => 'User updated successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $conn->error]);
    }

    $stmt->close();
    $conn->close();
}

?>