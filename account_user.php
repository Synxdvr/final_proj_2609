<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - User</title>
    <link rel="stylesheet" href="account_user.css">
    <script src="js/account.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <label for="student-id">Student ID</label>
                    <input type="text" id="student-id" placeholder="">
                </div>
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" placeholder="">
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" placeholder="">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="">
                </div>
                <div class="form-buttons">
                    <button class="edit" onclick="updateUser()">EDIT</button>
                </div>
            </div>
        </main>
        <footer>
            <button class="logout" onclick="window.location.href='signup.php'">LOGOUT</button>
        </footer>
    </div>
</body>

</html>