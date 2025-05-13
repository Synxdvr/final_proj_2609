<?php include("database/process/db_connection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booksyte Borrow/Return</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/request.js"></script>

  <link rel="stylesheet" href="uBorrowRet_u.css">
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
      <a href="uBorrowRet_u.php" class="active">
        <img src="resources\5.png" alt="Borrow/Return Icon">Borrow/Return
      </a>
      <a href="book_catalog_user.php">
        <img src="resources\6.png" alt="Catalog Icon">Book Catalog
      </a>
      <a href="account_user.php">
        <img src="resources\7.png" alt="Account Icon">Account
      </a>
    </nav>
  </div>
  <div class="main-content">
    <h2>BORROW/RETURN</h2>
    
    <?php
    // Process form submission
    if (isset($_POST['request'])) {
      $book_id = $_POST['book_id'];
      $book_title = $_POST['book_title'];
      $last_name = $_POST['last_name'];
      $first_name = $_POST['first_name'];
      $date_borrowed = $_POST['date_borrowed'];
      $date_returned = $_POST['date_returned'];

      // Insert into pending_list table
      $sql = "INSERT INTO pending_list (book_id, book_title, last_name, first_name, date_borrowed, date_returned, status) 
              VALUES ('$book_id', '$book_title', '$last_name', '$first_name', '$date_borrowed', '$date_returned', 'pending')";
      
      $result = mysqli_query($conn, $sql);
      
      if ($result) {
        echo "<script>
          Swal.fire({
            title: 'Success!',
            text: 'Request submitted successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
          });
        </script>";
      } else {
        echo "<script>
          Swal.fire({
            title: 'Error!',
            text: 'Something went wrong: " . mysqli_error($conn) . "',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        </script>";
      }
    }
    ?>
    
    <form method="POST" action="">
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
          <input type="text" id="book-title" name="book_title" placeholder="Enter Book Title" required>
        </div>
        <div class="form-group">
          <label for="last-name">LAST NAME</label>
          <input type="text" id="last-name" name="last_name" placeholder="Enter Last Name" required>
        </div>
        <div class="form-group">
          <label for="first-name">FIRST NAME</label>
          <input type="text" id="first-name" name="first_name" placeholder="Enter First Name" required>
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
          <button type="submit" name="request" class="request">REQUEST</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
