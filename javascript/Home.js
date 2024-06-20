//============================
//split landing page function
//============================

var right = document.querySelector(".right");
var container = document.querySelector(".split-landing");

right.addEventListener("mouseenter", function () {
  container.classList.add("hover-right");
});

right.addEventListener("mouseleave", function () {
  container.classList.remove("hover-right");
});

//=======================================
//menu overlay, open and close functions
//=======================================
const overlay = document.querySelector("[data-overlay]");
const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navbar = document.querySelector("[data-navbar]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");

const navElems = [overlay, navOpenBtn, navCloseBtn];

for (let i = 0; i < navElems.length; i++) {
  navElems[i].addEventListener("click", function () {
    navbar.classList.toggle("active");
    overlay.classList.toggle("active");
  });
}

var topPage = document.getElementById("top");

topPage.addEventListener("click", function () {
  document.scrollTop = 0;
  document.documentElement.scrollTop = 0;
});
