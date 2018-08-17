
<?php

/**
 * @author
 * @copyright 2015
 */
//checking for dangerous html characters and strimming white spaces
$errors=$Firstnameerr=$Othernameerr=$Usernameerr=$Gendereer=$Dayerr=$Montherr=$Yearerr=$Confirm_passworderr=$Passworderr='';
$Firstname=$Othername=$Username=$Day=$Month=$Year=$Confirm_password=$Password='';
$Gender1="uncheck";
$id_user="";
$gender="";
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['btn-reg'])){
	require_once("inc/check.php"); 
if(empty($_POST['firstname'])){
$Firstnameerr='Input your First name';
}
else{
$Firstname=test_input($_POST['firstname']);
if (!preg_match("/^[a-zA-Z]*$/",$Firstname)) {
 $Firstnameerr='must contain letters only';
}
}

if(empty($_POST['othernames'])){
$Othernameerr='Input your other names please';
}
else{
$Othername=test_input($_POST['othernames']);
if (!preg_match("/^[a-zA-Z]*$/",$Othername)) {
$Othernameerr='must contain letter only';
}
}

if(empty($_POST['username'])){
$Usernameerr='Invalid username'."<br />".'Email or Phone number required';
}
else{
$Username=test_input($_POST['username']);
  if (!filter_var($Username, FILTER_VALIDATE_EMAIL)) {
 //if (!preg_match("/^[0-9]*$/",$Username)){
 	
 	$Usernameerr='Invalid username'."<br />".'Email required';
 //}
 }
    }
	
if($_POST['gender']=='Male' ){
	$Gender=test_input($_POST['gender']);
$Gender1="checked";
}
elseif($_POST['gender']=='Female'){
$Gender=test_input($_POST['gender']);
$Gender1="checked";
}
else{
$Gendererr='select your gender';
}
if($_POST['day']=="Day"){
$Dayerr='Select day of birth';
}
else{
$Day=test_input($_POST['day']);
}

if($_POST['month']=="Month"){
$Montherr='Select month of birth';
}
else{
$Month=test_input($_POST['month']);
}

if($_POST['year']=="Year"){
$Yearerr='Select year of birth';
}
else{
$Year=test_input($_POST['year']);

}

if(empty($_POST['password'])){
$Passworderr='input a valid password';
 }
else{
$Password=test_input($_POST['password']);
if (!preg_match("/^[0-9a-zA-Z]*$/",$Password)) {
   $errors='Letters and numbers require';
   }
   else{
   $Plenth=strlen($Password);

if($Plenth>=8 && $Plenth<=16){
    $Passworderr=" ";
}
else{
    $Passworderr=$Passworderr."Password must be between 8 to 16 characters"."<BR />";
   }
	}
	}
	
	if(empty($_POST['Confirm-password'])){
$Confirm_passworderr='Retype password';
}
else{
$Confirm_password=test_input($_POST['Confirm-password']);
if ($Confirm_password!=$Password) {
 $Confirm_passworderr='Password does not Match';
}
}
$time=date('h:i:s');
$date=date('Y-m-d');


	$cookie_refname1 = substr(base64_encode("Scopeeuserref"),5,5);
	$cookie_refname=str_replace('=','sc',$cookie_refname1);
	
	//CODE FOR SETTING COOKIE IN THE USER BROWSER THAT EXPIRE AFTER 1 WEEK
		$cookie_time=time() + (60*60*24*7);
		$path="/";
		$domain='www.scopee.in';
		
 if ($errors==""){
try{
	$first_name=ucwords($Firstname);
			$other_names=ucwords($Othername);
			$user_name=strtolower($Username);
			$pass_word=md5($Password);
      require("inc/db/config.php");
      
      			if(isset($_COOKIE[$cookie_refname])){
   		//DO NOTHING SINCE THE USER HAS BEEN REFERED BY SOMEONE
   		$user_ref=$_COOKIE[$cookie_refname];
   		
   		//GETTING THE USER NAME
   		$SQL_REF=$dbh->prepare('SELECT *FROM users WHERE USER_ID="'.$user_ref.'"');
	$SQL_REF->execute();
		$num_user_ref=$SQL_REF->rowCount();
		if($num_user_ref>0){
			$ref_result=$SQL_REF->fetch(PDO::FETCH_ASSOC);
			$user_ref=$ref_result['USERNAME'];
		}
		else{
			$user_ref='';
		}
   		}
   		else{
			$user_ref="";
		}
      //====================================================================
	//	CHECK THAT THE USERNAME IS NOT TAKEN
	//====================================================================
        $SQL='SELECT *FROM users WHERE USERNAME="'.$user_name.'"';
		$result=$dbh->prepare($SQL);
		$result->execute();
		$row_count=$result->rowCount();
		
		if ($row_count>0){
		$Usernameerr ='Username already taken';
		}
		else{
			//getting random numbers for verification code
			
			$VER_CODE1=mt_rand(1000,100000);
			$VER_CODE=mt_rand(1000,100000).round(microtime(true));
			//generating random alphanumerics character for access code
			$ACCESS_CODE1=substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),10,13);
			$ACCESS_CODE=round(microtime(true)).$ACCESS_CODE1;
			//GENERATING RANDOM UNIQUE ALPHANUMERIC CHARACTER FOR USER_ID
			$GENERATE_ID=mt_rand(127,100000);
			$SCOPEE_ID=870;
			$USER_ID=round(microtime(true)).$SCOPEE_ID.$GENERATE_ID;
			
			//CREATING USER TRACKER
			$GENERATE_ID3=substr(str_shuffle(12345678900123456789),7,15);
			$USER_TRACKER="tr".round(microtime(true)).$GENERATE_ID3;
			//CREATING USER REF CODE
			$REF_CODE="rfi".round(microtime(true)).$GENERATE_ID3;
			//CREATING USER REF CODE
			$GENERATE_ID2=substr(str_shuffle(12345678900123456789),7,15);
			$ACTIVATED="YES";
			
			
		//insert data to database if value are not empty and sanitized
   $SQL="INSERT INTO users(USER_ID,FIRST_NAME,OTHER_NAME,USERNAME,GENDER,DOB_DAY,DOB_MONTH,DOB_YEAR,PASSWORD,SIGNUP_TIME,SIGNUP_DATE,VER_CODE,ACCESS_CODE,REF_CODE,REFERED_BY,USER_TRACKER,ACTIVATED)
    VALUES(:user_id,:fname,:oname,:uname,:gname,:dob_day,:dob_month,:dob_year,:pword,:signup_time,:signup_date,:ver_code,:access_code,:ref_code,:user_ref,:user_tracker,:activated)";
    
    
   $STM=$dbh->prepare($SQL);
     $STM->bindParam(":user_id",$USER_ID);
	$STM->bindParam(":fname",$first_name);
	$STM->bindParam(":oname",$other_names);
	$STM->bindParam(":uname",$user_name);
	$STM->bindParam(":gname",$Gender);
	$STM->bindParam(":dob_day",$Day);
	$STM->bindParam(":dob_month",$Month);
	$STM->bindParam(":dob_year",$Year);
	$STM->bindParam(":pword",$pass_word);
	$STM->bindParam(":signup_time",$time);
	$STM->bindParam(":signup_date",$date);
	$STM->bindParam(":ver_code",$VER_CODE);
	$STM->bindParam(":ref_code",$REF_CODE);
	$STM->bindParam(":user_ref",$user_ref);
	$STM->bindParam(":user_tracker",$USER_TRACKER);
	$STM->bindParam(":access_code",$ACCESS_CODE);
	$STM->bindParam(":activated",$ACTIVATED);
	//$STM->bindParam(":Confirm_password",$Confirm_password);
	
	
	
	$STM->execute();
	
				//MAILING THE USER PASSWORD TO USERNAME
		
	$to = $f_username;
$subject="User Acount Information";
$message ='
Dear '.$first_name.' '.$other_name.' please note!'."\r\n".'you are advised to kindly keep these imformation safe has it will be asked on account verification and validation'."\r\n"."\r\n"."\r\n".'Access code:'.$ACCESS_CODE.''."\r\n"."\r\n".'Verification code:'.$VER_CODE.'';

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
	
	
$user_login=$user_name;
$SQL='SELECT *FROM users WHERE  USERNAME ="'.$user_login.'"' ;
$result=$dbh->prepare($SQL);
		$result->execute();
		$row_count=$result->rowCount();
		
	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================
       if ($row_count==1){
   
	  $row=$result->fetch(PDO::FETCH_ASSOC);
	  // 	$id=$row["USER_ID"];
	   		$id_user=$row["ID"];	
	   		 	

 // INSERT USERNAME IN ACTIVE_LOG TABLE
	 $active="YES";
	 $insert_user="INSERT INTO active_log(USERNAME,ACTIVE,DATE_ACTIVE) VALUES(:username,:active,:date_active)";
	 $active_user=$dbh->prepare($insert_user);
	  $active_user->bindParam(":username",$user_login); 
      $active_user->bindParam(":active",$active);
       $active_user->bindParam(":date_active",$date);
	 $active_user->execute();

       session_start();
	$_SESSION['user_login'] =$user_login;
	$dbh=null;
	
           header("location:home.php");
    exit();
    }
}
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}

}

}

?>