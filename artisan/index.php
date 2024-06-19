<?php require_once("../functions/connection.php") ?>
<?php include("functions/login_artisan.php"); ?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Arist Dashboard | Login
  </title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="app-assets/css/all.css"
    rel="stylesheet">
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
  <style> 
  .backToTop {
    position: fixed;
    z-index: 1020;
    right: 25px;
    bottom: -25px;
    opacity: 0;
    width: 63px;
    height: 63px;
    border-radius: 50%;
    background: #38657c;
    font-size: 18px;
    line-height: 63px;
    color: #fff;
    text-decoration: none;
    text-align: center;
    cursor: pointer;
    box-shadow: 0 3px 3px rgb(0 0 0 / 10%);
    transition: all 0.25s, bottom 0.75s ease-in-out;}
  </style>
</head>
<body class="vertical-layout vertical-menu 1-column  bg-primary menu-expanded blank-page blank-page  pace-done" data-open="click" data-menu="vertical-menu" data-col="1-column">
  <div class="pace  pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row"></div>
      <div class="content-body">
      <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    
                  </div>
                </div>
                <div class="card-content">

                  <?php if(isset($logfalied)): ?>
                  <div class="alert alert-danger alert-dismissible w-75 mb-2 m-auto fade show" role="alert">
                      <h5><?= $logfalied ?></h5>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <?php endif; ?>
                  <div class="card-body pt-0">
                    <div class="row">
                                    
                                    <div class="col-12  mb-4">
                                        <h3 class="text-main">Artisan Login</h3>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Passowrd</label>
                                                <input type="password" name="login_password" class="form-control" required>
                                            </div>
                                            <button name="loginsubmit" type="submit" class="btn btn-success btn-block">Log in</button>
                                        </form>
                                    </div>
                                </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->

</body>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <!-- BEGIN VENDOR JS-->
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN PAGE VENDOR JS-->
  <script src="app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/tables/buttons.flash.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/tables/datatables/datatable-advanced.js"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/echarts/echarts.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="app-assets/js/scripts/pages/dashboard-crypto.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>