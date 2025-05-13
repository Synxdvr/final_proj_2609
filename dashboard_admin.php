<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="dashboard_admin.css"> </head>
<body>
    <?php
    // Include database connection
    include 'database/process/db_connection.php';
    
    // Get total books count
    $totalBooks = 0;
    try {
        $sql = "SELECT COUNT(*) as total FROM books_tbl";
        $result = $conn->query($sql);
        
        if ($result && $row = $result->fetch_assoc()) {
            $totalBooks = $row['total'];
        }
    } catch (Exception $e) {
        // If there's an error, leave count at 0
    }
    
    $conn->close();
    ?>
    <div class="sidebar">
        <div class="logo">
            <img src="resources/BOOKSYTE.png" alt="Booksyte Logo">
        </div>
        <nav>
            <a href="dashboard_admin.php" class="active">
                <img src="resources/4.png" alt="Dashboard Icon">Dashboard
            </a>
            <a href="aBorrowRet_a.php">
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
        <h2>LIBRARY MANAGEMENT SYSTEM</h2>
        <div class="top-section">
            <div class="welcome-header">
                <h3>Welcome back, Admin!</h3>
                <div class="profile-icon">
                    <img src="resources\7.png" alt="User Profile">
                </div>
            </div>
               <div class="dashboard-cards">
                    <div class="card">
                        <h4>Total Books</h4>
                        <p id="book-count"><?php echo $totalBooks; ?></p>
                    </div>

                  <div class="card">
                      <h4>Books Borrowed</h4>
                      <p>0</p>
                  </div>
                  <div class="card">
                      <h4>Total Requests</h4>
                      <p>0</p>
                  </div>
                  <div class="big-card">
                      <h4>Books Borrowed per Month</h4>
                      <p>0</p>
                  </div>
              </div>
        </div>
    </div>
</body>
</html>