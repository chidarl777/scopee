
<?php
require_once("inc/check.php");
//CODE FOR UPDATING POST
try{
$error=$Passworderr=$newPassworderr=$Confirm_passworderr="";
$Password=$newPassword=$Confirm_password="";
	 if(isset($_POST["update-pass"])){
	 	if(empty($_POST['old-pass'])){
$Passworderr='input a valid password';
 }
else{
$Password=test_input($_POST['old-pass']);
if (!preg_match("/^[0-9a-zA-Z]*$/",$Password)) {
   $errors='Incorrect Password';
   }
   else{
   $Plenth=strlen($Password);

if($Plenth>=8 && $Plenth<=16){
    $Passworderr=" ";
}
else{
    $Passworderr=$Passworderr."Incorrect Password"."<BR />";
   }
	}
	}
		
		if(empty($_POST['new-pass'])){
$newPassworderr='input a valid password';
 }
else{
$newPassword=test_input($_POST['new-pass']);
if (!preg_match("/^[0-9a-zA-Z]*$/",$newPassword)) {
   $newPassworderr='Letters and numbers require';
   }
   else{
   $Plenth=strlen($newPassword);

if($Plenth>=8 && $Plenth<=16){
    $newPassworderr=" ";
}
else{
    $newPassworderr=$Passworderr."Password must be between 8 to 16 characters"."<BR />";
   }
	}
	}
		if(!empty($_POST["comfirm-pass"])){
			$Confirm_password=test_input($_POST["comfirm-pass"]);
			if($Confirm_password!=$newPassword){
				$Confirm_passworderr="Password does not match"."<BR />";
			}
		}
		else{
			echo "Confirm passworld";
		}
if($error=""){
	$check_pass=$dbh->prepare("SELECT *FROM users WHERE USERNAME=$user_login AND PASSWORD=md5($Password) ");
	$check_pass->execute();
	$num_pass=$check_pass->rowCount();
	if($num_pass==1){

$update_pass=md5($Confirm_password);
		$update_post=$dbh->prepare('UPDATE users SET PASSWORD="'.$update_pass.'" WHERE USERNAME="'.$user_login.'" AND REMOVED="NO"');
        
        $update_post->execute();
       $js_alert6='<script type="text/javascript">alert("Saved successful!");</script>';
	echo $js_alert6;
      //  header("location:settings.php");
	 }
	 else{
	 	$Passworderr="Incorrect Password";
	 }
	 }
	 
	 	
}
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>