<?php
//CHECKING IF IT IS USER_LOGIN THAT POSTED THE MSG
try{

	require("inc/db/config.php");
	
	 $sql='SELECT *FROM messages WHERE MESSAGE_FROM="'.$user_login.'" AND ID="'.$msg_id.'"';
	$sql1=$dbh->prepare($sql);
	 $sql1->execute();
	 //putting result in an array	
	 
	 $get_row=$sql1->fetch(PDO::FETCH_ASSOC);
	 $message=$get_row["MESSAGE"];
	
	 $edit_msg='
	<form method="post" action="">
<textarea style="width:500px;height: 150px;"  placeholder="edit your post" name="post_content"> '.$message.'</textarea>
<input type="submit" id="submit" name="update_post"  value="UPDATE"/>
</form>
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
		$id=$msg_id;
		//CHECKING IF SEND MESSAGE BOTTOM WAS CLICK TWICE  FOR THE SAME COMMENT
 $stmt=$dbh->prepare('SELECT * FROM messages WHERE MESSAGE_FROM="'.$user_login.'"  AND REMOVED="NO" AND MESSAGE="'.$post_content.'"');
 $stmt->execute();
 //GETTING ROWS RETURNED
 $num_row=$stmt->rowCount();
 
 if($num_row>0){
 	
 	echo "Cannot edit the same message twice";
 }
 else{
		$update_post=$dbh->prepare('UPDATE messages SET MESSAGE="'.$post_content.'" WHERE MESSAGE_FROM="'.$user_login.'" AND ID="'.$id.'"');
        
        $update_post->execute();
        header("location:messages.php");
	 }
	 }
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>