<?php

function displayUsernameOrBrand() {
  if (isset($_SESSION['user_type'])) {
      if ($_SESSION['user_type'] === 'artist' || $_SESSION['user_type'] === 'craftsmen') {
          return $_SESSION['brand_name'];
      } else {
          return $_SESSION['username'];
      }
  } else {
      return 'View Profile';
  }
}
?>

<?php  include "./admin/fetch_categories.php";?>

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
            <a href="Artists-page.php" class="navbar-links desk nav-link">Artists</a>
            <input type="checkbox" id="showArtists" class="dropdown-toggle">
            <label for="showArtists" class="navbar-links">Artists <i class="fa-solid fa-caret-down"></i></label>
            <ul class="drop-menu">
            <?php 

             foreach($categories['artist']['main'] as $artistCategory):
             echo "<li><a class='dropdown-item' href='#'> {$artistCategory['category_title']} </a></li>";
             endforeach;
            ?>
            </ul>
          </li>

          <li class="navbar-item nav-item">
            <a href="craft-page.php" class="navbar-links desk nav-link">Craftsmen</a>
            <input type="checkbox" id="showMega" class="dropdown-toggle">
            <label for="showMega" class="navbar-links">Craftsmen<i class="fa-solid fa-caret-down"></i></label>
            <div class="mega-box">
              <div class="content">
              <?php foreach ($categories['craftsmen']['main'] as $mainCategory): ?>
                <div class="row">
                <header><?php echo $mainCategory['category_title']; ?></header>
                  <ul class="mega-links">
                  <?php if (isset($categories['craftsmen']['sub'][$mainCategory['category_id']])): ?>
                            <?php foreach ($categories['craftsmen']['sub'][$mainCategory['category_id']] as $subCategory): ?>
                                <li><a class="dropdown-item" href="#"><?php echo $subCategory['category_title']; ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                  </ul>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </li>

          <li class="navbar-item nav-item">
            <a href="shopall.php" class="navbar-links nav-link">Shop all</a>
          </li>

          <li class="navbar-item nav-item">
            <a href="shops.php" class="navbar-links nav-link">Shops</a>
          </li>

          <li class="navbar-item nav-item">
            <a href="community.php" class="navbar-links nav-link">Community</a>
          </li>

          <li class="navbar-item nav-item">
            <a href="about.php" class="navbar-links nav-link">About Us</a>
          </li>

            <?php if (isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], ['admin'])): ?>
          <li class="navbar-item nav-item">
            <a href="./admin/admin_home.php" class="navbar-links nav-link">Admin</a>
          </li>
          <?php endif; ?>

        </ul>


        <ul class="nav-action-list navbar-nav me-2">

          <li class="nav-item">

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
          </li>

          <li class="nav-item ms-2">
            <a href="cart.php" class="nav-action-btn nav-link">
              <i class="fa-solid fa-bag-shopping" aria-hidden="true"></i>
              <span class="icon-badge-btn">4</span>
              <data class="nav-action-text" value="400.00">Basket: <strong>400EGP</strong></data>

              <data class="nav-action-badge" value="4" aria-hidden="true">4</data>
            </a>
          </li>

          <li class="navbar-item side-profile nav-item me-auto">
            <a href="#" class="navbar-links desk nav-link">Profile</a>
            <i class="fa-solid fa-user desk" aria-hidden="true"></i>
            <input type="checkbox" id="showProfile" class="dropdown-toggle">
            <label for="showProfile" class="navbar-links"><i class="fa-solid fa-user" aria-hidden="true"></i>Profile <i
                class="fa-solid fa-caret-down"></i></label>
            <ul class="drop-menu profile">
              <li><a class="nav-link" href="./user-profile.html"><i class="fa-solid fa-user"></i><?php echo displayUsernameOrBrand();?></a></li>
              <li><a class="nav-link" href="./wishlist.html"><i class="fa-solid fa-heart"></i>Wishlist</a></li>
              <li><a class="nav-link" href="help.html"><i class="fa-solid fa-circle-question"></i>Help</a></li>
              <li><a class="nav-link" href="settings.html"><i class="fa-solid fa-gears"></i>Settings</a></li>
              <?php if (isset($_SESSION['username'])): ?>
                            <li><a class="nav-link" href="logout.php"><i class="fa-solid fa-lock"></i>Sign-out</a></li>
                        <?php else: ?>
                            <li><a class="nav-link" href="login.php"><i class="fa-solid fa-lock"></i>Sign-in/Sign-up</a></li>
                        <?php endif; ?>
            </ul>
          </li>
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

  <script src="./javascript/search.js" charset="UTF-8"></script>
