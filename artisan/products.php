<?php
require_once('../functions/connection.php');
if(!isset($_SESSION['artisan_id'])){
    header("location: ../artisan/");
}
include('functions/products_function.php');
?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Artisan Dashboard - products
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
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <?php include('includes/header.php') ?>

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    <?php include('includes/sidebar.php') ?>

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">


            </div>
            <div class="content-body"><!-- Basic Tables start -->
                <div class="card">
                    <div class="card-header bg-primary bg-darken-2 white text-center card-title-bold text-capitalize">Products</div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard table-responsive">
                            <div class="card-body">
                                <?php if (isset($success)) { ?>
                                    <div class="alert alert-success"><?php echo $success ?></div>
                                <?php } ?>
                                <?php if (isset($deleted)) { ?>
                                    <div class="alert alert-danger"><?php echo $deleted ?></div>
                                <?php } ?>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#add_product">Add products</button>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>image</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $products = "SELECT products.id , products.name, products.descreption , products.image, products.price, products.category_id , category.name AS catgeory_name FROM products INNER JOIN category ON category.id = products.category_id where artisan_id = ".$_SESSION['artisan_id']."";
                                        $product_query = mysqli_query($conn, $products) or die('users_error' . mysqli_error());

                                        while ($result = mysqli_fetch_array($product_query)) {


                                        ?>
                                            <tr>
                                                <td scope="row"><?php echo $result['id'] ?></td>
                                                <td><?php echo $result['name'] ?></td>
                                                <td><?php echo $result['price'] ?></td>
                                                <td>
                                                    <img width="100px" height="100px" src="../images/<?php echo $result['image'] ?>" alt="">

                                                </td>
                                                <td>
                                                    <?php echo $result['catgeory_name'] ?>

                                                </td>
                                                <td>

                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#update_product<?php echo $result['id'] ?>">Edit</button>
                                                    <form method="POST">
                                                        <input type="hidden" name="p_id" value="<?php echo $result['id'] ?>">
                                                        <button type="submit" name="delete_product" class="btn btn-danger" onclick="return confirm('Are you need to delete <?php echo $result['name'] ?>');">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <div id="update_product<?php echo $result['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="my-modal-title">Edit products</h5>
                                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="product_id" value="<?php echo $result['id'] ?>">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="name">Name</label>
                                                                            <input id="name" class="form-control" type="text" value="<?php echo $result['name'] ?>" name="name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="price">Price</label>
                                                                            <input id="price" class="form-control" type="number" value="<?php echo $result['price'] ?>" name="price" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="image">Image</label>
                                                                            <input id="image" class="form-control" type="file" name="image">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="Catgeory">Catgeory</label>
                                                                            <select id="Catgeory" class="form-control" type="file" name="category" required>
                                                                                <option value="">Choose catgeory</option>
                                                                                <?php
                                                                                $categories = "SELECT * FROM `category`";
                                                                                $category_query = mysqli_query($conn, $categories) or die('users_error' . mysqli_error());

                                                                                while ($result_cat = mysqli_fetch_array($category_query)) {


                                                                                ?>
                                                                                    <option value="<?php echo $result_cat['id'] ?>"><?php echo $result_cat['name'] ?></option>
                                                                                <?php
                                                                                } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="descreption">descreption</label>
                                                                            <textarea id="descreption" class="form-control" name="descreption" required><?php echo $result['descreption'] ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="update_product" class="btn btn-primary">update products</button>
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
        </div>
    </div>
    <!-- End: Customizer-->

    <!-- END: Content-->
    <div id="add_product" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Add products</h5>
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
                                    <label for="price">Price</label>
                                    <input id="price" class="form-control" type="number" name="price" required>
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
                                    <label for="Catgeory">Catgeory</label>
                                    <select id="Catgeory" class="form-control" type="file" name="category" required>
                                        <option value="">Choose catgeory</option>
                                        <?php
                                        $categories = "SELECT * FROM `category`";
                                        $category_query = mysqli_query($conn, $categories) or die('users_error' . mysqli_error());

                                        while ($result = mysqli_fetch_array($category_query)) {


                                        ?>
                                            <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="descreption">descreption</label>
                                    <textarea id="descreption" class="form-control" name="descreption" required>Enter description</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="add_product" class="btn btn-primary">Add products</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                                    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>




    <?php include('includes/footer.php') ?>
