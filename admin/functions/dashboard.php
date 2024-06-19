<?php
$users = "SELECT `id` FROM `users` ORDER BY `id`";
$users_count = mysqli_query($conn,$users) or die("Error:".mysqli_error($conn)) ;
$userId = mysqli_num_rows($users_count);
// 
$products = "SELECT `id` FROM `products` ORDER BY id";
$products_count = mysqli_query($conn,$products) or die("Error:".mysqli_error($conn)) ;
$productsId = mysqli_num_rows($products_count);
// 
$artisans = "SELECT `id` FROM `artisans` ORDER BY `id`";
$artisans_count = mysqli_query($conn,$artisans) or die("Error:".mysqli_error($conn)) ;
$artisansId = mysqli_num_rows($artisans_count);
// 
// 
$reservations = "SELECT `id` FROM `reservations` ORDER BY `id`";
$reservations_count = mysqli_query($conn,$reservations) or die("Error:".mysqli_error($conn)) ;
$reservationsId = mysqli_num_rows($reservations_count);

// 
$orders = "SELECT `id` FROM `orders` ORDER BY `id`";
$orders_count = mysqli_query($conn,$orders) or die("Error:".mysqli_error($conn)) ;
$ordersId = mysqli_num_rows($orders_count);
// 

// 
$orders = "SELECT `id` FROM `orders` ORDER BY `id`";
$orders_count = mysqli_query($conn,$orders) or die("Error:".mysqli_error($conn)) ;
$ordersId = mysqli_num_rows($orders_count);
// 

    $orders_total ="SELECT * from `orders` WHERE `statues`='accepted'";
    $orders_total_q = mysqli_query($conn, $orders_total);
    $profitPlus = 0; 
    while($result = mysqli_fetch_array($orders_total_q)){ 
        $profitPlus +=  $result['total_price']; 
    }
?>