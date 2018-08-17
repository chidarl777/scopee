
<?php
 
$post_id=$load="";
$get_post="";
$get_post1="";
$frienderr=$view_comment="";

try {
     require("inc/db/config.php");
    //MAKING SURE THAT IT IS ONLY THE USERS FRIENDS AND THE USER THAT CAN SEE THE POST
 $sql='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$user_login.'" AND REMOVED="NO" OR SENT_TO="'.$user_login.'" AND REMOVED="NO" ';
$stmt=$dbh->prepare($sql);
$stmt->execute();
$num_row=$stmt->rowCount();
if($num_row==0){
	//$frienderr="YOU HAVE NO FRIENDS AT THE MOMENT";
	/*$admin_message="<h1 class='btn btn-success btn-sms ' style='font-size:20px;'>Welcome $user_firstname $user_othername </h1> <br><p style='font-size:17px;'>How would you like a quick tour arround scopee.<br>1. Start by clicking on the user icon at the topbar to see your friend list and find friends around you or <a href='friends.php' >CLICK HERE</a><br>
	2. click on the round or globe icon at the top of the task bar to view Messages or Notification.<br>
	3. click on the comment icon or the last icon at the topbar at your right to see active friend and start chatting.<br>To learn more about scopee <a href='about.php'>CLICK HERE</a></p>";
	echo $admin_message; */
}
else{
	

while($get_result=$stmt->fetch(PDO::FETCH_ASSOC)){

$sent_to=$get_result['SENT_TO'];
$sent_from=$get_result['SENT_FROM'];

if($sent_from==$user_login){
	$user_post_from=$sent_to;
}
else{
	$user_post_from=$sent_from;
}

//GETTING POST BY FRIEND OF USER


 
 $result_post=$dbh->prepare('SELECT *FROM posts_tbl WHERE POSTED_FROM="'.$user_post_from.'" AND REMOVED="NO"  OR POSTED_FROM="'.$user_login.'" AND REMOVED="NO"  ORDER BY "DATE_POSTED" DESC LIMIT '.$loadmore.'');
     $result_post->execute();
     
     //GETTING THE TOTAL NUMBER OF POST BY FRIEND
    $get_total_post_by_friend=$result_post->rowCount();
   
    if($get_total_post_by_friend==0){
		
	//do nothing
	echo "NO POST AT THE MOMENT, POST NOW!!!";
		
	}
	else{
		if($get_total_post_by_friend>7){
			
		
		$load='<div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
               <a href="home.php?loadmore='.$loadmore.'"><button class="btn btn-link btn-block btn-loadmore">Loadmore</button></a>
              </div>
                                       </div>
                                  </div>';
                  }
		//do nothing
	$total_friend_post=$get_total_post_by_friend;
while($get_result=$result_post->fetch(PDO::FETCH_ASSOC)){
	
	
    	$posted_from=$get_result["POSTED_FROM"];
    	$post_id=$get_result['ID'];
			$post_msg1=$get_result['POST_MSG'];
			$time_posted=$get_result['TIME_POSTED'];
			$date_posted=$get_result['DATE_POSTED'];
			$post_tracker=$get_result['POST_TRACKER'];
			$post_id=$get_result['ID'];
			
			//require("inc/post/edit_post.inc.php");
$get_data=$dbh->prepare('SELECT ID,PROFILE_PIC,FIRST_NAME,OTHER_NAME FROM users WHERE USERNAME="'.$posted_from.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$userid=$get_info["ID"];
			$profile_pic=$get_info["PROFILE_PIC"];
			$first_name=$get_info['FIRST_NAME'];
			$other_names=$get_info['OTHER_NAME'];
			
			// IF VIEWER IS USER LOGGED IN SHOW EDIT BUTTON

	
	 
	
			//CHECKING THE CHARACTER IN THE POST IF IT IS MORE THAN 150
			  if(strlen($post_msg1)>100){
$post_msg=substr($post_msg1,0 ,100)."...."."<a href='post/$post_id'>more</a>";
 }
else{
 $post_msg=$post_msg1;
 }
 
			
			if(empty($profile_pic)){
			 	$profile_pic3="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic3="user_data/user_photo/".$profile_pic;
			 }
			 //checking the number of post the user has sent
			
			 //CHECKING IF THE VIEWER HAS  ALREADY LIKED THE POST
			 $check_like=$dbh->prepare('SELECT *FROM like_post WHERE LIKED_FROM="'.$user_login.'" AND LIKED="YES"AND POST_ID="'.$post_id.'" AND UNLIKED="NO"');
		$check_like->execute();
		
		$num_row=$check_like->rowCount();
		if($num_row==0){
			$get_liked='<a href="home.php?lp='.$post_id.'" class="fa fa- fa-like btn btn-large">like</a>';
		}
		else{
			//CHECKING IF THE USER HAS ALREADY unliked THE WORLD
		
			$get_liked= '<a href="home.php?dlp='.$post_id.'"class="fa fa- fa-dislike btn btn-large"  >dislike</a>';
		}
		
		$d_url=base64_encode($userid);
				$encoded_url=$userid;
			 //CHECKING IF THE VIEWER OF THE POST IS THE USER THAT POSTED
			// require("inc/post/share.post.total.world.inc.php");
		
		//================================================================
			 //CODE TO SHOW POST COMMENTS
	    //================================================================
	    

$sql6='SELECT *FROM comments WHERE POST_ID="'.$post_id.'" AND REMOVED="NO" LIMIT 5';
$result6=$dbh->prepare($sql6);
$result6->execute();

//counting the nunber of rows returned
$get_rowc=$result6->rowCount();
if($get_rowc>0){
	 if($get_rowc>4){
			 	$loadmore='<a href="post.php?pid='.$post_id.'">LOAD MORE</a>';
			 }
$get_col=$result->fetch(PDO::FETCH_ASSOC);
	
$comment_id=$get_col['ID'];
$comment_by=$get_col["COMMENTED_FROM"];
$comment1=$get_col['COMMENT'];
$date=$get_col['DATE_COMMENTED'];

//getting users info
$get_data1=$dbh->prepare('SELECT ID,PROFILE_PIC,FIRST_NAME,OTHER_NAME FROM users WHERE USERNAME="'.$comment_by.'"');
			$get_data1->execute();
			$get_info3=$get_data1->fetch(PDO::FETCH_ASSOC);
			
			$profile_picC=$get_info3["PROFILE_PIC"];
			$first_nameC=$get_info3['FIRST_NAME'];
			$other_namesC=$get_info3['OTHER_NAME'];
			$idc=$get_info3['ID'];
//displaying commment
if(empty($profile_picC)){
			 	$profile_pic4="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic4="user_data/user_photos/".$profile_picC;
			 }
			 //CHECKING THE CHARACTER IN THE COMMENT IF IT IS MORE THAN 150
		
 $comment=$comment1;

 //CHECKING IF NUMBER OF COMMENT IS GREATER THAN 10
 if($get_row==10){
		$loadmore=' <div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
               <a href="post.php?pid='.$post_id.'"></a>
              </div>
          </div>
      </div>';
	}
			 //CHECKING IF THE VIEWER OF THE COMMENT IS THE USER THAT POSTED
			 if($user_login==$comment_by){
			 	$view_comment='
		<div class="col-sm-12" style="background-color:#ffffff;border-radius:5px;">
                              <div class="user-thumb" style="padding-top:15px;padding-bottom:10px;"><a href="profile.php?u='.$idc.'"><img style="border-radius:100%;" src='.$profile_pic4.' alt="user" width="40" height="40">&nbsp;&nbsp;  '.$first_nameC.' '.$other_namesC.'</a>
                              </div>
                                  <div class="activities-meta" >
                                     
                                    <!--  <i class="fa fa-clock-o"></i> -->
                                      &nbsp;&nbsp;&nbsp;&nbsp;<p>'.$comment1.'</p>
                                      <hr style="margin-top: 18px;  margin-bottom: 15px;">
                                      <div class="com">
  <br><br>
 ';

			 }
			 else{
			
			$view_comment='
		<div class="col-sm-12" style="background-color:#ffffff;border-radius:5px;">
                              <div class="user-thumb" style="padding-top:15px;padding-bottom:10px;"><a  href="profile.php?u='.$idc.'""><img style="border-radius:100%;" src='.$profile_pic4.' alt="user" width="40" height="40">&nbsp;&nbsp;'.$first_nameC.' '.$other_namesC.'</a>
                              </div>
                                  <div class="activities-meta" >
                                      
                                <!--      <i class="fa fa-clock-o"></i> '.$date.' -->
                                      &nbsp;&nbsp;&nbsp;&nbsp;<p>'.$comment.'</p>
                                     
 <br><br>
 ';
		 
}
}
else{
	$view_comment="";
}



//COMMENTS END HERE

			 if($posted_from==$user_login){
	$get_post='
		 	<div class="re" style="margin-bottom:20px;">
		<div class="col-sm-12 rec-pt-ms" style="background-color:#F7F7F7;border-radius:5px;">
                              <div class="user-thumb"  padding-top:15px;padding-bottom:10px;"><a href="profile.php?u='.$encoded_url.'"><img src='.$profile_pic3.' alt="user" style="width:70px; height:70px; float:left; border-radius:100%;" >
                                '.$first_name.' '.$other_names.'</a>
                              </div>
                                  <div class="activities-meta" >
                                  
                                    <!--  <i class="fa fa-clock-o"></i> '.$date_posted.' -->
                                     <a href="post.php?pid='.$post_id.'"> <p>&nbsp;&nbsp;'.nl2br($post_msg).'</p></a>
                                      <hr style="margin-top: 18px;  margin-bottom: 15px;">
                                     '.$get_liked.'&nbsp;
                                    <a class="fa fa- fa-share btn btn-large">share</a>
                                    <a class="fa fa- fa-comment btn btn-large">comments<a><br>
                                     
<hr>
 <div class="comments-trigger" style="background-color:#f9f9f9;">
 <div style="width:470px; height:40px; border-radius:20px;">
 <form method="POST">
                                      <input type="text" name="comment-box" style="height:40px;width:400px;" placeholder="Add comment..."><input type="submit" class="btn btn-success btn-sms " style="height:40px;width:60px;" name="send-comment" value="Send" />
                                      </form>
                                  '.$view_comment.'    
                                      </div>
                                       <br><br>
                                     
<hr>
                                      </div>
                                     
</div>
</div>
</div>
 </div><br><br><br>
 ';
 
			 }
			 else{
			
			$get_post='		 	<div class="re" >
		<div class="col-sm-12 rec-pt-ms" style="background-color:#F7F7F7;text-decoration:none;">
                              <div class="user-thumb"  padding-top:15px;padding-bottom:10px;"><a href="profile.php?u='.$encoded_url.'"><img src='.$profile_pic3.' alt="user" style="width:70px; height:70px; float:left; border-radius:100%;" >
                                '.$first_name.' '.$other_names.'</a>
                              </div>
                                  <div class="activities-meta" >
                                  
                                    <!--  <i class="fa fa-clock-o"></i> '.$date_posted.' -->
                                     <a href="post.php?pid='.$post_id.'"> <p>&nbsp;&nbsp;'.nl2br($post_msg).'</p></a>
                                      <hr style="margin-top: 18px;  margin-bottom: 15px;">
                                      <div class="com">
  <hr style="margin-top: 18px;  margin-bottom: 15px;">
                                     '.$get_liked.'&nbsp;
                                      <button Id="share"><a class="fa fa- fa-share">share</a></button>
                                      <button id="comments"><a class="fa fa- fa-comment">comments<a></button><br>
                                     
<hr>
 <div class="comments-trigger" style="background-color:#f9f9f9;">
 <div style="width:470px; height:40px; border-radius:20px;">
 <form method="POST">
                                      <input type="text" name="comment-box" style="height:40px;width:400px;" placeholder="Add comment..."><input type="submit" class="btn btn-success btn-sms " style="height:40px;width:60px;" name="send-comment" value="Send" />
                                      </form>
                                  '.$view_comment.'    
                                      </div>
                                       <br><br>
                                     
<hr>
</div>
</div>
 </div>                                     
 ';
		 
		  		
			 }
		$getallpost=$get_post;
		echo $getallpost;

}
	}
	}
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
 require("inc/db/config.php");
	 if(isset($_POST["remove_post"])){
	 	
		$id1=$post_id;
		
		$update_post=$dbh->prepare('UPDATE posts_tbl SET REMOVED="YES" WHERE POSTED_FROM="'.$user_login.'" AND ID="'.$id1.'"');
        
        $update_post->execute();
	 }
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>