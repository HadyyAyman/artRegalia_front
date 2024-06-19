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

  <div class="checkout-navbar-container">
    <header class="header">
      <section class="header-section">
        <div class="nav-left">
          <div class="logo">
            <a href="./index.html">
              <div>
                ArtRegalia
              </div>
            </a>
          </div>
        </div>
        <div class="nav-right">
          <i class="fa-solid fa-phone"></i>
          <p class="contact-wrap">
            Need Help? <a href="./ContactUs.html">Contact us</a></p>

          <p> <i class="ri-arrow-go-back-line"></i>Easy <span>Returns</span></p>

          <p><i class="ri-secure-payment-fill"></i>Secure <span>Payments</span></p>
        </div>
      </section>
    </header>
  </div>

  <main class="main-content">
  <?php if(isset($submitted)) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo $submitted ?>
        </div>
      <?php } ?>
    <form class="border-0 d-block" method="POST">

      <div class="checkout">
        <div class="checkout-section">
          <div class="form-container">
            <!-- Customer Address Form -->
            <article class="form-section">
              <header class="form-header">
                <div class="form-title">
                  <span>
                    <i class="fa-solid fa-circle-check"></i>
                  </span>
                  <h2 class="form-heading">1. CUSTOMER ADDRESS</h2>
                </div>
              </header>
              <div class="form-content">
                <div class="add-address">
                  ADD NEW ADDRESS
                </div>
                <div id="customer-address-form" class="address-form col-12">
  
                  <div class="name-section col-12">
                    <div class="col-12">
                      <label>Full name</label>
                      <input type="text" readonly value="<?php echo $_SESSION['name'] ?>" placeholder="Enter Your First Name" required>
                    </div>
                  </div>
  
                  <div class="col-12 mt-4">
  
                    <div class="d-flex gap-2">
  
                      <div class=" prefix">
                        <label>Prefix</label>
                        <div class="span">
                          <span style="color: #6C757D; font-weight: bolder;">+20</span>
                        </div>
                      </div>
                      <div class="w-100">
  
                        <label>Phone Number</label>
                        <input type="number" name="phone" placeholder="Enter Your Phone Number" required>
                      </div>
  
  
  
                    </div>
                  </div>
  
  
                  <div class="address-section col-12">
                    <div>
                      <label for="">Address</label>
                      <input type="text" name="address" placeholder="Enter Your Address" required>
                    </div>
                    <div>
                      <label for="">Additional Information</label>
                      <input type="text" name="additional_info" placeholder="Enter Additional Information">
                    </div>
                  </div>
  
                </div>
              </div>
            </article>
  
            <!-- Delivery Details Form -->
            <article class="form-section delivery-details">
              <header class="form-header">
                <div class="form-title">
                  <span class="icon">
                    <i class="fa-solid fa-circle-check"></i>
                  </span>
                  <h2 class="form-heading">2. DELIVERY DETAILS</h2>
                </div>
              </header>
              <div class="delivery-form">
                <form action="post" id="delivery-details-form" style="display: none;">
                  <!-- <div class="delivery-option">
                    <div class="option">
                      <button class="button"></button>
                      <div class="first-option">
                        <div class="option-info">
                          <span class="option-name">Pick-up Station</span>
                          <span class="option-price">(FREE)</span>
                        </div>
  
                        <div class="schedule-info">
                          <span class="option-schedule">Delivery scheduled on <em>14 May</em></span>
                        </div>
                      </div>
                      <i class="fa-solid fa-hand-holding"></i>
                    </div>
                  </div> -->
  
                  <!-- <article class="pickup-details">
                    <div class="details-header">
                      <p>Pickup Station</p>
                      <button>
                        Select pickup station <i class="fa-solid fa-chevron-right"></i>
                      </button>
                    </div>
                    <div class="details-body">
                      <img src="./images/map.svg" alt="map" height="70" width="70">
                      <div>
                        <p>No Pickup Station Selected</p>
                        <p>To use this option, you will need to add a pickup station near your location.</p>
                      </div>
                    </div>
                  </article>
   -->
                  <div class="delivery-option2">
                    <div class="option">
                      <!-- <button class="button"></button> -->
                      <div class="first-option">
                        <div class="option-info">
                          <span class="option-name">Door Delivery</span>
                          <span class="option-price">(from EGP 35.00)</span>
                        </div>
  
                        <div class="schedule-info">
                          <span class="option-schedule">Delivery scheduled on <em>14 May</em></span>
                        </div>
                      </div>
                      <i class="fa-solid fa-truck"></i>
                    </div>
                  </div>
                </form>
              </div>
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
  
                  $total = 0;
              ?>
                  <section class="shipment-details">
                    <div class="shipment-info">
                      <h3>
                        <span>Shipment <?php echo mysqli_num_rows($order_items_query) ?>/<?php echo mysqli_num_rows($order_items_query) ?></span>
                        <span>Fulfilled by ArtRegalia</span>
                      </h3>
                      <article class="shipment-article">
                        <header>
                          <div>
                            <div>
                              <h3>Door Delivery</h3>
                            </div>
                          </div>
                          <p>
                            Delivery scheduled on
                            <em>14 May</em>
                          </p>
                        </header>
                        <?php
                        // echo $orders['offer_id'];
                        while ($result = mysqli_fetch_array($order_items_query)) {
  
                          $total +=  $result['quantity'] *  $result['price'];
  
                          if (mysqli_num_rows($order_items_query) > 0) {
                        ?>
                            <div class="shipment-details-body">
                              <img src="./images/<?php echo $result['image'] ?>" alt="" height="60" width="60">
                              <div>
                                <p><?php echo $result['name'] ?></p>
                                <p>
                                  <span>QTY: </span>
                                  <?php echo $result['quantity'] ?>
                                </p>
                              </div>
                            </div>
                        <?php
                          }
                        }
                        ?>
                        <!-- <div class="shipment-details-body">
                      <img src="./images/craftart.jpg" alt="" height="60" width="60">
                      <div>
                        <p>Product Name</p>
                        <p>
                          <span>QTY: </span>
                          1
                        </p>
                      </div>
                    </div> -->
                      </article>
                    </div>
                  </section>
              <?php
                }
              }
              ?>
              
          </div>
          </article>
  
          <!-- Payment Method Form -->
          <article class="form-section">
            <header class="form-header">
              <div class="form-title">
                <span>
                  <i class="fa-solid fa-circle-check"></i>
                </span>
                <h2 class="form-heading">3. PAYMENT METHOD</h2>
              </div>
            </header>
            <div class="payment-form">
              <!-- <div id="payment-method-form" >
                <article>
                  <h3>Payment on delivery</h3>
                  <div class="cash-option">
                    <div class="option">
                      <button class="button"></button>
                      <div class="first-option">
                        <div class="option-info">
                          <span>Cash On Delivery</span>
                        </div>
                        <div class="cash-info">
                          <span>You can always change your mind &amp; pay by your card or smart wallet upon
                            delivery.</span>
                        </div>
                      </div>
                      <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <article>
                      <div class="payment-instructions">
                        <p>- Pay on delivery via cash, bank card, or smart wallet. enjoy a 10 EGP discount on shipping
                          fess when you choose prepaid at checkout! <br>
                          - When you choose Cash on delivery, you can pay for your order in cash when you receive your
                          shipment at home or ArtRegalia’s pick-up stations.<br>
                          - Enjoy 10 EGP discount when you pay via prepaid method.<br>
                          - Egyptian pounds are accepted only.<br>
                          - Please provide the specified amount only when paying for the possibility that there
                          will&nbsp;be enough cash with the delivery representative if a value is paid higher than
                          the&nbsp;requested one.<br>
                          - You must pay for the product before opening the shipment.<br>
                          - In case the product is returned, the available refund methods are (refund voucher
                          -&nbsp;postal transfer).</p>
                      </div>
                      <div>
                        <div class="accept-cash">
                          <h4>We accept: <i class="fa-solid fa-hand-holding-hand"></i></h4>
                        </div>
                      </div>
                    </article>
                  </div>
                </article>
                <article class="credit-section">
                  <h3>Pre-pay Now</h3>
                  <div class="credit-option">
                    <div class="option">
                      <button class="button"></button>
                      <div class="first-option">
                        <div class="option-info">
                          <span>Pay by Card</span>
                        </div>
                        <div class="credit-info">
                          <span>Get 10 EGP off on Shipping Fees When You Pay With Your Card </span>
                        </div>
                      </div>
                      <i class="fa-solid fa-shield-halved"></i>
                    </div>
                  </div>
                </article> 
              </div>  -->
              <!-- <div class="confirm-payment"> -->
                <div class="row">
                  <div class="col-12">
                    <input type="password" name="visa" minlength="14" class="form-control" placeholder="visa" maxlength="14" required>
                  </div>
                  <div class="col-6">
                    <select class="form-control" required>
                      <option value="">Month</option>
                      <option value="01">Jan</option>
                      <option value="02">Feb</option>
                      <option value="03">Mar</option>
                      <option value="04">Apr</option>
                      <option value="05">May</option>
                      <option value="06">Jun</option>
                      <option value="07">Jul</option>
                      <option value="08">Aug</option>
                      <option value="09">Sep</option>
                      <option value="10">Oct</option>
                      <option value="11">Nov</option>
                      <option value="12">Dec</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <select name="dob-day" class="form-control datefield day" require>
                      <option value="">Year</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                      <option value="2026">2026</option>
                      <option value="2027">2027</option>
                      <option value="2028">2028</option>
                      <option value="2029">2029</option>
                      <option value="2030">2030</option>
                      <option value="2031">2031</option>
                      <option value="2032">2032</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <input type="password" name="cvv" minlength="3" class="form-control" placeholder="cvv" maxlength="3" required>
                  </div>
                </div>
                <!-- <button type="button" class="btn btn-primary confirm-payment-btn">
                  <a href="#summary-form">Confirm payment method</a>
                </button> -->
              </div>
            <!-- </div> -->
          </article>
          <a href="shopall.php" class="continue-shopping">
            <i class="fa-solid fa-chevron-left"></i>
            Go back & continue shopping
          </a>
        </div>
  
        <!-- Summary Form -->
        <div class="summary-container">
          <article class="summary-section">
            <h2>Order summary</h2>
            <?php 
            if (mysqli_num_rows($orders_query) > 0) {
            if (mysqli_num_rows($order_items_query) > 0) {
              ?>
            <div class="summary-details">
              <p class="summary-item">Item's total (<?php echo mysqli_num_rows($order_items_query) ?>)
                <span class="summary-price">EGP <?php echo $total ?></span>
              </p>
              <p class="summary-item">
                Delivery fees
                <span class="summary-price">EGP 35.00</span>
              </p>
          <?php if($orders['promo_code'] != 0){ ?>
          <div class="summary-item">
            Discount
            <span class="summary-price"><?php echo $orders['promo_code'] ?>%</span>
          </div>
          <?php } ?>
          <!-- <div class="summary-total">
            Total price
            <span class="summary-price"><?php echo (($total + 35) - (($orders['promo_code'] / 100) * $total)) ?></span>
          </div> -->
            </div>
            <?php if($orders['promo_code'] != 0){ ?>
              <div class="summary-total">
                  <p>Total</p>
                  <p class="summary-price">EGP <?php echo (($total + 35) - (($orders['promo_code'] / 100) * $total)) ?></p>
                </div>
                <input type="hidden" name="total_price"  value="<?php echo (($total + 35) - (($orders['promo_code'] / 100) * $total)) ?>">
                <?php }else{?>
                  <input type="hidden" name="total_price"  value="<?php echo $total + 35 ?>">
                  
                <div class="summary-total">
                  <p>Total</p>
                  <p class="summary-price">EGP <?php echo $total + 35 ?></p>
                </div>
            <?php } ?>
            <div id="summary-form">
              <input type="hidden" name="order_id"  value="<?php echo $orders['id'] ?>">

              <button type="submit" name="submit_order" class="btn confirm-order-btn">
                Confirm order
              </button>
              <p>(Complete the steps in order to proceed)</p>
            </div>
            <?php }} ?>
          </article>
          <p class="terms-text">By proceeding, you are automatically accepting the <br>&nbsp;
            <a href="#" class="terms-link">Terms &amp; Conditions</a>
          </p>
        </div>
      </div>
    </form>
  </main>

  <?php include("includes/footer.php"); ?>
  <script src="./javascript/checkout.js" charset="UTF-8"></script>
</body>

</html>