<?php
require_once("functions/connection.php");
include("functions/products_functions.php");
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

  <?php include("includes/header.php");?>

  <script src="./javascript/search.js" charset="UTF-8"></script>


  <main class="sp-main">

    <div class="sp-container">
      <div class="sp-image-carousel">
        <div class="large-image w-100">
          <img id="" class="w-100" style="object-fit: cover;" src="./images/<?php echo $result_product_details['image'] ?>" alt="Large Image">
        </div>
        <!-- <div class="small-images">
          <img onclick="changeImage('')" src="" alt="Small Image 1">
          <img onclick="changeImage('')" src="" alt="Small Image 2">
          <img onclick="changeImage('')" src="" alt="Small Image 3">
        </div> -->
      </div>
      <div class="sp-product-info">
      <div class="col-12">
            
                <?php if (isset($success)) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success ?>
                    </div>
                <?php } ?>
            </div>
        <div class="sp-rating-reviews">
          <span class="sp-rating">★★★★☆</span>
          <span class="sp-reviews">(123 reviews)</span>
        </div>
        <h1 class="sp-product-title"><?php echo $result_product_details['name'] ?></h1>
        <p class="sp-seller"><i class="ri-user-6-fill" title="Product Seller"></i><span><?php echo $result_artisan_details['brand_name'] ?></span></p>
        <p class="sp-availability">Availability <span>(In Stock)</span></p>
        <p class="sp-price"><?php echo $result_product_details['price'] ?> LE</p>
        <p class="delivery-message">Order now and get it delivered within <span id="deliveryDays">2</span> days!</p>

        <!-- <div class="color-selection">
          <span data-color="black"></span>
          <span data-color="red"></span>
          <span data-color="grey"></span>
          <span data-color="simone"></span>
        </div> -->
        <form action="" class="justify-content-start gap-2" method="POST">
          <?php if(isset($_SESSION['user_id'])){ ?>
          <input type="hidden" name="product_id" value="<?php echo $result_product_details['id'] ?>">
          <div class="quantity-section">
            <label for="quantity">Qnt:</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1">
          </div>
          <button type="submit" name="add_to_cart" class="add-to-cart"> Add to Cart</button>
          <button type="submit" name="add_to_wishlist" class="add-to-wishlist">❤ Add to wishList</button>
        <?php }else { ?>
          <div class="quantity-section">
            <label for="quantity">Qnt:</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1">
          </div>
          <a href="login.php" name="add_to_cart" class="btn btn-transparent add-to-cart"> Add to Cart</a>
          <a href="login.php" name="add_to_wishlist" class="btn btn-transparent add-to-wishlist">❤ Add to wishList</a>

        <?php } ?>
        </form>

        <div class="sp-tabs">
          <button class="sp-tablink" onclick="openTab(event, 'Specifications')">Item Specifications</button>
          <!-- <button class="sp-tablink" onclick="openTab(event, 'Dimensions')">Dimensions</button>
          <button class="sp-tablink" onclick="openTab(event, 'Reviews')">Reviews</button> -->
          <div id="Specifications" class="tabcontent show" style="display: block;">
            <!-- <h3>Specifications</h3> -->
            <p><?php echo $result_product_details['descreption'] ?></p>
          </div>

          <!-- <div id="Dimensions" class="tabcontent">
           
            <p>Height: <span>35cm</span></p>
            <p>Width: <span>35cm</span></p>
            <p>Material: <span>35cm</span></p>
          </div>

          <div id="Reviews" class="tabcontent">
            <div class="sp-review col-md-8">
              <img src="/images/profile.jpg" alt="user" />
              <div class="card__content">
                <span><i class="ri-double-quotes-l"></i></span>
                <div class="card__details">
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <p>
                    We had a great time collaborating with this shop. They
                    have my high recommendation!
                  </p>
                  <h4>- Hady Ayman</h4>
                </div>
              </div>
            </div>

            <div class="sp-review col-md-8">
              <img src="/images/profile.jpg" alt="user" />
              <div class="card__content">
                <span><i class="ri-double-quotes-l"></i></span>
                <div class="card__details">
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <p>
                    We had a great time collaborating with this shop. They
                    have my high recommendation!
                  </p>
                  <h4>- Hady Ayman</h4>
                </div>
              </div>
            </div>

            <div class="sp-review col-md-8">
              <img src="/images/profile.jpg" alt="user" />
              <div class="card__content">
                <span><i class="ri-double-quotes-l"></i></span>
                <div class="card__details">
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <p>
                    We had a great time collaborating with this shop. They
                    have my high recommendation!
                  </p>
                  <h4>- Hady Ayman</h4>
                </div>
              </div>
            </div>

            <div class="sp-review col-md-8">
              <img src="/images/profile.jpg" alt="user" />
              <div class="card__content">
                <span><i class="ri-double-quotes-l"></i></span>
                <div class="card__details">
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <p>
                    We had a great time collaborating with this shop. They
                    have my high recommendation!
                  </p>
                  <h4>- Hady Ayman</h4>
                </div>
              </div>
            </div>


            <a id="showMoreReviews" class="sp-showMoreReviews" href="javascript:void(0);" onclick="toggleReviews()">Show
              More</a>
          </div> -->
        </div>

      </div>
    </div>

  </main>

  <?php include("includes/footer.php");?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./javascript/sp.js" charset="UTF-8"></script>

</body>

</html>