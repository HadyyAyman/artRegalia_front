<?php
if(isset($_POST['add_product'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $category = $_POST['category'];
    $descreption = mysqli_real_escape_string($conn, $_POST['descreption']);
    $image_name = time() .'-'. $_FILES['image']['name'];
    $image_direction = "../images/";
    $image_target = $image_direction. basename($image_name);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_target);
    $insert_stat_product = "INSERT INTO `products` ( `name`, `descreption`, `price`, `category_id`, `image`) VALUES ('$name', '$descreption' , '$price','$category', '$image_name')";
    $insert_product_query = mysqli_query($conn, $insert_stat_product);
    if(!$insert_product_query){
        die('Error in add products'. mysqli_error($conn));
    }else{
        $success = "product added successfully";
    }
}

if(isset($_POST['update_product'])){
    $product_id = $_POST['product_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $category = $_POST['category'];
    $descreption = mysqli_real_escape_string($conn, $_POST['descreption']);
    $image_name = time() .'-'. $_FILES['image']['name'];
    $image_direction = "../images/";
    $image_target = $image_direction. basename($image_name);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_target);
    if(empty($_FILES['image']['name'])){
        $update_stat_product = "UPDATE `products` SET 
        `name`='$name',
        `descreption`='$descreption',
        `price`='$price',
        `category_id`='$category' 
        WHERE `id`='$product_id'";

    }else{
        $update_stat_product = "UPDATE `products` SET 
        `name`='$name',
        `image`='$image_name',
        `descreption`='$descreption',
        `price`='$price',
        `category_id`='$category' 
        WHERE `id`='$product_id'";

    }
    $update_product_query = mysqli_query($conn, $update_stat_product)or die('Error in update'.mysqli_error($conn));
    if(!$update_product_query){
        die('Error in update products'. mysqli_error($conn));
    }else{
        $success = "product updated successfully";
    }
}
    
    if(isset($_POST['delete_product'])) 
    {
        $product_id = $_POST['p_id'];
        $delete_product = "DELETE FROM `products` WHERE `id` ='$product_id'";
        $delete_query = mysqli_query($conn , $delete_product) or die('Error in delete'.mysqli_error());
        if(!$delete_query){
            die('Error in delete'.mysqli_error());
        }
        else{
            $deleted = "Your products is deleted";
        }
    }
    ?>