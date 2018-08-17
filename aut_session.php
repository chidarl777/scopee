<?php
session_start();
require("inc/db/config.php");
If(isset($_SESSION["user_login"]) && empty($_SESSION["user_login"])){
    header("location:index.php");
    
}
else{
	$user_login12=$_SESSION["user_login"];
	if($user_login12=='admin'){
		$user_login1=$_SESSION["admin_username"];
	}
	else{
		$user_login1=$_SESSION["user_login"];
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
		 	$admin_home='';
	 	$user_login=$user_login1;
	 	$_SESSION['user_login_aut']=$user_login;
	 	$logged=$user_login1;
			//getting user info
			$get_data=$dbh->prepare("SELECT *FROM users WHERE USERNAME='$user_login' AND REMOVED='NO'");
			$get_data->execute();
			$num_get_data=$get_data->rowCount();
			if($num_get_data>0){
				
			
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
			 	//CODE TO SEE IF THE USER LOGIN IN SESSION IS AN ADMIN
			
			//getting user info
			$get_data=$dbh->prepare("SELECT *FROM admin WHERE username='$user_login' AND removed='no'");
			$get_data->execute();
			$get_data_row=$get_data->rowCount();
			if($get_data_row>0){
				
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
			 }
			 else{
			 	
			 	
			 	header("location:logout.php");
			 }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>
