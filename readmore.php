<?php
	$world_creator="";
	 	$w_adress="";
	 	$w_name='';
	 	$other_name_w="";
	 	$first_name_w="";
	 	$world_id_w='';
	 	$world_id='';
	 	$post_id=$world_category="";
	 	$world_background_pic2='';
	 	$world_description='';
	 	$world_view='';
	 	$age_criteria='';
	 	$gender_view='';
	 	$world_post='';
	 	$world_comment='';
	 	$worlderr=$world_edit_btn="";
	 	
	// 	require_once("inc/check.php");
//getting the world adress on the adress bar
if(isset($_GET["rd"])){
	
	try{
		
	$check_u=$_GET['rd'];
 require("inc/db/config.php");
	//CHECKING IF WORLD EXIST
	$SQL_w2=$dbh->prepare('SELECT *FROM worlds_tbl WHERE WORLD_ADRESS="'.$check_u.'" AND REMOVED="NO"');
	$SQL_w2->execute();
	//getting rows returned
	$num_sql=$SQL_w2->rowCount();
	
	 if($num_sql==1){
	 	
	 	$get_data=$SQL_w2->fetch(PDO::FETCH_ASSOC);
	 	$world_creator=$get_data['CREATED_BY'];
	 	$w_adress=$get_data['WORLD_ADRESS'];
	 	$w_name=$get_data['WORLD_NAME'];
	 	
	 	$world_id_w=$get_data['ID'];
	 	$world_id=$get_data['ID'];
	 	$world_background_pic2=$get_data['WORLD_BACKGROUND_PIC'];
	 	$world_description=$get_data['WORLD_DESCRIPTION'];
	 	$world_tag=$get_data['WORLD_TAG'];
	 	$world_view=$get_data['WORLD_VIEW'];
	 	$world_category=$get_data["WORLD_CATEGORY"];
	 	$age_criteria=$get_data['AGE_CRITERIA'];
	 	$gender_view=$get_data["WORLD_GENDER"];
	 	$world_post=$get_data['WORLD_POST'];
	 	$world_comment=$get_data['WORLD_COMMENT'];
	 	$world_profile_pic1=$get_data['WORLD_PROFILE_PIC'];
	 	$category_w='world';
	 	//CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($world_profile_pic1)){
			 	$world_profile_pic="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$world_profile_pic="user_data/world_photos/$world_profile_pic1";
			 }
	 	//encoding world creator
	 	//	$d_url=base64_encode($world_creator);
				//$encoded_url=str_replace("=","_2rtTz",$d_url);
	 	//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$world_creator.'"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$first_name_w=$get_info["FIRST_NAME"];
$other_name_w=$get_info["OTHER_NAME"];
$id_wr=$get_info["ID"];
$encoded_url=$id_wr;
	 	if(empty($world_background_pic2)){
	$w_background_pic2="img/k1.jpg";
}
else{
	$w_background_pic2="user_data/world_photos/$world_background_pic2";
}

$w_background_pic="
.cover
{
  background-image: url('$w_background_pic2');
  background-size:cover;
    background-repeat: no-repeat;
    height: 250px;
    
}";


	 }
	 else{
	 	$worlderr='<p style="color:#ff0000; margin-top:30px;">WORLD POST DOES NOT EXIST OR HAS BEEN REMOVED BY IT CREATOR</p>';
	 	echo'<script type="text/javascript">alert("WORLD POST DOES NOT EXIST OR HAS BEEN REMOVED BY IT CREATOR");</script>';
	 	echo $worlderr;
	 	
	 	die();
		
	}	
	// }
	 

}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
	
	}
?>
<?php
if(isset($_GET["pid"])){
	//require_once('inc/check.php');
	try{
	$check_u1=$_GET['pid'];
	$post_id=$check_u1;
	


}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
	
	}
	else{
		$post_id="";
	}
	 
  
?>
<?php require("inc/world/readmore.world.post.inc.php"); ?>

<!doctype html>
<html>
<head>
  <meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  
  	<meta name="description" content="<?php echo $world_post_description; ?>"/>
  <meta name="keywords" content="<?php echo $world_post_tags;?>"/>
  <title><?php echo $w_name; ?></title>
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
			//TO DISPLAY EDIT BUTTON
				if($user_login==$world_creator){
	 		if(empty($worlderr)){
				$edit_btn='<input type="button" id="change-bg-image" value="Change background image" />';
				$world_edit_btn='<input type="submit" id="edit-world" value="Edit World"/>';
			}
	
	}
			 //CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($get_profile_pic)){
			 	$profile_pic1="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic1="user_data/user_photo/$get_profile_pic";
			 }
			 
		//	require("inc/headeraut.inc.php");
			 }
			 else{
			 	
			 	header("location:logout.php");
			 }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
	 
	 echo '<link type="text/css" rel="stylesheet" href="cssa/layout.css">';
	 
 require("inc/world/world.view.access.php"); 
 require("inc/world/gender.view.access.php");

require("inc/world/world.comment.access.php");
require("inc/world/world.post.access.php"); 

   require("inc/header.php");
 require("inc/leftbar.php");
 require("inc/conversation.inc.php");
 require("inc/world/follow_world.inc.php");
require("inc/world/unfollow_world.inc.php");
// require("inc/world/insert_world_post.inc.php");
 
}
else{
	
	 echo '<link type="text/css" rel="stylesheet" href="css/layout.css">';
require('inc/headerMenu.php');
if($world_view!='Public'){
	echo "<div style='color:#ed4f12; font-size:17px; text-align:center;'>ONLY LOGGED IN USER'S ARE ALLOWED TO VIEW THIS WORLD.</div><p></p>";
	DIE();
}
 
}
?>

<style >
	<?Php echo $w_background_pic?>
</style>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--Page Container Start Here-->
<section class="main-container">
  <div class="widget-container" style="margin-bottom:0px; margin-top:8%;">
            <div class="row">
                 <!-- <div class="col-md-12"> -->
                   <!--  <div class="widget-wrap">
                         <div class="widget-header" > -->
                              <div class="container-fluid">
                                <div class="img-responsive">
                                <div class="col-md-12 img-responsive cover ">
                                <div  style="float: right; width:70%;">
                                <h2 style="color:#ffffff; text-align: center; padding-top:25px;"><?php echo $w_name;?></h2>
                                </div>
                                 <div class="img-thumbnail" >
                                    <a ><img src="<?php echo ($world_profile_pic); ?>" width="150px;" alt="<?php echo $w_name;?> image" height="150px;"></a>
                                </div>
                                </div>
                                </div>
                              </div>
                              
                      <!--   </div>
                   </div> -->
            <!-- </div> -->
            </div>
        </div>
<div class="container-fluid">

</div>
         
<div class="row">

<div class="col-md-8">
  <div class="widget-wrap">
                         <div class="text-left" >
                            <div class="dropdown " style="display:inline-block ">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            More Post
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="height: 400px; overflow-x: hidden;">
                                <?php 
                                if(isset($_GET['acs'])){
                                	$ac=$_GET['acs'];
									$more_script='AND ACCESS_CODE="'.$ac.'"';
								}
								else{
									$more_script='';
								}
                                ?>
              <?php require("inc/world/get.other.world.post.inc.php"); ?>
                                </ul>
                           
                        </div>
     <?php require('inc/world/world_infolink.inc.php'); ?>                   
                       </div>
                       	<?php
 if($user_login != $world_creator){
 	
	 if($world_view=="Only Those Allowed"){
	 	
	 	if(isset($_GET['acs'])){
	 		
			echo $get_content;
		}
		else{
			echo"<script>
		alert('Permission needed to view this world.');
		</script>";
		
		echo '<div style="color:#ed4f12; font-size:17px; text-align:center;">Permission is needed to view this world.</div><p></p>';
		
		      
		
		}
	 }
	 else{
	 	echo $get_content;
	 }
 }
 else{
 	echo $get_content;
 }
 
 ?>
 
  
  </div>
  <!-- end widget wrap for a complete -->
  <div class="widget-wrap row" style="margin:0px 3px 0px 3px;">
  <div class="widget-header block-header margin-bottom-0 clearfix">
      <div class="pull-left">
          <h3>Other worlds by <?php echo $first_name_w." ".$other_name_w;?></h3>
          <!-- <p>All recent registered members</p> -->
      </div>
  </div><br/>
  <!-- start main div for article -->
 
  <div class="row">
<?php require("inc/world/get.other.world.by.user.inc.php"); ?>
            <!-- end 2nd article -->
          </div>
          <!-- end main div for article -->
          </div>
</div>
<div class="col-md-4">
<div class="widget-wrap">
 <div class="widget-header block-header margin-bottom-0 clearfix">
      <div class="pull-left">
     <div id="ads-panel" style='padding-bottom: 30px; background-color: #000000;'>
     <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-format="fluid"
     data-ad-layout="in-article"
     data-ad-client="5579002118954299"
     
</ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
     	
     </div>
      </div>

</div>
  <div class="widget-header block-header margin-bottom-0 clearfix">
      <div class="pull-left">
          <h3>Related Worlds</h3>
         <?php require("inc/world/get.related.world.inc.php");?>
      </div>

</div>
<!--info link ads-->
<script type="text/javascript"> var infolinks_pid = 2911440; var infolinks_wsid = 0; </script> <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script>
<?php include_once("analyticstracking.php") ?>
           <!-- <img src="img/k1.jpg" width="80" height="80"> -->
       
         </div>
       
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
 <?php require("inc/footer.inc.php");?>
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
<script>

$(document).ready(function(){
	$("#ads-panel").click(function(){
  
  var ads_name=$("#ads-panel").innerHtml;
  alert(ads_name.find('a').attr("href"));
  $.post("createsession.php", {"name":ads_name.find("a").attr('href')}, function(results) {
  alert(results); // alerts 'Updated'
});
});
});

$(document).ready(function(){
	$("#ads-panel").click(function(){
  
  var ads_name=$("#ads-panel").innerHtml;
  alert(ads_name.find('a').attr("href"));
  $.post("createsession.php", {"name":ads_name.find("a").attr('href')}, function(results) {
  alert(results); // alerts 'Updated'
});
});
});
</script>
<?php  require('inc/adword/check_ads.php');?>
</body>
</html>