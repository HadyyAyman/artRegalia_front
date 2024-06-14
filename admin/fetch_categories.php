<?php

$categories = [
  'artist' => [],
  'craftsmen' => []
];

// Fetch all categories
$query = "SELECT * FROM categories";
$result = mysqli_query($connection, $query);

// Organize categories by type and hierarchy
$categories = ['artist' => ['main' => [], 'sub' => []], 'craftsmen' => ['main' => [], 'sub' => []]];
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['parent_id'] == NULL) {
        $categories[$row['category_type']]['main'][] = $row;
        $category_title = $row['category_title'];
    } else {
        $categories[$row['category_type']]['sub'][$row['parent_id']][] = $row;
        $category_title = $row['category_title'];
    }
}
