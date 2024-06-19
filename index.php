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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
  
  <?php include("includes/header.php") ?>

  <script src="./javascript/search.js" charset="UTF-8"></script>

  <!-- =============================== -->
  <!-- split landing page -->
  <!-- =============================== -->
  <div class="split-landing">
    <div class="split left">
      <img src="./images/craftart.jpg" alt="">
      <h1 class="craftart">Craftsmen</h1>
      <a href="craft-page.html" class="show-btn">Show</a>
    </div>
    <div class="split right">
    <img src="./images/artist.jpg" alt="">
      <h1 class="craftart">Artists</h1>
      <a href="Artists-page.html" class="show-btn">Show</a>
    </div>

    <!-- scroll animation -->
    <div class="scroll-container">
      <div class="indicator">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- =============================== -->
  <!-- Problem Section -->
  <!-- =============================== -->

  <main class="home-main">
    <section>

      <div class="Benefit-container">
        <h1 class="Benefit">Problem / Solution</h1>
        <div class="Grid-problem-Container">

          <!-- <div class="grid-item trans-ground">
            <i class="fa-solid fa-gears"></i>
          </div> -->

          <div class="grid-item">
            <i class="ri-shield-star-fill"></i>
            <h3> Problem</h3>
            <p>1. Quality Consistency: Handcrafted items may vary in quality due to the human element involved in the
              production process, leading to inconsistencies between individual pieces.
            </p>
          </div>

          <div class="grid-item">
            <i class="ri-price-tag-fill"></i>
            <h3>Problem</h3>
            <p>2. Price: Handcrafted products tend to be priced higher than mass-produced alternatives due to the time,
              skill, and effort required for their creation.
            </p>
          </div>

          <div class="grid-item">
            <i class="ri-settings-3-fill"></i>
            <h3>Problem</h3>
            <p>3. Availability and Customization:
              Handcrafted items may have limited availability, and customization options could be restricted compared to
              mass-produced goods, leading to fewer choices for consumers.</p>
          </div>

          <div class="grid-item">
            <h3>Solution</h3>
            <p>1. Quality Assurance Program: Establish a robust quality assurance initiative, guiding artisans to
              maintain
              consistent standards in their craft. Offer training and resources to refine skills and uphold quality
              benchmarks, while displaying visible certifications on product listings to reassure customers of
              authenticity and excellence.
            </p>
          </div>

          <div class="grid-item">
            <h3>Solution</h3>
            <p>2. Value-Added Services: Introduce premium services like professional photography and marketing aid to
              elevate artisans' products.Provide pricing guidance for fair yet competitive rates and
              create promotional opportunities such as
              featured artist showcases to attract wider attention.
            </p>
          </div>

          <div class="grid-item">
            <!-- <i class="fa-solid fa-exclamation"></i> -->
            <h3>Solution</h3>
            <p>3. Customization Platform: Develop an intuitive platform facilitating direct communication between
              customers and
              artisans for tailored creations. Implement communication tools like messaging and video calls to
              streamline
              customization
              processes and ensure timely delivery of personalized items, preserving the unique handmade essence.</p>

          </div>
        </div>
      </div>

    </section>
    <!-- =============================== -->
    <!-- Benefit Section -->
    <!-- =============================== -->
    <section>

      <div class="Benefit-container">
        <h1 class="Benefit">Benefits</h1>
        <h1 class="artisans">Artisans</h1>
        <div class="Grid-Container">

          <div class="grid-item">
            <i class="fa-solid fa-eye"></i>
            <h3>Increased Visibility</h3>
            <p>Our platform exposes your artisanal products to a broader audience, connecting you with customers who
              value
              craftsmanship and quality. This increased visibility helps elevate your brand and expand your market reach
              beyond local boundaries.</p>
          </div>

          <div class="grid-item">
            <i class="fa-solid fa-chart-simple"></i>
            <h3>Marketing Support</h3>
            <p>We provide marketing and promotional support that amplifies your presence in the market. By featuring
              your
              products in our campaigns, we help tell your story, showcasing the uniqueness of your work and attracting
              more buyers.</p>
          </div>

          <div class="grid-item">
            <i class="fa-solid fa-hand-holding-dollar"></i>
            <h3>Streamlined Sales Process</h3>
            <p>Our user-friendly website simplifies the sales process, handling everything from secure payment
              processing
              to customer inquiries. This allows you to focus more on your craft and less on the logistics of selling.
            </p>
          </div>

          <h1 class="customers">Customers</h1>

          <div class="grid-item">
            <i class="fa-solid fa-box-open"></i>
            <h3>Access to Unique Products</h3>
            <p>Customers have the opportunity to purchase unique, handmade products that stand out from mass-produced
              goods. Each item on our platform carries a story of tradition and personal touch that can’t be found
              elsewhere.</p>
          </div>

          <div class="grid-item">
            <i class="fa-solid fa-medal"></i>
            <h3>Quality Assurance</h3>
            <p>We ensure that all products listed on our platform meet high-quality standards. Our commitment to
              excellence means customers can trust that they are purchasing the best in artisanal craftsmanship.</p>
          </div>

          <div class="grid-item">
            <i class="fa-solid fa-handshake-angle"></i>
            <h3>Supporting Local Economies</h3>
            <p>By buying from our platform, customers contribute to sustaining local artisans and their communities. We
              promote ethical practices that support both people and the planet, making every purchase a step towards a
              more sustainable future.</p>
          </div>

        </div>
      </div>

    </section>
  </main>

  <!-- =============================== -->
  <!-- Footer Section -->
  <!-- =============================== -->

  <?php include("includes/footer.php") ?>

  </body>

</html>