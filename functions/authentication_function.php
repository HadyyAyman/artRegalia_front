<?php
if (isset($_POST['submit_register'])) {
    $firstname= mysqli_real_escape_string($conn,$_POST['firstname']);  
    $lastname= mysqli_real_escape_string($conn,$_POST['lastname']);  
    $gender = $_POST['gender'];
    $phone= mysqli_real_escape_string($conn,$_POST['phone']);  
    $email= mysqli_real_escape_string($conn,$_POST['email']); 
    $username= mysqli_real_escape_string($conn,$_POST['username']); 
    $password= mysqli_real_escape_string($conn,$_POST['password']); 
    $name = $firstname.' '.$lastname;
    //check if the email exists in DB or not
    $checking_emails = "SELECT * FROM `users` where `email` = '$email'";
    $res_checking_emails= mysqli_query($conn,$checking_emails);
    $register_stat = " INSERT INTO `users` (`name`, `phone`, `email`, `gender`,`username`,`password`) VALUES ('$name','$phone','$email','$gender','$username','$password') ";
    if(mysqli_num_rows($res_checking_emails) > 0) {
        $error = "This email already exists";
    } else {
        $register_query =  mysqli_query($conn,$register_stat) or die("error in register".mysqli_error($conn));
        $success = "User created successfully";
    } 
    
  }
if(isset($_POST['submit_login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $select_stat = "SELECT * from `users` WHERE `email`='$email' AND `password`= '$password'";
  $select_result= mysqli_query($conn,$select_stat);
  
  if($select_result){
      while($row = mysqli_fetch_array($select_result)){
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['phone'] = $row['phone'];
      }
      $count = mysqli_num_rows($select_result);
      if($count == 1){
          header('location: index.php');
      }else{
          $error = "That's doesn't met our creditials";
      }
  }else{
      echo "Something happen in sql statement";
  }

}
if(isset($_SESSION['user_id'])){
    $select_user = "SELECT * from `users` WHERE `id`=".$_SESSION['user_id']." ";
    $select_user_query= mysqli_query($conn, $select_user) or die("error in user query".mysqli_error($conn));
    $result_user = mysqli_fetch_array($select_user_query); 
}
if(isset($_POST['update_profile'])){
    $name= mysqli_real_escape_string($conn,$_POST['name']);  
    $phone= mysqli_real_escape_string($conn,$_POST['phone']);  
    $email= mysqli_real_escape_string($conn,$_POST['email']); 
    $username= mysqli_real_escape_string($conn,$_POST['username']); 
    $update_user = "UPDATE `users` SET `name`='$name',`email`='$email',`phone`='$phone',`username`='$username' WHERE `id`=".$_SESSION['user_id']." ";
    $update_user_query= mysqli_query($conn, $update_user) or die("error in user query".mysqli_error($conn));
    if($update_user_query){
        $user_updated = "User updated successfully";
    }
}
if(isset($_POST['artisan_create'])){
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $brand_name = mysqli_real_escape_string($conn,$_POST['brand_name']);
    $facebook_link = mysqli_real_escape_string($conn,$_POST['facebook_link']);
    $linkedin_link = mysqli_real_escape_string($conn,$_POST['linkedin_link']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $name = $firstname.' '. $lastname;
    $image_name = time() .'-'. $_FILES['image']['name'];
    $image_direction = "./images/";
    $image_target = $image_direction. basename($image_name);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_target);
    $checking_emails = "SELECT * FROM `artisans` where `email` = '$email'";
    $res_checking_emails= mysqli_query($conn,$checking_emails) or die("erorr in checing".mysqli_error($conn));
    $insert_artisan = "INSERT INTO
     `artisans` (`name`, `brand_name`,`phone`, `facebook_link`, `linkedin_link`, `email`, `image`,`password`, `status`) 
     VALUES 
     ('$name',  '$brand_name','$phone', '$facebook_link', '$linkedin_link' ,'$email', '$image_name','$password', '0')";
    if(mysqli_num_rows($res_checking_emails) > 0){
        $error = "This artisan already exist";
    }
    else{
        $artisan_query = mysqli_query($conn , $insert_artisan) or die('error in insert'.mysqli_error($conn)); 
        $success = "Your registration went successfully wait from admin approval";
    }
}