<?php
//CHECKING IF IT IS USER_LOGIN THAT commentED THE MSG
$edit_comments="";
try{
	if(isset($_POST["edit-comment"]))
	{


	require("inc/db/config.php");
	
	 $sql='SELECT *FROM comments WHERE COMMENTED_FROM="'.$user_login.'" AND ID="'.$comment_id.'"';
	$sql1=$dbh->prepare($sql);
	 $sql1->execute();
	 //putting result in an array	
	 
	 $get_row=$sql1->fetch(PDO::FETCH_ASSOC);
	$comment_msg_edit=$get_row["COMMENT"];
	
	 $edit_comments='
	 
	<form method="POST" action="" class="ed-recd-msd'.$comment_id.'" >
	    <div class="unit">
                                    <label class="label">Textarea</label>
                                    <div class="input">
                                      <textarea class="form-control"name="comment-edit-area" placeholder="your message..." spellcheck="false" id="comment-area">'.$comment_msg_edit.'</textarea>
                                    </div>
                                </div><br>
                                                                <!-- start btn -->
                                <div class="form-footer" style="float:right;">
                                  <input type="submit" class="btn btn-success btn-sms " onclick="loa" id="sencomment" name="update-comment" value="Update">
                              </div><br><br>
</form>
     ';
	
	 echo $edit_comments;
	}
			
	}
	
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>

<?php
require_once("inc/check.php");
//CODE FOR UPDATING comment

try{
 
 $comment_edit_area="";
  $comment_edit_areaerr="";
	 if(isset($_POST["update-comment"])){
	 	
	 
	 	if(empty($_POST["comment-edit-area"])){
			$comment_edit_areaerr="Cannot update an empty field";
			
		}
		else{
			$comment_edit_area=test_input($_POST['comment-edit-area']);
		}
		if(empty($comment_edit_areaerr)){
			require("inc/db/config.php");
	
		$id1=$comment_id;
		
		$update_comment=$dbh->prepare('UPDATE comments SET COMMENT="'.$comment_edit_area.'" WHERE commentED_FROM="'.$user_login.'" AND ID="'.$id1.'"');
        
        $update_comment->execute();
	 }
	 	}
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>

