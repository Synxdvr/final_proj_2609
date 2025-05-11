<?php

require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentID = isset($_POST['studentID']) ? $_POST['studentID'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    $stmt = $conn->prepare("SELECT student_id, password FROM users_tbl WHERE student_id = ?");
    $stmt->bind_param("s", $studentID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['student_id'] = $user['student_id'];
            $_SESSION['logged_in'] = true;
            
            echo json_encode(['success' => true, 'message' => 'Login successful']);
        } else {
            http_response_code(401);
            echo json_encode(['error' => 'Incorrect password']);
        }
    } else {
        http_response_code(401);
        echo json_encode(['error' => 'Student ID not found create an account first']);
    }
    
    $stmt->close();
    $conn->close();
}

?>