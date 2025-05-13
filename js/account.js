document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("student-id").addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, "");
  });
});

function updateUser() {
  const studentID = document.getElementById("student-id").value;
  const firstName = document.getElementById("first-name").value;
  const lastName = document.getElementById("last-name").value;
  const password = document.getElementById("password").value;

  if (!studentID || !firstName || !lastName || !password) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please fill all fields!",
    });
    return;
  }

  $.ajax({
    url: "../database/process/update_user.php",
    method: "POST",
    data: { studentID, firstName, lastName, password },
    success: function () {
      Swal.fire({
        icon: "success",
        title: "Success",
        text: "User updated successfully!",
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
