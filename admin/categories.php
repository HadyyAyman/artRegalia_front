
<?php
ob_start(); // Start output buffering
include "../includes/db.php";
session_start();
?> 

<?php include "admin_includes/admin_header.php";?>

<div id="wrapper">

<?php include "admin_includes/admin_navigation.php";?>


<?php

// Handle deletion of selected rows
if (isset($_POST['delete_selected']) && isset($_POST['selected_ids'])) {
    $selected_ids = $_POST['selected_ids'];
    if (!empty($selected_ids)) {
        $ids = implode(',', array_map('intval', $selected_ids)); // Sanitize input
        $query = "DELETE FROM categories WHERE category_id IN ($ids)";
        if (mysqli_query($connection, $query)) {
            $message = "Categories deleted successfully.";
        } else {
            $message = "Error deleting categories: " . mysqli_error($connection);
        }
    }
}

// Handle sorting
$sort_column = isset($_POST['sort_column']) ? $_POST['sort_column'] : 'category_id';
$sort_order = isset($_POST['sort_order']) && $_POST['sort_order'] == 'asc' ? 'asc' : 'desc';

// Adjust query based on entries per page
$entries_per_page = isset($_POST['entries_select']) ? (int)$_POST['entries_select'] : 10;

// Adjust query based on search input
$search_input = isset($_POST['search_input']) ? mysqli_real_escape_string($connection, $_POST['search_input']) : '';

// Handle pagination
$current_page = isset($_POST['current_page']) ? (int)$_POST['current_page'] : 1;
$offset = ($current_page - 1) * $entries_per_page;

// Build query
$query = "SELECT c1.category_id, c1.category_title, c1.parent_id, c1.Category_type, c2.category_title AS parent_category_title
          FROM categories c1
          LEFT JOIN categories c2 ON c1.parent_id = c2.category_id";

if ($search_input) {
    $query .= " WHERE c1.category_id LIKE '%$search_input%'
                OR c1.category_title LIKE '%$search_input%'
                OR c1.parent_id LIKE '%$search_input%'
                OR c2.category_title LIKE '%$search_input%'
                OR c1.Category_type LIKE '%$search_input%'";
}

$query .= " ORDER BY $sort_column $sort_order
            LIMIT $entries_per_page OFFSET $offset";

$display_category_to_table_query = mysqli_query($connection, $query);

// Get total number of records for pagination
$total_query = "SELECT COUNT(*) as total FROM categories";
$total_result = mysqli_query($connection, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $entries_per_page);
?>

  <div id="page-wrapper">
    <div class="container-fluid">

      <div class="row">
      <?php include "../admin/fetch_categories.php"; ?>
        <div class="col-lg-12">
          <h1 class="page-header">Categories</h1>
        </div>
      </div>

      <body>
      <form class="admin_table" method="POST" action="categories.php">
        <div class="table-container">
            <div class="controls">
                <div class="entries">
                    Show
                    <select id="entries-select" name="entries_select" onchange="this.form.submit()">
                        <option value="5" <?php echo $entries_per_page == 5 ? 'selected' : ''; ?>>5</option>
                        <option value="10" <?php echo $entries_per_page == 10 ? 'selected' : ''; ?>>10</option>
                        <option value="25" <?php echo $entries_per_page == 25 ? 'selected' : ''; ?>>25</option>
                    </select>
                    entries
                </div>
                <button class="page-link" type="submit" name="delete_selected">Delete Selected</button>
                <div>
                Search: <input  placeholder="Search Entries" class ="cat_Search" type="text" id="search-input" name="search_input" value="<?php echo htmlspecialchars($search_input); ?>">
                </div>
            </div>
            <table id="category-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all-checkbox" onclick="toggleSelectAll(this)"></th>
                        <th>
                            <button class="btn-header" type="submit" name="sort_column" value="category_id">Category ID <i class="fa-solid fa-sort"></i></button>
                            <input type="hidden" name="sort_order" value="<?php echo $sort_order == 'asc' ? 'desc' : 'asc'; ?>">
                        </th>
                        <th>
                            <button class="btn-header" type="submit" name="sort_column" value="category_title">Category Name <i class="fa-solid fa-sort"></i></button>
                        </th>
                        <th>
                            <button class="btn-header" type="submit" name="sort_column" value="parent_id">Parent ID <i class="fa-solid fa-sort"></i></button>
                        </th>
                        <th>
                            <button class="btn-header" type="submit" name="sort_column" value="parent_category_title">Parent Name <i class="fa-solid fa-sort"></i></button>
                        </th>
                        <th>
                            <button class="btn-header" type="submit" name="sort_column" value="Category_type">Category Type <i class="fa-solid fa-sort"></i></button>
                        </th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while($row = mysqli_fetch_assoc($display_category_to_table_query)){
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='selected_ids[]' value='{$row['category_id']}' class='row-checkbox'></td>";
                        echo "<td>{$row['category_id']}</td>";
                        echo "<td>{$row['category_title']}</td>";
                        echo "<td>{$row['parent_id']}</td>";
                        echo "<td>{$row['parent_category_title']}</td>";
                        echo "<td>{$row['Category_type']}</td>";
                        echo "<td><a href='categories.php?edit={$row['category_id']}'>Edit</a></td>";
                        echo "<td><a href='categories.php?id={$row['category_id']}'>Delete</a></td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination" id="pagination">
                    <?php if ($current_page > 1): ?>
                        <li class="page-item"><button class="page-link" type="submit" name="current_page" value="<?php echo $current_page - 1; ?>">Previous</button></li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>"><button class="page-link" type="submit" name="current_page" value="<?php echo $i; ?>"><?php echo $i; ?></button></li>
                    <?php endfor; ?>
                    <?php if ($current_page < $total_pages): ?>
                        <li class="page-item"><button class="page-link" type="submit" name="current_page" value="<?php echo $current_page + 1; ?>">Next</button></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </form>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Select/Deselect all checkboxes
            document.getElementById('select-all-checkbox').addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.row-checkbox');
                checkboxes.forEach(checkbox => checkbox.checked = this.checked);
            });

            // AJAX search functionality
            document.getElementById('search-input').addEventListener('keyup', function() {
                const searchValue = this.value;
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'categories.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (this.status === 200) {
                        document.getElementById('table-body').innerHTML = this.responseText;
                    }
                };
                xhr.send('search_input=' + searchValue);
            });
        });
    </script>



    
<div class="artisan-cat">
<h2>Artist Categories</h2>

<form  action="add_category.php" method="POST">
    <input type="hidden" name="category_type" value="artist" >
    <!-- <label for="category_title">Category Name:</label> -->
    <input type="text" class="cat_Search" name="category_title" placeholder="Category Name" required>
    <input type="submit" class="page-link add_cat_btn" value="Add Category">
</form>
<h2>Craftsmen Categories</h2>

<form  action="add_category.php" method="POST">
    <input type="hidden" name="category_type" value="craftsmen">
    <!-- <label for="parent_id">Parent Category (optional):</label> -->
    <select class="cat_Search" name="parent_id">
        <option value="">Parent Category (optional):</option>
        <option value="">None</option>
        <?php foreach ($categories['craftsmen']['main'] as $mainCategory): ?>
            <option value="<?php echo $mainCategory['category_id']; ?>"><?php echo $mainCategory['category_title']; ?></option>
        <?php endforeach; ?>
    </select>
    <!-- <label for="category_title">Category Name:</label> -->
    <input type="text" class="cat_Search" name="category_title" placeholder="Category Name" required>
    <input type="submit" class="page-link add_cat_btn"  value="Add Category">
</form>

<!-- Edit Modal -->
<?php include "./edit_category.php"; ?>
</div>
</div>
</div>



<?php if(isset($_GET['id'])){
$the_category_id = $_GET['id'];
$query = "DELETE FROM categories WHERE category_id = {$the_category_id}";
$Delete_query = mysqli_query($connection,$query);
header("location: categories.php");
}
?>
        </div>
      </div>

      <!-- JS Functionality -->
      <div class="row">
        <div class="col-lg-12">
            <div id="morris-area-chart" style="display:none"></div>
            <div id="morris-bar-chart" style="display:none"></div>
            <div id="morris-donut-chart" style="display:none"></div>
        </div>
      </div>


    </div>

</div>

</div>

<script src="js/custom.js"></script>
<script src="js/edit_modal.js"></script>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="js/dataTables/jquery.dataTables.min.js"></script>
<script src="js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

    
<?php include "admin_includes/admin_footer.php";?>
<?php ob_end_flush(); // End output buffering and flush the output ?>