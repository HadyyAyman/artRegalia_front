//=======================================
// SEARCH BUTTON FUNCTION
//=======================================

//=================
//carousel function
//=================

document.addEventListener("DOMContentLoaded", (event) => {
  const track = document.querySelector(".carousel__track");
  const slides = Array.from(track.children);
  const nextButton = document.querySelector(".caro-right");
  const prevButton = document.querySelector(".caro-left");
  const dotsNav = document.querySelector(".carousel__nav");
  const dots = Array.from(dotsNav.children);

  const slideWidth = slides[0].getBoundingClientRect().width;

  // Arrange the slides next to each other
  slides.forEach((slide, index) => {
    slide.style.left = `${slideWidth * index}px`;
  });

  // Move to target slide
  const moveToSlide = (track, currentSlide, targetSlide) => {
    track.style.transform = `translateX(-${targetSlide.style.left})`;
    currentSlide.classList.remove("current-slide");
    targetSlide.classList.add("current-slide");
  };

  // Update visibility of navigation arrows
  const updateArrows = (targetIndex) => {
    if (targetIndex === 0) {
      prevButton.classList.add("is-hidden");
      nextButton.classList.remove("is-hidden");
    } else if (targetIndex === slides.length - 1) {
      prevButton.classList.remove("is-hidden");
      nextButton.classList.add("is-hidden");
    } else {
      prevButton.classList.remove("is-hidden");
      nextButton.classList.remove("is-hidden");
    }
  };

  // Update the navigation dots
  const updateDots = (currentDot, targetDot) => {
    currentDot.classList.remove("current-slide");
    targetDot.classList.add("current-slide");
  };

  // Handle slide change
  const changeSlide = (
    currentSlide,
    targetSlide,
    currentDot,
    targetDot,
    targetIndex
  ) => {
    moveToSlide(track, currentSlide, targetSlide);
    updateDots(currentDot, targetDot);
    updateArrows(targetIndex);
  };

  // Event handler for previous button
  prevButton.addEventListener("click", () => {
    const currentSlide = track.querySelector(".current-slide");
    const prevSlide = currentSlide.previousElementSibling;
    const currentDot = dotsNav.querySelector(".current-slide");
    const prevDot = currentDot.previousElementSibling;
    const prevIndex = slides.findIndex((slide) => slide === prevSlide);

    changeSlide(currentSlide, prevSlide, currentDot, prevDot, prevIndex);
  });

  // Event handler for next button
  nextButton.addEventListener("click", () => {
    const currentSlide = track.querySelector(".current-slide");
    const nextSlide = currentSlide.nextElementSibling;
    const currentDot = dotsNav.querySelector(".current-slide");
    const nextDot = currentDot.nextElementSibling;
    const nextIndex = slides.findIndex((slide) => slide === nextSlide);

    changeSlide(currentSlide, nextSlide, currentDot, nextDot, nextIndex);
  });

  // Event handler for dots navigation
  dotsNav.addEventListener("click", (e) => {
    const targetDot = e.target.closest("button");

    if (!targetDot) return;

    const currentSlide = track.querySelector(".current-slide");
    const currentDot = dotsNav.querySelector(".current-slide");
    const targetIndex = dots.findIndex((dot) => dot === targetDot);
    const targetSlide = slides[targetIndex];

    changeSlide(currentSlide, targetSlide, currentDot, targetDot, targetIndex);
  });

  // Initial state setup
  const init = () => {
    const currentSlide = slides[0];
    const currentDot = dots[0];
    currentSlide.classList.add("current-slide");
    currentDot.classList.add("current-slide");
    updateArrows(0);
  };

  init();
});

//=======================================
// To Top Page Function
//=======================================
function topPage() {
  var topPage = document.getElementById("top");

  topPage.addEventListener("click", function () {
    document.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  });
}

topPage();
