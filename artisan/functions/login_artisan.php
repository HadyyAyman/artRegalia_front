<?php


if (isset($_POST['loginsubmit'])) {
    $login_email = $_POST['email'];
    $login_password = $_POST['login_password'];

    $sql = "SELECT * FROM `artisans` WHERE `email` = '$login_email' and `password` = '$login_password' ";
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        echo('check as something went wrong in the sql statement');
    } else {
        while ($row = mysqli_fetch_array($result)){
            $_SESSION['artisan_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['status'] = $row['status'];
            
        }
        $count = mysqli_num_rows($result);
            if ($count == 1 && $_SESSION['status'] == 1) {
                header("location: dashboard.php");
            } elseif($count == 1 && $_SESSION['status'] == 0){
                $logfalied = "Your are not verified yet";
            }
            else {
                $logfalied = "Your email or Password is uncorrect";
            }
        
    }
}