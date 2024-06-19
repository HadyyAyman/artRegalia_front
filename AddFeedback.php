<?php 
require_once("functions/connection.php");
include("functions/general_functions.php");
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


  <main class="feedback-main">
    <div class="feedback-container">
      <h2>Product Customer Feedback Form</h2>
      <p>Thank you for taking time to provide feedback. We appreciate hearing from you and will review your comments
        carefully.</p>
        <?php if(isset($success)) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo $success ?>
        </div>
      <?php } ?>
      <form class="feedback-form" method="POST">
        <label class="feedback-label">Would you recommend us to your friends and colleagues?</label>
        <div class="radio-group">
          <label><input type="radio" name="recommend" value="Yes" required> Yes</label>
          <label><input type="radio" name="recommend" value="No" required> No</label>
        </div>

        <label class="feedback-label">Do you have any suggestions to improve our product and service?</label>
        <textarea name="message" rows="4" required></textarea>

        <label class="feedback-label">How satisfied are you with our company overall?</label>
        <div class="star-group">
          <input type="radio" id="star1" name="rate" value="1" required>
          <label for="star1"></label>
          <input type="radio" id="star2" name="rate" value="2" required>
          <label for="star2"></label>
          <input type="radio" id="star3" name="rate" value="3" required>
          <label for="star3"></label>
          <input type="radio" id="star4" name="rate" value="4" required>
          <label for="star4"></label>
          <input type="radio" id="star5" name="rate" value="5" required>
          <label for="star5"></label>
        </div>

        <label class="feedback-label">To the best of your knowledge, is this feedback something that others in your
          situation would also share?</label>
        <div class="radio-group">
          <label><input type="radio" name="shared_feedback" value="Yes" required> Yes</label>
          <label><input type="radio" name="shared_feedback" value="No" required> No</label>
        </div>

        <label class="feedback-label">Please leave your email address if you would like us to contact you regarding any
          questions.</label>
        <div class="name-email">
          <input type="text" name="firstname" placeholder="First Name" required>
          <input type="text" name="lastname" placeholder="Last Name" required>
          <input type="email" name="email" placeholder="Email Address" required>
        </div>

        <button class="feedback-sub-btn" name="submit_feedback" type="submit">Submit</button>
      </form>
    </div>
  </main>

  <?php include("includes/header.php") ?>

  <script src="./javascript/Home.js" charset="UTF-8"></script>
</body>

</html>