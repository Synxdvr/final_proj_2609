function togglePassword(inputId) {
  const passwordInput = document.getElementById(inputId);
  const icon = passwordInput.parentNode.querySelector(".eye-icon");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    icon.src = "resources/hide.png";
    icon.alt = "Hide Password";
  } else {
    passwordInput.type = "password";
    icon.src = "resources/eye.png";
    icon.alt = "Show Password";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("signupForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      insertUser();
    });

  document
    .getElementById("loginForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      login();
    });
});

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("studentID").addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, "");
  });
});

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("studentID-login")
    .addEventListener("input", function () {
      this.value = this.value.replace(/\D/g, "");
    });
});

function insertUser() {
  const firstName = document.getElementById("firstName").value;
  const lastName = document.getElementById("lastName").value;
  const studentID = document.getElementById("studentID").value;
  const password = document.getElementById("password").value;

  if (!firstName || !lastName || !studentID || !password) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "All fields are required!",
    });
    return;
  }

  $.ajax({
    url: "../database/process/insert_user.php",
    method: "POST",
    data: { firstName, lastName, studentID, password },
    success: function () {
      Swal.fire({
        icon: "success",
        title: "Success",
        text: "User registered successfully!",
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

  document.getElementById("signupForm").reset();
}

function login() {
  const studentID = document.getElementById("studentID-login").value;
  const password = document.getElementById("loginPassword").value;

  if (!studentID || !password) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "All fields are required!",
    });
    return;
  }

  if (studentID === "2364466" && password === "admin123") {
    window.location.href = "dashboard_admin.php";
    return;
  }

  $.ajax({
    url: "../database/process/login.php",
    method: "POST",
    data: { studentID, password },
    success: function () {
      window.location.href = "dashboard_user.php";
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

  document.getElementById("loginForm").reset();
}
