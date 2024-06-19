<?php

if (isset($_POST['accept_reservation'])) {
    $reservation_id = $_POST['reservation_id']; 
    
    $update= "UPDATE `reservations` SET  `status` = 'accepted'  WHERE `id`='$reservation_id'"; 
    if(!mysqli_query($conn,$update)){ 
        die('Error:'. mysqli_error($conn));
    } else {
        $success ="Your doctor service accepted successfully";
    }
}
if (isset($_POST['reject_reservation'])) {
    $reservation_id = $_POST['reservation_id']; 
    
    $update= "UPDATE `reservations` SET  `status` = 'rejected'  WHERE `id`='$reservation_id'"; 
    if(!mysqli_query($conn,$update)){ 
        die('Error:'. mysqli_error($conn));
    } else {
        $success ="Your doctor service rejected successfully";
    }
}
