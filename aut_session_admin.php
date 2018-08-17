<?php
session_start();
require("inc/db/config.php");
If(isset($_SESSION["user_login"]) && empty($_SESSION["user_login"])){
    header("location:logout.php");
    
}
else{
	$user_login12=$_SESSION["user_login"];
	if($user_login12=="admin"){
		$user_login1=$_SESSION["admin_username"];
		
	}
	else{
		header("location:logout.php");
	}
}
?>
<?php

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
			$get_data=$dbh->prepare("SELECT *FROM admin WHERE username='$user_login' AND removed='no'");
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$user_firstname=$get_info['name'];
			$user_othername='';
			
			$get_profile_pic=$get_info['profile_pic'];
			$user_login_id=$get_info['id'];
			$user_login_userid=$get_info['code'];
			$user_login=$_SESSION["user_login"];
			$user_peecoin=0;
			$admin_home='<p><a href="adminhome.php">Go To Admin Home</a></p>';
			
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

?>
