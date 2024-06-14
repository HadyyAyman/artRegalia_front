<?php
ob_start(); // Start output buffering
include "../includes/db.php";
session_start();
?>



<?php include "admin_includes/admin_header.php";?>

<div id="wrapper">
  <?php include "admin_includes/admin_navigation.php";?>

<?php


if (isset($_POST['add_user'])) {
    $user_gender = $_POST['gender'];
    $user_email = $_POST['user_email'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_phone = $_POST['user_phone'];
    $user_address = $_POST['user_address'];
    $authority = $_POST['authority'];
    $hour_rate = $_POST['hour_rate'];
    $user_role = $_POST['user_role'];

    // File upload handling
    if (isset($_FILES['user_image']) && $_FILES['user_image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../images/'; // Directory where you want to save the uploaded files
        $uploadFile = $uploadDir . basename($_FILES['user_image']['name']);
        if (move_uploaded_file($_FILES['user_image']['tmp_name'], $uploadFile)) {
            $user_image = basename($_FILES['user_image']['name']);
        } else {
            echo "File upload failed.\n";
            $user_image = null;
        }
    } else {
        echo "No file was uploaded or there was an upload error.\n";
        $user_image = null;
    }

    // Sanitize inputs
    $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
    $username = mysqli_real_escape_string($connection, $username);
    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);
    $user_gender = mysqli_real_escape_string($connection, $user_gender);
    $user_address = mysqli_real_escape_string($connection, $user_address);
    $authority = mysqli_real_escape_string($connection, $authority);
    $hour_rate = mysqli_real_escape_string($connection, $hour_rate);
    $user_role = mysqli_real_escape_string($connection, $user_role);

    // Encrypt password
    $user_password = password_hash($user_password, PASSWORD_BCRYPT);

    // Insert into users table
    $query = "INSERT INTO users (user_gender, user_email, username, user_firstname, user_lastname, user_image, user_password, user_address, user_phone) ";
    $query .= "VALUES ('{$user_gender}', '{$user_email}', '{$username}', '{$user_firstname}', '{$user_lastname}', '{$user_image}', '{$user_password}', '{$user_address}', '{$user_phone}')";

    $add_user_query = mysqli_query($connection, $query);
    if (!$add_user_query) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        // Get the last inserted user ID
        $user_id = mysqli_insert_id($connection);

        // Insert user ID into operations table as operation_ID
        $query = "INSERT INTO operations (operations_ID, authority, hour_rate, operation_role) VALUES ('{$user_id}', '{$authority}', '{$hour_rate}', '{$user_role}')";
        $operation_query = mysqli_query($connection, $query);
        if (!$operation_query) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            echo "<script>alert('User has been added')</script>";
        }
    }
} else {
    $message = "";
}



?>

  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <?php include "../admin/fetch_requests.php";?>
        <div class="col-lg-12">
          <h1 class="page-header">Add User</h1>
        </div>
      </div>

      <form class="admin_table form-section" method="POST" action="add_user.php" enctype="multipart/form-data">
        <div class="controls add_user_form">


            <div class="name-section col-12">
              <label for="gender">Gender</label>
              <select name="gender" id="" class="admin_gender user_inputs">Gender
                <option value="Gender">Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>

              
            </div>

            <div class="name-section col-12">
              <div class="col-12">
                <label>E-mail</label>
                <input class="user_inputs" name="user_email" type="text" placeholder="Enter Your First Name" required>
              </div>
            </div>

            <div class="name-section col-12">

              <div class="col-5">
                <label>First name</label>
                <input class="user_inputs" name="user_firstname" type="text" placeholder="Enter Your First Name" required>
              </div>

              <div class="col-5">
                <label>Last name</label>
                <input class="user_inputs" name="user_lastname" type="text" placeholder="Enter Your Last Name" required>
              </div>

            </div>

            <div class="name-section col-12">
              <div class="col-5">
                <label>Username</label>
                <input class="user_inputs" name="username" type="text" placeholder="Enter Your First Name" required>
              </div>

              <div class="col-5">
                <label>Password</label>
                <input class="user_inputs" name="user_password" type="password" placeholder="Enter Your First Name" required>
              </div>
            </div>

            <div class="phone-section col-12">
              <div class="w-100 prefix">
                <label>Prefix</label>
                <div class="span">
                  <span style="color: #6C757D; font-weight: bolder;">+20</span>
                </div>
              </div>

              <div class="pn-form">
                <label>Phone Number</label>
                <input class="user_inputs" name="user_phone" type="tel" placeholder="Enter Your Phone Number" required>
              </div>
            </div>


            <div class="name-section col-12">
              <div class="col-5">
                <label for="profilePicture">Profile Picture</label>
                <input class="user_inputs" type="file" id="profilePicture" name="user_image" accept="image/*">
              </div>
            </div>



            <div class="address-section col-12">
              <div class="col-12">
                <label for="">Address</label>
                <input class="user_inputs" name="user_address" type="text" placeholder="Enter Your Address" required>
              </div>

              <div class="col-5">
                <label for="role">Role</label>
                <select class="user_inputs" id="role" name="user_role" required>
                  <option value="">Role</option>
                  <option value="Admin">Admin</option>
                  <option value="Customer Service">Customer Service</option>
                  <option value="Contact">Contact</option>
                  <!-- Add more options as needed -->
                </select>
              </div>
            </div>

            <div class="select_user_role col-12">
              

              <div class="col-5">
                <label for="authority">Authority</label>
                <select class="user_inputs" id="authority" name="authority" required>
                  <option value="">Select Authority</option>
                  <option value="full-access">Full Access</option>
                  <option value="crud">CRUD (Create, Read, Update, Delete)</option>
                  <!-- Add more options as needed -->
                </select>
              </div>
              
              <div>
                <label for="">Hour Rate</label>
                <input class="user_inputs" name="hour_rate" type="text" placeholder="Hour Rate in EGP" required>
              </div>
            </div>

            <div class="user_btn col-5">
                <button class="btn btn-primary add_user_btn" name="add_user" value="Add" >Add User</button>
              </div>
            </div>

            <div class="address-section col-12">
              
            </div>
        </div>
      </form>
    </div>



  </div>
</div>

<!-- JS Functionality -->
<div class="row">
  <div class="col-lg-12">
    <div id="morris-area-chart" style="display:none"></div>
    <div id="morris-bar-chart" style="display:none"></div>
    <div id="morris-donut-chart" style="display:none"></div>
  </div>
</div>


</div>

</div>

</div>



<!-- <script src="js/custom.js"></script> -->
<script src="js/edit_modal.js"></script>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="js/dataTables/jquery.dataTables.min.js"></script>
<script src="js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>


<?php include "admin_includes/admin_footer.php";?>
<?php ob_end_flush(); // End output buffering and flush the output ?>