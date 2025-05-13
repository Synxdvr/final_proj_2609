document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("book-id").addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, "");
  });
});

function handleRequest(action) {
  const bookID = document.getElementById("book-id").value;
  const bookTitle = document.getElementById("book-title")?.value || "";
  const lastName = document.getElementById("last-name")?.value || "";
  const firstName = document.getElementById("first-name")?.value || "";
  const dateBorrowed = document.getElementById("date-borrowed")?.value || "";
  const dateReturned = document.getElementById("date-returned")?.value || "";

  // Validate required fields based on action
  if (!bookID) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Book ID is required!",
    });
    return;
  }

  // For insert and update actions, require all fields
  if (
    (action === "insert" || action === "update") &&
    (!bookTitle || !lastName || !firstName || !dateBorrowed)
  ) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please fill all required fields!",
    });
    return;
  }

  const requestData = {
    bookID: bookID,
    bookTitle: bookTitle,
    lastName: lastName,
    firstName: firstName,
    dateBorrowed: dateBorrowed,
    dateReturned: dateReturned,
  };

  // Determine which endpoint to use based on the action
  let endpoint;
  switch (action) {
    case "insert":
      endpoint = "../database/process/insert_request.php";
      break;
    case "update":
      endpoint = "../database/process/update_request.php";
      break;
    case "delete":
      endpoint = "../database/process/delete_request.php";
      break;
    default:
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Invalid action specified",
      });
      return;
  }

  $.ajax({
    url: endpoint,
    method: "POST",
    data: requestData,
    success: function (response) {
      try {
        const data = JSON.parse(response);
        Swal.fire({
          icon: "success",
          title: "Success",
          text: data.success || `Request ${action}d successfully!`,
        });

        // Clear form fields after successful operation
        if (action === "insert" || action === "delete") {
          clearFormFields();
        }
      } catch (e) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: `Request ${action}d successfully!`,
        });
      }
    },
    error: function (xhr) {
      try {
        const response = JSON.parse(xhr.responseText);
        Swal.fire({
          icon: "error",
          title: "Error",
          text: response.error || "An unknown error occurred",
        });
      } catch (e) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "An unexpected error occurred",
        });
      }
    },
  });
}

function clearFormFields() {
  document.getElementById("book-id").value = "";
  document.getElementById("book-title").value = "";
  document.getElementById("last-name").value = "";
  document.getElementById("first-name").value = "";
  document.getElementById("date-borrowed").value = "";
  document.getElementById("date-returned").value = "";
}

// Add function to fetch book details by ID
function fetchBookDetails() {
  const bookID = document.getElementById("book-id").value;

  if (!bookID) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please enter a Book ID first!",
    });
    return;
  }

  $.ajax({
    url: "../database/process/fetch_request.php",
    method: "POST",
    data: { bookID: bookID },
    dataType: "json",
    success: function (data) {
      console.log("Received data:", data);

      if (data.book) {
        document.getElementById("book-title").value =
          data.book.book_title || "";

        // Check if there's an existing request for this book
        if (data.request) {
          document.getElementById("last-name").value =
            data.request.last_name || "";
          document.getElementById("first-name").value =
            data.request.first_name || "";
          document.getElementById("date-borrowed").value =
            data.request.date_borrowed || "";
          document.getElementById("date-returned").value =
            data.request.date_returned || "";
        } else {
          // Clear borrower fields if no existing request
          document.getElementById("last-name").value = "";
          document.getElementById("first-name").value = "";
          document.getElementById("date-borrowed").value = "";
          document.getElementById("date-returned").value = "";
        }
      }
    },
    error: function (xhr) {
      let errorMessage = "Book not found";
      try {
        const response = JSON.parse(xhr.responseText);
        errorMessage = response.error || errorMessage;
      } catch (e) {
        // Use default error message
      }

      Swal.fire({
        icon: "error",
        title: "Error",
        text: errorMessage,
      });
    },
  });
}

function insertRequest() {
  handleRequest("insert");
}

function updateRequest() {
  handleRequest("update");
}

function deleteRequest() {
  handleRequest("delete");
}
