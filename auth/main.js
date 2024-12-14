// script.js
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("dropdown-toggle");
    const dropdownMenu = document.getElementById("dropdown-menu");

    toggleButton.addEventListener("click", function () {
        dropdownMenu.style.display = 
            dropdownMenu.style.display === "block" ? "none" : "block";
    });

    // Close dropdown if clicking outside
    window.addEventListener("click", function (event) {
        if (!toggleButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = "none";
        }
    });
});
