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

echo '<link rel="stylesheet" type="text/css" href="styles.css">';

if ($result->num_rows > 0) {
    $html = '<table class="book-table">
                <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                    </tr>
                </thead>
                <tbody>';

    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>' . htmlspecialchars($row['book_id']) . '</td>
                    <td>' . htmlspecialchars(ucfirst($row['book_title'])) . '</td>
                    <td>' . htmlspecialchars(ucfirst($row['book_author'])) . '</td>
                  </tr>';
    }

    $html .= '</tbody></table>';
} else {
    $html = "<p style='text-align:center;'>No books found.</p>";
}

$conn->close();

echo $html;
?>