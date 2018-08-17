
<?php
//require("../aut_session.inc.php");
require_once("inc/check.php");
//require("get_post.php");
//require("post/view_comment.php");
//CODE FOR UPDATING POST
try{
require("inc/db/config.php");
	 if(isset($_POST["delete-comment"])){
	 
		$id=$comment_id;
		$update_comment=$dbh->prepare('UPDATE comments SET REMOVED="YES" WHERE COMMENTED_FROM="'.$user_login.'" AND ID="'.$id.'"');
        
        $update_comment->execute();
	 }
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>