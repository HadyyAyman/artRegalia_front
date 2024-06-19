<?php
if (isset($_POST['dashboard_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $login = "SELECT * FROM `admins` WHERE `email` = '$email' and `apassword` = '$password'";

    $result = mysqli_query($conn, $login);

    if (!$result) {
        echo('check as something went wrong in the sql statement');
    } else {
        while ($row = mysqli_fetch_array($result))
        {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
        }
        
        $count = mysqli_num_rows($result);
        
            if ($count == 1) {
                $_SESSION['email'] = $email;
                header("location: dashboard.php");
            } else {
                $logfailed = "Your email or password is uncorrect";
            }
        
    }
}
