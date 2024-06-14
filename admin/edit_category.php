
<form class="form-group edit_cat_form" action="" method="post">
    <!-- <label>Update Category</label> -->

    <?php 
    if (isset($_GET['edit'])) {
        $category_id = $_GET['edit'];

        $query = "SELECT * FROM categories WHERE category_id = {$category_id}";
        $select_category_id = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_category_id)) {
            $category_title = $row['category_title']; 
            $parent_id = $row['parent_id'];
            $parent_category_title = "";

            if (!empty($parent_id)) {
                // Fetch parent category title if parent_id is not null
                $query = "SELECT category_title FROM categories WHERE category_id = {$parent_id}";
                $select_parent_category = mysqli_query($connection, $query);

                if ($parent_row = mysqli_fetch_assoc($select_parent_category)) {
                    $parent_category_title = $parent_row['category_title'];
                }
            }
    ?>

    
    <input value="<?php if (isset($category_title)) { echo $category_title; } ?>" class="form-control col-lg-4 cat_Search" type="text" name="category_title" placeholder="Category Title">

    <?php if (!empty($parent_id)) { ?>
        <input value="<?php if (isset($parent_category_title)) { echo $parent_category_title; } ?>" class="form-control col-lg-4 cat_Search" type="text" name="parent_category_title" placeholder="Parent Category Title">
    <?php } ?>
    <br>
    <input class="add_cat_btn update_cat_btn" id="Update_category" type="submit" name="Update_Category" value="Update Category">
    <?php
        }
    }
    ?>

    <?php  
    // UPDATE CATEGORY QUERY
    if (isset($_POST['Update_Category'])) {
        $the_category_title = $_POST['category_title'];
        $the_parent_category_title = isset($_POST['parent_category_title']) ? $_POST['parent_category_title'] : null;
        
        if (!empty($parent_id)) {
            // Update both category and parent category
            $query = "UPDATE categories 
                      SET category_title = '{$the_category_title}' 
                      WHERE category_id = {$category_id}";
            $update_query = mysqli_query($connection, $query);

            $query = "UPDATE categories 
                      SET category_title = '{$the_parent_category_title}' 
                      WHERE category_id = {$parent_id}";
            $update_parent_query = mysqli_query($connection, $query);
            
            if (!$update_query || !$update_parent_query) {
                die("Query Failed" . mysqli_error($connection));
            }
        } else {
            // Update only the category name if parent_id is null
            $query = "UPDATE categories 
                      SET category_title = '{$the_category_title}' 
                      WHERE category_id = {$category_id}";
            $update_query = mysqli_query($connection, $query);
            
            if (!$update_query) {
                die("Query Failed" . mysqli_error($connection));
            }
        }

        header("Location: categories.php");
    }
    ?>
  
</form>
