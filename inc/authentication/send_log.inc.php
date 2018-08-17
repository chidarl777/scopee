
<?php

/**
 * @author =
 * @copyright 2015
 */
 try{
$errors=$Unameerr=$Pworderr="";
$Uname=$Pword=$Password="";
$remenber_me="NO";
$id_user="";
$cookie_value="";
$cookie_time="";

//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if(isset($_POST["btn-login"])){
	
require_once("inc/check.php");

	if(empty($_POST['login'])){
$Unameerr='Invalid username and password'."<BR />";
}
else{
$Uname=test_input($_POST['login']);
   if (!filter_var($Uname, FILTER_VALIDATE_EMAIL)) {
   	if (!preg_match("/^[0-9]*$/",$Uname)) {
   		if (!preg_match("/^[0-9a-zA-Z]*$/",$Uname)) {
   $Unameerr='Invalid username and password'."<BR />";
    }
   }
 	

    }
	}
	if(empty($_POST['password'])){
$Pworderr='Invalid username and password'."<BR />";
 }
else{
$Password=test_input($_POST['password']);
if (!preg_match("/^[0-9a-zA-Z]*$/",$Password)) {
   $Pworderr='Invalid username and password'."<BR />";
   }
   else{
   $Plenth=strlen($Password);

if($Plenth>=8 && $Plenth<=16){
	$Pword=md5($Password);
}
else{
    $Pworderr="Invalid username and password"."<BR />";
   }

	}
	}
	
	if(empty($errors)){

	
	//==========================================
	//	CONNECT TO THE LOCAL DATABASE
	//==========================================
	
require("inc/db/config.php");
  $date=Date('Y-m-d h:i:s a');
  
$SQL='SELECT *FROM users WHERE USERNAME="'.$Uname.'" AND PASSWORD="'.$Pword.'"';
//$SQL='SELECT *FROM users WHERE  USERNAME ="'.$Uname.'"' ;
$result=$dbh->prepare($SQL);
		$result->execute();
		$row_count=$result->rowCount();
		
	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================
       if ($row_count==1){
   //CREATING USER COOKIE
   	if(!empty($_POST["remenber-me"])){
		
		//CODE FOR SETTING COOKIE IN THE USER BROWSER THAT EXPIRE AFTER 1 WEEK
		$cookie_name = 'scopee';
		$s_uname=substr(base64_encode($Uname),10,10);
		
		$s_password=substr(base64_encode($Password),7,7);
		$cookie_time=time() + (60*60*24*7);
		$path="/";
		$domain='scopee.in';

		
//		$secure_pword=round(microtime(true)).$s_password.base64_encode(substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"),16,16));
$cookie_value =substr(str_shuffle("ABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"),30,30).round(microtime(true)).$s_uname.substr(str_shuffle("ABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"),30,30);
 setcookie($cookie_name,$cookie_value,$cookie_time,$path,$domain);
 
	}	
	
	
	
	  $row=$result->fetch(PDO::FETCH_ASSOC);
	  // 	$id=$row["USER_ID"];
	   		$id_user=$row["ID"];	
	   		 	
	 //CHECK IF THE USER IS ACTIVE IN ANOTHER MOBILE OR BROWSER
	 $active="YES";
	 $check_if_active=$dbh->prepare('SELECT *FROM active_log WHERE USERNAME="'.$Uname.'" AND ACTIVE="'.$active.'" AND INACTIVE="NO"');
	 $check_if_active->execute();
	 //getting result from active log
	 $get_result=$check_if_active->rowCount();
	 
	
	 	
	
	 // INSERT USERNAME IN ACTIVE_LOG TABLE
	 
	 $insert_user="INSERT INTO active_log(USERNAME,ACTIVE,DATE_ACTIVE,COOKIE_VALUE,COOKIE_DATE,REMENBER_ME) VALUES(:username,:active,:date_active,:cookie_value,:cookie_date,:remenber_me)";
	 $active_user=$dbh->prepare($insert_user);
	  $active_user->bindParam(":username",$Uname); 
      $active_user->bindParam(":active",$active);
       $active_user->bindParam(":date_active",$date);
       $active_user->bindParam(":cookie_value",$cookie_value);
       $active_user->bindParam(":cookie_date",$cookie_time);
        $active_user->bindParam(":remenber_me",$remenber_me);
       
	 $active_user->execute();
	 echo 'yesss';
	   		
	    
		   session_start();
$_SESSION["user_login"]=$Uname;
      header("location:home.php");
	   exit();
			  
 }
          else {
 	         	
				//check admin table
				   //CREATING USER COOKIE
   	if(!empty($_POST["remenber-me"])){
		
		//CODE FOR SETTING COOKIE IN THE USER BROWSER THAT EXPIRE AFTER 1 WEEK
		$cookie_name = 'scopee';
		$s_uname=substr(base64_encode($Uname),10,10);
		
		$s_password=substr(base64_encode($Password),7,7);
		$cookie_time=time() + (60*60*24*7);
		$path="/";
		$domain='scopee.in';

		
//		$secure_pword=round(microtime(true)).$s_password.base64_encode(substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"),16,16));
$cookie_value =substr(str_shuffle("ABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"),30,30).round(microtime(true)).$s_uname.substr(str_shuffle("ABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"),30,30);
 setcookie($cookie_name,$cookie_value,$cookie_time,$path,$domain);
 
	}	
	
	
				
				require('inc/db/config.php');
				 $sql_admin=$dbh->prepare('SELECT *FROM admin where username="'.$Uname.'" AND password="'.$Pword.'" AND removed="no"');
				 $sql_admin->execute();
				 $num_sql_admin=$sql_admin->rowCount();
				 
				 if($num_sql_admin>0){
				 	$fetch_sql_admin=$sql_admin->fetch(PDO::FETCH_ASSOC);
				 	$admin_code=$fetch_sql_admin['code'];
				 	$admin='admin';
				 	
				 	// INSERT USERNAME IN ACTIVE_LOG TABLE
	 $date=Date('Y-m-d h:i:s a');
     $active='YES';
	 
	 $insert_user="INSERT INTO active_log(USERNAME,ACTIVE,DATE_ACTIVE,COOKIE_VALUE,COOKIE_DATE,REMENBER_ME) VALUES(:username,:active,:date_active,:cookie_value,:cookie_date,:remenber_me)";
	 $active_user=$dbh->prepare($insert_user);
	  $active_user->bindParam(":username",$Uname); 
      $active_user->bindParam(":active",$active);
       $active_user->bindParam(":date_active",$date);
       $active_user->bindParam(":cookie_value",$cookie_value);
       $active_user->bindParam(":cookie_date",$cookie_time);
        $active_user->bindParam(":remenber_me",$remenber_me);
       
	 $active_user->execute();
	 
	   		
				 	session_start();
$_SESSION["user_login"]='admin';
$_SESSION['admin_username']=$Uname;
      header("location:adminhome.php");
	   exit();
				 	
				 }
				 else{
				 		$errors="Invalid username and password"."<BR />";
				 }
		
}
		}
else{
	$errors="Invalid username and password"."<BR />";

}
}

}
catch(PDOException $e){
echo ("error".$e->getMessage());

}
?>