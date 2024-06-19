<?php 
    $conn = mysqli_connect("localhost","root","","artregalia"); 
    if(!$conn){ 
        die('database connection fail: '.mysqli_error());
    } 
    session_start();

