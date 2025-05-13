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
        
        <!-- Welcome Header -->
        <div class="welcome-header">
            <div>
                <h3>Welcome back, User!</h3>
                <p>Here's an overview of your library activity</p>
            </div>
            <img class="profile-img" src="resources/7.png" alt="User Profile">
        </div>
        
        <!-- Quick Links -->
        <div class="quick-links">
            <a href="uBorrowRet_u.php" class="quick-link primary">Borrow a Book</a>
            <a href="uBorrowRet_u.php" class="quick-link">Return Book</a>
            <a href="book_catalog_user.php" class="quick-link">Browse Catalog</a>
        </div>
        
        <!-- Simplified Recommended Books -->
        <div class="dashboard-section">
            <div class="section-header">
                <h3 class="section-title">Recommended for You</h3>
                <a href="book_catalog_user.php" class="view-all">See All</a>
            </div>
            <div class="book-recommendations">
                <div class="book-item">
                    <img class="recom-img1" src="resources\The_Hunger_Games.jpg" alt="User Profile">
                    <div class="book-title">The Hunger Games</div>
                    <div class="book-author">Suzanne Collins</div>
                </div>
                <div class="book-item">
                    <img class="recom-img2" src="resources\say.jpg" alt="User Profile">
                    <div class="book-title">Say you'll Remember Me</div>
                    <div class="book-author">Abby Jimenez</div>
                </div>
                <div class="book-item">
                    <img class="recom-img3" src="resources\fall.jpg" alt="User Profile">
                    <div class="book-title">The Fall Risk</div>
                    <div class="book-author">Abby Jimenez</div>
                </div>
                <div class="book-item">
                    <img class="recom-img4" src="resources\Rain.jpg" alt="User Profile">
                    <div class="book-title">The Rain in España</div>
                    <div class="book-author">4Reuminct</div>
                </div>
                <div class="book-item">
                    <img class="recom-img5" src="resources\harry.jpg" alt="User Profile">
                    <div class="book-title">Harry Potter & The Deathly Hollows</div>
                    <div class="book-author">J.K. Rowling</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>