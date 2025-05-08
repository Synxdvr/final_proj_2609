<!-- filepath: c:\Users\PC\Downloads\FinalProj - AppDev\FinalProj - AppDev\book_catalog_admin.php -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booksyte Catalog - Admin</title>
  <link rel="stylesheet" href="bookc_admin.css">
  <script src="/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="resources\BOOKSYTE.png" alt="Booksyte Logo">
    </div>
    <nav>
      <a href="dashboard_admin.php">
        <img src="resources\4.png" alt="Dashboard Icon">Dashboard
      </a>
      <a href="aBorrowRet_a.php">
  <img src="resources\5.png" alt="Borrow/Return Icon">Borrow/Return
</a>
      <a href="book_catalog_admin.php" class="active">
        <img src="resources\6.png" alt="Catalog Icon">Book Catalog
      </a>
      <a href="account_admin.php">
        <img src="resources\7.png" alt="Account Icon">Account
      </a>
    </nav>
  </div>

  <div class="main-content">
    <h2>CATALOG</h2>
    <div class="form">
      <div class="form-group">
        <label for="book-id">BOOK ID</label>
        <input type="text" id="book-id" placeholder="Enter Book ID">
      </div>
      <div class="form-group">
        <label for="book-title">BOOK TITLE</label>
        <input type="text" id="book-title" placeholder="Enter Book Title">
      </div>
      <div class="form-group">
        <label for="author">AUTHOR</label>
        <input type="text" id="author" placeholder="Enter Author Name">
      </div>
      <div class="form-buttons">
        <button class="insert" onclick="insertBook()">INSERT</button>
        <button class="update" onclick="updateBook()">UPDATE</button>
        <button class="delete" onclick="deleteBook()">DELETE</button>
      </div>
    </div>
  </div>
</body>
</html>