<header class="header" data-header>
  <div class="nav-container">

    <div class="overlay container-fluid" data-overlay></div>

    <a href="index.php" class="logo navbar-brand">
      ArtRegalia
    </a>

    <button class="nav-open-btn navbar-toggler" data-nav-open-btn aria-label="open menu">
      <i class="menu-outline fa-solid fa-bars-staggered navbar-toggler-icon"></i>
    </button>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar>

      <button class="nav-close-btn" data-nav-close-btn aria-label="close menu">
        <i class="close-outline fa-solid fa-xmark"></i>
      </button>

      <a href="index.php" class="nav-logo">
        ArtRegalia
      </a>

      <ul class="navbar-list navbar-nav">



        <li class="navbar-item nav-item">
          <a href="index.php" class="navbar-links nav-link">Home</a>
        </li>



        <li class="navbar-item nav-item">
          <a href="#" class="navbar-links desk nav-link">Artists</a>
          <input type="checkbox" id="showArtists" class="dropdown-toggle">
          <label for="showArtists" class="navbar-links">Artists <i class="fa-solid fa-caret-down"></i></label>
          <ul class="drop-menu">


            <?php
            $artisans_statement = "SELECT * FROM `artisans`";
            $artisan_query = mysqli_query($conn, $artisans_statement) or die("Error in selecting data" . mysqli_error($conn));
            while ($result = mysqli_fetch_array($artisan_query)) {
            ?>
              <li><a class='dropdown-item' href='artisan_profile.php?artisan_id=<?php echo $result['id'] ?>'><?php echo $result['name'] ?></a></li>
            <?php
            }
            ?>
            <!-- <li><a class='dropdown-item' href='#'>Street Artist</a></li>
              <li><a class='dropdown-item' href='#'>Street Artist</a></li>
              <li><a class='dropdown-item' href='#'>Street Artist</a></li> -->

          </ul>
        </li>
        <li class="navbar-item nav-item">
          <a href="#" class="navbar-links desk nav-link">Categories</a>
          <input type="checkbox" id="showCategories" class="dropdown-toggle">
          <label for="showCategories" class="navbar-links">Catgeories <i class="fa-solid fa-caret-down"></i></label>
          <ul class="drop-menu">


            <?php
            $category_statement = "SELECT * FROM `category`";
            $category_query = mysqli_query($conn, $category_statement) or die("Error in selecting data" . mysqli_error($conn));
            while ($result = mysqli_fetch_array($category_query)) {
            ?>
              <li><a class='dropdown-item' href='shops.php?category_id=<?php echo $result['id'] ?>'><?php echo $result['name'] ?></a></li>
            <?php
            }
            ?>
            <!-- <li><a class='dropdown-item' href='#'>Street Artist</a></li>
              <li><a class='dropdown-item' href='#'>Street Artist</a></li>
              <li><a class='dropdown-item' href='#'>Street Artist</a></li> -->

          </ul>
        </li>
        <!-- <li class="navbar-item nav-item">
            <a href="craft-page.html" class="navbar-links desk nav-link">Craftsmen</a>
            <input type="checkbox" id="showMega" class="dropdown-toggle">
            <label for="showMega" class="navbar-links">Craftsmen<i class="fa-solid fa-caret-down"></i></label>
            <div class="mega-box">
              <div class="content">

                <div class="row">
                  <a href="#">
                    <header>bags</header>
                  </a>
                  <ul class="mega-links">
                    <li><a class="dropdown-item" href="#">beaded</a></li>
                    <li><a class="dropdown-item" href="#">beaded</a></li>
                    <li><a class="dropdown-item" href="#">beaded</a></li>
                    <li><a class="dropdown-item" href="#">beaded</a></li>
                  </ul>
                </div>

                <div class="row">
                  <a href="#">
                    <header>bags</header>
                  </a>
                  <ul class="mega-links">
                    <li><a class="dropdown-item" href="#">beaded</a></li>
                    <li><a class="dropdown-item" href="#">beaded</a></li>
                    <li><a class="dropdown-item" href="#">beaded</a></li>
                    <li><a class="dropdown-item" href="#">beaded</a></li>
                  </ul>
                </div>

                <div class="row">
                  <a href="#">
                    <header>bags</header>
                  </a>
                  <ul class="mega-links">
                    <li><a class="dropdown-item" href="#">beaded</a></li>
                    <li><a class="dropdown-item" href="#">beaded</a></li>
                    <li><a class="dropdown-item" href="#">beaded</a></li>
                    <li><a class="dropdown-item" href="#">beaded</a></li>
                  </ul>
                </div>

              </div>
            </div>
          </li> -->

        <li class="navbar-item nav-item">
          <a href="shopall.php" class="navbar-links nav-link">Shop all</a>
        </li>

        <li class="navbar-item nav-item">
          <a href="custom_order.php" class="navbar-links nav-link">Custom order</a>
        </li>

        <li class="navbar-item nav-item">
          <a href="community.php" class="navbar-links nav-link">Community</a>
        </li>

        <li class="navbar-item nav-item">
          <a href="about.php" class="navbar-links nav-link">About Us</a>
        </li>


      </ul>


      <ul class="nav-action-list navbar-nav me-2">

        <!-- <li class="nav-item">

            <button class="nav-action-btn srch-btn nav-link btn btn-link" id="searchButton">
              <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
              <span class="nav-action-text">Search</span>
            </button>
          </li>


          <li class="nav-item ms-2">
            <button class="nav-action-btn notify-btn nav-link btn btn-link ">
              <i class="fa-solid fa-inbox" aria-hidden="true"></i>
              <span class="icon-badge-btn">10</span>
              <span class="nav-action-text">Notifications</span>

              <data class="nav-action-badge-notify" value="12" aria-hidden="true">12</data>
            </button>
          </li> -->

        <li class="nav-item ms-2">
          <?php if (isset($_SESSION['user_id'])){
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
          
          
          
            <a href="cart.php" class="nav-action-btn nav-link">
              <i class="fa-solid fa-bag-shopping" aria-hidden="true"></i>
              <span class="icon-badge-btn"><?php echo mysqli_num_rows($order_items_query) ?></span>
              <data class="nav-action-text" value="400.00">Basket: <strong>400EGP</strong></data>

              <data class="nav-action-badge" value="4" aria-hidden="true">4</data>
            </a>
          <?php }else{
            ?>
<a href="cart.php" class="nav-action-btn nav-link">
              <i class="fa-solid fa-bag-shopping" aria-hidden="true"></i>
              <span class="icon-badge-btn">0</span>
              <data class="nav-action-text" value="400.00">Basket: <strong>400EGP</strong></data>

              <data class="nav-action-badge" value="4" aria-hidden="true">4</data>
            </a>
            
            
            <?php
          }} else { ?>
            <a href="login.php" class="nav-action-btn nav-link">
              <i class="fa-solid fa-bag-shopping" aria-hidden="true"></i>
              <!-- <span class="icon-badge-btn">4</span> -->
              <data class="nav-action-text" value="400.00">Basket: <strong>400EGP</strong></data>

              <data class="nav-action-badge" value="4" aria-hidden="true">4</data>
            </a>
          <?php } ?>
        </li>
        <?php if (isset($_SESSION['user_id'])) { ?>

          <li class="navbar-item side-profile nav-item me-auto">
            <a href="#" class="navbar-links desk nav-link">Profile</a>
            <i class="fa-solid fa-user desk" aria-hidden="true"></i>
            <input type="checkbox" id="showProfile" class="dropdown-toggle">
            <label for="showProfile" class="navbar-links"><i class="fa-solid fa-user" aria-hidden="true"></i>Profile <i class="fa-solid fa-caret-down"></i></label>
            <ul class="drop-menu profile">
              <li><a class="nav-link" href="./profile.php"><i class="fa-solid fa-user"></i>view profile</a></li>
              <li><a class="nav-link" href="./wishlist.php"><i class="fa-solid fa-heart"></i>Wishlist</a></li>
              <!-- <li><a class="nav-link" href="settings.html"><i class="fa-solid fa-gears"></i>Settings</a></li> -->

              <li><a class="nav-link" href="logout.php"><i class="fa-solid fa-lock"></i>Sign-out</a></li>


            </ul>
          </li>
        <?php } else { ?>
          <li class="navbar-item side-profile nav-item me-auto">
            <a href="#" class="navbar-links desk nav-link">Profile</a>
            <i class="fa-solid fa-user desk" aria-hidden="true"></i>
            <input type="checkbox" id="showProfile" class="dropdown-toggle">
            <label for="showProfile" class="navbar-links"><i class="fa-solid fa-user" aria-hidden="true"></i>Profile <i class="fa-solid fa-caret-down"></i></label>
            <ul class="drop-menu profile">

              <li><a class="nav-link" href="login.php"><i class="fa-solid fa-lock"></i>Sign-in/Sign-up</a></li>

            </ul>
          </li>
        <?php } ?>
      </ul>
      <div id="searchContainer" class="d-none">
        <input type="text" id="searchInput" class="form-control" placeholder="Search...">
        <button class="btn btn-link nav-close-search" id="closeSearchButton">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
    </nav>
  </div>
</header>