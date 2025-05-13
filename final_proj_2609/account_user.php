<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - User</title>
    <link rel="stylesheet" href="account_user.css">
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
            <a href="uBorrowRet_u.php">
                <img src="resources\5.png" alt="Borrow/Return Icon">Borrow/Return
            </a>
            <a href="book_catalog_user.php">
                <img src="resources\6.png" alt="Catalog Icon">Book Catalog
            </a>
            <a href="account_user.php" class="active">
                <img src="resources\7.png" alt="Account Icon">Account
            </a>
        </nav>
    </div>

    <div class="main-content">
        <header>
            <h2>ACCOUNT</h2>
        </header>
        <main>
            <div class="form">
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" placeholder="">
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" placeholder="">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="">
                </div>
                <div class="form-buttons">
                    <button class="edit">EDIT</button>
                </div>
            </div>
        </main>
        <footer>
            <button class="logout" onclick="window.location.href='signup.php'">LOGOUT</button>
        </footer>
    </div>
</body>

</html>