
<?php
//require("../aut_session.inc.php");
require_once("inc/check.php");
//CODE FOR UPDATING POST
try{
 require("inc/db/config.php");
	 if(isset($_POST["remove_world_post"])){
	 	
		$id=$world_post_id;
		
		$update_post=$dbh->prepare('UPDATE world_post SET REMOVED="YES" WHERE POST_BY="'.$user_login.'" AND ID="'.$id.'"');
        
        $update_post->execute();
	 }
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>