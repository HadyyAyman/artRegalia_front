<?php
require_once('functions/connection.php');
if($_GET['reservation_id'] && $_GET['artisan_id']){
    $update_reservation= "UPDATE `reservations` SET `user_status` = 'accepted' , `artisan_status` = 'accepted', `artisan_id`=".$_GET['artisan_id']."  WHERE `id`=".$_GET['reservation_id'].""; 
    $update_reservation_query = mysqli_query($conn,$update_reservation) or die("Error:".mysqli_error($conn)) ;
    if($update_reservation_query){
        header("location: index.php");
    }
}