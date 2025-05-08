document.addEventListener("DOMContentLoaded", () => {
    fetchBooks();

    const searchInput = document.getElementById("searchInput");
    const searchButton = document.querySelector(".search-bar button");

    searchButton.addEventListener("click", () => {
        const searchQuery = searchInput.value.trim();
        fetchBooks(searchQuery);
    });

    searchInput.addEventListener("input", () => {
        const searchQuery = searchInput.value.trim();
        fetchBooks(searchQuery);
    });
});

function fetchBooks(searchQuery = "") {
    const url = `http://localhost:3000/database/process/search_book.php${searchQuery ? `?search=${encodeURIComponent(searchQuery)}` : ""}`;

    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("employeeContainer").innerHTML = data;
        })
        .catch((error) => {
            console.error("Error fetching books:", error);
        });
}