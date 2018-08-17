<?php require("aut_session.php");?>
<?php

/**
 * @author 
 * @copyright 2015
 */
 //require("inc/header.php");
 try{
require("inc/db/config.php");
  $date=Date('Y-m-d h:i:s a');
//UPDATING THE ACTIVE LOG TABLE IF THE USER CLICKS THE LOG OUT LINK
$SQL=$dbh->prepare('UPDATE active_log SET INACTIVE="YES",DATE_INACTIVE="'.$date.'",TURNED_OFF="YES",DATE_TURNED_OFF="'.$date.'" WHERE USERNAME="'.$user_login.'"');
$SQL->execute();

//RESETTING COOKIE
 	
		//CODE FOR SETTING COOKIE IN THE USER BROWSER THAT EXPIRE AFTER 1 WEEK
		$cookie_name = 'Scopee';
		$s_uname=substr(base64_encode($Uname),10,10);
		
		$s_password=substr(base64_encode($Password),7,7);
		$cookie_time=time() + 1;
		$path="/";
		$domain='www.scopee.in';

		
//		$secure_pword=round(microtime(true)).$s_password.base64_encode(substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"),16,16));
$cookie_value =substr(str_shuffle("ABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"),30,30).round(microtime(true)).$s_uname.substr(str_shuffle("ABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"),30,30);
if(isset($_COOKIE[$cookie_name])) {
	
 setcookie($cookie_name,$cookie_value,$cookie_time);
 
 }
	
session_destroy();

header("location:index.php");
}
catch(PDOException $e){
echo ("error".$e->getMessage());

}
?>