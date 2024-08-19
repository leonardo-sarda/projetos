// script.js
document.addEventListener("DOMContentLoaded", function () {
  const headers = document.querySelectorAll(".accordion-header");

  headers.forEach((header) => {
    header.addEventListener("click", function () {
      const content = this.nextElementSibling;

      // Toggle current content
      if (content.style.display === "block") {
        content.style.display = "none";
      } else {
        // Hide all contents
        document
          .querySelectorAll(".accordion-content")
          .forEach((c) => (c.style.display = "none"));
        content.style.display = "block";
      }
    });
  });
});
