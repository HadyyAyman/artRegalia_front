<?php

if (isset($_POST['accept_reservation'])) {
    $reservation_id = $_POST['reservation_id']; 
    $email = $_POST['email']; 
    $price = $_POST['price']; 
    $name = $_POST['name']; 
    
    $update= "UPDATE `reservations` SET `artisan_status` = 'accepted', `artisan_id`=".$_SESSION['artisan_id']." , `price`='$price'  WHERE `id`='$reservation_id'"; 
    if(!mysqli_query($conn,$update)){ 
        die('Error:'. mysqli_error($conn));
    } else {
        $success ="Your doctor service accepted successfully";
        $to       = "$email";
        $subject  = 'The acceptance of special request for ' . "$name";
        
        // Button HTML with Placeholders
        $message = 'Hello this artRegalia<br><br>' .
                   'We have Offer for the special request we can do this for '.$price.' LE <br><br>' .
                   '<a href="http://localhost/artRegalia_front/acceptance.php?reservation_id='.$reservation_id.'" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">Accept Your Reservation</a>';
        $headers = 'From: johnmaher.bonder@gmail.com' . "\r\n" .
                   'MIME-Version: 1.0' . "\r\n" .
                   'Content-type: text/html; charset=iso-8859-1';
        
        mail($to, $subject, $message, $headers);
    }
}

