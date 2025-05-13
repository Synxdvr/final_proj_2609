<!--<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booksyte Borrow/Return - Admin</title>
    <link rel="stylesheet" href="aBorrowRet_a.css">
    <script src="/js/request.js"></script>
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
          <img src="resources/4.png" alt="Dashboard Icon">Dashboard
        </a>
        <a href="aBorrowRet_a.php" class="active">
          <img src="resources/5.png" alt="Borrow/Return Icon">Borrow/Return
        </a>
        <a href="book_catalog_admin.php">
          <img src="resources/6.png" alt="Catalog Icon">Book Catalog
        </a>
        <a href="account_admin.php">
          <img src="resources/7.png" alt="Account Icon">Account
        </a>
      </nav>
    </div>
    <div class="main-content">
      <h2>BORROW/RETURN</h2>
      <div class="form">
        <div class="form-group">
          <label for="book-id">BOOK ID</label>
          <div class="input-with-button">
            <input type="text" id="book-id">
            <button class="fetch-button" onclick="fetchBookDetails()">FETCH</button>
          </div>
        </div>
        <div class="form-group">
          <label for="book-title">BOOK TITLE</label>
          <input type="text" id="book-title">
        </div>
        <div class="form-group">
          <label for="last-name">LAST NAME</label>
          <input type="text" id="last-name">
        </div>
        <div class="form-group">
          <label for="first-name">FIRST NAME</label>
          <input type="text" id="first-name">
        </div>
        <div class="form-group">
          <label for="date-borrowed">DATE BORROWED</label>
          <input type="date" id="date-borrowed">
        </div>
        <div class="form-group">
          <label for="date-returned">DATE RETURNED</label>
          <input type="date" id="date-returned">
        </div>
        <div class="form-buttons">
          <button class="insert" onclick="insertRequest()">INSERT</button>
          <button class="update" onclick="updateRequest()">UPDATE</button>
          <button class="delete" onclick="deleteRequest()">DELETE</button>
          <button class="clear" onclick="clearFormFields()">CLEAR</button>
        </div>
      </div> 
    </div>
  </body>
</html> -->