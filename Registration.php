
<?php
ob_start(); // Start output buffering
include "includes/db.php";
?>

<?php include "includes/head.php"; ?>
  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->
  <?php include "includes/navigation.php"; ?>


  <?php 

  if(isset($_POST['create'])){

    // get user inputs
    $user_gender = $_POST["gender"];
    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $username = $_POST["username"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];

    if(!empty($user_firstname) && !empty($username) && !empty($user_email) && !empty($user_password)){

      //clean inputs
      $user_firstname = mysqli_real_escape_String($connection, $user_firstname);
      $username = mysqli_real_escape_String($connection, $username);
      $user_email = mysqli_real_escape_String($connection, $user_email);
      $user_password = mysqli_real_escape_String($connection, $user_password);
      $user_gender = mysqli_real_escape_String($connection, $user_gender);

      //encrypt password
      $user_password = password_hash($user_password, PASSWORD_BCRYPT);

      //validate inputs
      $query = "INSERT INTO users (user_gender, user_email, user_firstname, user_lastname, username, user_password) ";
      $query .= "VALUES ('{$user_gender}', '{$user_email}', '{$user_firstname}', '{$user_lastname}', '{$username}', '{$user_password}')";
      
      $registration_query = mysqli_query($connection, $query);
      if(!$registration_query){die("Query Failed" . mysqli_error($connection));}


      else {
      
      //get the last inserted user ID
      $user_id = mysqli_insert_id($connection);

      //insert user ID into customers table as customer_ID
      $customer_query = "INSERT INTO customers (customer_ID) VALUES ({$user_id})";
      $customer_registration_query = mysqli_query($connection, $customer_query);

      if (!$customer_registration_query) {
          die("Query Failed: " . mysqli_error($connection));
      } else {

        echo "<script>alert('Registration has been submitted.')</script>";
      }
    }
  } else {
    $message = "Fields cannot be empty";
  }

  } else{
    $message = "";
  }


  ?>


  <main class="login-page">
    <div class="form">
      <form class="register-form" method="POST">
        <h2 style="color:var(--color2);">Register</h2>
        <select name="gender" id="registration-gender">
          <option value="0">Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <input type="text" name="user_firstname" placeholder="First Name *" />
        <input type="text" name="user_lastname" placeholder="Last Name*"  />
        <input type="text" name="username" placeholder="Username *" />
        <input type="email" name="user_email" placeholder="Email *" />
        <input type="password" name="user_password" placeholder="Password *" />
        <input type="submit" class="btn" name="create" value="Create" style="border:none;">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </input>
        <p class="message">Already registered? <a href="login.php">Sign In</a></p>
        <p class="message">Register as artisan? <a href="artisan-registration.php">Sign Up</a></p>
      </form>
    </div>
  </main>

  <?php include "includes/footer.php" ?>
  <script src="./javascript/Home.js" charset="UTF-8"></>

  <?php include "includes/closingtags.php" ?>