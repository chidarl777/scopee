
<?php


	//==========================================
	//	CONNECT TO THE LOCAL DATABASE
	//==========================================
	try{
require("inc/db/config.php");
$sql_newsfeed=$dbh->prepare('SELECT *FROM newsfeed ORDER BY "ID" DESC');
$sql_newsfeed->execute();
$num_newsfeed=$sql_newsfeed->rowCount();
if($num_newsfeed>0){
	while($get_newsfeed=$sql_newsfeed->fetch(PDO::FETCH_ASSOC)){
		$newsfeed_id=$get_newsfeed['ID'];
		$newsfeed_post_tracker=$get_newsfeed['POST_TRACKER'];
		$newsfeed_category=$get_newsfeed['CATEGORY'];
		$newsfeed_sub_category=$get_newsfeed['SUB_CATEGORY'];		
		$newsfeed_posted_by=$get_newsfeed['POSTED_BY'];
		
		//CHECKING THE CATEGORY OF THE POST TO KNOW WHO TO DISPLAY IT TO
		if($newsfeed_category=='world_tbl'){
			//GETTING THE WORLD NAME TO GET THE WORLD FOLLOWER
			$sql_w_post=$dbh->prepare('SELECT *FROM world_post WHERE ID="'.$newsfeed_post_id.'" AND REMOVED="NO"');
			$sql_w_post->execute();
			$num_w_post=$sql_w_post->rowCount();
			if($num_w_post>0){
				//getting world id
				$get_w_id=$sql_w_post->fetch(PDO::FETCH_ASSOC);
				$world_id=$get_w_id['WORLD_ID'];
				$w_post_by=$get_w_id['POST_BY'];
				
				//checking if world exist of has been removed
				$check_world=$dbh->prepare('SELECT *FROM world_tbl WHERE ID="'.$world_id.'" AND WORLD_NAME="'.$newsfeed_sub_category.'" AND REMOVED="NO"');
				$check_world->execute();
				$num_check_world=$check_world->rowCount();
				if($num_check_world>0){
					//GETTING WORLD FOLLOWERS
					$sql_follower=$dbh->prepare('SELECT *FROM followers WHERE WORLD_ID="'.$world_id.'" AND FOLLOWED="YES" AND UNFOLLOWED="NO"');
					$sql_follower->execute();
					$num_sql_follower=$sql_follower->rowCount();
					if($num_sql_follower>0){
						while($get_followers=$sql_follower->fetch(PDO::FETCH_ASSOC)){
							$followed_by=$get_followers['FOLLOWED_BY'];
							//getting the world active followers
							if($followed_by==$userlogin OR $w_post_by==$userlogin){
								//get the post and echo
								
							}
						}
					}
				}
			}
		}
		elseif($newsfeed_category=='post'){
			$sql_post=$dbh->prepare('SELECT *FROM post_tbl WHERE POST_TRACKER="'.$newsfeed_post_tracker.'" AND POSTED_BY="'.$newsfeed_posted_by.'" AND REMOVED="NO"');
			$sql_post->execute();
			$num_sql_post=$sql_post->rowCount();
			if($num_sql_post>0){
				while($result_sql_post=$sql_post->fetch(PDO::FETCH_ASSOC)){
					$post_id=$result_sql_post['ID'];
					$post_content=$result_sql_post['POST_CONTENT'];
					$post_by=$result_sql_post['POST_BY'];
					$date_posted=$result_sql_post['DATE_POSTED'];
					//GETTING THE NUMBER OF LIKES THE POST HAS RECEIVED
					$sql_like=$dbh->prepare('SELECT *FROM like_post WHERE POST_ID="'.$post_id.'" AND POSTED_BY="'.$post_by.'"');
					$sql_like->execute();
					$num_sql_like=$sql_like->rowCount();
					//CHECKING IF THE USER LOGIN HAS LIKED THE POST BEFORE
					$num_sql_like=$check_like->rowCount();
		if($num_sql_like==0){
			$get_liked="<input type='submit' name='like' value='Like' />";
		}
		else{
			//CHECKING IF THE USER HAS ALREADY unliked THE WORLD
		
			$get_liked="<input type='submit' name='dislike' value='Dislike' />";
		}
				}
			}
		}
		elseif($newsfeed_category=='profile_pic'){
			//select profile pic location
			//check if the pic has been like 
			
			$sql_profile_pic=$dbh->prepare('SELECT *FROM uploaded_file WHERE UPLOADED_FROM="'.$user_login.'" AND ID="'.$newsfeed_post_id.'" AND REMOVED="NO"');
			$sql_profile_pic->execute();
			$num_profile_pic=$sql_profile_pic->rowCount();
			if($num_profile_pic>0){
				$result_profile_pic=$sql_profile_pic->fetch(PDO::FETCH_ASSOC);
				$profile_pic=$result_profile_pic['UPLOADED_FILE'];
				$user_upload=$result_profile_pic['UPLOADED_FROM'];
				
				//echo ('succcessful');
			}
					}
		else{
			echo 'AN ERROR OCCURED';
		}
	}
}

}
catch(PDOException $e){
echo ("error".$e->getMessage());

}

?>