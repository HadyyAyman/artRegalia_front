<?php
require_once("../functions/connection.php"); ;
if(!isset($_SESSION['artisan_id'])){
    header("location: ../artisan/");
}
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
  <title>Admin Dashboard - orders
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
    <?php include('includes/sidebar.php') ?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- Basic Tables start -->
                <div class="card">
                <div class="card-header text-white bg-primary bg-darken-2 white text-center card-title-bold text-capitalize">Orders</div>

                    <div class="card-body">
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Address</th>
                                    <th>Statues</th>
                                    <th>Total price</th>
                                    <th>Additional info</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $orders = "SELECT orders.* FROM orders JOIN order_details ON orders.id = order_details.order_id JOIN products ON order_details.product_id = products.id WHERE products.artisan_id = ".$_SESSION["artisan_id"]." AND orders.statues = 'accepted'";
                                $order_query = mysqli_query($conn, $orders) or die('users_error' . mysqli_error($con));
                                while ($result = mysqli_fetch_array($order_query)) {
                                    if ($result['statues'] == 'accepted') {
                                        $status = "<span class='badge badge-success'>Accepted</span>";
                                    } elseif ($result['statues'] == 'rejected') {
                                        $status = "<span class='badge badge-danger'>Rejected</span>";
                                    } else {
                                        $status = "<span class='badge badge-warning'>submitted</span>";
                                    }
                                    if($result['additional_info'] == ''){
                                        $additional_info = "No additional info here";
                                    }else{
                                        $additional_info = $result['additional_info']; 
                                    }

                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $result['id'] ?></td>
                                        <td><?php echo $result['address'] ?></td>
                                        <td><?php echo $status ?></td>
                                        <td><?php echo $result['total_price'] ?></td>
                                        <td><?php echo $additional_info?></td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#Show_items<?php echo $result['id'] ?>">Show</button>
                                            
                                        </td>
                                    </tr>
                                    <div id="Show_items<?php echo $result['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="my-modal-title">Order #<?php echo $result['id'] ?></h5>
                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    $select_order_details = "SELECT products.name, products.price , order_details.*  FROM `order_details` INNER JOIN `products` ON order_details.product_id = products.id WHERE `order_id` = ".$result['id']." ";
                                                    $select_order_details_query = mysqli_query($conn, $select_order_details);
                                                    while ($result_details = mysqli_fetch_array($select_order_details_query)) {
                                                    ?>
                                                        <div class="card">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">products name :<?php echo $result_details['name'] ?></li>
                                                                <li class="list-group-item">price: <?php echo $result_details['price'] ?></li>
                                                                <li class="list-group-item">Quantity: <?php echo $result_details['quantity'] ?></li>
                                                                <li class="list-group-item">Additional information: <?php echo $result_details['additional_information'] ?></li>
                                                            </ul>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
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
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>




    <?php include('includes/footer.php') ?>
</body>
<!-- END: Body-->

</html>