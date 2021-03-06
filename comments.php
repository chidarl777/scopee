<?php require("aut_session.php"); ?>
<?php require("inc/headeraut.inc.php"); ?>
<?php
require_once("inc/check.php");
if(isset($_GET["commentpostid"])){
	
	try{
	$check_u1=test_input($_GET["commentpostid"]);
	$post_id_c=$check_u1;
	

}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
	
	}
	else{
		echo "<script>alert('POST DOES NOT EXIST');</script>";
		$post_id_c="";
		
	}
?>
<!doctype html>
<html>
<head>
  <meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title>comments</title>
  <link type="text/css" rel="stylesheet" href="cssa/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="cssa/material-design-iconic-font.css">
  <link type="text/css" rel="stylesheet" href="cssa/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="cssa/animate.css">
  <link type="text/css" rel="stylesheet" href="cssa/layout.css">
  <link type="text/css" rel="stylesheet" href="cssa/components.css">
  <link type="text/css" rel="stylesheet" href="cssa/widgets.css">
  <link type="text/css" rel="stylesheet" href="cssa/plugins.css">
  <link type="text/css" rel="stylesheet" href="cssa/pages.css">
  <link type="text/css" rel="stylesheet" href="cssa/bootstrap-extend.css">
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
<!-- <div class="page-header filled full-block light">
  <div class="row">
      <div class="col-md-6 col-sm-6">
          <h2>Scoopy</h2>
         <!--  <p>Bootstrap3 supported admin template</p> -->
          <!--     <label class="label">Your email</label>
              <div class="input">
                  <input type="email" id="email" name="email" class="form-control">
              </div>
          </div>
      </div>
      <div class="col-md-6 col-sm-6"> -->
          <!-- <ul class="list-page-breadcrumb">
              <li><a href="#">Home <i class="fa fa- fa fa--chevron-right"></i></a></li>
              <li><a href="#">Layout <i class="fa fa- fa fa--chevron-right"></i></a></li>
              <li class="active-page"> Dashboard</li>
          </ul> -->
     <!--  </div>
  </div> -->
</div>
<div class="row">
<div class="col-md-12" >
<div class="widget-wrap" >
<div class="row" style="padding-top:25px;">
<div class="col-md-">
  <div class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
          <div class="pull-left">
              <h3>Recent Comments</h3>
          </div>
         </div>
      <div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
                  <ul class="activities-list">
                      <li>
                          <div class="activities-badge">
                              <!-- <span class="w_bg_amber"><i class="fa fa- fa fa--ticket-star"></i></span> -->
                          </div>
                          
                          <div class="activities-details">
                           
                                <!-- start textarea -->
                                <form method="post" action="" >
                                <?php require("inc/post/insert_comment.php"); ?>
                                
                                <div class="unit">
                                    <label class="label">Textarea</label>
                                    <div class="input">
                                      <textarea class="form-control"name="comment-post-area" placeholder="Add comment here..." spellcheck="false" id="post-area"></textarea>
                                    </div>
                                </div><br>
                                <!-- end textarea -->
                                <!-- start btn -->
                                <div class="form-footer" style="float:right;">
                                  <input type="submit" class="btn btn-success btn-sms "  id="" name="post-comment" value="Post">
                              </div><br><br>
                              <!-- end of post btn -->
                              </form>
                              
                              <!-- make loop hear -->
                              
                              <div  id="activity-psm" >
                            <div class="col-sm-12"  style="background-color:#F7F7F7;border-radius:5px;">
                             <?php require("inc/post/view_comment.php"); ?>
                             <?php require("inc/post/edit_comment.inc.php");?>

                               <?php require("inc/post/remove_comment.inc.php"); ?>
                               
                               
                              <!-- <h2 class="activities-header">Resolved Tickets #LTK7865</h2> -->
                                  

                                       </div>
                                  </div>
                            </div>
                            <!-- loop ends hear -->
                          </div>
                          
                      </li>
                      </ul>
                  </div>

                  <br><br>
              </div>                        
          <!-- end post -->
          <div class="col-sm-12"></div>
        </div>
     
      <?php echo $loadmore;?>
  </div>
</div>

</div>
</div>
</div>
</div>
</div>
 <!--Footer Start Here -->
<footer class="footer-container">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="col-md-6">
                <a href="help.php">Help</a>
                <a href="contactus.php">ContactUs</a>
                <a href="privacypolicy.php">Privacy Policy</a>
                <a href="termsandcondition.php">Terms and Condition</a> 
            </div>
            <div class="col-md-6">
                <div class="footer-right">
                    <h5>Scopee Copyright&copy; 2016</h5>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Footer End Here -->
</section>
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
<script src="js/class.function/inp.ho.fo.js"></script>
<script src="js/lib/chart/flot/jquery.flot.pie.min.js"></script>
<!--Forms-->
<script src="js/lib/jquery.maskedinput.js"></script>
<script src="js/lib/jquery.validate.js"></script>
<script src="js/lib/jquery.form.js"></script>
<script src="js/lib/j-forms.js"></script>
<script src="js/lib/jquery.loadmask.js"></script>
<script src="js/lib/vmap.init.js"></script>
<script src="js/lib/theme-switcher.js"></script>
<script src="js/class.function/get.pst.js" ></script>
<script src="js/class.function/ins.pst.js" ></script>
<script src="js/apps.js"></script>
</body>
</html>