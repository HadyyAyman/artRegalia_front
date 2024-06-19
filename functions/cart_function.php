<?php
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $select_orders = "SELECT * from `orders` where `user_id`=" . $_SESSION['user_id'] . " AND `statues`='in_cart'";
    $orders_query = mysqli_query($conn, $select_orders) or die('Error in orders' . mysqli_error($conn));
    $results_of_orders = mysqli_fetch_array($orders_query);
    if (mysqli_num_rows($orders_query) > 0) {
        $select_item_of_orders = "SELECT * FROM `order_details` WHERE `product_id` = $product_id AND `order_id`=" . $results_of_orders['id'] . "";
        $result_of_items = mysqli_query($conn, $select_item_of_orders);

        if (mysqli_num_rows($result_of_items) > 0) {
            // Product already exists in the cart, update the quantity mn 8er ma yzwed record fy el database 34an mytkrr4 tany 
            $row_of_items = mysqli_fetch_array($result_of_items);
            $new_quantity = $row_of_items['quantity'] + $quantity;
            $update_in_product = "UPDATE `order_details` SET `quantity` = $new_quantity WHERE product_id = $product_id";
            if (mysqli_query($conn, $update_in_product)) {
                $success = "Records inserted in cart successfully.";
            } else {
                die("Error inserting records: " . mysqli_error($conn));
            }
        } else {
            // Product does not exist in the cart, insert a new record
            $insert_item = "INSERT INTO `order_details`( `order_id`, `product_id`, `quantity`) VALUES (" . $results_of_orders['id'] . ",'$product_id','$quantity')";
            if (mysqli_query($conn, $insert_item)) {
                $success = "Records inserted in cart successfully.";
            } else {
                die("Error inserting records: " . mysqli_error($conn));
            }
        }
    } else {
        $insert_order = "INSERT INTO `orders`(`statues`, `user_id`) VALUES ('in_cart'," . $_SESSION['user_id'] . ")";

        if (mysqli_query($conn, $insert_order)) {
            // Get the ID of the first insert
            //
            $order_id = mysqli_insert_id($conn);
            // Second insert query that uses the ID of the first insert
            $insert_item = "INSERT INTO `order_details`( `order_id`, `product_id`, `quantity`) VALUES ('$order_id','$product_id','$quantity')";
            if (mysqli_query($conn, $insert_item)) {
                $success = "Records inserted in cart successfully.";
            } else {
                die("Error inserting records: " . mysqli_error($conn));
            }
        }
    }
}
if (isset($_GET['category_id'])) {
    $sql_select = "SELECT * FROM `category` where `catid`=" . $_GET['category_id'] . " ";
    $category_id = $_GET['category_id'];
    $select_query = mysqli_query($conn, $sql_select) or die('ERROR in details' . mysqli_error());
    if (!$select_query) {
        die('ERROR in details' . mysqli_error($conn));
    } else {
        $result_details = mysqli_fetch_array($select_query);
    }
}
if(isset($_POST["add_to_wishlist"])){
    $product_id =  $_POST['product_id'];
    $products_statement = "SELECT * FROM `wishlist` where `product_id`='$product_id'";
    $duplication = mysqli_query($conn, $products_statement);
    if(mysqli_num_rows(($duplication)) > 0){
        $duplicated_msg = "Your product already added to wishlist";
    }else{
        $insert_statement = "INSERT INTO `wishlist`(`user_id`, `product_id`) VALUES ( ".$_SESSION['user_id']." ,'$product_id') ";
        $insert_query = mysqli_query($conn, $insert_statement) or die('Error in insert'.mysqli_error());
        if(!$insert_query){
            die('Error in insert'.mysqli_error());
        }else{
            $inserted = "Product added to wishlist";
        }
    }
}
if(isset($_POST["remove_from_wishlist"])){
    $wishlist_id =  $_POST['wishlist_id'];
    $wishlist_statement = "DELETE FROM `wishlist` where `id`='$wishlist_id'";
    $wishlist_query = mysqli_query($conn, $wishlist_statement) or die("Error in delete".mysqli_error());
    if($wishlist_query){
        $success = "Your product removed from wishlist";
    }
}
if (isset($_POST['remove_item'])) {
    $order_details_idd = $_POST['order_details_id'];
    $delete_order = "DELETE FROM `order_details` WHERE `o_details_id`='$order_details_idd'";
    $delete_query = mysqli_query($conn, $delete_order) or die('Error in delete' . mysqli_error());
    if (!$delete_query) {
        die('Error in delete' . mysqli_error());
    } else {
        $success = "Your product is removed";
    }
}

if (isset($_POST['add_quantity'])) {
    $order_details_id = $_POST['order_details_id'];
    $quantity = $_POST['quantity'] +1;
    $update_statement = "UPDATE `order_details` SET `quantity`='$quantity' WHERE `o_details_id`='$order_details_id'  ";
    $update_query = mysqli_query($conn, $update_statement);
    if (!$update_query) {
        die('Error in update' . mysqli_error($conn));
    } else {
        $success = "Updated successfully";
    }
}
if (isset($_POST['decrement_quantity'])) {
    $order_details_id = $_POST['order_details_id'];
    $quantity = $_POST['quantity']-1;
    if($_POST['quantity'] > 1){
        $update_statement = "UPDATE `order_details` SET `quantity`='$quantity' WHERE `o_details_id`='$order_details_id'  ";
        $update_query = mysqli_query($conn, $update_statement);
        if (!$update_query) {
            die('Error in update' . mysqli_error($conn));
        } else {
            $success = "Updated successfully";
        }
    }else{
        $delete_statement = "DELETE FROM `order_details` WHERE `o_details_id`='$order_details_id'  ";
        $delete_query = mysqli_query($conn, $delete_statement);
        if (!$delete_query) {
            die('Error in delete' . mysqli_error($conn));
        } else {
            $success = "Removed successfully";
        }
    }
}
if (isset($_POST['submit_order'])) {
    $user_id = $_SESSION['user_id'];
    $order_id = $_POST['order_id'];
    $total_price = $_POST['total_price'];
    $additional_info = mysqli_real_escape_string($conn, $_POST['additional_info']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = $_POST['address'];
    $visa = password_hash($_POST['visa'], PASSWORD_DEFAULT);
    $current_date = date("Y-m-d H:i:s");
    $submit_order_statement = "UPDATE orders SET `statues`='submitted' , `address`='$address', `additional_info`='$additional_info', `phone`='$phone', `visa`='$visa' , `total_price`='$total_price' , `created_at`= '$current_date' WHERE `id`='$order_id'  ";
    $order_query = mysqli_query($conn, $submit_order_statement) or die("error in checkout".mysqli_error($conn));

    if (!$order_query) {
        die('Error in update' . mysqli_error($conn));
    } else {
        $submitted = "Request received successfully";
        $_SESSION['order_id'] = $order_id;
    }
}
if (isset($_POST['add_promo_code'])) {
    $user_id = $_SESSION['user_id'];
    $order_id = $_POST['order_id'];
    $promo_code = $_POST['promo_code'];
    if($promo_code == "discount20" || $promo_code == "discount30" || $promo_code == "discount50"){
        if($promo_code == "discount20"){
            $discount = 20;
        }else if($promo_code == "discount30"){
            $discount = 30;
        }else if($promo_code == "discount50"){
            $discount = 50;
        }
        $submit_order_statement = "UPDATE orders SET `promo_code`='$discount' WHERE `id`='$order_id'  ";
        $order_query = mysqli_query($conn, $submit_order_statement) or die("error in checkout".mysqli_error($conn));
    
        if (!$order_query) {
            die('Error in update' . mysqli_error($conn));
        } else {
            $promo_code_status = "Promo code added successfully";
            $_SESSION['order_id'] = $order_id;
        }
    }else{
        $promo_code_status = "This promo code is not valid";
    }
}
