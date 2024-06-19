<?php require_once("functions/connection.php");
include("functions/products_functions.php");
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


  <main class="shops-main">



    <div class="container mt-4">
      <!-- Search and Filters -->
      <nav class="nav-breadcrumb shop-crumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item" aria-current="page">Shops</li>
          <li class="breadcrumb-item" aria-current="page">Category</li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $result_details['name'] ?></li>
        </ol>
      </nav>

      

      <!-- Shops Grid -->
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Shop Card -->
        <?php
                $products = "SELECT * from `products` WHERE category_id = " . $_GET['category_id'] . "";
                $product_query = mysqli_query($conn, $products) or die('users_error' . mysqli_error());

                while ($result = mysqli_fetch_array($product_query)) {


                ?>
        <div class="col-md-4">
          <div class="card shop-card">
            <div class="card-body text-center">
              <div class="mb-3">
                <img src="./images/<?php echo $result['image'] ?>" class="rounded-circle" alt="Product Image" width="140" height="140">
              </div>
              <h5 class="card-title dark shop-title"><?php echo $result['name'] ?></h5>
              <p class="card-text shop-text"><?php echo $result['descreption'] ?></p>
              <a href="product-details.php?product_id=<?php echo $result['id'] ?>" class="btn btn-primary shop-btn">Visit product</a>
            </div>
          </div>
        </div>
          <?php }?>
        <!-- More cards can be added similarly -->
      </div>
    </div>
  </main>

  <?php include("includes/footer.php") ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./javascript/craft.js" charset="UTF-8"></script>

</body>

</html>