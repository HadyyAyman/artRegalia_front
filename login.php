<?php
require_once("functions/connection.php");
include("functions/authentication_function.php")
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

  <main class="login-page">
    <?php if(isset($error)) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $error ?>
        </div>
      <?php } ?>
    <div class="form">
      <form class="login-form" method="POST">
        <h2 style="color:var(--color2);"> Login</h2>
        <input type="email" placeholder="Email" name="email" required />
        <input type="password" placeholder="Password" name="password" required />
        <input class="btn" type="submit" value="Sign in" name="submit_login" style="border:0;">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </input>
        <p class="message">Not registered? <a href="registration.php">Create an account</a></p>
        <p class="message">Do you want to become as artisan? <a href="artisan_registration.php">Create an account as artisan</a></p>
      </form>
    </div>
  </main>

  <?php include("includes/footer.php") ?>

  </body>

</html>