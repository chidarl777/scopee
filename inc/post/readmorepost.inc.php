
<?php

$post_id="";
$get_post=$get_post1="";
$get_post1="";
$frienderr="";
$post_image=$load="";
$first_name_p=$other_names_p="";

try {
     require("inc/db/config.php");

//GETTING POST BY FRIEND OF USER
 $result_post=$dbh->prepare('SELECT *FROM posts_tbl WHERE ID="'.$post_id_h.'" AND REMOVED="NO" ORDER BY `DATE_POSTED` DESC');
     $result_post->execute();
     
     //GETTING THE TOTAL NUMBER OF POST BY FRIEND
    $get_total_post_by_friend=$result_post->rowCount();
   
    if($get_total_post_by_friend==0){
		
	//do nothing
	echo "NO POST AT THE MOMENT, POST NOW!!!";
		
	}
	else{
		//do nothing
	$total_friend_post=$get_total_post_by_friend;
while($get_result=$result_post->fetch(PDO::FETCH_ASSOC)){
	
	
    	$posted_from=$get_result["POSTED_FROM"];
    	$post_id_p=$get_result['ID'];
			$post_msg2=$get_result['POST_MSG'];
			$time_posted=$get_result['TIME_POSTED'];
			$date_posted=$get_result['DATE_POSTED'];
			$post_tracker=$get_result['POST_TRACKER'];
			$post_id=$get_result['ID'];
			
			//checking if post has an image
			
			if(strpos($post_msg2,$post_tracker)==0){
				
				//echo post msg
			}
			else{
				//if there is image
				
						$sql_img=$dbh->prepare('SELECT *FROM uploaded_pics_tbl WHERE USER_UPLOADED="'.$posted_from.'" AND TRACKER="'.$post_tracker.'"');
						$sql_img->execute();
						$num_sql_img=$sql_img->rowCount();
						//echo $num_sql_img;
						if($num_sql_img>0){
							$fetch_sql_img=$sql_img->fetch(PDO::FETCH_ASSOC);
							$postimg1=$fetch_sql_img['UPLOADED_FILE'];
							//$$newsfeed_post_tracker1=' '.$newsfeed_post_tracker;
							$postimg='<br /><div class="pro-pic"><center><img id="pro-pic" src="user_data/file/'.$postimg1.'"/></center></div>';
						}
						$re_post1=str_replace($post_tracker,$postimg,$post_msg2);
			}
			
			//GETTING THE LENTH OF A POST TO PLACE ADWORD
			if(strlen($post_msg2)>500){
$adword2='<br><div ><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-format="fluid"
     data-ad-layout="in-article"
     data-ad-client="5579002118954299"
     
</ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script></div><br>';
 }
else{
 $adword2='';
 }
			$numberedString =$post_msg2;
$adword='<div class="ad-frame"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-format="fluid"
     data-ad-layout="in-article"
     data-ad-client="5579002118954299">
     
</ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>`</div><br>';
	$post_msg1=$adword.$numberedString.$adword2;
			//require("inc/post/edit_post.inc.php");
$get_data=$dbh->prepare('SELECT PROFILE_PIC,FIRST_NAME,OTHER_NAME FROM users WHERE USERNAME="'.$posted_from.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			
			$profile_pic=$get_info["PROFILE_PIC"];
			$first_name_p=$get_info['FIRST_NAME'];
			$other_names_p=$get_info['OTHER_NAME'];
			
			// IF VIEWER IS USER LOGGED IN SHOW EDIT BUTTON

	
	 
	
			//CHECKING THE CHARACTER IN THE POST IF IT IS MORE THAN 150
			  if(strlen($post_msg2)>100){
$post_msg=substr($post_msg2,0 ,150)."...";
 }
else{
 $post_msg=$post_msg2;
 }
			
			if(empty($profile_pic)){
			 	$profile_pic3="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic3="user_data/user_photo/".$profile_pic;
			 }
			 //checking the number of post the user has sent
			 if($get_total_post_by_friend>10){
			 	$load='<div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
               <a href="home.php?loadmore='.$loadmore.'"><button class="btn btn-link btn-block btn-loadmore">Loadmore</button></a>
              </div>';
			 }
			 //CHECKING IF A VIEWER HAS ALREADY LIKED A POST
			$check_like=$dbh->prepare('SELECT *FROM like_post WHERE LIKED_FROM="'.$user_login.'" AND LIKED="YES"AND POST_ID="'.$post_id.'" AND UNLIKED="NO"');
		$check_like->execute();
		
		$num_row=$check_like->rowCount();
		if($num_row==0){
			$get_liked='<a><input type="submit" name="like" value="like" /></a>';
		}
		else{
			//CHECKING IF THE USER HAS ALREADY unliked THE WORLD
		
			$get_liked= '<a><input type="submit" name="dislike" value="dislike" /></a>';
		}
			 //CHECKING IF THE VIEWER OF THE POST IS THE USER THAT POSTED
			 //require("inc/post/share.post.total.world.inc.php");
			
	$get_post='
		 	<div class="re">
		<div class="col-sm-12 rec-pt-ms" style="background-color:#F7F7F7;border-radius:5px;">
                             
                                  <div class="activities-meta" >
                                  
                                    <!--  <i class="fa fa-clock-o"></i> '.$date_posted.' -->
                                      <p style="font-size:17px;">'.nl2br($re_post1).'</p>
                                      <hr style="margin-top: 18px;  margin-bottom: 15px;">
                                      <div class="com">
              <form method="post">
                                     '.$get_liked.'&nbsp;
                                      <button Id="share"><a class="fa fa- fa-share">share</a></button>
                                      <br>
                                     
<hr>
 <div class="comments-trigger" style="display:none">
 <div style="width:470px; height:40px; border-radius:20px;">
                                      <input type="text" id="comment-box" style="height:40px;width:400px;" placeholder="Add comment..."><button class="btn btn-success btn-sms " style="height:40px;width:60px;" id="send-comment">send</button> 
                                      </div>
                                       <br><br></form>
                                     
<hr>
</div>
</div>
</div>
 </div>
 ';
 
		
	//	$getallpost=$get_post;
	//	echo $getallpost;
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