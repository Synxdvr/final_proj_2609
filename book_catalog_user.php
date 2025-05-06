
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booksyte Catalog</title>
  <link rel="stylesheet" href="bookc_user.css">
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="resources\BOOKSYTE.png" alt="Booksyte Logo">
    </div>
    <nav>
      <a href="dashboard_user.php">
        <img src="resources/4.png" alt="Dashboard Icon">Dashboard
      </a>
      <a href="book_borrow_user.php">
        <img src="resources\5.png" alt="Borrow/Return Icon">Borrow/Return
      </a>
      <a href="book_catalog_user.php" class="active">
        <img src="resources\6.png" alt="Catalog Icon">Book Catalog
      </a>
      <a href="#">
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
        <button class="search">SEARCH</button>
      </div>
    </div>
  </div>
</body>
</html>