<?php require_once("../functions/connection.php"); 
include("functions/artisans.php") ;
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
    <title>Admin Dashboard - Artisans
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
    <?php include("includes/header.php") ?>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php include("includes/sidebar.php") ?>
        <!-- BEGIN: Content-->
        <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">


            </div>
            <div class="content-body"><!-- Basic Tables start -->
                <div class="card">
                    <div class="card-body">
                        <?php if (isset($success)) { ?>
                            <div class="alert alert-success"><?php echo $success ?></div>
                        <?php } ?>
                        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#add_artisan">Add artisan</button> -->

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $artisans = "SELECT * FROM `artisans`";
                                $artisans_query = mysqli_query($conn, $artisans) or die('users_error' . mysqli_error());

                                while ($result = mysqli_fetch_array($artisans_query)) {
                                    if ($result['status'] == 1) {
                                        $status = "<span class='badge badge-success'>Accepted</span>";
                                    }else {
                                        $status = "<span class='badge badge-warning'>Pending</span>";
                                    }

                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $result['id'] ?></td>
                                        <td><?php echo $result['name'] ?></td>
                                        <td><?php echo $result['email'] ?></td>
                                        <td><?php echo $status ?></td>
                                        <td><img width="200" height="200" style="object-fit: cover;" src="../images/<?php echo $result['image'] ?>" alt=""></td>
                                        <td>

                                            <button class="btn btn-primary" data-toggle="modal" data-target="#update_artisan<?php echo $result['id'] ?>">Edit</button>
                                            <form method="POST">
                                                <input type="hidden" name="artisan_id" value="<?php echo $result['id'] ?>">
                                                <?php if ($result['status'] == 0) { ?>
                                                    <button type="submit" name="accept_artisan" class="btn btn-success" onclick="return confirm('Are you need to accept #<?php echo $result['id'] ?>');">Accept</button>
                                                <?php }else{ ?>
                                                    <button type="submit" name="reject_artisan" class="btn btn-danger" onclick="return confirm('Are you need to reject #<?php echo $result['id'] ?>');">Reject</button>
                                                <?php } ?>

                                                </form>
                                        </td>
                                    </tr>
                                    <div id="update_artisan<?php echo $result['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="my-modal-title">Edit collector</h5>
                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <input type="hidden" name="artisan_id" value="<?php echo $result['id'] ?>">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="name">Name</label>
                                                                    <input id="name" class="form-control" type="text" name="name" value="<?php echo $result['name'] ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="brand_name">Brand Name</label>
                                                                    <input id="brand_name" class="form-control" type="text" value="<?php echo $result['brand_name'] ?>" name="brand_name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="facebook_link">Facebook link</label>
                                                                    <input id="facebook_link" class="form-control" type="text" value="<?php echo $result['facebook_link'] ?>" name="facebook_link" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="linkedin_link">Linkedin link</label>
                                                                    <input id="linkedin_link" class="form-control" type="text" value="<?php echo $result['linkedin_link'] ?>" name="linkedin_link" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input id="name" readonly class="form-control" type="text" name="email" value="<?php echo $result['email'] ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="image">image</label>
                                                                    <input id="name"  class="form-control" type="file" name="image" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="password">password</label>
                                                                    <input id="password" class="form-control" type="text" name="password" value="<?php echo $result['password'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="update_artisan" class="btn btn-primary">Edit artisan</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <!-- End: Customizer-->

    <!-- END: Content-->
    <div id="add_artisan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Add Artisan</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" class="form-control" type="text" name="name" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <input id="brand_name" class="form-control" type="text" name="brand_name" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="facebook_link">Facebook link</label>
                                    <input id="facebook_link" class="form-control" type="text" name="facebook_link" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="linkedin_link">Linkedin link</label>
                                    <input id="linkedin_link" class="form-control" type="text" name="linkedin_link" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" class="form-control" type="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input id="image" class="form-control" type="file" name="image" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">password</label>
                                    <input id="password" class="form-control" type="text" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="add_artisan" class="btn btn-primary">Add Artisan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <?php include("includes/footer.php") ?>