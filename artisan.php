<?php require_once("functions/connection.php");
include("functions/cart_function.php");
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>
  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->

  <?php include("includes/header.php") ?>


  <script src="./javascript/search.js" charset="UTF-8"></script>


  <main class="craft-main">


    <div class="container mt-4">
      <div class="row">

        <nav class="nav-breadcrumb" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Artists</li>
          </ol>
        </nav>
        <div class="col-12 d-flex justify-content-between align-items-center">
          <!-- Filter Button -->
          <div>

            <button class="btn" id="fixed-filter-btn" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#filterCanvas" aria-controls="filterCanvas">
              <img class="filter-image" src="./images/filter.256x203.png" alt="filter">
              Filter
            </button>

            <button class="btn btn-primary " id="filter-btn" type="button">
              Street Artist
            </button>

            <button class="btn btn-primary " id="filter-btn" type="button">
              Portrait Artists
            </button>

            <button class="btn btn-primary " id="filter-btn" type="button">
              Muralists
            </button>
          </div>

          <!-- Sorting and Showing Info -->

          <div>
            <span>12 items </span>

            <button class="btn dropdown" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
              aria-expanded="false">
              Sort as you like
            </button>
            <i class="fa-solid fa-chevron-right" id="sort-chevron"></i>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="sort-dropdown-item" href="#">Most Relevant</a></li>
              <li><a class="sort-dropdown-item" href="#">Price, High to Low</a></li>
              <li><a class="sort-dropdown-item" href="#">Price, Low to High</a></li>
              <li><a class="sort-dropdown-item" href="#">New</a></li>
              <li><a class="sort-dropdown-item" href="#">Top Rated</a></li>
              <li><a class="sort-dropdown-item" href="#">Sort, A - Z</a></li>
              <li><a class="sort-dropdown-item" href="#">Sort, Z - A</a></li>
            </ul>

          </div>
        </div>
      </div>
    </div>

    <!-- Offcanvas Filter Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="filterCanvas" aria-labelledby="filterCanvasLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="filterCanvasLabel">Filter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <!-- Filters -->
        <form class="filter-form" action="">
          <div class="mb-3">
            <button class="btn  filter-btn w-100 d-flex justify-content-between align-items-center toggle-dropdown"
              type="button" id="dropdownMenuBrand" data-bs-toggle="dropdown" aria-expanded="false">
              Shop / Artist
              <i class="fa-solid fa-plus"></i>
            </button>

            <ul class=" dropdown-menu-container d-none list-unstyled">
              <li><label class="filter-dropdown-item w-100"><input type="checkbox" class="form-check-input me-1">Artist
                  1</label></li>
              <li><label class="filter-dropdown-item w-100"><input type="checkbox" class="form-check-input me-1">Artist
                  2</label></li>
              <li><label class="filter-dropdown-item w-100"><input type="checkbox" class="form-check-input me-1">Artist
                  3</label></li>
              <a href="#" id="toggleBrands" class="show-more">Show More</a>
            </ul>
          </div>

          <div class="mb-3">
            <button
              class="btn  filter-btn w-100 d-flex justify-content-between align-items-center toggle-dropdown-category"
              type="button" id="dropdownMenuBrand" data-bs-toggle="dropdown" aria-expanded="false">
              Category
              <i class="fa-solid fa-plus"></i>
            </button>

            <ul class=" dropdown-menu-container d-none list-unstyled">
              <li><label class="filter-dropdown-item w-100 category-item"><input type="checkbox"
                    class="form-check-input me-1">Bags</label></li>
              <li><label class="filter-dropdown-item w-100 category-item"><input type="checkbox"
                    class="form-check-input me-1">Bracelets</label></li>
              <li><label class="filter-dropdown-item w-100 category-item"><input type="checkbox"
                    class="form-check-input me-1">Home
                  Decor
                </label></li>

              <a href="#" id="toggleCategories" class="show-more">Show More</a>
            </ul>
          </div>

          <div class="mb-3">
            <button
              class="btn  filter-btn w-100 d-flex justify-content-between align-items-center toggle-dropdown-rating"
              type="button" id="dropdownMenuBrand" data-bs-toggle="dropdown" aria-expanded="false">
              Rating
              <i class="fa-solid fa-plus"></i>
            </button>

            <ul class=" dropdown-menu-container d-none list-unstyled">
              <li><label class="filter-dropdown-item w-100 rating-item"><input type="checkbox"
                    class="form-check-input me-1">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                </label></li>
              <li><label class="filter-dropdown-item w-100 rating-item"><input type="checkbox"
                    class="form-check-input me-1">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                </label></li>
              <li><label class="filter-dropdown-item w-100 rating-item"><input type="checkbox"
                    class="form-check-input me-1">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                </label></li>
              <li><label class="filter-dropdown-item w-100 rating-item"><input type="checkbox"
                    class="form-check-input me-1">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                </label></li>
              <li><label class="filter-dropdown-item w-100 rating-item"><input type="checkbox"
                    class="form-check-input me-1">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </label></li>

            </ul>
          </div>


          <div class="mb-3">
            <button
              class="btn  filter-btn w-100 d-flex justify-content-between align-items-center toggle-dropdown-price"
              type="button" id="dropdownMenuBrand" data-bs-toggle="dropdown" aria-expanded="false">
              Price
              <i class="fa-solid fa-plus"></i>
            </button>

            <ul class=" dropdown-menu-container d-none list-unstyled">
              <li><label class="filter-dropdown-item w-100 price-item"><input type="checkbox"
                    class="form-check-input me-1">40£ - 200£</label></li>
              <li><label class="filter-dropdown-item w-100 price-item"><input type="checkbox"
                    class="form-check-input me-1">200£ - 500£</label></li>
              <li><label class="filter-dropdown-item w-100 price-item"><input type="checkbox"
                    class="form-check-input me-1">500£ - 1000£
                </label></li>
              <li><label class="filter-dropdown-item w-100 price-item"><input type="checkbox"
                    class="form-check-input me-1">1000£ - 2000£
                </label></li>
              <li><label class="filter-dropdown-item w-100 price-item"><input type="checkbox"
                    class="form-check-input me-1">2000£ - 4000£
                </label></li>

            </ul>
          </div>

          <button type="submit" class="btn btn-apply-filter">Apply Filters</button>
        </form>
      </div>
    </div>

    <!-- Products Section -->
    <div class="row mt-4">
    <?php if(isset($success)) { ?>
      <div class="alert alert-success" role="alert">
        <?php echo $success ?>
      </div>
    <?php } ?>
      <div class="product-container col-12 col-md-8">

      <?php 
          $products = "SELECT * from `products` WHERE artisan_id = ".$_GET['artisan_id']."";
          $product_query = mysqli_query($conn, $products) or die('users_error' . mysqli_error());

          while ($result = mysqli_fetch_array($product_query)) {


          ?>
          <div class="product">
            <figure class="">
              <img src="images/<?php echo  $result['image'] ?>" alt="T-Shirt Raplh Lauren" class="product-image img-fluid">
            </figure>

            <div class="product-description  ">

              <div class="info ">
                <h1><?php echo $result['name'] ?></h1>
                <p>
                <?php echo $result['descreption'] ?>
                </p>
              </div>

              <div class="price  d-flex align-items-start">
              <?php echo $result['price'] ?>
              </div>
            </div>

            <div class="product-sidebar">
              <?php if(isset($_SESSION['user_id'])){ ?>
                <form action="" method="POST" class="border-0">
                  <input type="hidden" name="product_id" value="<?php echo $result['id'] ?>">
                  <input type="hidden" name="quantity" value="1">
                  <button type="submit" name="add_to_cart" class="buy">
                    <i class="fa-solid fa-shopping-bag"></i>
                    <span>ADD TO BAG</span>
                  </button>
                </form>
              <?php }else{ ?>
                <button onclick="window.location.href = 'http://localhost/artRegalia_front/login.php'" class="buy">
                  <i class="fa-solid fa-shopping-bag"></i>
                  <span>ADD TO BAG</span>
                </button>

              <?php } ?>
              <a href="product-details.php?id=<?php echo $result['id'] ?>">
                <button class="info">
                  <i class="fa-solid fa-info"></i>
                  <span>MORE INFO</span>
                </button>
              </a>
              <button class="Wishlist">
                <i class="fa-solid fa-heart"></i>
                <span>Wishlist</span>
              </button>
              <!-- <button class="seller" title="Hady Hossam">
                <i class="ri-user-6-fill"></i>
                <span>Seller</span>
              </button>

              <button class="rate">
                <i class="fa-solid fa-star"></i>
                <span>4.8</span>
              </button>

              <button class="Wishlist">
                <i class="fa-solid fa-heart"></i>
                <span>Wishlist</span>
              </button> -->

              <!-- <button class="colors">
                <i class="fa-solid fa-palette"></i>
                <span>
                  <a href="" class="color black"></a>
                  <a href="" class="color white"></a>
                  <a href="" class="color red"></a>
                  <a href="" class="color red"></a>
                </span>
              </button> -->
            </div>
          </div>
          <?php
          }
          ?>



      </div>
    </div>

  </main>



  <!-- =============================== -->
  <!-- Footer Section -->
  <!-- =============================== -->

  <?php include("includes/footer.php") ?>



  <script src="./javascript/craft.js" charset="UTF-8"></script>

</body>

</html>