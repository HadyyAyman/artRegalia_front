<?php 
if(isset($_POST['submit_feedback'])) {
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $recommend = $_POST['recommend'];
    $message = mysqli_real_escape_string($conn,$_POST['message']);
    $name = $firstname.' '.$lastname;
    $shared_feedback = $_POST['shared_feedback'];
    $rate = $_POST['rate'];
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    $insert_feeback_statement = "INSERT INTO `feedback` (`user_id`,`order_id`,`name`, `email`, `message`, `recommend`, `rate`,`share_feedback`) VALUES (".$_SESSION['user_id'].",".$_GET['order_id'].",'$name', '$email', '$message', '$recommend', '$rate','$shared_feedback')";
    $insert_query = mysqli_query($conn, $insert_feeback_statement) or die("Somthing went wrong in insert query". mysqli_error($conn));
    if(!$insert_query) {
        die("Somthing went wrong in insert query". mysqli_error($conn));
    } else {
        $success = "Thank you for your feedback";
    }
}