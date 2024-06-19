<?php 
require_once("functions/connection.php");
include("functions/authentication_function.php");
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
    <div class="form" style="margin-top: 150px;">
    <?php if(isset($error)) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $error ?>
        </div>
      <?php } ?>
      <?php if(isset($success)) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo $success ?>
        </div>
      <?php } ?>
      <form class="register-form " method="POST" >
        <h2 style="color:var(--color2);">Register</h2>
        <select name="gender" id="registration-gender">
          <option value="">Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <input type="text" name="firstname" placeholder="First Name *" />
        <input type="text" name="lastname" placeholder="Last Name*" />
        <input type="text" name="username" placeholder="Username *" />
        <input type="email" name="email" placeholder="Email *" />
        <input type="number" name="phone" placeholder="phone *" />
        <input type="password" name="password" placeholder="Password *" />
        <input type="submit" class="btn" name="submit_register" value="Create" style="border:none;">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        </input>
        <p class="message">Already registered? <a href="login.php">Sign in</a></p>
        <p class="message">Login as artisan? <a href="artisan/">Sign in</a></p>
      </form>
    </div>
  </main>

  <?php include("includes/footer.php") ?>

</body>

</html>