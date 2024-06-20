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
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles/style.css">
  <script src="https://kit.fontawesome.com/a014b52ca8.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/akar-icons-fonts"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

</head>

<body>
  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->

  <?php
include("includes/header.php");
?>

  <script src="./javascript/search.js" charset="UTF-8"></script>


  <main class="com-container">

    <!-- CAROUSEL BLOG POST -->
    <div class=" post-slide p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
      <div class="row">
        <?php
        $posts_statement = "SELECT  * from `posts` order by `id` DESC LIMIT 1";
        $post_wishlist_query = mysqli_query($conn, $posts_statement) or die('users_error' . mysqli_error());

        while ($result = mysqli_fetch_array($post_wishlist_query)) {
          $description = substr($result['description'], 0, 130);



        ?>
            <div class="col-lg-6 px-0">
              <h1 class="display-4 fst-italic"><?php echo $result['name'] ?></h1>
              <p class="lead my-3"><?php echo $description ?></p>
              <p class="lead mb-0">
                <a href="post_details.php?post_id=<?php echo $result['id'] ?>" class="btn btn-primary com-btn">Continue reading
                  <i class="fa-solid fa-chevron-right"></i>
                </a>
              </p>
            </div>
        <?php } ?>
        
      </div>
      
    </div>

    <!-- SEARCH BAR -->

    <div class="col-12 d-flex justify-content-center">
      <div class="col-md-4 mb-4 ">
          <form action="" class="d-block border-0" method="GET">

            <input type="text" name="search_query" class="form-control blog-search" placeholder=" Blog Search ">
            <button class="btn btn-outline-secondary blog-srch-btn" type="submit" id="button-addon2">
              <i class="fa fa-search "></i>
            </button>
            <hr>
          </form>

      </div>
    </div>

    <!-- BLOG POSTS SECTION -->
    <div class="row g-5">
    <?php

        $search_query = isset($_GET['search_query']) ? mysqli_real_escape_string($conn, $_GET['search_query']) : '';

        // Default query (no search)
        $posts_statement = "SELECT * FROM ( SELECT * FROM `posts` ORDER BY `id` DESC ) AS subquery LIMIT 1, 18446744073709551615;"; 

        // Modify query if a search term exists
        if (!empty($search_query)) {
            $posts_statement = "SELECT * FROM `posts` WHERE `name` LIKE '%$search_query%' ORDER BY `id` DESC;";
        }
        $post_wishlist_query = mysqli_query($conn, $posts_statement) or die('users_error' . mysqli_error($conn));

        while ($result = mysqli_fetch_array($post_wishlist_query)) {
          $description = substr($result['description'], 0, 100);



        ?>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <div class="row">
              <div class="col-md-7">
                <h3 class="mb-0"><?php echo $result['name'] ?></h3>
                <div class="mb-1 text-body-secondary"><?php echo $result['created_at'] ?></div>
                <p class="card-text mb-auto"><?php echo $description ?></p>
                <a href="">
                  <a href="post_details.php?post_id=<?php echo $result['id'] ?>" class="btn btn-primary com-btn">Continue reading
                    <i class="fa-solid fa-chevron-right"></i>
                  </a>
                </a>

              </div>
              <div class="col-md-5">
                <img height="250" class="w-100" style="object-fit: cover;" src="images/<?php echo $result['image'] ?>" alt="">

              </div>
            </div>
            <!-- <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong> -->
          </div>
          <div class="col-auto d-none d-lg-block">
          </div>
        </div>
      </div>
          <?php } ?>


   


      <section class="blog-section" style="overflow: hidden;">


        <div class="mbr-fallback-image disabled" style="display: none;"></div>
        <div class="mbr-overlay" style="display: none; opacity: 0.5; background-color: rgb(255, 255, 255);"></div>

        <div class="text-center blog-container">
          <div class="row mb-4 justify-content-center">
            <div class="col-12 col-md-4">
              <img src="https://r.mobirisesite.com/463604/assets/images/photo-1621194327164-62ec8d09775c.jpeg" alt="Mobirise Website Builder">
            </div>
          </div>
          <div class="row blog-row justify-content-center">
            <div class="col-md-12 content-head">
              <h1 class="mbr-section-title mbr-fonts-style mb-4 display-2">
                <b>Unleash Your Creativity with Us!</b>
              </h1>
              <p class="mbr-text mbr-fonts-style mb-4 display-7">Join our artisan community and share your unique
                stories, videos, and images.
              </p>
              <div class="mbr-section-btn mt-4">
                <a class="btn btn-primary blog-btn display-7" href="artisan_registration.php">Learn More</a>
              </div>
            </div>
          </div>
        </div>
      </section>


    </div>

  </main>







  <?php
include("includes/footer.php");
?>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>


