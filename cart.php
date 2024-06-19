<?php
require_once("functions/connection.php");
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>
  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->

  <?php include("includes/header.php") ?>


  <script src="./javascript/search.js" charset="UTF-8"></script>


  <main class="cart-main">
    <div class="cart-item">
      <div class="cart-item-container">
        <article class="cart-product">
        <?php if(isset($success)) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo $success ?>
        </div>
      <?php } ?>
        <?php if(isset($promo_code_status)) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo $promo_code_status ?>
        </div>
      <?php } ?>
          <div class="d-flex gap-2 flex-column">
            <?php if (isset($_SESSION['user_id'])) {
              $select_orders = "SELECT * from `orders` where `user_id`=" . $_SESSION['user_id'] . " AND `statues`='in_cart'";
              $orders_query = mysqli_query($conn, $select_orders) or die('Error in orders' . mysqli_error($conn));
              // if(mysqli_num_rows( $orders_query) > 0){
              // }
              $orders = mysqli_fetch_array($orders_query);
              if (mysqli_num_rows($orders_query) >  0) {


                $order_items_stat = "SELECT order_details.o_details_id AS order_details_id, order_details.product_id , order_details.quantity , products.name , products.price,  products.descreption,  products.image FROM `order_details` INNER JOIN products ON order_details.product_id = products.id WHERE order_details.order_id = " . $orders['id'] . "";
                $order_items_query = mysqli_query($conn, $order_items_stat) or die('Error in cat' . mysqli_error($conn));

                $select_orders_submitted = "SELECT * from `orders` where `user_id`=" . $_SESSION['user_id'] . " AND `statues`='submitted'";
                $orders_submitted_query = mysqli_query($conn, $select_orders_submitted) or die('Error in orders' . mysqli_error($conn));
                $orders_count = mysqli_num_rows($orders_submitted_query);
            ?>
                <header class="cart-product-header">
                  <h2>Cart(<?php echo mysqli_num_rows($order_items_query) ?>)</h2>
                </header>
                <?php
                $total = 0;
                // echo $orders['offer_id'];
                while ($result = mysqli_fetch_array($order_items_query)) {

                  $total +=  $result['quantity'] *  $result['price'];

                  if (mysqli_num_rows($order_items_query) > 0) {
                ?>
                    <div class="">
                      <article class="product-details-container">
                        <a href="#" class="product-link">
                          <div class="product-image-container">
                            <img src="./images/<?php echo $result['image'] ?>" alt="Product Image" width="72" height="72" class="product-image">
                          </div>
                          <div class="product-info">
                            <h3 class="product-name"><?php echo $result['name'] ?></h3>
                            <p class="product-description"><?php echo $result['descreption'] ?></p>
                          </div>
                          <div class="product-price">
                            <span class="price  d-flex align-items-start"><?php echo $result['price'] * $result['quantity'] ?></span>
                          </div>
                        </a>
                      </article>
                      <footer class="product-footer">
                        <form method="POST" class="border-0">
                        <input type="hidden" name="order_details_id" value="<?php echo $result['order_details_id'] ?>">

                          <button type="submit" name="remove_item" class="remove-btn"><i class="fa-solid fa-trash-can" style="color: #CED4DA;"></i> Remove</button>
                        </form>
                        <form method="POST" class="quantity-form">
                          <input type="hidden" name="order_details_id" value="<?php echo $result['order_details_id'] ?>">
                          <input type="hidden" name="quantity" value="<?php echo $result['quantity'] ?>">

                          <button type="submit" name="decrement_quantity" class="decrease-btn">-</button>
                          <span class="quantity-value"><?php echo $result['quantity'] ?></span>
                          <button type="submit" name="add_quantity" class="increase-btn">+</button>
                        </form>
                      </footer>
                    </div>
            <?php
                  }
                }
              }else{
                ?>
              <header class="cart-product-header">
                  <h2>Cart(0)</h2>
                </header>
              <?php
              }
            }else{
              ?>
              <header class="cart-product-header">
                  <h2>Cart(0)</h2>
                </header>
              <?php
            }

            ?>

          </div>
        </article>
      </div>

      <div class="cart-summary">
        <div class="cart-summary-container">
          <article class="cart-summary-details">
            <h2>Cart Summary</h2>
            <?php 
              if (mysqli_num_rows($orders_query) > 0) {
              if (mysqli_num_rows($order_items_query) > 0) {
                ?>

          <div class="subtotal">
            <p>Subtotal</p>
            <span class="price  d-flex align-items-start"><?php echo $total ?></span>
          </div>
          <?php if($orders['promo_code'] != 0){ ?>
          <div class="subtotal">
            <p>Discount</p>
            <span class="price  d-flex align-items-start"><?php echo $orders['promo_code'] ?>%</span>
          </div>
          <div class="subtotal">
            <p>Total price</p>
            <span class="price  d-flex align-items-start"><?php echo ($total - (($orders['promo_code'] / 100) * $total)) ?></span>
          </div>
          <?php } ?>
            <?php if($orders['promo_code'] == 0){ ?>
            <form action="" method="POST">
            <input type="hidden" name="order_id"  value="<?php echo $orders['id'] ?>">

              <div class="promo-code">
                <div class="promo-form d-flex justify-content-between">
                  <div class="promo-input">
                    <input type="text" name="promo_code" placeholder="Enter code here">
                    <i class="fa-solid fa-ticket"></i>
                  </div>
                  <button type="submit" name="add_promo_code" class="btn apply-btn"> APPLY </button>
                </div>
              </div>
            </form>
            <?php } ?>
            <div class="checkout-btn">
              <a href="checkout.php" class="btn _prim _md _fw">
                checkout
              </a>
            </div>
            <?php }} ?>
          </article>
        </div>
      </div>
    </div>
  </main>



  <?php include("includes/footer.php") ?>

  <script src="./javascript/Home.js" charset="UTF-8"></script>
  <!-- <script src="./javascript/cart.js" charset="UTF-8"></script> -->
</body>

</html>