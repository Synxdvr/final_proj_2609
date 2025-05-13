
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booksyte Catalog - Admin</title>
  <link rel="stylesheet" href="bookc_admin.css">
  <script src="/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="resources\BOOKSYTE.png" alt="Booksyte Logo">
    </div>
    <nav>
      <a href="dashboard_admin.php">
        <img src="resources\4.png" alt="Dashboard Icon">Dashboard
      </a>
      <a href="aBorrowRet_a.php">
        <img src="resources\5.png" alt="Borrow/Return Icon">Borrow/Return
      </a>
      <a href="book_catalog_admin.php" class="active">
        <img src="resources\6.png" alt="Catalog Icon">Book Catalog
      </a>
      <a href="account_admin.php">
        <img src="resources\7.png" alt="Account Icon">Account
      </a>
    </nav>
  </div>
  
  <div class="main-content">
    <h2>CATALOG</h2>
    <div class="form">
      <div class="form-group">
        <label for="book-id">BOOK ID</label>
        <input type="text" id="book-id" placeholder="Enter Book ID">
      </div>
      <div class="form-group">
        <label for="book-title">BOOK TITLE</label>
        <input type="text" id="book-title" placeholder="Enter Book Title">
      </div>
      <div class="form-group">
        <label for="author">AUTHOR</label>
        <input type="text" id="author" placeholder="Enter Author Name">
      </div>
      <div class="form-buttons">
        <button class="insert" onclick="insertBook()">INSERT</button>
        <button class="update" onclick="updateBook()">UPDATE</button>
        <button class="delete" onclick="deleteBook()">DELETE</button>
      </div>
    </div>
  </div>

  <script>
    // Add some subtle animations and feedback when interacting with the form
    $(document).ready(function() {
      // Focus effect for input fields
      $('.form-group input').focus(function() {
        $(this).parent().addClass('active');
      }).blur(function() {
        $(this).parent().removeClass('active');
      });
      
      // Button hover effect with subtle scale
      $('.form-buttons button').hover(
        function() {
          $(this).css('transform', 'translateY(-2px) scale(1.03)');
        },
        function() {
          $(this).css('transform', 'translateY(0) scale(1)');
        }
      );
      
      // Form hover effect
      $('.form').hover(
        function() {
          $(this).css('transform', 'translateY(-5px)');
        },
        function() {
          $(this).css('transform', 'translateY(0)');
        }
      );
    });

    // Enhanced feedback for form actions
    function insertBook() {
      // Get input values
      const bookId = $('#book-id').val();
      const bookTitle = $('#book-title').val();
      const author = $('#author').val();
      
      // Basic validation
      if(!bookId || !bookTitle || !author) {
        Swal.fire({
          icon: 'warning',
          title: 'Missing Information',
          text: 'Please fill in all fields before inserting a book',
          confirmButtonColor: '#28d19c'
        });
        return;
      }
      
      // Here you would add your AJAX call to insert the book
      // For demo purposes, we'll just show a success message
      Swal.fire({
        icon: 'success',
        title: 'Book Added',
        text: `"${bookTitle}" has been added to the catalog`,
        confirmButtonColor: '#28d19c'
      });
      
      // Clear form fields
      clearForm();
    }
    
    function updateBook() {
      // Get book ID
      const bookId = $('#book-id').val();
      
      if(!bookId) {
        Swal.fire({
          icon: 'warning',
          title: 'Missing Book ID',
          text: 'Please enter a Book ID to update',
          confirmButtonColor: '#4d5d75'
        });
        return;
      }
      
      // Here you would add your AJAX call to update the book
      // For demo purposes, we'll just show a success message
      Swal.fire({
        icon: 'success',
        title: 'Book Updated',
        text: `Book with ID ${bookId} has been updated`,
        confirmButtonColor: '#4d5d75'
      });
    }
    
    function deleteBook() {
      // Get book ID
      const bookId = $('#book-id').val();
      
      if(!bookId) {
        Swal.fire({
          icon: 'warning',
          title: 'Missing Book ID',
          text: 'Please enter a Book ID to delete',
          confirmButtonColor: '#ff6b6b'
        });
        return;
      }
      
      // Confirm deletion
      Swal.fire({
        title: 'Are you sure?',
        text: `You are about to delete book with ID ${bookId}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ff6b6b',
        cancelButtonColor: '#4d5d75',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          // Here you would add your AJAX call to delete the book
          // For demo purposes, we'll just show a success message
          Swal.fire({
            icon: 'success',
            title: 'Book Deleted',
            text: `Book with ID ${bookId} has been removed from the catalog`,
            confirmButtonColor: '#ff6b6b'
          });
          
          // Clear form fields
          clearForm();
        }
      });
    }
    
    function clearForm() {
      $('#book-id').val('');
      $('#book-title').val('');
      $('#author').val('');
    }
  </script>
</body>
</html>
