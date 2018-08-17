
<?php
require("../aut_session.inc.php");
require_once("inc/check.php");
require_once("get_world_post.inc.php");
require_once("comment_world_post.inc.php");
//CODE FOR UPDATING POST
try{
require("../db/config.php");
	 if(isset($_POST["remove-comment"])){
	 	
		$id=$comment_id;
		$update_comment=$dbh->prepare('UPDATE world_post_comments SET REMOVED="YES" WHERE COMMENTED_FROM="'.$user_login.'" AND ID="'.$id.'"');
        
        $update_comment->execute();
	 }
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>