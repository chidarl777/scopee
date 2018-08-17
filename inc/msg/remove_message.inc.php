
<?php
require("../aut_session.inc.php");
require_once("../check.php");
require("view_msg.php");
//CODE FOR UPDATING POST
try{
require("../db/config.php");
	 if(isset($_POST["remove-message"])){
	 	
		$id=$msg_id;
		$update_post=$dbh->prepare('UPDATE messages SET REMOVED="YES" WHERE MESSAGE_FROM="'.$user_login.'" AND ID="'.$id.'"');
        
        $update_post->execute();
	 }
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>