
<?php
//require("../aut_session.inc.php");
//require_once("../check.php");
require("get_post.php");
//CODE FOR UPDATING POST

try{
 require("inc/db/config.php");
	 if(isset($_POST["delete-post.'.$post_id'"])){
	 	echo "sssssssssss";
	 	
		$id_del=$post_id;
		echo $id_del;
		
		$update_post=$dbh->prepare('UPDATE posts_tbl SET REMOVED="YES" WHERE POSTED_FROM="'.$user_login.'" AND ID="'.$id_del.'"');
        
        $update_post->execute();
	 }
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>