<?php require_once("../functions/connection.php"); ;

    include('functions/reservations_function.php');
    if(!isset($_SESSION['admin_id'])){
        header("location: ../admin/");
    }
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Admin Dashboard - Reservations
  </title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
    <link href="app-assets/css/all.min">

  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">

  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/cryptocoins/cryptocoins.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <!-- fixed-top-->
    <?php include('includes/header.php'); ?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php include('includes/sidebar.php'); ?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-primary bg-darken-2 white text-center card-title-bold text-capitalize">Reservations</div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard table-responsive">
                                    <?php if(isset($success)){ ?>
                                        <div class="alert alert-success alert-dismissible mt-1 fade show" role="alert">
                                            <h5><?= $success ?></h5>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php } ?>
                                        <table class="table table-striped table-bordered dom-jQuery-events">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Material</th>
                                                <th>Full Name</th>
                                                <th>Username</th>
                                                <th>User Status</th>
                                                <th>Artisan Status</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $users_reservations = "SELECT reservations.*, users.username , users.email ,users.name AS full_name   FROM reservations INNER JOIN users on reservations.user_id = users.id
                                            WHERE reservations.user_status = 'pending'
                                            
                                            ORDER by reservations.id DESC";
                                            $query = mysqli_query($conn,$users_reservations) or die("Error:".mysqli_error($conn)) ;
                                            while($result= mysqli_fetch_array($query)){
                                            
                                                if ($result["user_status"] == 'accepted') {
                                                    $user_status = "<span class='btn btn-success'>Accepted</span>";
                                                }elseif ($result["user_status"] == 'pending') {
                                                    $user_status = "<span class='btn btn-warning'>pending</span>";
                                                } 
                                                else{
                                                    $user_status = "<span class='btn btn-danger'>Rejected</span>";
                                                }

                                                if ($result["artisan_status"] == 'accepted') {
                                                    $artisan_status = "<span class='btn btn-success'>Accepted</span>";
                                                }elseif ($result["artisan_status"] == 'pending') {
                                                    $artisan_status = "<span class='btn btn-warning'>pending</span>";
                                                } 
                                                else{
                                                    $artisan_status = "<span class='btn btn-danger'>Rejected</span>";
                                                }
                                            ?>
                                            
                                            <tr>
                                                <td><?php echo $result["id"] ?></td>
                                                <td><?php echo $result["name"] ?></td>
                                                <td><?php echo $result["full_name"] ?></td>
                                                <td><?php echo $result["username"] ?></td>
                                                <td><?php echo $user_status ?></td>
                                                <td><?php echo $artisan_status ?></td>
                                                <td> <img src="../images/<?php echo $result["image"] ?>" height="100px" width="100px" alt=""></td>
                                                <td><?php echo $result["description"] ?></td>
                                                
                                                
                                            </tr>

                                            <?php
                                            }
                                            ?>
                                            
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Material</th>
                                                <th>Full Name</th>
                                                <th>Username</th>
                                                <th>User Status</th>
                                                <th>Artisan Status</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                            </tr>
                                        </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- DOM - jQuery events table -->
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php include('includes/footer.php'); ?>
    <!-- BEGIN VENDOR JS-->
