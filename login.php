<?php
ob_start(); // Start output buffering
include "includes/db.php";
session_start();
?>
<?php include "includes/head.php"; ?>
  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->
  <?php include "includes/navigation.php"; ?>




<?php

if (isset($_POST['login'])) {

  // Capture the form data
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Clean the input data
  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);

  // Initialize variables to track login status
  $login_success = false;
  $user_type = '';

  // Check in users table
  $query = "SELECT * FROM users WHERE username = '{$username}'";
  $result = mysqli_query($connection, $query);
  if (!$result) {
      die("QUERY FAILED: " . mysqli_error($connection));
  }

  if (mysqli_num_rows($result) > 0) {
      // User found in users table
      $row = mysqli_fetch_assoc($result);
      $db_user_id = $row['user_ID'];
      $db_username = $row['username'];
      $db_user_password = $row['user_password'];

      // Verify the password
      if (password_verify($password, $db_user_password)) {
          // Set session variables common for all users
          $_SESSION['user_ID'] = $db_user_id;
          $_SESSION['username'] = $db_username;

          // Check the operations table for admin or customer service
          $query = "SELECT * FROM operations WHERE operation_ID = '{$db_user_id}'";
          $operations_result = mysqli_query($connection, $query);
          if ($operations_result && mysqli_num_rows($operations_result) > 0) {
              $operations_row = mysqli_fetch_assoc($operations_result);
              $db_operations_role = $operations_row['role']; // 'admin', 'customer_service'
              $_SESSION['operations_role'] = $db_operations_role;
              $user_type = $db_operations_role; // Set user type based on role
          }

          // Check the artisans table for artist or craftsman
          $query = "SELECT * FROM artisans WHERE user_id = '{$db_user_id}'";
          $artisan_result = mysqli_query($connection, $query);
          if ($artisan_result && mysqli_num_rows($artisan_result) > 0) {
              $artisan_row = mysqli_fetch_assoc($artisan_result);
              $is_artist = $artisan_row['is_artist'];
              $is_craftsmen = $artisan_row['is_craftsmen'];
              $db_artisan_brand = $artisan_row['brand_name'];
              $_SESSION['brand_name'] = $db_artisan_brand;
              $user_type = $is_artist ? 'artist' : ($is_craftsmen ? 'craftsmen' : '');
          }

          $_SESSION['user_type'] = $user_type; // Set user type in session
          $login_success = true;

          // Redirect based on user type
          header("Location: index.php");
          exit(); // Ensure the script stops executing after redirection
      } else {
          $login_success = false;
      }
  } else {
      $login_success = false;
  }

  if (!$login_success) {
      $error_message = "Invalid Information";
  }
}

?>

  <main class="login-page">
    <div class="form">
      <form class="login-form" method="POST">
        <h2 style="color:var(--color2);"> Login</h2>
        <?php
            if (isset($error_message)) {
                echo "<p style='color:red;'>$error_message</p>";
            }
            ?>
        <input type="text" placeholder="Username" name="username" required />
        <input type="password" placeholder="Password" name="password" required />
        <input class="btn" type="submit" value="Sign-in" name="login" style="border:0;">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </input>
        <p class="message">Not registered? <a href="Registration.php">Create an account</a></p>
      </form>
    </div>
  </main>

  <?php include "includes/footer.php" ?>
  <script src="./javascript/Home.js" charset="UTF-8"></script>
  <?php include "includes/closingtags.php" ?>

  <?php
ob_end_flush(); // End output buffering and flush the output
?>