<?php
if(isset($_POST['learn_more'])){
//CHECKING IF THE USER HAS CLICKED ON THE LEARN MORE BUTTON  TO READ COMPLETE POST

$SQL="INSERT INTO post_views() VALUES()";
$STM=$dbh->prepare($SQL);
     $STM->bindParam(":user_id",$USER_ID);
	$STM->bindParam(":fname",$first_name);
	$STM->bindParam(":oname",$other_names);
	$STM->bindParam(":uname",$user_name);
	$STM->bindParam(":gname",$Gender);
	$STM->bindParam(":dob_day",$Day);
	$STM->bindParam(":dob_month",$Month);
	$STM->bindParam(":dob_year",$Year);
	$STM->bindParam(":pword",md5($Password));
	$STM->bindParam(":signup_time",$time);
$STM->execute();	

$complete_post=$dbh->prepare('SELECT *FROM post_tbl WHERE POSTED_FROM="'.$posted_from.'" AND ID="'.$post_id.'" AND REMOVED="NO"');
$complete_post->execute();

}  
     //GETTING THE TOTAL NUMBER OF POST BY FRIEND
    $num_row=$complete_post->rowCount();
    
    if($num_row==1){
		//$total_friend_post=$get_total_post_by_friend;
		
		$get_result=$complete_post->fetch(PDO::FETCH_ASSOC);
    	$posted_from=$get_result["POSTED_FROM"];
    	$post_id=$get_result['ID'];
			$post_msg=$get_result['POST_MSG'];
			$time_posted=$get_result['TIME_POSTED'];
			$date_posted=$get_result['DATE_POSTED'];
			$post_tracker=$get_result['POST_TRACKER'];

$get_data=$dbh->prepare('SELECT PROFILE_PIC,FIRST_NAME,OTHER_NAME FROM users WHERE USERNAME="'.$posted_from.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			
			$profile_pic=$get_info["PROFILE_PIC"];
			$first_name=$get_info['FIRST_NAME'];
			$other_names=$get_info['OTHER_NAME'];
			
			
			if(empty($profile_pic)){
			 	$profile_pic2="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/".$profile_pic;
			 }
			 //CHECKING IF THE VIEWER HAS  ALREADY LIKED THE POST
			 $check_like=$dbh->prepare('SELECT *FROM like_post WHERE LIKED_FROM="'.$user_login.'" AND LIKED="YES"AND POST_ID="'.$post_id.'" AND UNLIKED="NO"');
		$check_like->execute();
		
		$num_row=$check_like->rowCount();
		if($num_row==0){
			$get_liked="<input type='submit' name='like_post' value='Like' />";
		}
		else{
			//CHECKING IF THE USER HAS ALREADY unliked THE WORLD
		
			$get_liked="<input type='submit' name='unlike_post' value='Unlike' />";
		}
			 //CHECKING IF THE VIEWER OF THE POST IS THE USER THAT POSTED
			 
			 if($user_login==$posted_from){
		 	$get_post="<div id='get_i_post'>
			<div id='post_id'>
			<div id='names'><a href='profile.php'> $first_name $other_names</a><a href='view_all_post.php'>''''''''''$total_friend_post<a/></div>
			<div id='b_img_1001'><img src='".$profile_pic2."'/></div><br>
			
			
			
	</div>
	$post_msg<br><a href='edit_post.php'>Edit Post</a>&nbsp;<input type='submit' name='remove_post' value='Delete' /><a href='share_post.php'>Share</a>&nbsp;<a href='comments.php'>comment</a>&nbsp;&nbsp;$get_liked
		 </div>";
			 }
			 else{
			
			$get_post="<div id='get_i_post'>
			<div id='post_id'>
			<div id='names'><a href='profile.php'> $first_name $other_names</a><a href='view_all_post.php'>''''''''''$total_friend_post<a/></div>
			<div id='b_img_1001'><img src='".$profile_pic2."'/></div><br>		
	</div>
	$post_msg<br><a href='comments.php'>comment</a><a href='share_post.php'>Share</a>&nbsp;&nbsp;$get_liked
		 </div>";
		 
		  		
			 }
	echo $get_post;
	}
	else{
		//do nothing
	}

}
?>