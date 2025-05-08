<?php
include "db_connection.php";

$search = isset($_GET['search']) ? trim($_GET['search']) : "";

$sql = "SELECT book_id, book_title, book_author FROM books_tbl";

if ($search !== "") {
    $s = $conn->real_escape_string($search);
    $sql .= " WHERE book_title LIKE '%$s%'"
        . " OR book_author LIKE '%$s%'";
}

$result = $conn->query($sql);

$html = "";

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '<div class="book-card">  <div class="book-header">
                <h3>' . htmlspecialchars(ucfirst($row['book_title'])) . '</h3>
                <small>By ' . htmlspecialchars(ucfirst($row['book_author'])) . '</small>
            </div>
            <div class="book-details">
                <table>
                    <tr><td><strong>Book ID</strong></td><td>' . $row['book_id'] . '</td></tr>
                    <tr><td><strong>Title</strong></td><td>' . htmlspecialchars($row['book_title']) . '</td></tr>
                    <tr><td><strong>Author</strong></td><td>' . htmlspecialchars($row['book_author']) . '</td></tr>
                </table>
            </div>
        </div>';
    }
} else {
    $html = "<p style='text-align:center;'>No books found.</p>";
}

$conn->close();

echo $html;
?>