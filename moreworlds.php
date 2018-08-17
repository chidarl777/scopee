
<?php
try{
	
	require('inc/check.php');
if(isset($_GET['u'])){

	$check_id=test_input($_GET['u']);
	require('inc/db/config.php');
	$SQL_U=$dbh->prepare('SELECT *FROM users WHERE ID="'.$check_id.'"  AND REMOVED="NO"');
	$SQL_U->execute();
	$num_id=$SQL_U->rowCount();
	if($num_id>0){
		$fetch_info=$SQL_U->fetch(PDO::FETCH_ASSOC);
		$user_login_more=$fetch_info['USERNAME'];
		$first_name=$fetch_info['FIRST_NAME'];
		$other_name=$fetch_info['OTHER_NAME'];
	}
	else{
		header('location:index.php');
	}
	
	
}
}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
 ?>
<!doctype html>
<html>
<head>
  <meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title><?php echo $first_name.' '.$other_name; ?>'s world</title>
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
  <link type="text/css" rel="stylesheet" href="cssa/animate.min.css">
  <link type="text/css" id="themes" rel="stylesheet" href="">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <style>
  	a{
		text-decoration: none;
	}
	a:active{
		color:#000000;
		text-decoration: underline;
	}
  </style>
</head>
<body class="leftbar-view">

<?php

session_start();
require("inc/db/config.php");
If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){
If(isset($_SESSION["user_login"]) && empty($_SESSION["user_login"])){
    header("location:index.php");
    
}
else{
	$user_login1=$_SESSION["user_login"];
	
}


try {
	  //CHECKING IF USER CURRENTLY LOGGED IN ;
$check_user=$dbh->prepare('SELECT *FROM active_log WHERE USERNAME="'.$user_login1.'" AND ACTIVE="YES" AND INACTIVE="NO"');
	 $check_user->execute();
	 //getting result from active log
	 $get_result=$check_user->rowCount();
	
	 if($get_result>0){
	 	$user_login=$user_login1;
	 	$logged=$user_login1;
			//getting user info
			$get_data=$dbh->prepare("SELECT *FROM users WHERE USERNAME='$user_login'");
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$user_firstname=$get_info['FIRST_NAME'];
			$user_othername=$get_info['OTHER_NAME'];
			$get_profile_pic=$get_info['PROFILE_PIC'];
			$user_login_id=$get_info['ID'];
			$day_of_birth=$get_info['DOB_DAY'];
			$month_of_birth=$get_info['DOB_MONTH'];
			$year_of_birth=$get_info['DOB_YEAR'];
			$user_peecoin=$get_info['BANK'];
			 //CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($get_profile_pic)){
			 	$profile_pic1="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic1="user_data/user_photo/$get_profile_pic";
			 }
			 }
			 else{
			 	
			 	header("location:logout.php");
			 }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}


   require("inc/header.php");
 require("inc/leftbar.php");
 require("inc/conversation.inc.php");
}
else{
require('inc/headerMenu.php');
 
}
?>
<!--=======================Page Container Start Here =================================-->
<!--Page Container Start Here-->
<section class="main-container">
    <div class="container-fluid">
        <div class="page-header filled full-block light">
            <div class="row">
                <div class="col-md-8">
                 <a href="moreworlds.php?u=<?php echo $check_id?>&my-wor=followed-world"><h2 style="float:right; margin-right: 0px;">My followed worlds</h2></a>
                   <a href="moreworlds.php?u=<?php echo $check_id?>" style='text-decoration: none;'> <h2>My worlds</h2></a>
                   
                    <p> </p>
                </div>
               
                <div class="col-md-6">
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="widget-wrap" style="padding:15px;">
                    <div class="widget-header  margin-bottom-0 clearfix">
                      <div class="col-md-8">
                       <div class="widget blog_gallery">
                         <ul class="sidebar-gallery">
                         
                         <?php if(isset($_GET['my-wor'])){
                         	$get_option=$_GET['my-wor'];
                         	if($get_option=='followed-world'){
								require('inc/world/get.followed.world.by.user.php');
							}
							else{
								 require("inc/world/view.more.world.inc.php"); 
							}
                         	 
                         	}else{
						 	
						  require("inc/world/view.more.world.inc.php"); 
						  } ?>
                        </ul>
                    </div><!--/.blog_gallery-->
                       <!-- stop hear -->
                       </div>                          
                          <div class="col-md-4">
                            <h4>suggested worlds</h4>
                          <div class="widget blog_gallery">                      
                          <ul class="sidebar-gallery">
                               <?php require("inc/world/get.suggested.world.inc.php");?>
                          </ul>
                      </div><!--/.blog_gallery-->          
                   
                      </div><!--/.blog_gallery-->                     
                  </div>
              </div>
          </div>
      </div>
                      
                
      </div>
      </div>
      </div>




        <!-- navbar ends -->
        
    


</section>
<?php require("inc/footer.inc.php");?>
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