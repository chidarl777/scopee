
<?php
require_once("inc/check.php");
//CODE FOR UPDATING POST
$Firstnameerr="";
$Firstname="";
try{

	 if(isset($_POST["update-firstname"])){
	 	if(!empty($_POST["edit-firstname"])){
			$Firstname1=test_input($_POST["edit-firstname"]);
			if (!preg_match("/^[a-zA-Z]*$/",$Firstname1)) {
          $Firstnameerr='must contain letters only';
}
		}
		else{
			echo "cannot update an empty name";
		}
		
		if($Firstnameerr=""){
	
	$Firstname=ucwords($Firstname1);
		$update_post=$dbh->prepare('UPDATE users SET FIRST_NAME="'.$Firstname.'" WHERE USERNAME="'.$user_login.'" AND REMOVED="NO"');
        
        $update_post->execute();
        $js_alert3='<script type="text/javascript">alert("Saved successful!");</script>';
	echo $js_alert3;
 //       header("location:settings.php");
 		
		}
	 }
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>


<?php
require_once("inc/check.php");
//CODE FOR UPDATING POST
$othernameerr="";
$othernames="";
try{

	 if(isset($_POST["update-othernames"])){
	 
	 	if(!empty($_POST["edit-othernames"])){
			$othernames1=test_input($_POST["edit-othernames"]);
			if (!preg_match("/^[a-zA-Z]*$/",$othernames1)) {
 $othernameerr='must contain letters only';
}
		}
		else{
			echo "cannot update an empty name";
		}
		if($othernameerr=""){
	
	$othernames=ucwords($othername1);
		$update_post=$dbh->prepare('UPDATE users SET OTHER_NAME="'.$othernames.'" WHERE USERNAME="'.$user_login.'" AND REMOVED="NO"');
        
        $update_post->execute();
     //   header("location:settings.php");
     $js_alert4='<script type="text/javascript">alert("Saved successful!");</script>';
	echo $js_alert4;
	 }
	 		
		}
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>