<?php
require_once("functions/connection.php");
include("functions/cart_function.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ArtRegalia</title>
  <script src="https://kit.fontawesome.com/a014b52ca8.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/akar-icons-fonts"></script>
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>
  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->

  <?php include("includes/header.php") ?>


  <!-- =============================== -->
  <!-- carousel section / website branding  -->
  <!-- =============================== -->
  <div class="carousel">
    <button class="carousel__button caro-left is-hidden"><i class="fa-solid fa-chevron-left"></i></button>

    <div class="carousel__track-container">
      <ul class="carousel__track">
        <li class="carousel__slide current-slide">
          <img class="carousel__image" src="./images/banner-image1.jpg" alt="">
          <p style="color:var(--color9); font-weight:700; font-size:20px;">Discover the Artistry Within, Explore Our Curated Collection</p>
        </li>
        <li class="carousel__slide">
          <img class="carousel__image" src="./images/summer2.png" alt="">
          <h1 style="color:var(--color9); font-weight:700;">Hello Summer</h1>
          <p style="color:var(--color9); font-weight:700; font-size:20px; text-wrap:nowrap;">Embrace the Season, Uncover Our Vibrant Summer Collection</p>
        </li>
        <!-- <li class="carousel__slide">
          <img class="carousel__image" src="./images/craftart.jpg" alt="">
        </li> -->
      </ul>
    </div>

    <button class="carousel__button caro-right"><i class="fa-solid fa-chevron-right"></i></button>

    <div class="carousel__nav">
      <button class="carousel__indicator current-slide"></button>
      <button class="carousel__indicator"></button>
      <!-- <button class="carousel__indicator"></button> -->
    </div>
  </div>

  <!-- =============================== -->
  <!-- products Section -->
  <!-- =============================== -->
  <main role="shopAll-main">

    <div class="container-fluid bg-white">
      <div class="row mx-0">
      <?php if(isset($duplicated_msg)){ ?>
            <div class="alert alert-danger"><?php echo $duplicated_msg; ?></div>
            <?php } ?>
            <?php if(isset($inserted)){ ?>
            <div class="alert alert-success"><?php echo $inserted; ?></div>
            <?php } ?>
        <?php if (isset($success)) { ?>
          <div class="alert alert-success" role="alert">
            <?php echo $success ?>
          </div>
        <?php } ?>
        <div class="product-container col-12 col-md-8">
          <div class="headers text-center mb-4">
            <h1>Featured Products</h1>
            <p class="w-100 border-bottom"></p>
          </div>
          <?php
          $products = "SELECT * from `products`";
          $product_query = mysqli_query($conn, $products) or die('users_error' . mysqli_error());

          while ($result = mysqli_fetch_array($product_query)) {
          $descreption =  substr($result['descreption'],0,100); 

          ?>
            <div class="product">
              <figure class="">
                <img src="images/<?php echo  $result['image'] ?>" alt="T-Shirt Raplh Lauren" class="product-image img-fluid">
              </figure>

              <div class="product-description  ">

                <div class="info ">
                  <h1><?php echo $result['name'] ?></h1>
                  <p>
                    <?php echo $descreption ?>
                  </p>
                </div>

                <div class="price  d-flex align-items-start">
                  <?php echo $result['price'] ?>
                </div>
              </div>

              <div class="product-sidebar">
                <?php if (isset($_SESSION['user_id'])) { ?>
                  <form method="POST" class="border-0">
                    <input type="hidden" name="product_id" value="<?php echo $result['id'] ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" name="add_to_cart" class="buy">
                      <i class="fa-solid fa-shopping-bag"></i>
                      <span>ADD TO BAG</span>
                    </button>
                  </form>
                  <form method="POST" class="border-0">
                    <input type="hidden" name="product_id" value="<?php echo $result['id'] ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" name="add_to_wishlist" class="Wishlist">
                      <i class="fa-solid fa-heart"></i>
                      <span>Wishlist</span>
                    </button>
                  </form>
                <?php } else { ?>
                  <button onclick="window.location.href = 'http://localhost/AR/login.php'" class="buy">
                    <i class="fa-solid fa-shopping-bag"></i>
                    <span>ADD TO BAG</span>
                  </button>
                  <button type="button" onclick="window.location.href = 'http://localhost/AR/login.php'" class="Wishlist">
                    <i class="fa-solid fa-heart"></i>
                    <span>Wishlist</span>
                  </button>
                <?php } ?>
                <a href="product-details.php?product_id=<?php echo $result['id'] ?>">
                  <button class="info">
                    <i class="fa-solid fa-info"></i>
                    <span>MORE INFO</span>
                  </button>
                </a>

                <!-- <button class="seller" title="Hady Hossam">
                <i class="ri-user-6-fill"></i>
                <span>Seller</span>
              </button> -->
              </div>
            </div>
          <?php
          }
          ?>


        </div>

      </div>
    </div>

  </main>

  <!-- =============================== -->
  <!-- Footer Section -->
  <!-- =============================== -->

  <?php include("includes/footer.php") ?>

<script>
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
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>