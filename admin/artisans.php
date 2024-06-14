<?php
ob_start(); // Start output buffering
include "../includes/db.php";
session_start();
?>



<?php include "admin_includes/admin_header.php";?>

<div id="wrapper">
    <?php include "admin_includes/admin_navigation.php";?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Artisans</h1>
                </div>
            </div>

            <form class="admin_table" method="POST" action="sign_up_requests.php">
                <div class="table-container request_table">
                    <div class="controls">
                        <div class="entries">
                            Show
                            <select id="entries-select" name="entries_select" onchange="this.form.submit()">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                            </select>
                            entries
                        </div>
                        <button class="page-link" type="submit" name="delete_selected">Delete Selected</button>
                        <div>
                            Search: <input placeholder="Search Entries" class="cat_Search" type="text" id="search-input" name="search_input" value="">
                        </div>
                    </div>
                    <table id="requests-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all-checkbox" onclick="toggleSelectAll(this)"></th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="artisan_id">Artisan ID <i class="fa-solid fa-sort"></i></button>
                                    <input type="hidden" name="sort_order" value="">
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

                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                        <?php
                            // Fetch combined data from users and artisans tables
                            $query = "SELECT u.*, a.* FROM users u INNER JOIN artisans a ON u.user_id = a.artisan_ID WHERE a.is_artist IS NOT NULL AND a.is_craftsmen IS NOT NULL ORDER BY u.user_id ASC";
                            $result = mysqli_query($connection, $query);
                            if (!$result) {
                                die("Query Failed: " . mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                $user_id = $row['user_ID'];
                                $artisan_id = $row['artisan_ID'];
                                $user_gender = $row['user_gender'];
                                $user_email = $row['user_email'];
                                $username = $row['username'];
                                $user_phone = $row['user_phone'];
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $user_address = $row['user_address'];
                                $brief = $row['brief'];
                                $is_artist = $row['is_artist'];
                                $is_craftsmen = $row['is_craftsmen'];
                                $brand_name = $row['brand_name'];
                                $social_media_links = $row['social_media_links'];
                                $artisan_country = $row['artisan_country'];
                                $artisan_state = $row['artisan_state'];

                                echo "<tr>";
                                echo "<td><input type='checkbox' name='selected_ids[]' value='{$user_id}'></td>";
                                echo "<td>{$artisan_id}</td>";
                                echo "<td>{$user_gender}</td>";
                                echo "<td>{$user_email}</td>";
                                echo "<td>{$username}</td>";
                                echo "<td>{$user_phone}</td>";
                                echo "<td>{$user_firstname}</td>";
                                echo "<td>{$user_lastname}</td>";
                                echo "<td>{$user_address}</td>";
                                echo "<td>{$brief}</td>";
                                echo "<td>{$is_artist}</td>";
                                echo "<td>{$is_craftsmen}</td>";
                                echo "<td>{$brand_name}</td>";
                                echo "<td>{$social_media_links}</td>";
                                echo "<td>{$artisan_country}</td>";
                                echo "<td>{$artisan_state}</td>";
                                echo "<td><a href=''>Edit</a></td>";
                                echo "<td><a href=''>Delete</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination" id="pagination">
                                <li class="page-item"><button class="page-link" type="submit" name="current_page" value="">Previous</button></li>
                                <li class="page-item "><button class="page-link" type="submit" name="current_page" value="">1</button></li>
                                <li class="page-item"><button class="page-link" type="submit" name="current_page" value="">Next</button></li>
                        </ul>
                    </nav>
                </div>
            </form>

        </div>
    </div>
</div>
        </div>
      </div>

      <!-- JS Functionality: SIDEBAR DROPDOWN FUNCTIONALITY -->
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