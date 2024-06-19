<?php
if(isset($_POST['add_artisan'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $brand_name = mysqli_real_escape_string($conn,$_POST['brand_name']);
    $facebook_link = mysqli_real_escape_string($conn,$_POST['facebook_link']);
    $linkedin_link = mysqli_real_escape_string($conn,$_POST['linkedin_link']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $image_name = time() .'-'. $_FILES['image']['name'];
    $image_direction = "../images/";
    $image_target = $image_direction. basename($image_name);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_target);
    $checking_emails = "SELECT * FROM `artisans` where `email` = '$email'";
    $res_checking_emails= mysqli_query($conn,$checking_emails) or die("erorr in checing".mysqli_error($conn));
    $insert_artisan = "INSERT INTO
     `artisans` (`name`, `brand_name`, `facebook_link`, `linkedin_link`, `email`, `image`,`password`) 
     VALUES 
     ('$name',  '$brand_name', '$facebook_link', '$linkedin_link' ,'$email', '$image_name','$password')";
    if(mysqli_num_rows($res_checking_emails) > 0){
        $error = "This artisan already exist";
    }
    else{
        $artisan_query = mysqli_query($conn , $insert_artisan) or die('error in insert'.mysqli_error($conn)); 
        $success = "Your artisan activated successfully";
    }
}

if(isset($_POST['update_artisan'])) {
    $artisan_id = $_POST['artisan_id'];
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $brand_name = mysqli_real_escape_string($conn,$_POST['brand_name']);
    $facebook_link = mysqli_real_escape_string($conn,$_POST['facebook_link']);
    $linkedin_link = mysqli_real_escape_string($conn,$_POST['linkedin_link']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $image_name = time() .'-'. $_FILES['image']['name'];
    $image_direction = "../images/";
    $image_target = $image_direction. basename($image_name);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_target);

    if(empty($_FILES['image']['name'])){
    $update_category = "UPDATE `artisans` SET 
    `name` ='$name' , 
    `brand_name`='$brand_name',
    `facebook_link`='$facebook_link',
    `linkedin_link`='$linkedin_link',
    `email`='$email', 
    `password`='$password'  
    WHERE `id`='$artisan_id'";
    }else{
        $update_category = "UPDATE `artisans` SET 
        `name` ='$name' , 
        `brand_name`='$brand_name',
        `facebook_link`='$facebook_link',
        `linkedin_link`='$linkedin_link',
        `email`='$email', 
        `image`='$image_name',
        `password`='$password'  
        WHERE `id`='$artisan_id'";
    }
    
    $update_query = mysqli_query($conn , $update_category) or die('Error in delete'.mysqli_error());
    if(!$update_query){
        die('Error in update'.mysqli_error());
    }
    else{
        $success = "Your artisan is updated";
    }
    
}
if(isset($_POST['accept_artisan'])) {
    $artisan_id = $_POST['artisan_id'];
    $update_category = "UPDATE `artisans` SET `status`=1, `admin_id`='$_SESSION[admin_id]' WHERE `id`='$artisan_id'";
    
    $update_query = mysqli_query($conn , $update_category) or die('Error in delete'.mysqli_error());
    if(!$update_query){
        die('Error in update'.mysqli_error());
    }
    else{
        $success = "Your artisan is activated";
    }
}

if(isset($_POST['reject_artisan'])) {
    $artisan_id = $_POST['artisan_id'];
    $update_category = "UPDATE `artisans` SET `status`= 0, `admin_id`='$_SESSION[admin_id]' WHERE `id`='$artisan_id'";
    
    $update_query = mysqli_query($conn , $update_category) or die('Error in delete'.mysqli_error());
    if(!$update_query){
        die('Error in update'.mysqli_error());
    }
    else{
        $success = "Your artisan is deactivated";
    }
}



?>