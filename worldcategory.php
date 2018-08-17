
<!doctype html>
<html>
<head>
  <meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="description" content="See all world in scopee related to they <?php $catss=$_GET['cat']; echo $catss; ?> category" />
  <meta name="keywords" content="worldcategory,scopee category,world category,scopee,scopee.in,scopee.in worldcategory,scopee category,<?php $catss=$_GET['cat']; echo $catss; ?>,<?php $catss=$_GET['cat']; echo $catss; ?> worlds,<?php $catss=$_GET['cat']; echo $catss; ?> category"/>
  <title><?php $catss=$_GET['cat']; echo $catss; ?> | Scopee</title>
<link type="text/css" rel="stylesheet" href="cssa/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="cssa/material-design-iconic-font.css">
  <link type="text/css" rel="stylesheet" href="cssa/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="cssa/animate.css">

     <link type="text/css" rel="stylesheet" href="css/common.css">
  <link type="text/css" rel="stylesheet" href="cssa/components.css">
  <link type="text/css" rel="stylesheet" href="cssa/widgets.css">
  <link type="text/css" rel="stylesheet" href="cssa/plugins.css">
  <link type="text/css" rel="stylesheet" href="cssa/pages.css">
  <link type="text/css" rel="stylesheet" href="cssa/bootstrap-extend.css">
  <link type="text/css" rel="stylesheet" href="cssa/common.css">
  <link type="text/css" rel="stylesheet" href="cssa/animate.min.css">
  <link type="text/css" id="themes" rel="stylesheet" href="">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="css/material-design-iconic-font.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="css/animate.css">
  <link type="text/css" rel="stylesheet" href="css/components.css">
  <link type="text/css" rel="stylesheet" href="css/widgets.css">
  <link type="text/css" rel="stylesheet" href="css/plugins.css">
  <link type="text/css" rel="stylesheet" href="css/pages.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap-extend.css">
  <link type="text/css" rel="stylesheet" href="css/common.css">
  <link type="text/css" rel="stylesheet" href="css/responsive.css">
  <link type="text/css" id="themes" rel="stylesheet" href="">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  
  
<style>
.title-header{
	width: 100%;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 5px;
    padding-right: 5px;
    font-size: 17px;
    font-weight: bold;
}
.num,.title-header{
	font-size: 17px;
	font-weight: bold;
}
.num{
	float:right;
	margin-right: 10px;
	
}
.summary{
	padding-left: 5px;
    padding-right: 5px;
    padding-top:10px;
    font-size: 17px;
   min-height: 100px;
   min-height: 200px;
    
}
.w-name{
	font-size: 25px;
	font-weight: bold;
	width:50%;
}
hr{
	padding-top:5px;
	width:100%;
	border-radius: 10px;
	color:#3ce617;
}
.cat-footer{
	width: 100%;
}
.cat-footeer{
	padding: 5px;
}
.d-footer{
	float:right;
	margin-right: 10px;
}
.col{
	margin-left: 10px;
	width:100%;
	border:2px solid;
	border-radius: 10px;
	 min-height: 260px;
	  max-height: 400px;
	 
}
</style>
</head>

<body class=" <?php session_start();  If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){echo 'leftbar-view';}else{echo 'login-page';} ?>
"> 
<?php

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
			$user_login_userid=$get_info['USER_ID'];
			
			 //CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($get_profile_pic)){
			 	$profile_pic1="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic1="user_data/user_photo/$get_profile_pic";
			 }
			 
		require("inc/headeraut.inc.php");
			 }
			 else{
			 	
			 	header("location:logout.php");
			 }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
	 
	 echo '<link type="text/css" rel="stylesheet" href="cssa/layout.css">';
	 

   require("inc/header.php");
 require("inc/leftbar.php");
 require("inc/conversation.inc.php");
 //require("inc/world/follow_world.inc.php");
//require("inc/world/unfollow_world.inc.php");
 //require("inc/world/insert_world_post.inc.php");
 
}
else{
	
	 echo '<link type="text/css" rel="stylesheet" href="css/layout.css">';
require('inc/headerMenu.php');
 
}
?>

<!--Page Container Start Here-->
<section class="main-container">
<div class="container-fluid">
<script>
function adjustHeight(el){
    el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "60px";
}
</script>

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
<div class="col-md-18" >
<div class="widget-wrap" >
<div class="widget-header block-header margin-bottom-0 clearfix">
    <div class="pull-left">
        <h3>scopee</h3>
        <p>make new friends &amp; have fun</p>
    </div>
</div>
<div class="row" style="padding-top:25px;">
<div class="col-md-10">
  <div class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
          <div class="pull-left">
              <h3><?php
              try{
              	 echo $_GET['cat'];
              $cat1=$_GET['cat'];
              $sql_cat1=$dbh->prepare("SELECT *FROM category where category='$cat1'");
						  	$sql_cat1->execute();
						  	
						  	$num_sql_cat1=$sql_cat1->rowCount();
						  	if($num_sql_cat1>0){
						  		$category1='';
								///GETTING THEY WORLD
								$sql_world1=$dbh->prepare("SELECT *FROM worlds_tbl WHERE WORLD_CATEGORY='$cat1' AND REMOVED='NO'");
								$sql_world1->execute();
								
								$num_sql_world1=$sql_world1->rowCount();
								if($num_sql_world1>0){
									
									
									while($fetch_sql_world1=$sql_world1->fetch(PDO::FETCH_ASSOC)){
										$world_id1=$fetch_sql_world1['ID'];
										
									
										//GETTING THE TOTAL NUMBER OF WORLD POST IN A WORLD
										$sql_world_post1=$dbh->prepare("SELECT *FROM world_post WHERE WORLD_ID='$world_id1' AND REMOVED='NO'");
										$sql_world_post1->execute();
										
										$num_sql_world_post1=$sql_world_post1->rowCount();
										
										if($num_sql_world_post1>0){
											$post_number1=$num_sql_world_post1;
											$w_num=$num_sql_world1;
									$w_result=' <p>About '.$w_num.' '.$cat1.' Worlds Found!</p>';
															}
										else{
											$w_result= 'No Result Found For These World Category '.$cat1.' At They Moment!';
										}
										
								}
								}
								else{
									$w_result= 'No Result Found For These World Category '.$cat1.' At They Moment!';
								}
								}
								else{
								echo 'AN ERROR OCCURED';
								}
								}
								 catch(PDOException $error){
							echo('connection error,because:'.$error->getMessage());

							}
               ?></h3>
             <?php echo $w_result; ?>
          </div>
          <!-- for post -->
          
           <div class="pull-right w-action">
              <ul class="widget-action-bar">
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i></a>
                      <ul class="dropdown-menu">
                          <li class="widget-reload"><a href="#"><i class="fa  fa-refresh "></i></a></li>
                          <li class="widget-toggle"><a href="#"><i class="fa fa-align-justify "></i></a></li>
                          <li class="widget-fullscreen"><a href="#"><i class="fa fa-square  "></i></a></li>
                         <!-- <li class="widget-exit"><a href="#"><i class="fa fa-power-off"></i></a></li>-->
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
      <div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
                  <ul class="activities-list">
                      <li>
                          <div class="activities-badge">
                          <?php
                          try{
						  	//CHECKING IF VARIABLE CAT IS VALID
						  	require('inc/db/config.php');
						  	
						  	$cat=$_GET['cat'];
						  	$sql_cat=$dbh->prepare("SELECT *FROM category where category='$cat'");
						  	$sql_cat->execute();
						  	
						  	$num_sql_cat=$sql_cat->rowCount();
						  	if($num_sql_cat>0){
						  		$category='';
								///GETTING THEY WORLD
								$sql_world=$dbh->prepare("SELECT *FROM worlds_tbl WHERE WORLD_CATEGORY='$cat' AND REMOVED='NO'");
								$sql_world->execute();
								
								$num_sql_world=$sql_world->rowCount();
								if($num_sql_world>0){
									while($fetch_sql_world=$sql_world->fetch(PDO::FETCH_ASSOC)){
										$world_id=$fetch_sql_world['ID'];
										$world_creator=$fetch_sql_world['CREATED_BY'];
										$world_summary=$fetch_sql_world['WORLD_DESCRIPTION'];
										$world_address=$fetch_sql_world['WORLD_ADRESS'];
										$world_name=$fetch_sql_world['WORLD_NAME'];
										$date_created=$fetch_sql_world['DATE_CREATED'];
										
										//GETTING THE USER PROFILE
										$sql_users=$dbh->prepare('SELECT *FROM users WHERE USERNAME="'.$world_creator.'"');
										$sql_users->execute();
										
										$fetch_user=$sql_users->fetch(PDO::FETCH_ASSOC);
										$first_name=$fetch_user['FIRST_NAME'];
										$other_name=$fetch_user['OTHER_NAME'];
										$pro_pic=$fetch_user['PROFILE_PIC'];
										
										
										//GETTING THE TOTAL NUMBER OF WORLD POST IN A WORLD
										$sql_world_post=$dbh->prepare("SELECT *FROM world_post WHERE WORLD_ID='$world_id' AND REMOVED='NO'");
										$sql_world_post->execute();
										
										$num_sql_world_post=$sql_world_post->rowCount();
										
										if($num_sql_world_post>0){
											$post_number=$num_sql_world_post;
											
											$category='<a href="world.php?wor='.$world_address.'"><div id="col" class="col-md-12">
	<div class="title-header">
	<div class="w-name"><center>'.$world_name.'</center></div><label class="num">Total post:'.$post_number.'</label>
	</div><hr>
	<div class="summary">
		'.$world_summary.'
		
	</div>
	<div class="cat-footer">
		<label class="d-footer"> Date Created:'.$date_created.'</label>
	</div>
</div></a><br/><br/>';
										}
										else{
											$post_number='none';
											//echo 'no world for this category currently';
										}
										
										echo $category;
									}
								}
								else{
									//echo 'no world for this category currently';
								}
							}
							else{
								echo 'error occured';
							}
						  	
						  }
						   catch(PDOException $error){
							echo('connection error,because:'.$error->getMessage());

							}
                          
                          
                           ?>
                          </div>


                          
                      </li>
                      </ul>
                  </div>
           <br><br>
              </div>                        
          <!-- end post -->
          <div class="col-sm-12"></div>
        </div>

</div>

</div>
</div>

</section>
<?php require('inc/footer.inc.php'); ?>
<!--Rightbar End Here-->
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