<?php
if (isset($_POST['add_post'])) {
    $name = $_POST['name']; 
    $description = $_POST['description']; 
    $image_name = time() . '-' . $_FILES["image"]["name"];
    $target_dir = "../images/";
    $target_file = $target_dir . basename($image_name);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); 
    $insert= "INSERT INTO `posts` (`name`, `description`, `image`, `admin_id`) VALUES('$name','$description','$image_name', ".$_SESSION['admin_id'].")"; 
    if(!mysqli_query($conn,$insert)){ 
        die('Error:'. mysqli_error($conn));
    } else {
        $success ="Your post added successfully";
    }

}
if (isset($_POST['update_post'])) {
    $post_id = $_POST['post_id']; 
    $name = $_POST['name']; 
    $description = $_POST['description']; 
    $image_name = time() . '-' . $_FILES["image"]["name"];
    $target_dir = "../images/";
    $target_file = $target_dir . basename($image_name);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); 

    $update= "UPDATE `posts` SET `name`='$name',
                                `description`='$description',
                                `image`='$image_name',
                                `admin_id`='.$_SESSION[admin_id]'
                                WHERE `id`='$post_id'"; 

    if(!mysqli_query($conn,$update)){ 
        die('Error:'. mysqli_error($conn));
    } else {
        $success ="Your post updated successfully";
    }
}
if (isset($_POST['delete_post'])) {
    $post_id = $_POST['post_id'];
    $deleted= "DELETE from `posts` WHERE `id`='$post_id'"; 

    if(!mysqli_query($conn,$deleted)){ 
        die('Error:'. mysqli_error($conn));
    } else {
        $success ="Your post deleted successfully";
    }
}