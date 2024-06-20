<?php
$users = "SELECT `id` FROM `users` ORDER BY `id`";
$users_count = mysqli_query($conn,$users) or die("Error:".mysqli_error($conn)) ;
$userId = mysqli_num_rows($users_count);
// 
$products = "SELECT `id` FROM `products` WHERE artisan_id = ".$_SESSION['artisan_id']." ORDER BY id";
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
$orders = "SELECT COUNT(DISTINCT orders.id) AS total_orders FROM orders JOIN order_details ON orders.id = order_details.order_id JOIN products ON order_details.product_id = products.id WHERE products.artisan_id = ".$_SESSION['artisan_id']." AND orders.statues = 'accepted'";
$orders_query = mysqli_query($conn,$orders) or die("Error:".mysqli_error($conn)) ;
$ordersCount = mysqli_fetch_array($orders_query);
// $ordersId = mysqli_num_rows($orders_count);


    $orders_total ="SELECT SUM(order_details.quantity * products.price) AS total_profit FROM orders JOIN order_details ON orders.id = order_details.order_id JOIN products ON order_details.product_id = products.id WHERE products.artisan_id = ".$_SESSION['artisan_id']." AND orders.statues = 'accepted'";
    $orders_total_q = mysqli_query($conn, $orders_total);
    $profitPlus = mysqli_fetch_array($orders_total_q);



//     SELECT products.artisan_id,
//        COUNT (DISTINCT orders.id) AS total_orders,
//        products.id AS product_id,
//        products.name AS product_name,
//        COUNT(order_details.o_details_id) AS product_order_count,
//        SUM(order_details.quantity) AS product_quantity_sold FROM orders
// JOIN order_details ON order_details.o_details_id = order_details.order_id
// JOIN products ON order_details.product_id = products.id
// WHERE orders.statues = 'accepted'
//   AND products.artist_id = 1
?>