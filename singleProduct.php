<?php require_once("functions/connection.php"); ?>
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


  <main class="singleShop-main">
    <div class="container mt-4">

      <div class="row mb-4 justify-content-center">
        <div class="col-lg-4">
          <div class="card ss-card">
            <img src="./images/craftart.jpg" class="card-img-top rounded-circle" alt="Shop Image"
              style="width: 140px; height: 140px; margin: 20px auto 0;">
            <div class="card-body text-center">
              <h2 class="card-title">Shop Name</h2>
              <p class="text-muted">Rating: ★★★★☆</p>
              <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
          </div>
        </div>
      </div>

      <ul class="nav nav-tabs">
        <li class="nav-item ">
          <a class="nav-link active shop-link" data-bs-toggle="tab" href="#products">Products</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link shop-link" data-bs-toggle="tab" href="#reviews">Reviews</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link shop-link" data-bs-toggle="tab" href="#custom-orders">Custom Orders</a>
        </li>
      </ul>

      <!-- Product list here -->
      <div class="tab-content">
        <div class="tab-pane fade show active" id="products">
          <!-- Products list here -->
          <div class="product-container col-12 col-md-8">

            <div class="product">

              <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./images/craftart.jpg" alt="T-Shirt Ralph Lauren"
                      class="product-image img-fluid d-block w-100">
                  </div>
                  <div class="carousel-item">
                    <img src="./images/art.jpg" alt="Second Image" class="d-block w-100">
                  </div>
                  <div class="carousel-item">
                    <img src="./images/craft.jpg" alt="Third Image" class="d-block w-100">
                  </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                  data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                  data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>

              <div class="product-description  ">

                <div class="info ">
                  <h1>LOREM IPSUM</h1>
                  <p>
                    Lorem Ipsum is simply dummy
                    printing and typesetting industry
                  </p>
                </div>

                <div class="price  d-flex align-items-start">
                  8999
                </div>
              </div>

              <div class="product-sidebar">
                <button class="buy">
                  <i class="fa-solid fa-shopping-bag"></i>
                  <span>REQUEST</span>
                </button>

                <button class="info">
                  <i class="fa-solid fa-info"></i>
                  <span>MORE INFO</span>
                </button>

                <button class="rate">
                  <i class="fa-solid fa-star"></i>
                  <span>4.8</span>
                </button>

                <button class="Wishlist">
                  <i class="fa-solid fa-heart"></i>
                  <span>Wishlist</span>
                </button>

              </div>
            </div>



          </div>
        </div>


        <!-- Reviews list here -->
        <div class="tab-pane fade" id="reviews">
          <div class="container__right mt-4">
            <div class="review-card col-md-8">
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

          </div>
        </div>

        <!-- Custom Order tab here -->
        <div class="tab-pane fade custom-tab" id="custom-orders">

          <h2 class="mb-3 mt-3 text-center custom-title">Create Your Own Order!</h2>
          <div class=" modal-body ">
            <!-- Form for custom order request -->
            <form class="custom-form" action="">
              <div class="mb-3 col-6 image">
                <label for="customImage" class="form-label form-custom">Upload Image</label>
                <input type="file" class="form-control form-image" id="customImage">
              </div>
              <div class="mb-3 col-6 material">
                <label for="material" class="form-label form-custom">Specify Your Material</label>
                <input type="text" class="form-control" id="material">
              </div>
              <div class="mb-3 col-12 dimension">
                <label for="size" class="form-label form-custom">Dimensions</label>
                <!-- <input type="text" class="form-control" id="size"> -->
                <select name="" class="dimension-select">
                  <option value="1">35x60</option>
                  <option value="2">35x60</option>
                  <option value="3">35x60</option>
                </select>
              </div>
              <div class="mb-3 col-12 theme">
                <label for=" size" class="form-label form-custom">Theme</label>
                <!-- <input type="text" class="form-control" id="size"> -->
                <select name="" class="dimension-select">
                  <option value="1">Choose a Theme</option>
                  <option value="2">Spring</option>
                  <option value="3">Summer</option>
                  <option value="4">Autumn</option>
                  <option value="5">Winter</option>
                </select>
              </div>
              <div class="mb-3 col-6 color">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" id="color">
              </div>
              <button type="submit col-2" class="btn btn-primary form-btn">Submit Request</button>
            </form>
          </div>
        </div>

      </div>
    </div>
    <!-- <div class="modal fade" id="customOrderModal" tabindex="-1" aria-labelledby="customOrderModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="customOrderModalLabel">Custom Order Request</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body"> -->
    <!-- Form for custom order request -->
    <!-- <form class="custom-form">
              <div class="mb-3">
                <label for="customImage" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="customImage">
              </div>
              <div class="mb-3">
                <label for="material" class="form-label">Specify Your Material</label>
                <input type="text" class="form-control" id="material">
              </div>
              <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" class="form-control" id="size">
              </div>
              <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" id="color">
              </div>
              <div class="mb-3">
                <label for="theme" class="form-label">Theme</label>
                <input type="text" class="form-control" id="theme">
              </div>
              <button type="submit" class="btn btn-primary">Submit Request</button>
            </form>
          </div>
        </div>
      </div> -->
  </main>

  <?php include("includes/footer.php") ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./javascript/craft.js" charset="UTF-8"></script>

</body>

</html>