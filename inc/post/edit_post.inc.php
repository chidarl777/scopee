<?php
//CHECKING IF IT IS USER_LOGIN THAT POSTED THE MSG
$edit_posts="";
try{
	if(isset($_POST["edit-post"]))
	{


	require("inc/db/config.php");
	
	 $sql='SELECT *FROM posts_tbl WHERE POSTED_FROM="'.$user_login.'" AND ID="'.$post_id.'"';
	$sql1=$dbh->prepare($sql);
	 $sql1->execute();
	 //putting result in an array	
	 
	 $get_row=$sql1->fetch(PDO::FETCH_ASSOC);
	 $post_msg_edit=$get_row["POST_MSG"];
	
	 $edit_posts='
	 
	<form method="post" action="" class="ed-recd-msd'.$post_id.'" >
	    <div class="unit">
                                    <label class="label">Textarea</label>
                                    <div class="input">
                                      <textarea class="form-control"name="post-edit-area" placeholder="your message..." spellcheck="false" id="post-area">'.$post_msg_edit.'</textarea>
                                    </div>
                                </div><br>
                                                                <!-- start btn -->
                                <div class="form-footer" style="float:right;">
                                  <input type="submit" class="btn btn-success btn-sms " onclick="loa" id="senpost" name="update-post'.$post_id.'" value="Update">
                              </div><br><br>
</form>
     ';
	
	 echo $edit_posts;
	}
			
	}
	
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>

<?php
require_once("inc/check.php");
//CODE FOR UPDATING POST

try{
 
 $post_edit_area="";
  $post_edit_areaerr="";
	 if(isset($_POST["update-post$post_id"])){
	 
	 	if(empty($_POST["post-edit-area"])){
			$post_edit_areaerr="Cannot update an empty field";
			
		}
		else{
			$post_edit_area=test_input($_POST['post-edit-area']);
		}
		if(empty($post_edit_areaerr)){
			require("inc/db/config.php");
	
		$id1=$post_id;
		
		$update_post=$dbh->prepare('UPDATE posts_tbl SET POST_MSG="'.$post_edit_area.'" WHERE POSTED_FROM="'.$user_login.'" AND ID="'.$id1.'"');
        
        $update_post->execute();
	 }
	 	}
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>

