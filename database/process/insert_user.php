<?php

require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstName = isset($_POST['firstName']) ? trim(htmlspecialchars($_POST['firstName'])) : '';
    $lastName = isset($_POST['lastName']) ? trim(htmlspecialchars($_POST['lastName'])) : '';
    $studentID = isset($_POST['studentID']) ? $_POST['studentID'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $checkStmt = $conn->prepare("SELECT student_id FROM users_tbl WHERE student_id = ?");
    $checkStmt->bind_param("s", $studentID);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        http_response_code(400);
        echo json_encode(['error' => 'Student ID already exists.']);
        exit;
    }
    $checkStmt->close();

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users_tbl (first_name, last_name, student_id, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstName, $lastName, $studentID, $hashedPassword);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'User registered successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Registration failed: ' . $conn->error]);
    }
    
    $stmt->close();
    $conn->close();
}

?>