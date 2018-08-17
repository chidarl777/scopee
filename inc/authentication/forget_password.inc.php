<?php
$Username="";
$success="";
$Usernameerr='';
$first_name=$other_name="";

if(isset($_POST['recover_pass'])){
	
	require_once("inc/check.php");
	
	if(empty($_POST['username'])){
$Usernameerr='Invalid username';
}
else{
$Username=test_input($_POST['username']);
  if (!filter_var($Username, FILTER_VALIDATE_EMAIL)) {
 if (!preg_match("/^[0-9]*$/",$Username)){
 	$Usernameerr='Invalid username';
 }
 }
}
try{
	require("inc/db/config.php");
	$f_username=strtolower($Username);
	
	//CHECKING IF IT IS A VALID USERNAME AND IF IT EXIST
	$SQL=$dbh->prepare('SELECT *FROM users WHERE USERNAME="'.$f_username.'" AND REMOVED="NO"');
	$SQL->execute();
		
	$num_row=$SQL->rowCount();
	if($num_row !=1){
		
		
		$Usernameerr='Invalid username';
	}
	else{
	$result=$SQL->fetch(PDO::FETCH_ASSOC);
		$first_name=$result["FIRST_NAME"];
		$other_name=$result["OTHER_NAME"];
		$username_send=$result["USERNAME"];
		//$Usernameerr="successful";
		//generating random alphanumerics character to update password 
		$GENERATE_CODE=substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),8,16);
			$NEW_PASSWORD=md5($GENERATE_CODE);
			//$NEW_PASSWORD=str_replace("=","s",$NEW_PASSWORD1);
			$update_pass=$dbh->prepare('UPDATE users SET PASSWORD="'.$NEW_PASSWORD.'" WHERE USERNAME="'.$f_username.'" AND REMOVED="NO"');
			$update_pass->execute();
		
			//MAILING THE USER PASSWORD TO USERNAME
		
	$to = $f_username;
$subject="Reset Password";
$message ='
Dear '.$first_name.' '.$other_name.' please note!'."\r\n".'you are advised to kindly change these password in your Account panel of your settings page'."\r\n"."\r\n"."\r\n".'New Password:'.$GENERATE_CODE.'';

//$headers .= "CC: support@scoppee.com\r\n";
$headers = "MIME-Version: 1.0"."\r\n";;
$headers = "Content-Type: text/html; charset=ISO-8859-1"."\r\n";
  	if(filter_var($username_send, FILTER_VALIDATE_EMAIL)){
				//IF USERNAME IS AN EMAIL ADRESS 

   $header = "From:Scopee"."\r\n";
   $retval = mail ($to,$subject,$message,$header);
    echo $retval;	
			}
			elseif(preg_match("/^[0-9]*$/",$Username)){
				//IF USERNAME IS A PHONE NUMBER
		
  $message1 = wordwrap($message, 70 );
  $retval = mail( $to,'', $message );
 echo $retval;
			}
			
 if( $retval == true )
   {
      $success="<div class='btn-block btn btn-success' style='color:#ffffff;font-size:17px;'>
				Password has been sent to this username!!!
			</div>";
   }
   else
   {
      $Usernameerr="Message could not be sent...";
   }
	}
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
}
?> 

