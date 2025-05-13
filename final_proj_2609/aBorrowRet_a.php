<?php include("database/process/db_connection.php"); ?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booksyte Borrow/Return - Admin</title>
    <link rel="stylesheet" href="aBorrowRet_a.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      
      <h1 class="text-center text-white bg-dark col-md-12">PENDING LIST</h1>
      <table class="table table-bordered col-md-12">
        <thead>
          <tr>
            <th scope="col">Book ID</th>
            <th scope="col">Book Title</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Date Borrowed</th>
            <th scope="col">Date Returned</th> 
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          // Check if table exists
          $tableCheck = mysqli_query($conn, "SHOW TABLES LIKE 'request_tbl'");
          if (mysqli_num_rows($tableCheck) == 0) {
            echo "<tr><td colspan='8'>The 'request_tbl' table does not exist!</td></tr>";
          } else {
            $query = "SELECT * FROM request_tbl WHERE status = 'pending' ORDER BY id ASC";
            $result = mysqli_query($conn, $query);
            
            if (!$result) {
              echo "<tr><td colspan='8'>Error executing query: " . mysqli_error($conn) . "</td></tr>";
            } else if (mysqli_num_rows($result) == 0) {
              echo "<tr><td colspan='8'>No pending requests found</td></tr>";
            } else {
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <th scope="row"><?php echo $row['book_id']; ?></th>
                  <td><?php echo $row['book_title']; ?></td>
                  <td><?php echo $row['last_name']; ?></td>
                  <td><?php echo $row['first_name']; ?></td>
                  <td><?php echo $row['date_borrowed']; ?></td>
                  <td><?php echo $row['date_returned']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td>
                    <form action="" method="POST">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                      <input type="submit" name="approve" value="approve" class="btn btn-success btn-sm"> 
                      <input type="submit" name="delete" value="delete" class="btn btn-danger btn-sm"> 
                    </form>
                  </td>
                </tr>
                <?php
              }
            }
          }
          ?>
        </tbody>
      </table>
      
      <?php 
      if(isset($_POST['approve'])){
        $id = $_POST['id'];
        $select = "UPDATE request_tbl SET status = 'approved' WHERE id = '$id'";
        $result = mysqli_query($conn, $select);
        
        if($result) {
          echo "<script>
            Swal.fire({
              title: 'Success!',
              text: 'Request approved successfully.',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(() => {
              window.location = 'aBorrowRet_a.php';
            });
          </script>";
        } else {
          echo "<script>
            Swal.fire({
              title: 'Error!',
              text: 'Failed to approve request: " . mysqli_error($conn) . "',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          </script>";
        }
      }

      if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $select = "DELETE FROM request_tbl WHERE id = '$id'";
        $result = mysqli_query($conn, $select);
        
        if($result) {
          echo "<script>
            Swal.fire({
              title: 'Success!',
              text: 'Request deleted successfully.',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(() => {
              window.location = 'aBorrowRet_a.php';
            });
          </script>";
        } else {
          echo "<script>
            Swal.fire({
              title: 'Error!',
              text: 'Failed to delete request: " . mysqli_error($conn) . "',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          </script>";
        }
      }
      ?>
      
      <h1 class="text-center text-white bg-success col-md-12">APPROVED LIST</h1>
      <table class="table table-bordered col-md-12">
        <thead>
          <tr>
            <th scope="col">Book ID</th>
            <th scope="col">Book Title</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Date Borrowed</th>
            <th scope="col">Date Returned</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          // Check if table exists
          $tableCheck = mysqli_query($conn, "SHOW TABLES LIKE 'request_tbl'");
          if (mysqli_num_rows($tableCheck) == 0) {
            echo "<tr><td colspan='8'>The 'request_tbl' table does not exist!</td></tr>";
          } else {
            $query = "SELECT * FROM request_tbl WHERE status = 'approved' ORDER BY id ASC";
            $result = mysqli_query($conn, $query);
            
            if (!$result) {
              echo "<tr><td colspan='8'>Error executing query: " . mysqli_error($conn) . "</td></tr>";
            } else if (mysqli_num_rows($result) == 0) {
              echo "<tr><td colspan='8'>No approved requests found</td></tr>";
            } else {
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <th scope="row"><?php echo $row['book_id']; ?></th>
                  <td><?php echo $row['book_title']; ?></td>
                  <td><?php echo $row['last_name']; ?></td>
                  <td><?php echo $row['first_name']; ?></td>
                  <td><?php echo $row['date_borrowed']; ?></td>
                  <td><?php echo $row['date_returned']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td>
                    <form action="" method="POST">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                      <input type="submit" name="return" value="return" class="btn btn-primary btn-sm">
                      <input type="submit" name="remove" value="remove" class="btn btn-danger btn-sm">
                    </form>
                  </td>
                </tr>
                <?php
              }
            }
          }
          ?>
        </tbody>
      </table>
      
      <?php 
      if(isset($_POST['return'])){
        $id = $_POST['id'];
        $select = "UPDATE request_tbl SET status = 'returned', date_returned = CURDATE() WHERE id = '$id'";
        $result = mysqli_query($conn, $select);
        
        if($result) {
          echo "<script>
            Swal.fire({
              title: 'Success!',
              text: 'Book marked as returned successfully.',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(() => {
              window.location = 'aBorrowRet_a.php';
            });
          </script>";
        } else {
          echo "<script>
            Swal.fire({
              title: 'Error!',
              text: 'Failed to return book: " . mysqli_error($conn) . "',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          </script>";
        }
      }

      if(isset($_POST['remove'])){
        $id = $_POST['id'];
        $select = "DELETE FROM request_tbl WHERE id = '$id'";
        $result = mysqli_query($conn, $select);
        
        if($result) {
          echo "<script>
            Swal.fire({
              title: 'Success!',
              text: 'Record removed successfully.',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(() => {
              window.location = 'aBorrowRet_a.php';
            });
          </script>";
        } else {
          echo "<script>
            Swal.fire({
              title: 'Error!',
              text: 'Failed to remove record: " . mysqli_error($conn) . "',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          </script>";
        }
      }
      ?>
      <?php
      // Handle form submissions for Insert/Update/Delete
      if(isset($_POST['insert'])) {
        // Get form values
        $book_id = $_POST['book_id'];
        $book_title = $_POST['book_title'];
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $date_borrowed = $_POST['date_borrowed'];
        $date_returned = $_POST['date_returned'] ? "'{$_POST['date_returned']}'" : "NULL";
        
        // Insert into database
        $sql = "INSERT INTO request_tbl (book_id, book_title, last_name, first_name, date_borrowed, date_returned, status) 
                VALUES ('$book_id', '$book_title', '$last_name', '$first_name', '$date_borrowed', $date_returned, 'approved')";
        
        $result = mysqli_query($conn, $sql);
        
        if($result) {
          echo "<script>
            Swal.fire({
              title: 'Success!',
              text: 'Record inserted successfully.',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(() => {
              window.location = 'aBorrowRet_a.php';
            });
          </script>";
        } else {
          echo "<script>
            Swal.fire({
              title: 'Error!',
              text: 'Failed to insert record: " . mysqli_error($conn) . "',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          </script>";
        }
      }
      
      if(isset($_POST['update'])) {
        // Get form values
        $book_id = $_POST['book_id'];
        $book_title = $_POST['book_title'];
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $date_borrowed = $_POST['date_borrowed'];
        $date_returned = $_POST['date_returned'] ? "'{$_POST['date_returned']}'" : "NULL";
        
        // Update database
        $sql = "UPDATE request_tbl SET 
                book_title = '$book_title', 
                last_name = '$last_name', 
                first_name = '$first_name', 
                date_borrowed = '$date_borrowed', 
                date_returned = $date_returned 
                WHERE book_id = '$book_id'";
        
        $result = mysqli_query($conn, $sql);
        
        if($result) {
          echo "<script>
            Swal.fire({
              title: 'Success!',
              text: 'Record updated successfully.',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(() => {
              window.location = 'aBorrowRet_a.php';
            });
          </script>";
        } else {
          echo "<script>
            Swal.fire({
              title: 'Error!',
              text: 'Failed to update record: " . mysqli_error($conn) . "',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          </script>";
        }
      }
      
      if(isset($_POST['delete_record'])) {
        // Get book_id
        $book_id = $_POST['book_id'];
        
        // Delete from database
        $sql = "DELETE FROM request_tbl WHERE book_id = '$book_id'";
        
        $result = mysqli_query($conn, $sql);
        
        if($result) {
          echo "<script>
            Swal.fire({
              title: 'Success!',
              text: 'Record deleted successfully.',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(() => {
              window.location = 'aBorrowRet_a.php';
            });
          </script>";
        } else {
          echo "<script>
            Swal.fire({
              title: 'Error!',
              text: 'Failed to delete record: " . mysqli_error($conn) . "',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          </script>";
        }
      }
      ?>
    </div>
  </body>
</html>