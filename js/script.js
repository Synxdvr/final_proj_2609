function insertBook() {
  const bookId = document.getElementById("book-id").value;
  const bookTitle = document.getElementById("book-title").value;
  const bookAuthor = document.getElementById("author").value;


  if (!bookId || !bookTitle || !bookAuthor) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please fill all fields!",
    });
    return;
  }

  $.ajax({
    url: "../database/process/insert_book.php",
    method: "POST",
    data: { bookId, bookTitle, bookAuthor },
    success: function () {
      Swal.fire({
        icon: "success",
        title: "Success",
        text: "Book inserted successfully!",
      });
    },
    error: function (xhr) {
      const response = JSON.parse(xhr.responseText);
      Swal.fire({
        icon: "error",
        title: "Error",
        text: response.error,
      });
    },
  });
}

function updateBook() {
  const bookId = document.getElementById("book-id").value;
  const bookTitle = document.getElementById("book-title").value;
  const bookAuthor = document.getElementById("author").value;

  if (!bookId || !bookTitle || !bookAuthor) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please fill all fields!",
    });
    return;
  }

  $.ajax({
    url: "../database/process/update_book.php",
    method: "POST",
    data: { bookId, bookTitle, bookAuthor },
    success: function () {
      Swal.fire({
        icon: "success",
        title: "Success",
        text: "Book updated successfully!",
      });
    },
    error: function (xhr) {
      const response = JSON.parse(xhr.responseText);
      Swal.fire({
        icon: "error",
        title: "Error",
        text: response.error,
      });
    },
  });
}

function deleteBook() {
  const bookId = document.getElementById("book-id").value;

  if (!bookId) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Book ID is required!",
    });
    return;
  }

  $.ajax({
    url: "../database/process/delete_book.php",
    method: "POST",
    data: { bookId },
    success: function () {
      Swal.fire({
        icon: "success",
        title: "Success",
        text: "Book deleted successfully!",
      });
    },
    error: function (xhr) {
      const response = JSON.parse(xhr.responseText);
      Swal.fire({
        icon: "error",
        title: "Error",
        text: response.error,
      });
    },
  });
}
