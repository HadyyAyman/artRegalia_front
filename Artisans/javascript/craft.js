function sortDropDown() {
  const sortingDrop = document.addEventListener(
    "DOMContentLoaded",
    function () {
      // Get all dropdown items
      var dropdownItems = document.querySelectorAll(".sort-dropdown-item");
      // Get the dropdown button
      var dropdownButton = document.getElementById("dropdownMenuButton1");

      // Add click event to each dropdown item
      dropdownItems.forEach(function (item) {
        item.addEventListener("click", function () {
          // Change button text to the clicked item's text
          dropdownButton.textContent = this.textContent;
        });
      });
    }
  );
}

function brandFilterDropDown() {
  const FilterBrandDrop = document.addEventListener(
    "DOMContentLoaded",
    function () {
      const toggleDropdownButton = document.querySelector(".toggle-dropdown");
      const dropdownMenuContainer = document.querySelector(
        ".dropdown-menu-container"
      );

      toggleDropdownButton.addEventListener("click", function () {
        // Toggle visibility of the dropdown container
        dropdownMenuContainer.classList.toggle("d-none");
        // Toggle the icon direction
        this.querySelector("i").classList.toggle("fa-plus");
        this.querySelector("i").classList.toggle("fa-minus");
      });
    }
  );
}

function categoryDropDown() {
  document.addEventListener("DOMContentLoaded", function () {
    const toggleCategoryButton = document.querySelector(
      ".toggle-dropdown-category"
    );
    const categoryItems = document.querySelectorAll("filter-dropdown-item");
    const showMoreLink = document.getElementById("toggleCategories");
    let categoryExpanded = false;

    toggleCategoryButton.addEventListener("click", function () {
      // Toggle visibility of the dropdown container
      this.nextElementSibling.classList.toggle("d-none");
      // Toggle the icon direction
      this.querySelector("i").classList.toggle("fa-plus");
      this.querySelector("i").classList.toggle("fa-minus");
    });

    showMoreLink.addEventListener("click", function (e) {
      e.preventDefault();
      if (!categoryExpanded) {
        categoryItems.forEach((item, index) => {
          if (index >= 10) item.style.display = "block";
        });
        showMoreLink.textContent = "Show Less";
        categoryExpanded = true;
      } else {
        categoryItems.forEach((item, index) => {
          if (index >= 10) item.style.display = "none";
        });
        showMoreLink.textContent = "Show More";
        categoryExpanded = false;
      }
    });
  });
}

function subCategoryDropDown() {
  document.addEventListener("DOMContentLoaded", function () {
    const toggleCategoryButton = document.querySelector(
      ".toggle-dropdown-subcategory"
    );
    const categoryItems = document.querySelectorAll("filter-dropdown-item");
    const showMoreLink = document.getElementById("toggleSubCategories");
    let categoryExpanded = false;

    toggleCategoryButton.addEventListener("click", function () {
      // Toggle visibility of the dropdown container
      this.nextElementSibling.classList.toggle("d-none");
      // Toggle the icon direction
      this.querySelector("i").classList.toggle("fa-plus");
      this.querySelector("i").classList.toggle("fa-minus");
    });

    showMoreLink.addEventListener("click", function (e) {
      e.preventDefault();
      if (!categoryExpanded) {
        categoryItems.forEach((item, index) => {
          if (index >= 10) item.style.display = "block";
        });
        showMoreLink.textContent = "Show Less";
        categoryExpanded = true;
      } else {
        categoryItems.forEach((item, index) => {
          if (index >= 10) item.style.display = "none";
        });
        showMoreLink.textContent = "Show More";
        categoryExpanded = false;
      }
    });
  });
}

function ratingDropDown() {
  document.addEventListener("DOMContentLoaded", function () {
    const toggleCategoryButton = document.querySelector(
      ".toggle-dropdown-rating"
    );
    const categoryItems = document.querySelectorAll("filter-dropdown-item");
    const showMoreLink = document.getElementById("toggleRating");
    let categoryExpanded = false;

    toggleCategoryButton.addEventListener("click", function () {
      // Toggle visibility of the dropdown container
      this.nextElementSibling.classList.toggle("d-none");
      // Toggle the icon direction
      this.querySelector("i").classList.toggle("fa-plus");
      this.querySelector("i").classList.toggle("fa-minus");
    });
  });
}

function priceDropDown() {
  document.addEventListener("DOMContentLoaded", function () {
    const toggleCategoryButton = document.querySelector(
      ".toggle-dropdown-price"
    );
    const categoryItems = document.querySelectorAll("filter-dropdown-item");
    const showMoreLink = document.getElementById("togglePrice");
    let categoryExpanded = false;

    toggleCategoryButton.addEventListener("click", function () {
      // Toggle visibility of the dropdown container
      this.nextElementSibling.classList.toggle("d-none");
      // Toggle the icon direction
      this.querySelector("i").classList.toggle("fa-plus");
      this.querySelector("i").classList.toggle("fa-minus");
    });
  });
}

function showMore() {
  document.addEventListener("DOMContentLoaded", function () {
    const showMoreLink = document.getElementById("toggleBrands");
    const brandItems = document.querySelectorAll(".brand-dropdown-item");
    let expanded = false;

    showMoreLink.addEventListener("click", function (e) {
      e.preventDefault(); // Prevent the link from changing the URL
      if (!expanded) {
        // Show all brands
        brandItems.forEach((item, index) => {
          if (index >= 10) item.style.display = "block";
        });
        showMoreLink.textContent = "Show Less";
        expanded = true;
      } else {
        // Hide extra brands
        brandItems.forEach((item, index) => {
          if (index >= 10) item.style.display = "none";
        });
        showMoreLink.textContent = "Show More";
        expanded = false;
      }
    });
  });
}

sortDropDown();
brandFilterDropDown();
categoryDropDown();
subCategoryDropDown();
ratingDropDown();
priceDropDown();
showMore();
