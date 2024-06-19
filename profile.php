<?php 
  require_once("functions/connection.php");

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

<?php if(isset($_SESSION['user_id'])) {?>
  <main class="cart-main" style="padding-top: 160px;">
    <div class="container">
      <div class="" >
        <h4>On going orders</h4>
        <div class="cart-item pt-0">
          <div class="cart-item-container mt-2" style="margin-left: 0;">
            <?php 
             $orders = "SELECT * FROM `orders` WHERE statues = 'submitted' AND user_id = '$_SESSION[user_id]'";
             $order_query = mysqli_query($conn, $orders) or die('users_error' . mysqli_error($con));
             while ($result = mysqli_fetch_array($order_query)) {
               if(mysqli_num_rows($order_query) > 0){

            
            ?>
            <article class="cart-product">
              <article class="product-details-container">
                <a href="#" class="product-link">
                  
                  <div class="product-info">
                    <p class="product-description">Order #<?php echo $result['id'] ?></p>
                    <div class="order-status">
                      <p>In progress</p>
                    </div>
                    <p class="delivery-date">On <?php echo $result['created_at'] ?></p>
                  </div>
                </a>
              </article>
              <?php }else{
                ?>
                  <p>No progress orders</p>
                <?php
              }} ?>
              <!-- <footer class="feedback-footer">
                <a class="feedback-add-btn" href="./AddFeedback.php?order_id=<?php echo $result['id'] ?>"> Add Feedback</a>
              </footer> -->
            </article>
          </div>
        </div>
      </div>
      <div class="" >
        <h4>Previous orders</h4>
        <div class="cart-item pt-0">
          <div class="cart-item-container mt-2" style="margin-left: 0;">
            <?php 
              $orders = "SELECT * FROM `orders` WHERE ( statues = 'accepted' OR statues = 'rejected' ) AND user_id = '$_SESSION[user_id]'";
              $order_query = mysqli_query($conn, $orders) or die('users_error' . mysqli_error($con));
              while ($result = mysqli_fetch_array($order_query)) {
                if ($result['statues'] == 'accepted') {
                  $status = "<span class='btn btn-success mb-4'>Accepted</span>";
                } elseif ($result['statues'] == 'rejected') {
                    $status = "<span class='btn btn-danger mb-4'>Rejected</span>";
                } else {
                    $status = "<span class='btn btn-warning mb-4'>submitted</span>";
                }
                if(mysqli_num_rows($order_query) > 0){
            ?>
            <article class="cart-product">
              <article class="product-details-container">
                <a href="#" class="product-link">
                  
                  <div class="product-info">
                    <p class="product-description">Order #<?php echo $result['id'] ?></p>
                    <?php echo $status ?>
                    <p class="delivery-date">On <?php echo $result['created_at'] ?></p>
                  </div>
                </a>
              </article>
              <?php if($result['statues'] == 'accepted'){ ?>
              <footer class="feedback-footer">
                <a class="feedback-add-btn" href="./AddFeedback.php?order_id=<?php echo $result['id'] ?>"> Add Feedback</a>
              </footer>
              <?php } ?>
            </article>
            <hr>
            <?php }else{
              ?>
                <h4>No previous orders</h4>
              <?php
            }} ?>
          </div>
        </div>
      </div>
      
    </div>
  </main>

<?php } ?>

  <?php include("includes/footer.php") ?>

  <script src="./javascript/Home.js" charset="UTF-8"></script>
  <script src="./javascript/orders.js" charset="UTF-8"></script>
  <!-- <script src="./javascript/cart.js" charset="UTF-8"></script> -->
</body>

</html>