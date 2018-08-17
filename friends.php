<!doctype html>
<html>
<?php require("aut_session.php"); ?>
<?php require("inc/headeraut.inc.php"); ?>
<head>
  <meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title>My friends</title>
  <link type="text/css" rel="stylesheet" href="css/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="css/material-design-iconic-font.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="css/animate.css">
  <link type="text/css" rel="stylesheet" href="css/layout.css">
  <link type="text/css" rel="stylesheet" href="css/components.css">
  <link type="text/css" rel="stylesheet" href="css/widgets.css">
  <link type="text/css" rel="stylesheet" href="css/plugins.css">
  <link type="text/css" rel="stylesheet" href="css/pages.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap-extend.css">
  <link type="text/css" rel="stylesheet" href="css/common.css">
  <link type="text/css" rel="stylesheet" href="css/responsive.css">
  <link type="text/css" id="themes" rel="stylesheet" href="">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link type="text/css" rel="stylesheet" href="cssa/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="cssa/material-design-iconic-font.css">
  <link type="text/css" rel="stylesheet" href="cssa/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="cssa/layout.css">
  <link type="text/css" rel="stylesheet" href="cssa/common.css">
  <link type="text/css" rel="stylesheet" href="cssa/responsive.css">
  <link type="text/css" id="themes" rel="stylesheet" href="css/style.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body class="leftbar-view">
<?php require("inc/header.php"); ?>
<?php require("inc/leftbar.php"); ?>
<?php require("inc/conversation.inc.php"); ?>
<!--Page Container Start Here-->
<section class="main-container">
  <div class="container-fluid">
    <div class="col-md-6" style="padding:0px;">
        <div class="widget-wrap">
          <div class="widget-header block-header margin-bottom-0 clearfix">
              <div class="pull-left">
                  <h3>My paddies</h3>
              </div>
              <div class="row" style="margin-top:30px;">
                <form action="#" class="j-forms" novalidate method="POST">
                <div class="form-content">
                    <!-- start first name input with icon -->
                    <div class="unit">
                        <!-- <label class="label">Title</label> -->
                        <div class="input">
                            <div class="col-md-9">
                                <div class="form-group input-group">
                                    <input type="search" id="search_friend" name="search_friends" placeholder='Search friend' class="form-control" aria-describedby="basic-addon2"/>
                                    <span class="input-group-addon" id="basic-addon2"> <i class="fa fa-search"></i></span>                                       
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" id="search_btn" name="search_friend_btn" value="search" class="btn btn-success form-control"/>
                            </div>
                        </div>
                    </div>
                    <!-- end input  icon -->
                </div>
            <!-- end /.content -->

            </form>
          </div>

          </div>
          <div class="widget-container margin-top-0">
              <div class="widget-content">
                  <div class="recent-users">
                      <div class="recent-users-list">
                         
 <?php require("inc/friends/view_friends.inc.php");?>
  
                      </div>
                  </div>
              </div>
          </div>
        </div>

    </div>
    <div class="col-md-6 pull-right" style="padding-right:0px;">
        <div class="widget-wrap">
            <div class="row" style="margin-bottom:30px;">
                <form action="#" class="j-forms" novalidate method="GET">
                    <div class="form-content">
                        <!-- start first name input with icon -->
                        <div class="unit">
                            <!-- <label class="label">Title</label> -->
                            <div class="input">
                                <div class="col-md-9">
                                    <div class="form-group input-group">
                                        <input type="search" id="search_friend" name="search_friends" placeholder='Find friends' class="form-control" aria-describedby="basic-addon2"/>
                                        <span class="input-group-addon" id="basic-addon2"> <i class="fa fa-search"></i></span>                                       
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" id="search_btn" name="search_friend_btn" value="search" class="btn btn-success form-control"/>
                                </div>
                            </div>
                        </div>
                        <!-- end input  icon -->
                    </div>
                <!-- end /.content -->

                </form>
            </div>
            <div class="widget-header block-header margin-bottom-0 clearfix">
              <div class="pull-left">
                  <h3>Paddies Request</h3>
                  <!-- <p>All recent registered members</p> -->
              </div>
          </div>
                    <div class="widget-container margin-top-0">
              <div class="widget-content">
                  <div class="recent-users">
                      <div class="recent-users-list">
 <?php require("inc/friends/friend_request.inc.php"); ?>
                      </div>
                  </div>
              </div>
          </div>
          <br/><br/>
          <div class="widget-header block-header margin-bottom-0 clearfix">
              <div class="pull-left">
                  <h3>Paddies you may know</h3>
                  <!-- <p>All recent registered members</p> -->
              </div>
          </div>
          <div class="widget-container margin-top-0">
              <div class="widget-content">
                  <div class="recent-users">
                      <div class="recent-users-list">
 <?php require("inc/friends/get_users_that_are_not_friends_and_no_request_has_been_sent.inc.php"); ?>
                      </div>
                  </div>
              </div>
              
          </div>
        </div>
    </div>

        
</div>
</div>




</section>
<div style="padding-left: 10px;margin-left: 5px;">
<?php require('inc/footer.inc.php'); ?>
</div>
<!--Page Container End Here-->

<script src="js/lib/jquery.js"></script>
<script src="js/lib/jquery-migrate.js"></script>
<script src="js/lib/bootstrap.js"></script>
<script src="js/lib/jquery.ui.js"></script>
<script src="js/lib/jRespond.js"></script>
<script src="js/lib/nav.accordion.js"></script>
<script src="js/lib/hover.intent.js"></script>
<script src="js/lib/hammerjs.js"></script>
<script src="js/lib/jquery.hammer.js"></script>
<script src="js/lib/jquery.fitvids.js"></script>
<script src="js/lib/scrollup.js"></script>
<script src="js/lib/smoothscroll.js"></script>
<script src="js/lib/jquery.slimscroll.js"></script>
<script src="js/lib/jquery.syntaxhighlighter.js"></script>
<script src="js/lib/velocity.js"></script>
<script src="js/lib/jquery-jvectormap.js"></script>
<script src="js/lib/jquery-jvectormap-world-mill.js"></script>
<script src="js/lib/jquery-jvectormap-us-aea.js"></script>
<script src="js/lib/smart-resize.js"></script>
<!--iCheck-->
<script src="js/lib/icheck.js"></script>
<script src="js/lib/jquery.switch.button.js"></script>
<!--CHARTS-->
<script src="js/lib/chart/sparkline/jquery.sparkline.js"></script>
<script src="js/lib/chart/easypie/jquery.easypiechart.min.js"></script>
<script src="js/lib/chart/flot/excanvas.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.min.js"></script>
<script src="js/lib/chart/flot/curvedLines.js"></script>
<script src="js/lib/chart/flot/jquery.flot.time.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.stack.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.axislabels.js"></script>
<script src="js/lib/chart/flot/jquery.flot.resize.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/lib/chart/flot/jquery.flot.spline.js"></script>
<script src="js/lib/chart/flot/jquery.flot.pie.min.js"></script>
<!--Forms-->
<script src="js/lib/jquery.maskedinput.js"></script>
<script src="js/lib/jquery.validate.js"></script>
<script src="js/lib/jquery.form.js"></script>
<script src="js/lib/j-forms.js"></script>
<script src="js/lib/jquery.loadmask.js"></script>
<script src="js/lib/vmap.init.js"></script>
<script src="js/lib/theme-switcher.js"></script>
<script src="js/apps.js"></script>
</body>
</html>