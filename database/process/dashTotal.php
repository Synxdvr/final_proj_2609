<?php
include 'db_connection.php';

$sql = "SELECT COUNT(*) as total FROM books_tbl";
$result = $conn->query($sql);

$totalBooks = 0;
if ($result && $row = $result->fetch_assoc()) {
    $totalBooks = $row['total'];
}
$conn->close();

echo $totalBooks;


$sql = "SELECT COUNT(*) as total FROM request_tbl";
$result = $conn->query($sql);

$totalRequest = 0;
if ($result && $row = $result->fetch_assoc()) {
    $totalRequest = $row['total'];
}
$conn->close();

echo $totalRequest;





?>
