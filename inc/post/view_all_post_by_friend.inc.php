
<?php
$post_id="";
try {
     require("db/config.php");
   

	$user_post_from=$posted_from;
//GETTING POST BY FRIEND OF USER
 $result=$dbh->prepare('SELECT *FROM posts_tbl WHERE POSTED_FROM="'.$user_post_from.'" AND REMOVED="NO"');
     $result->execute();
     
     //GETTING THE TOTAL NUMBER OF POST BY FRIEND;  
$get_result=$result->fetch(PDO::FETCH_ASSOC);
    	$posted_from=$get_result["POSTED_FROM"];
    	$post_id=$get_result['ID'];
			$post_msg1=$get_result['POST_MSG'];
			$time_posted=$get_result['TIME_POSTED'];
			$date_posted=$get_result['DATE_POSTED'];
			$post_tracker=$get_result['POST_TRACKER'];

$get_data=$dbh->prepare('SELECT PROFILE_PIC,FIRST_NAME,OTHER_NAME FROM users WHERE USERNAME="'.$posted_from.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			
			$profile_pic=$get_info["PROFILE_PIC"];
			$first_name=$get_info['FIRST_NAME'];
			$other_names=$get_info['OTHER_NAME'];
			//CHECKING THE CHARACTER IN THE POST IF IT IS MORE THAN 150
			  if(strlen($post_msg1)>100){
$post_msg=substr($post_msg1,0 ,100)."...."."<a href='#'>more</a>";
 }
else{
 $post_msg=$post_msg1;
 }
			
			if(empty($profile_pic)){
			 	$profile_pic2="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/".$profile_pic;
			 }
			//CHECKING IF THE VIEWER OF THE POST IS THE USER THAT POSTED
			 if($user_login==$posted_from){
			 	$view_all_post="<div id='get_i_post'>
			<div id='post_id'>
			<div id='names'><a href='profile.php'> $first_name $other_names</a></div>
			<div id='b_img_1001'><img src='".$profile_pic2."'/></div><br>
			
			
			
	</div>
	$post_msg<br><a href='edit_post.php'>Edit Post</a>&nbsp;<input type='submit' name='remove_post' value='Delete' /><a href='share_post.php'>Share</a>&nbsp;<a href='comments.php'>comment</a>
		 </div>";
			 }
			 else{
			
			$view_all_post="<div id='get_i_post'>
			<div id='post_id'>
			<div id='names'><a href='profile.php'> $first_name $other_names</a></div>
			<div id='b_img_1001'><img src='".$profile_pic2."'/></div><br>		
	</div>
	$post_msg<br><a href='comments.php'>comment</a><a href='share_post.php'>Share</a>
		 </div>";
		 
		  		
			 }
		 
		echo $view_all_post;
}

	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>

