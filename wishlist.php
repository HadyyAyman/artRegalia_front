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
  <?php 
include("includes/header.php");

?>
  <script src="./javascript/search.js" charset="UTF-8"></script>
  <?php if(isset($success)) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo $success ?>
        </div>
      <?php } ?>

  <main class="wishlist-main">
    <div class="wishlist-container  d-flex flex-column gap-3">
  <?php 
    $products_statement = "SELECT wishlist.id , wishlist.user_id , wishlist.product_id , products.name, products.image , products.price , products.descreption FROM `wishlist` INNER JOIN `products` ON products.id = wishlist.product_id WHERE wishlist.user_id = '$_SESSION[user_id]'";
    $product_wishlist_query = mysqli_query($conn, $products_statement) or die('users_error'.mysqli_error());

    while($result = mysqli_fetch_array($product_wishlist_query)){

  


?>
      <article class="wishlist-product">
        <article class="wishlist-details-container">
          <a href="product-details.php?product_id=<?php echo $result['product_id'] ?>" class="product-link">
            <div class="product-image-container">
              <img src="./images/<?php echo $result['image'] ?>" alt="Product Image" width="72" height="72" class="product-image">
            </div>
            <div class="product-info">
              <h3 class="product-name"><?php echo $result['name'] ?></h3>
              <p class="product-description"><?php echo $result['descreption'] ?></p>
            </div>
            <div class="product-price">
              <span class="price  d-flex align-items-start"><?php echo $result['price'] ?></span>
            </div>
          </a>
        </article>
        <footer class="product-footer">
          <form action="" method="POST">
            <input type="hidden" name="wishlist_id" value="<?php echo $result['id'] ?>"> 
            <button name="remove_from_wishlist" class="remove-btn"><i class="fa-solid fa-trash-can" style="color: #CED4DA;"></i> Remove</button>
            
          </form>
        </footer>
      </article>
      <?php } ?>
    </div>
  </main>







  <?php 
include("includes/footer.php");

?>
  <script src="./javascript/Home.js" charset="UTF-8"></script>
</body>

</html>