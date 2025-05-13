<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="dashboard_user.css"> </head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="resources/BOOKSYTE.png" alt="Booksyte Logo">
        </div>
        <nav>
            <a href="dashboard_user.php" class="active">
                <img src="resources/4.png" alt="Dashboard Icon">Dashboard
            </a>
            <a href="book_borrow_user.php">
                <img src="resources/5.png" alt="Borrow/Return Icon">Borrow/Return
            </a>
            <a href="book_catalog_user.php">
                <img src="resources/6.png" alt="Catalog Icon">Book Catalog
            </a>
            <a href="account_user.php">
                <img src="resources/7.png" alt="Account Icon">Account
            </a>
        </nav>
    </div>

    <div class="main-content">
        <h2>LIBRARY MANAGEMENT SYSTEM</h2>
        <div class="top-section">
            <div class="welcome-header">
                <h3>Welcome back, User!</h3>
                <div class="profile-icon">
                    <img src="" alt="User Profile">
                </div>
            </div>
            <div class="dashboard-cards">
                <div class="card">
                    <h4>Books Borrowed</h4>
                    <p>0</p>
                </div>
                <div class="card">
                    <h4>Next Due Date</h4>
                    <p></p>
                </div>
                <div class="card">
                    <h4>Recently Returned</h4>
                    <p>0</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>