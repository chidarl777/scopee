<?php
session_start();
require("inc/db/config.php");
If(isset($_SESSION["user_login"]) && $_SESSION["user_login"]==''){
    echo'<meta http-equiv="refresh" content="0, url=index.php" />';
    
}
else{
	$user_login1=$_SESSION["user_login"];
	
}
?>
<?php

try {
	  //CHECKING IF FRIEND CURRENTLY LOGGED IN ;
$check_user=$dbh->prepare('SELECT *FROM active_log WHERE USERNAME="'.$user_login1.'" AND ACTIVE="YES" AND INACTIVE="NO"');
	 $check_user->execute();
	 //getting result from active log
	 $get_result=$check_user->rowCount();
	
	 if($get_result>0){
	 	$user_login=$user_login1;
			//getting user info
			$get_data=$dbh->prepare("SELECT PROFILE_PIC FROM users WHERE USERNAME='$user_login'");
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$get_profile_pic=$get_info['PROFILE_PIC'];
			 //CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($get_profile_pic)){
			 	$profile_pic1="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic1="user_data/profile_pic/$get_profile_pic";
			 }
			 }
			 else{
			 	echo'<meta http-equiv="refresh" content="0, url=logout.php" />';
			 }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>