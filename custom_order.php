<?php
require_once("functions/connection.php");
if(isset($_POST['custom_order'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image_name = time() .'-'. $_FILES['image']['name'];
    $image_direction = "./images/";
    $image_target = $image_direction. basename($image_name);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_target);

    $submit_reservation_statement = "INSERT INTO  `reservations`(`user_id`,`name`, `description`, `image`, `artisan_status`, `user_status`) VALUES (".$_SESSION['user_id'].",'$name', '$description', '$image_name' , 'pending','pending')";
    $insert_statement_query = mysqli_query($conn, $submit_reservation_statement) or die('users_error'.mysqli_error($conn));
    if($insert_statement_query){
        $success = "Request submitted successfully wait for an artisan approve and negotiate on email";
    }
}
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
    <?php if(isset($success)){ ?>
    <div class="alert alert-success" role="alert">
        <?php echo $success; ?>
    </div>
    <?php } ?>
    <div class="tab-pane fade custom-tab active show" id="custom-orders" role="tabpanel">

<h2 class="mb-3 mt-3 text-center custom-title">Create Your Own Order!</h2>
<div class=" modal-body ">
  <!-- Form for custom order request -->
  <form class="d-block" action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="mb-3 col-6">
          <label for="customImage" class="form-label form-custom">Upload Image</label>
          <input type="file" name="image" class="form-control form-image" id="customImage">
        </div>
        <div class="mb-3 col-6">
          <label for="material" class="form-label form-custom">Specify Your Material</label>
          <input type="text" name="name" class="form-control" id="material">
        </div>
        <div class="mb-3 col-12">
          <label for="description" class="form-label form-custom">Description</label>
          <textarea name="description" class="form-control" id="description"></textarea>
        </div>
        <!-- <div class="mb-3 col-12 dimension">
          <label for="size" class="form-label form-custom">Dimensions</label>
          <select name="" class="dimension-select">
            <option value="1">35x60</option>
            <option value="2">35x60</option>
            <option value="3">35x60</option>
          </select>
        </div>
        <div class="mb-3 col-12 theme">
          <label for=" size" class="form-label form-custom">Theme</label>
          <select name="" class="dimension-select">
            <option value="1">Choose a Theme</option>
            <option value="2">Spring</option>
            <option value="3">Summer</option>
            <option value="4">Autumn</option>
            <option value="5">Winter</option>
          </select>
        </div>
        <div class="mb-3 col-6 color">
          <label for="color" class="form-label">Color</label>
          <input type="color" class="form-control" id="color">
        </div> -->
        <?php if(isset($_SESSION['user_id'])){ ?>

        <button type="submit" name="custom_order" class="btn btn-primary form-btn">Submit Request</button>
        <?php }else{ ?>
            <a href="login.php" class="btn btn-primary form-btn">Submit Request</a>
            <?php } ?>
    </div>
  </form>
</div>
</div>

    </main>







  <?php
include("includes/footer.php");
?>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="./javascript/sp.js" charset="UTF-8"></script> -->

</body>

</html>

