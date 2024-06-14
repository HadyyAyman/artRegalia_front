<?php
ob_start(); // Start output buffering
include "../includes/db.php"; // Include your database connection script
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_title = $_POST['category_title'];
    $parent_id = $_POST['parent_id'];
    $category_type = $_POST['category_type'];

    if ($parent_id == '') {
        $parent_id = NULL;
    }

    $query = "INSERT INTO categories (category_title, parent_id, category_type) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($query);

    if ($stmt === false) {
        die("Error preparing statement: " . $connection->error);
    }

    $stmt->bind_param("sis", $category_title, $parent_id, $category_type);

    if ($stmt->execute()) {
        echo "Category added successfully!";
        header("Location: categories.php");
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>