<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booksyte Catalog</title>
    <link rel="stylesheet" href="bookc_user.css">
    <script src="js/search.js"></script>
    <style> 
.search-bar {
  display: flex;
  justify-content: center;
  padding: 1rem;
}

.search-bar input {
  padding: 0.5rem;
  width: 70%;
  border-radius: 30px 0 0 30px;
  border: 1px solid #bdc3c7;
}

.search-bar button {
  background-color: #34495e;
  color: white;
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 0 30px 30px 0;
  cursor: pointer;
}



.book-card { 
  background: #f9f5f3; 
  color: #2c3e50;      
  margin: 1rem;
  padding: 1.5rem;   
  border-radius: 8px; 
  box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1); 
  border: 1px solid #ddd; 
}

.book-header { /* Renamed from employee-header */
  margin-bottom: 1rem;
  border-bottom: 2px solid #e74c3c;
  padding-bottom: 0.5rem;
}

.book-header h3 { /* Book Title */
  font-weight: bold;
  font-size: 1.3rem;
  margin-bottom: 0.2rem;
  

}

.book-header small { /* Author */
  color: #777;
  font-style: italic;

}

.book-details { /* Renamed from employee-details */
  margin-top: 0.5rem;
  background: white;
  padding: 0.8rem;   /* Changed to match your design */
  border-radius: 5px;
  font-size: 0.95rem; /* Changed to match your design */
}

.book-details table { /* No change */
  width: 100%;
  margin-bottom: 40px;

  
}

.book-details td:first-child { /* No change */
  font-weight: bold;
  padding-right: 0.5rem;
}

.book-table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    margin: 20px 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);

}

.book-table th,
.book-table td {
    padding: 12px 15px;
    text-align: left;
}

.book-table thead {
    background-color: #131726;
    color: white;
}

.book-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.book-table tbody tr:hover {
    background-color: #f1f1f1;
}
    </style>

</head>
<body>
    <div class="sidebar">
        <div class="logo"><img src="resources/BOOKSYTE.png" alt="Booksyte Logo"></div>
        <nav>
            <a href="dashboard_user.php"><img src="resources/4.png">Dashboard</a>
            <a href="uBorrowRet_u.php"><img src="resources/5.png">Borrow/Return</a>
            <a href="book_catalog_user.php" class="active"><img src="resources/6.png">Book Catalog</a>
            <a href="account_user.php"><img src="resources/7.png">Account</a>
        </nav>
    </div>

    <div class="main-content">
        <h2>BOOK CATALOG</h2>

        <div class="search-bar">
          <input type="text" id="searchInput" placeholder="Search Book..." />
          <button id="searchButton">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              height="25px"
              viewBox="0 0 24 24"
              stroke-width="2"
              stroke="currentColor"
              class="size-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
              />
            </svg>
          </button>
        </div>

        <div class="filters" id="filters"></div>

        <main id="employeeContainer">  </main>

    </div>

</body>
</html>