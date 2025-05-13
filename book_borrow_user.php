
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booksyte Borrow/Return</title>
  
  <link rel="stylesheet" href="bookb_user.css">
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
      <a href="book_borrow_user.php" class="active">
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
    
    <div class="card">
      <div class="form">
        <div class="form-row">
          <div class="form-group">
            <label for="book-id">BOOK ID</label>
            <input type="text" id="book-id" placeholder="Enter Book ID">
          </div>
          
          <div class="form-group">
            <label for="book-title">BOOK TITLE</label>
            <input type="text" id="book-title" placeholder="Enter Book Title">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group">
            <label for="last-name">LAST NAME</label>
            <input type="text" id="last-name" placeholder="Enter Last Name">
          </div>
          
          <div class="form-group">
            <label for="first-name">FIRST NAME</label>
            <input type="text" id="first-name" placeholder="Enter First Name">
          </div>
        </div>
        
        <div class="date-inputs">
          <div class="form-group">
            <label for="date-borrowed">DATE BORROWED</label>
            <input type="date" id="date-borrowed">
          </div>
          
          <div class="form-group">
            <label for="date-returned">DATE RETURNED</label>
            <input type="date" id="date-returned">
          </div>
        </div>
        
        <div class="form-buttons">
          <button class="btn btn-primary">REQUEST</button>
          <button class="btn btn-secondary">CANCEL</button>
        </div>
        
        <div class="status-badge pending">Pending Approval</div>
      </div>
    </div>
  </div>
  
  <script>
    document.querySelector('.btn-primary').addEventListener('click', function(event) {
      event.preventDefault();
      
      // Check if SweetAlert is available (you'd need to include the library)
      if (typeof Swal !== 'undefined') {
        Swal.fire({
          title: 'Success!',
          text: 'Request submitted successfully.',
          icon: 'success',
          confirmButtonText: 'OK'
        });
      } else {
        alert('Request submitted successfully!');
      }
      
      // Toggle the badge from pending to approved
      const badge = document.querySelector('.status-badge');
      badge.classList.remove('pending');
      badge.classList.add('approved');
      badge.textContent = 'Approved';
    });
  </script>
</body>
</html>