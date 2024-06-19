function changeImage(imageSrc) {
  document.getElementById("mainImage").src = imageSrc;
}

function openTab(evt, tabName) {
  var i, tabContent, tabLink;
  tabContent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabContent.length; i++) {
    tabContent[i].style.display = "none";
  }
  tabLink = document.getElementsByClassName("tablink");
  for (i = 0; i < tabLink.length; i++) {
    tabLink[i].className = tabLink[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

function changeColor(color) {
  var imageMap = {
    black: [
      "/images/home.jpg",
      "/images/home1.jpg",
      "/images/craft.jpg",
      "/images/craftart.jpg",
    ],
    red: [
      "/images/decor.jpg",
      "/images/decor1.jpg",
      "/images/artist.jpg",
      "/images/artist.jpg",
    ],
    grey: [
      "/images/bags.jpg",
      "/images/bag.jpg",
      "/images/craft.jpg",
      "/images/craft.jpg",
    ],
    simone: [
      "/images/craftart.jpg",
      "/images/craftart.jpg",
      "/images/craftart.jpg",
      "/images/craftart.jpg",
    ],
  };

  var images = imageMap[color];
  if (images) {
    document.getElementById("mainImage").src = images[0];
    var smallImages = document.querySelectorAll(".small-images img");
    for (var i = 0; i < smallImages.length; i++) {
      smallImages[i].src = images[i];
      smallImages[i].setAttribute(
        "onclick",
        'changeImage("' + images[i] + '")'
      );
    }
  }
}

function colorSelector() {
  document
    .querySelectorAll(".color-selection span")
    .forEach(function (element) {
      element.addEventListener("click", function () {
        var color = this.getAttribute("data-color");
        changeColor(color);
      });
    });
}

function defaultColor() {
  document.addEventListener("DOMContentLoaded", function () {
    changeColor("black");
  });
}

function toggleReviews() {
  var reviews = document.querySelectorAll(".sp-review ");
  var showMoreLink = document.getElementById("showMoreReviews");
  var isExpanded = showMoreLink.innerText === "Show Less";

  reviews.forEach(function (review, index) {
    if (index >= 3) {
      review.style.display = isExpanded ? "none" : "flex";
    }
  });

  showMoreLink.innerText = isExpanded ? "Show More" : "Show Less";
}

colorSelector();
defaultColor();
toggleReviews();
