        <?php
 session_start(); 

If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){
	require("inc/db/config.php");
   echo '  <link type="text/css" rel="stylesheet" href="cssa/font-awesome.css">
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
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">';
}
else{
echo '  
  
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.css">
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
    <link type="text/css" rel="stylesheet" href="css/responsive.css">';
 
}
?>
    
  <link type="text/css" id="themes" rel="stylesheet" href="css/style.css">
  
</head>
<body <?php require("inc/db/config.php");If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){echo 'class="leftbar-view"';}else{echo 'class="login-page"';}?>>
 <?php


require("inc/db/config.php");
If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){
	
require("inc/db/config.php");
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
			$get_data=$dbh->prepare("SELECT *FROM users WHERE USERNAME='$user_login' AND REMOVED='NO'");
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$user_firstname=$get_info['FIRST_NAME'];
			$user_othername=$get_info['OTHER_NAME'];
			$get_profile_pic=$get_info['PROFILE_PIC'];
			$user_login_id=$get_info['ID'];
			$user_login_userid=$get_info['USER_ID'];
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
     echo "Error occurred ";
}
require("inc/headeraut.inc.php");
   require("inc/header.php");
 require("inc/leftbar.php");
 require("inc/conversation.inc.php");
 $gotohome='<p style="float: right; margin-right:20px; font-size: 17px;"> <a href="home.php"><i class="fa fa-arrow-circle-o-left"></i>Go To Home</a></p>';
}
else{
require('inc/headerMenu.php');
require("inc/datetimediff.inc.php");
$gotohome='';
 
}
?>
<?php echo $gotohome; ?>