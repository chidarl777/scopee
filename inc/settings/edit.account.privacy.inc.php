

<?php
require_once("inc/check.php");
//CODE FOR UPDATING POST
$error=$post_viewerr=$view_profileerr="";
$post_view=$view_profile="";

try{

	 if(isset($_POST["update-privacy"])){
	 	
	 if(!empty($_POST['view-profile'])){
	 	$view_profile=test_input($_POST["view-profile"]);
	 }
	 else{
	 	$view_profileerr="select an option";
	 }
	  if(!empty($_POST['post-view'])){
	 	$post_view=test_input($_POST["post-view"]);
	 }
	 else{
	 	$post_viewerr="select an option";
	 }
		if($error=""){
	
	$othernames=ucwords($othername1);
		$update_post=$dbh->prepare('UPDATE users SET PROFILE_VIEW="'.$view_profile.'", POST_VIEW="'.$post_view.'" WHERE USERNAME="'.$user_login.'" AND REMOVED="NO"');
        
        $update_post->execute();
        $js_alert2='<script type="text/javascript">alert("Saved successful!");</script>';
	echo $js_alert2;
        header("location:settings.php");
     
	 }
	 		
		}
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>