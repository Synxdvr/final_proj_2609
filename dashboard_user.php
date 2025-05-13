<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href=dashboard_user.css>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="resources/BOOKSYTE.png" alt="Booksyte Logo">
        </div>
        <nav>
            <a href="dashboard_user.php" class="active">
                <img src="resources/4.png" alt="Dashboard Icon">Dashboard
            </a>
            <a href="uBorrowRet_u.php">
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
                    <img src="/api/placeholder/55/55" alt="User Profile">
                </div>
            </div>
            <div class="dashboard-cards">
                <div class="card">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H3V5h18v14zM5 10h9v2H5zm0-4h9v2H5zm0 8h9v2H5zm14-4h-4v-2h4zm0-4h-4V6h4zm0 8h-4v-2h4z"/>
                        </svg>
                    </div>
                    <h4>Books Borrowed</h4>
                    <p id="book-count"><?php echo $totalBooks; ?></p>
                    <div class="card-info">Total books in your possession</div>
                    <div class="card-progress">
                        <div class="card-progress-bar"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V9h14v10zm0-12H5V5h14v2zM7 11h5v5H7v-5z"/>
                        </svg>
                    </div>
                    <h4>Total Requests</h4>
                        <p id="Requests-count"><?php echo $totalRequest; ?></p>
                    <div class="card-info">No upcoming due dates</div>
                    <div class="card-progress">
                        <div class="card-progress-bar"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM9 4h6v5H9V4zm9 16H6V4h1v5c0 1.1.9 2 2 2h6c1.1 0 2-.9 2-2V4h1v16z"/>
                            <path d="M14 15h-4v-2h4v2zm0-4h-4v-2h4v2z"/>
                        </svg>
                    </div>
                    <h4>Recently Returned</h4>
                    <p>0</p>
                    <div class="card-info">Books returned in the last 30 days</div>
                    <div class="card-progress">
                        <div class="card-progress-bar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>