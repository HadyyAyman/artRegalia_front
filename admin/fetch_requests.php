<?php


// Fetch all categories
$query = "SELECT * FROM sign_up_requests";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($connection));
}
?>