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
            $query = "DELETE FROM sign_up_requests WHERE request_id IN ($ids)";
            if (mysqli_query($connection, $query)) {
                $message = "Sign-up Requests deleted successfully.";
            } else {
                $message = "Error deleting Sign-up Requests: " . mysqli_error($connection);
            }
        }
    }

    // Handle sorting
    $sort_column = isset($_POST['sort_column']) ? $_POST['sort_column'] : 'request_id';
    $sort_order = isset($_POST['sort_order']) && $_POST['sort_order'] == 'asc' ? 'asc' : 'desc';

    // Adjust query based on entries per page
    $entries_per_page = isset($_POST['entries_select']) ? (int)$_POST['entries_select'] : 10;

    // Adjust query based on search input
    $search_input = isset($_POST['search_input']) ? mysqli_real_escape_string($connection, $_POST['search_input']) : '';

    // Handle pagination
    $current_page = isset($_POST['current_page']) ? (int)$_POST['current_page'] : 1;
    $offset = ($current_page - 1) * $entries_per_page;

    // Build query with search condition
    $query = "SELECT * FROM sign_up_requests";


    if ($search_input) {
        $search_condition = " WHERE request_id LIKE '%$search_input%'
                OR user_gender LIKE '%$search_input%'
                OR user_email LIKE '%$search_input%'
                OR username LIKE '%$search_input%'
                OR user_phone LIKE '%$search_input%'
                OR user_firstname LIKE '%$search_input%'
                OR user_lastname LIKE '%$search_input%'
                OR user_address LIKE '%$search_input%'
                OR brief LIKE '%$search_input%'
                OR is_artist LIKE '%$search_input%'
                OR is_craftsmen LIKE '%$search_input%'
                OR brand_name LIKE '%$search_input%'
                OR social_media_links LIKE '%$search_input%'
                OR artisan_country LIKE '%$search_input%'
                OR artisan_state LIKE '%$search_input%'
                OR artisan_status LIKE '%$search_input%'";

        $query .= $search_condition;
        // $total_query .= $search_condition;
    }

    // Add sorting and pagination
    $query .= " ORDER BY $sort_column $sort_order
                LIMIT $entries_per_page OFFSET $offset";


    // Refetch data after processing and deletion
$display_requests_to_table_query = mysqli_query($connection, $query);

// Get total number of records for pagination
$total_query = "SELECT COUNT(*) as total FROM sign_up_requests";
$total_result = mysqli_query($connection, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $entries_per_page);

    // Fetch sign-up requests to process
$result = mysqli_query($connection, $query);



while ($row = mysqli_fetch_assoc($result)) {
    if ($row['artisan_status'] == 'approved') {
        // Prepare data for users table
        $user_gender = mysqli_real_escape_string($connection, $row['user_gender']);
        $user_email = mysqli_real_escape_string($connection, $row['user_email']);
        $username = mysqli_real_escape_string($connection, $row['username']);
        $user_phone = mysqli_real_escape_string($connection, $row['user_phone']);
        $user_firstname = mysqli_real_escape_string($connection, $row['user_firstname']);
        $user_lastname = mysqli_real_escape_string($connection, $row['user_lastname']);
        $user_password = mysqli_real_escape_string($connection, $row['user_password']);
        $user_address = mysqli_real_escape_string($connection, $row['user_address']);

        // Insert into users table
        $user_query = "INSERT INTO users (user_gender, user_email, username, user_phone, user_firstname, user_lastname, user_password, user_address) 
                       VALUES ('$user_gender', '$user_email', '$username', '$user_phone', '$user_firstname', '$user_lastname', '$user_password', '$user_address')";
        mysqli_query($connection, $user_query);

        $last_inserted_id = mysqli_insert_id($connection);

        // Prepare data for artisans table
        $brief = mysqli_real_escape_string($connection, $row['brief']);
        $is_artist = mysqli_real_escape_string($connection, $row['is_artist']);
        $is_craftsmen = mysqli_real_escape_string($connection, $row['is_craftsmen']);
        $brand_name = mysqli_real_escape_string($connection, $row['brand_name']);
        $social_media_links = mysqli_real_escape_string($connection, $row['social_media_links']);
        $country = mysqli_real_escape_string($connection, $row['artisan_country']);
        $state = mysqli_real_escape_string($connection, $row['artisan_state']);

        // Insert into artisans table
        $artisan_query = "INSERT INTO artisans (artisan_ID, is_artist, is_craftsmen, brand_name, brief, social_media_links, artisan_country, artisan_state) 
                          VALUES ('$last_inserted_id' ,'$is_artist', '$is_craftsmen', '$brand_name', '$brief', '$social_media_links', '$country', '$state')";
        mysqli_query($connection, $artisan_query);

      // Delete processed rows from sign_up_requests
      $delete_query = "DELETE FROM sign_up_requests where artisan_status = 'approved' ";
      mysqli_query($connection, $delete_query);
    }
}



    ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <?php include "../admin/fetch_requests.php";?>
                <div class="col-lg-12">
                    <h1 class="page-header">Sign-up Requests</h1>
                </div>
            </div>

            <form class="admin_table" method="POST" action="sign_up_requests.php">
                <div class="table-container request_table">
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
                            Search: <input placeholder="Search Entries" class="cat_Search" type="text" id="search-input" name="search_input" value="<?php echo htmlspecialchars($search_input); ?>">
                        </div>
                    </div>
                    <table id="requests-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all-checkbox" onclick="toggleSelectAll(this)"></th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="request_id">Request ID <i class="fa-solid fa-sort"></i></button>
                                    <input type="hidden" name="sort_order" value="<?php echo $sort_order == 'asc' ? 'desc' : 'asc'; ?>">
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="user_gender">Gender <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="user_email">E-mail <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="username">Username <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="user_phone">Phone No. <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="user_firstname">First Name <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="user_lastname">Last Name <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="user_address">Address <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="brief">Brief <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="is_artist">is_Artist <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="is_craftsmen">is_Craftsmen <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="brand_name">Brand Name <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="social_media_links">Social Links <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="artisan_country">Country <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="artisan_state">State <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="artisan_status">Status <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>Approve</th>
                                <th>Unapproved</th>
                                <th>pending</th>
                                <!-- <th>Edit</th> -->
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php while ($row = mysqli_fetch_assoc($display_requests_to_table_query)) {
                                echo "<tr>";
                                echo "<td><input type='checkbox' name='selected_ids[]' value='{$row['request_id']}' class='row-checkbox'></td>";
                                echo "<td>{$row['request_id']}</td>";
                                echo "<td>{$row['user_gender']}</td>";
                                echo "<td>{$row['user_email']}</td>";
                                echo "<td>{$row['username']}</td>";
                                echo "<td>{$row['user_phone']}</td>";
                                echo "<td>{$row['user_firstname']}</td>";
                                echo "<td>{$row['user_lastname']}</td>";
                                echo "<td>{$row['user_address']}</td>";
                                echo "<td>{$row['brief']}</td>";
                                echo "<td>{$row['is_artist']}</td>";
                                echo "<td>{$row['is_craftsmen']}</td>";
                                echo "<td>{$row['brand_name']}</td>";
                                echo "<td>{$row['social_media_links']}</td>";
                                echo "<td>{$row['artisan_country']}</td>";
                                echo "<td>{$row['artisan_state']}</td>";
                                echo "<td>{$row['artisan_status']}</td>";
                                echo "<td><a href='sign_up_requests.php?approve={$row['request_id']}'>Approve</a></td>";
                                echo "<td><a href='sign_up_requests.php?unapprove={$row['request_id']}'>Unapprove</a></td>";
                                echo "<td><a href='sign_up_requests.php?pending={$row['request_id']}'>Pending</a></td>";
                                // echo "<td><a href='edit_requests.php?edit={$row['request_id']}'>Edit</a></td>";
                                echo "<td><a href='delete_requests.php?id={$row['request_id']}'>Delete</a></td>";
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

        </div>
    </div>
</div>

<script>
        function toggleSelectAll(checkbox) {
            const checkboxes = document.querySelectorAll('.row-checkbox');
            checkboxes.forEach(cb => cb.checked = checkbox.checked);
        }

        document.getElementById('search-input').addEventListener('input', function () {
            this.form.submit();
        });
    </script>

<?php if(isset($_GET['approve'])){
$the_request_id = $_GET['approve'];
$query = "UPDATE sign_up_requests SET artisan_status = 'approved' WHERE request_id = {$the_request_id}";
$approve_query = mysqli_query($connection,$query);
header("location: sign_up_requests.php");
}
?>


<?php if(isset($_GET['unapprove'])){
$the_request_id = $_GET['unapprove'];
$query = "UPDATE sign_up_requests SET artisan_status = 'unapproved' WHERE request_id = {$the_request_id}";
$unapproved_query = mysqli_query($connection,$query);
header("location: sign_up_requests.php");
}
?>

<?php if(isset($_GET['pending'])){
$the_request_id = $_GET['pending'];
$query = "UPDATE sign_up_requests SET artisan_status = 'pending' WHERE request_id = {$the_request_id}";
$unapproved_query = mysqli_query($connection,$query);
header("location: sign_up_requests.php");
}
?>


<?php if(isset($_GET['id'])){
$the_request_id = $_GET['id'];
$query = "DELETE FROM sign_up_requests WHERE request_id = {$the_request_id}";
$Delete_query = mysqli_query($connection,$query);
header("location: sign_up_requests.php");
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



<!-- <script src="js/custom.js"></script> -->
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