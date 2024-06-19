<?php

require_once("../functions/connection.php");
if(!isset($_SESSION['admin_id'])){
    header("location: ../admin/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin Dashboard - Feedbacks
    </title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
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
</head>

<!-- Start body-->

<body class="vertical-layout vertical-menu 2-columns fixed-navbar  menu-expanded pace-done" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- header -->
    <?php include('includes/header.php') ?>
    <?php include('includes/sidebar.php') ?>
    <!-- end header -->


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">

            </div>
            <div class="content-body">
                <!-- Basic Tables start -->
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary bg-darken-2 white text-center card-title-bold text-capitalize">
                                <h4 class="card-title text-white">Feedbacks</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Table with outer spacing -->
                                    <div class="table-responsive">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Username</th>
                                                    <th>Order #</th>
                                                    <!-- <th>name</th> -->
                                                    <th>Email</th>
                                                    <th>Recommend</th>
                                                    <th>Rate</th>
                                                    <th>Share feedback</th>
                                                    <th>Message</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $feedbacks = "SELECT feedback.* , users.name As username from  `feedback` INNER JOIN `users` on feedback.user_id = users.id ORDER BY id DESC ";
                                                $feedback_query = mysqli_query($conn, $feedbacks) or die('feedback_error' . mysqli_error($con));
                                                while ($result = mysqli_fetch_array($feedback_query)) {
                                                ?>
                                                    <tr>
                                                        <td class="text-truncate"><?= $result['id'] ?></td>
                                                        <td class="text-truncate"><?= $result['name'] ?></td>
                                                        <td class="text-truncate"><?= $result['username'] ?></td>
                                                        <td class="text-truncate"><?= $result['order_id'] ?></td>
                                                        <td class="text-truncate"><?= $result['email'] ?></td>
                                                        <td class="text-truncate"><?= $result['recommend'] ?></td>
                                                        <td class="text-truncate"><?= $result['rate'] ?></td>
                                                        <td class="text-truncate"><?= $result['share_feedback'] ?></td>
                                                        <td class="text-truncate"><?= $result['message'] ?></td>

                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Tables end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Footer-->
    <?php include('includes/footer.php') ?>