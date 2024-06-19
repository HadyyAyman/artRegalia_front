<?php
if (isset($_GET['category_id'])) {
    $sql_select = "SELECT * FROM `category` where `id`=" . $_GET['category_id'] . " ";
    $category_id = $_GET['category_id'];
    $select_query = mysqli_query($conn, $sql_select) or die('ERROR in details' . mysqli_error());
    if (!$select_query) {
        die('ERROR in details' . mysqli_error($conn));
    } else {
        $result_details = mysqli_fetch_array($select_query);
    }
}

if (isset($_GET['artisan_id'])) {
    $sql_select = "SELECT * FROM `artisans` where `id`=" . $_GET['artisan_id'] . " ";
    $artisan_id = $_GET['artisan_id'];
    $select_query = mysqli_query($conn, $sql_select) or die('ERROR in details' . mysqli_error());
    if (!$select_query) {
        die('ERROR in details' . mysqli_error($conn));
    } else {
        $result_artisan_details = mysqli_fetch_array($select_query);
    }
}
if (isset($_GET['product_id'])) {
    $sql_select = "SELECT * FROM `products` where `id`=" . $_GET['product_id'] . " ";
    $product_id = $_GET['product_id'];
    $select_query = mysqli_query($conn, $sql_select) or die('ERROR in details' . mysqli_error());
    if (!$select_query) {
        die('ERROR in details' . mysqli_error($conn));
    } else {
        $result_product_details = mysqli_fetch_array($select_query);
        $sql_select_artisan = "SELECT * FROM `artisans` where `id`=" . $result_product_details['artisan_id'] . " ";
        $select_artisan_query = mysqli_query($conn, $sql_select_artisan) or die('ERROR in details' . mysqli_error());
        $result_artisan_details = mysqli_fetch_array($select_artisan_query);

    }
}