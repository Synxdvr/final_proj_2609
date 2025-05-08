<!-- filepath: c:\Users\PC\Downloads\FinalProj - AppDev\FinalProj - AppDev\uBorrowRet.php -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booksyte Borrow/Return</title>
  <link rel="stylesheet" href="uBorrowRet_u.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="resources/BOOKSYTE.png" alt="Booksyte Logo">
    </div>
    <nav>
      <a href="dashboard_user.php">
        <img src="resources/4.png" alt="Dashboard Icon">Dashboard
      </a>
      <a href="uBorrowRet_u.php">
  <img src="resources\5.png" alt="Borrow/Return Icon">Borrow/Return
</a>
      <a href="book_borrow_user.php">
        <img src="resources/6.png" alt="Catalog Icon">Book Catalog
      </a>
      <a href="account_user.php">
        <img src="resources/7.png" alt="Account Icon">Account
      </a>
    </nav>
  </div>

  <div class="main-content">
    <h2>BORROW/RETURN</h2>
    <form method="POST" id="borrowForm">
      <div class="form">
        <div class="form-group">
          <label for="book-id">BOOK ID</label>
          <input type="text" id="book-id" name="book_id" required>
        </div>
        <div class="form-group">
          <label for="book-title">BOOK TITLE</label>
          <input type="text" id="book-title" name="book_title" required>
        </div>
        <div class="form-group">
          <label for="last-name">LAST NAME</label>
          <input type="text" id="last-name" name="last_name" required>
        </div>
        <div class="form-group">
          <label for="first-name">FIRST NAME</label>
          <input type="text" id="first-name" name="first_name" required>
        </div>
        <div class="form-group">
          <label for="date-borrowed">DATE BORROWED</label>
          <input type="date" id="date-borrowed" name="date_borrowed" required>
        </div>
        <div class="form-group">
          <label for="date-returned">DATE RETURNED</label>
          <input type="date" id="date-returned" name="date_returned">
        </div>
        <div class="form-buttons">
          <button type="submit" class="insert">REQUEST</button>
        </div>
      </div>
    </form>
  </div>

  <script>
    document.getElementById('borrowForm').addEventListener('submit', function(event) {
      event.preventDefault();
      Swal.fire({
        title: 'Success!',
        text: 'Request submitted successfully.',
        icon: 'success',
        confirmButtonText: 'OK'
      });
      // Optionally submit the form after alert:
      // this.submit();
    });
  </script>
</body>
</html>