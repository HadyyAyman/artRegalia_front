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
                    <h1 class="page-header">Operations</h1>
                </div>
            </div>

            <form class="admin_table" method="POST" action="operations.php">
                <div class="table-container request_table">
                    <div class="controls">
                    <div class="entries">
                    Show
                    <select id="entries-select" name="entries_select" onchange="this.form.submit()">
                        <option value="5" >5</option>
                        <option value="10" >10</option>
                        <option value="25" >25</option>
                    </select>
                    entries
                </div>
                <button class="page-link" type="submit" name="delete_selected">Delete Selected</button>
                <div>
                Search: <input  placeholder="Search Entries" class ="cat_Search" type="text" id="search-input" name="search_input" value="">
                </div>
                    </div>
                    <table id="requests-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all-checkbox" onclick="toggleSelectAll(this)"></th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="operations_ID">Operation ID <i class="fa-solid fa-sort"></i></button>
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
                                    <button class="btn-header" type="submit" name="sort_column" value="Authority">Authority <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="hour_rate">Hour Rate <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>
                                    <button class="btn-header" type="submit" name="sort_column" value="user_role">User Role <i class="fa-solid fa-sort"></i></button>
                                </th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                        <?php
                            // Fetch combined data from users and operations tables
                            $query = "SELECT u.*, o.* FROM users u 
                                      INNER JOIN operations o ON u.user_ID = o.operations_ID
                                      ORDER BY u.user_ID ASC";
                            $result = mysqli_query($connection, $query);
                            if (!$result) {
                                die("Query Failed: " . mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                $user_ID = $row['user_ID'];
                                $operations_ID = $row['operations_ID'];
                                $user_gender = $row['user_gender'];
                                $user_email = $row['user_email'];
                                $username = $row['username'];
                                $user_phone = $row['user_phone'];
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $user_address = $row['user_address'];
                                // Assuming the following column names exist in your operations table
                                $authority = $row['authority'];
                                $hour_rate = $row['hour_rate'];
                                $user_role = $row['operation_role'];

                                echo "<tr>";
                                echo "<td><input type='checkbox' name='selected_ids[]' value='{$user_ID}'></td>";
                                echo "<td>{$operations_ID}</td>";
                                echo "<td>{$user_gender}</td>";
                                echo "<td>{$user_email}</td>";
                                echo "<td>{$username}</td>";
                                echo "<td>{$user_phone}</td>";
                                echo "<td>{$user_firstname}</td>";
                                echo "<td>{$user_lastname}</td>";
                                echo "<td>{$user_address}</td>";
                                echo "<td>{$authority}</td>";
                                echo "<td>{$hour_rate}</td>";
                                echo "<td>{$user_role}</td>";
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