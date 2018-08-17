<?php

//CHECKING IF IT IS USER_LOGIN THAT POSTED THE MSG
try{
require("../../aut_session.php");
	require("../db/config.php");
	
	$id_wc=$comment_id;
	 $sql_c='SELECT *FROM world_post_comments WHERE COMMENTED_FROM="'.$user_login.'" AND ID="'.$id_wc.'"';
	$sql1_c=$dbh->prepare($sql_c);
	 $sql1_c->execute();
	 //putting result in an array	
	 
	 $get_row=$sql1_c->fetch(PDO::FETCH_ASSOC);
	 $comment=$get_row["COMMENTS"];
	
	 $edit_comment='
	
<textarea style="width:500px;height: 150px;"  placeholder="edit your post" name="post_content"> '.$comment.'</textarea>
<input type="submit" id="submit" name="update_post"  value="UPDATE"/>

     ';
	
	 
	}
	
	
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>

<?php
require_once("inc/check.php");
//CODE FOR UPDATING POST
try{

	 if(isset($_POST["update_post"])){
	 	if(!empty($_POST["post_content"])){
			$post_content=test_input($_POST["post_content"]);
		}
		else{
			echo "cannot update an empty post";
		}
		require("inc/db/config.php");
		$id=$comment_id;
		//CHECKING IF SEND MESSAGE BOTTOM WAS CLICK TWICE  FOR THE SAME COMMENT
 $stmt=$dbh->prepare('SELECT * FROM world_post_comments WHERE COMMENTED_FROM="'.$user_login.'"  AND REMOVED="NO" AND COMMENTS="'.$post_content.'"');
 $stmt->execute();
 //GETTING ROWS RETURNED
 $num_row=$stmt->rowCount();
 
 if($num_row>0){
 	
 	echo "Cannot edit the same message twice";
 }
 else{
		$update_post=$dbh->prepare('UPDATE world_post_comments SET COMMENTS="'.$post_content.'" WHERE COMMENTED_FROM="'.$user_login.'" AND ID="'.$id.'"');
        
        $update_post->execute();
        header("location:comment_world_post.php");
	 }
	 }
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>