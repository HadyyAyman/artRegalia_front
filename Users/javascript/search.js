document.addEventListener("DOMContentLoaded", function () {
  const searchButton = document.getElementById("searchButton");
  const closeSearchButton = document.getElementById("closeSearchButton");
  const navbar = document.querySelector("[data-navbar]");

  searchButton.addEventListener("click", function () {
    navbar.classList.add("navbar-search-active");
    document.getElementById("searchContainer").classList.remove("d-none");
  });

  closeSearchButton.addEventListener("click", function () {
    navbar.classList.remove("navbar-search-active");
    document.getElementById("searchContainer").classList.add("d-none");
  });
});
