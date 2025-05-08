
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Admin</title>
  <link rel="stylesheet" href="dashboard_admin.css">
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="resources/BOOKSYTE.png" alt="Booksyte Logo">
    </div>
    <nav>
      <a href="dashboard_admin.php" class="active">
        <img src="resources/4.png" alt="Dashboard Icon">Dashboard
      </a>
      <a href="aBorrowRet_a.php">
  <img src="resources\5.png" alt="Borrow/Return Icon">Borrow/Return
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
    <h2>DASHBOARD</h2>
    <div class="dashboard-boxes">
      <div class="dashboard-box">
        <h3>Total Books</h3>
        <p>250</p>
      </div>
      <div class="dashboard-box">
        <h3>Borrowed Books</h3>
        <p>50</p>
      </div>
      <div class="dashboard-box">
        <h3>Available Books</h3>
        <p>200</p>
      </div>
    </div>
  </div>
</body>
</html>