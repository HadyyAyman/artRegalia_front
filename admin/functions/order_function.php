<?php
if(isset($_POST['accept_order'])){
    $order_id = $_POST['order_id'];
    $query_accepted = "UPDATE `orders` SET `statues`='accepted' , `admin_id`=".$_SESSION['admin_id']." WHERE `id`='$order_id' ";
    $category_query = mysqli_query($conn , $query_accepted) or die('error in insert'.mysqli_error($conn)); 
    if(!$category_query){
        die('ERROR in insert'.mysqli_error($conn));
    }
    else{
        $order_msg = "Order accepted successfully";
    }
}
if(isset($_POST['reject_order'])){
    $order_id = $_POST['order_id'];
    $query_rejected = "UPDATE `orders` SET `statues`='rejected' , `admin_id`=".$_SESSION['admin_id']." WHERE  `id`=".$order_id."";
    $category_query = mysqli_query($conn , $query_rejected) or die('error in insert'.mysqli_error($conn)); 
    if(!$category_query){
        die('ERROR in insert'.mysqli_error($conn));
    }
    else{
        $order_msg = "Order rejected successfully";
    }
}