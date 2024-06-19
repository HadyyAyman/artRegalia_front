<?php
if (isset($_POST['add'])) {
    $category_name = $_POST['category_name']; 
    $insert= "INSERT INTO `category` (`name`) VALUES('$category_name')"; 
    if(!mysqli_query($conn,$insert)){ 
        die('Error:'. mysqli_error($conn));
    } else {
        $category_added ="Your category added successfully";
    }

}
if (isset($_POST['update_category'])) {
    $category_id = $_POST['category_id'];
    $category_update_name = $_POST['category_update_name']; 

    $update= "UPDATE `category` SET `name`='$category_update_name' WHERE `id`='$category_id'"; 

    if(!mysqli_query($conn,$update)){ 
        die('Error:'. mysqli_error($conn));
    } else {
        $category_updated ="Your category updated successfully";
    }
}
if (isset($_POST['delete_category'])) {
    $category_delete_id = $_POST['category_delete_id'];

    $delete= "DELETE from `category` WHERE `id`='$category_delete_id'"; 

    if(!mysqli_query($conn,$delete)){ 
        die('Error:'. mysqli_error($conn));
    } else {
        $category_deleted ="Your category deleted successfully";
    }
}