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
            <h1 class="page-header">Dashboard</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">26</div>
                    <div>Total Users</div>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer">
                  <a href="view_all_users.php">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </a>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-user fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">12</div>
                    <div>Artisans</div>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer">
                <a href="artisans.php">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </a>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-user fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">124</div>
                    <div>Customers</div>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer">
                <a href="customers.php">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </a>

                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-list-alt fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">124</div>
                    <div>Categories</div>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer">
                <a href="categories.php">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </a>

                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-cubes fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">124</div>
                    <div>Products</div>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer">
                <a href="view_all_products.php">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </a>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-pencil-square-o fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">124</div>
                    <div>Posts</div>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer">
                <a href="view_all_posts.php">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </a>

                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-certificate fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">124</div>
                    <div>Offers</div>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer">
                <a href="offers.php">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </a>

                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-calendar-days fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">124</div>
                    <div>Events</div>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer">
                <a href="events.php">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </a>

                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-comments  fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">124</div>
                    <div>Comments</div>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer">
                <a href="view_all_comments.php">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </a>

                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-file-text-o fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">124</div>
                    <div>Reports</div>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer">
                <a href="view_all_reports.php">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </a>

                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-truck fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">124</div>
                    <div>Total Orders</div>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer">
                <a href="view_all_orders.php">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </a>

                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>

          
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-support fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">13</div>
                    <div>Support Tickets!</div>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer">
                <a href="view_all_tickets.php">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  </a>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                <div class="pull-right">
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                      Actions
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                      <li><a href="#">Action</a>
                      </li>
                      <li><a href="#">Another action</a>
                      </li>
                      <li><a href="#">Something else here</a>
                      </li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div id="morris-area-chart"></div>
              </div>
              <!-- /.panel-body -->
            </div>
          
              <div id="morris-bar-chart" style="display:none"></div>
            
          </div>
        </div>


      </div>

      <div class="col-lg-12" style="display:flex; justify-content: space-between;">

        <div class="panel panel-default col-lg-5" style="margin-right:0;">
          <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
          </div>
          <div class="panel-body">
            <div id="morris-donut-chart"></div>
            <a href="#" class="btn btn-default btn-block">View Details</a>
          </div>

        </div>
        <div class="chat-panel panel panel-default col-lg-6">
          <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i>
            Chat
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-chevron-down"></i>
              </button>
              <ul class="dropdown-menu slidedown">
                <li>
                  <a href="#">
                    <i class="fa fa-refresh fa-fw"></i> Refresh
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-check-circle fa-fw"></i> Available
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-times fa-fw"></i> Busy
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-clock-o fa-fw"></i> Away
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#">
                    <i class="fa fa-sign-out fa-fw"></i> Sign Out
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <ul class="chat">
              <li class="left clearfix">
                <span class="chat-img pull-left">
                  <img src="http://via.placeholder.com/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                </span>

                <div class="chat-body clearfix">
                  <div class="header">
                    <strong class="primary-font">Jack Sparrow</strong>
                    <small class="pull-right text-muted">
                      <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                    </small>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                    ornare dolor, quis ullamcorper ligula sodales.
                  </p>
                </div>
              </li>
              <li class="right clearfix">
                <span class="chat-img pull-right">
                  <img src="http://via.placeholder.com/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                </span>

                <div class="chat-body clearfix">
                  <div class="header">
                    <small class=" text-muted">
                      <i class="fa fa-clock-o fa-fw"></i> 13 mins ago
                    </small>
                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                    ornare dolor, quis ullamcorper ligula sodales.
                  </p>
                </div>
              </li>
              <li class="left clearfix">
                <span class="chat-img pull-left">
                  <img src="http://via.placeholder.com/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                </span>

                <div class="chat-body clearfix">
                  <div class="header">
                    <strong class="primary-font">Jack Sparrow</strong>
                    <small class="pull-right text-muted">
                      <i class="fa fa-clock-o fa-fw"></i> 14 mins ago
                    </small>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                    ornare dolor, quis ullamcorper ligula sodales.
                  </p>
                </div>
              </li>
              <li class="right clearfix">
                <span class="chat-img pull-right">
                  <img src="http://via.placeholder.com/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                </span>

                <div class="chat-body clearfix">
                  <div class="header">
                    <small class=" text-muted">
                      <i class="fa fa-clock-o fa-fw"></i> 15 mins ago
                    </small>
                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                    ornare dolor, quis ullamcorper ligula sodales.
                  </p>
                </div>
              </li>
            </ul>
          </div>
          <!-- /.panel-body -->
          <div class="panel-footer">
            <div class="input-group">
              <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
              <span class="input-group-btn">
                <button class="btn btn-warning btn-sm" id="btn-chat">
                  Send
                </button>
              </span>
            </div>
          </div>
          <!-- /.panel-footer -->
        </div>

      </div>
    </div>

</div>


      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>

      <!-- Metis Menu Plugin JavaScript -->
      <script src="js/metisMenu.min.js"></script>

      <!-- Morris Charts JavaScript -->
      <script src="js/raphael.min.js"></script>
      <script src="js/morris.min.js"></script>
      <script src="js/morris-data.js"></script>

      <!-- Custom Theme JavaScript -->
      <script src="js/startmin.js"></script>

      <?php include "admin_includes/admin_footer.php";?>