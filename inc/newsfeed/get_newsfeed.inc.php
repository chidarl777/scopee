
<?php


	//==========================================
	//	CONNECT TO THE LOCAL DATABASE
	//==========================================
	try{
require("inc/db/config.php");

$newsfeed_post_from=$world_addr=$w_adress='';
$newsfeed_news='';
$postimg='';
$access_permission=0; // PERMISSION FOR WORKD VIEW ONLY 
$loadmore='';
echo '<style>
	.n-body hr{
		border:none;
		background-color:none;
	}
</style>';
if(isset($_GET['loadmore'])){
	$loadmore1=$_GET['loadmore']+10;
}
else{
	$loadmore1=20;
}
//'.$loadmore1.'
			$sql_newsfeed=$dbh->prepare('SELECT *FROM newsfeed ORDER BY id DESC LIMIT '.$loadmore1.' ');
$sql_newsfeed->execute();
$num_newsfeed=$sql_newsfeed->rowCount();

if($num_newsfeed>0){
	if($num_newsfeed>5){
			 	$loadmore=' <div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
               <a href="home.php?loadmore='.$loadmore1.'"><button style="#27c21b;" class="btn btn-link btn-block btn-loadmore">Loadmore</button></a>
              </div>';
			 }
	while($get_newsfeed=$sql_newsfeed->fetch(PDO::FETCH_ASSOC)){
		$newsfeed_id=$get_newsfeed['id'];
		$newsfeed_post_tracker=$get_newsfeed['post_tracker'];
		$newsfeed_category=$get_newsfeed['post_category'];
		$newsfeed_sub_category=$get_newsfeed['post_category_address'];
		$newsfeed_category_id=$get_newsfeed['post_category_id'];		
		$newsfeed_posted_by=$get_newsfeed['posted_by'];
		
		//CHECKING IF NEWSFEED POST_BY IS USER_LOGGED IN
		if($newsfeed_posted_by==$user_login){
			$newsfeed_post_from=$newsfeed_posted_by;
		}
		else{
			
				//GETTING FRIEND OF A USER LOGGED IN
	//$user_friend='';
	$SQL=$dbh->prepare('SELECT *FROM friends_tbl WHERE SENT_TO="'.$user_login.'" AND SENT_FROM="'.$newsfeed_posted_by.'" AND REMOVED="NO" OR SENT_TO="'.$newsfeed_posted_by.'" AND SENT_FROM="'.$user_login.'" AND REMOVED="NO"');
	$SQL->execute();
    $num_row=$SQL->rowCount();
    ;
  // echo $num_row;
    if($num_row==0){
		//$get_frienderr="You have no request at the moment";
	}
	else{

		$get_result=$SQL->fetch(PDO::FETCH_ASSOC);

$sent_to=$get_result['SENT_TO'];
$sent_from=$get_result['SENT_FROM'];

if($sent_from==$user_login){
	$newsfeed_post_from=$sent_to;
}
else{
	$newsfeed_post_from=$sent_from;
}

				}
			
		
	}
	
	/*if($num_newsfeed==20){
		$loadmore=' <div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
                <button class="btn btn-link btn-block btn-loadmore">Load More</button>
              </div>
          </div>
      </div>';
	}*/
	
	//if($user_login=$newsfeed_post_from){
		
		
		//CHECKING THE CATEGORY OF THE POST TO KNOW WHO TO DISPLAY IT TO
		if($newsfeed_category=='posts_tbl'){
			//echo $newsfeed_post_tracker.'<Br>';
			$sql_post=$dbh->prepare('SELECT *FROM posts_tbl WHERE POSTED_FROM="'.$newsfeed_post_from.'" AND POST_TRACKER="'.$newsfeed_post_tracker.'" AND REMOVED="NO"');
			
			$sql_post->execute();
			$num_sql_post=$sql_post->rowCount();
			
			//echo $num_sql_post;
			if($num_sql_post>0){
				$result_sql_post=$sql_post->fetch(PDO::FETCH_ASSOC);
					$n_post_id=$result_sql_post['ID'];
					
					$post_msg2=$result_sql_post['POST_MSG'];
					$post_by=$result_sql_post['POSTED_FROM'];
					$date_posted=$result_sql_post['DATE_POSTED'];
					
					//echo strpos($post_msg2,$newsfeed_post_tracker);
					
					//CHECKING IF POST HAS AN IMAGE
					if(strpos($post_msg2,$newsfeed_post_tracker)==0){
						$re_post1=$post_msg2;
						$postimg='';
						$re_post_t=$post_msg2;
						//CHECKING THE CHARACTER IN THE POST IF IT IS MORE THAN 150
			  if(strlen($re_post_t)>100){
$post_msg=substr($re_post_t,0 ,100)."...."."<a href='post/$post_id'>more</a>.".$postimg;
 }
else{
 $post_msg=$re_post_t.$postimg;
 }
 
						 
						 $re_post=$post_msg;
					}
					else{
						
						$sql_img=$dbh->prepare('SELECT *FROM uploaded_pics_tbl WHERE USER_UPLOADED="'.$post_by.'" AND TRACKER="'.$newsfeed_post_tracker.'"');
						$sql_img->execute();
						$num_sql_img=$sql_img->rowCount();
						//echo $num_sql_img;
						if($num_sql_img>0){
							$fetch_sql_img=$sql_img->fetch(PDO::FETCH_ASSOC);
							$postimg1=$fetch_sql_img['UPLOADED_FILE'];
							//$$newsfeed_post_tracker1=' '.$newsfeed_post_tracker;
							$postimg='<br /><div class="pro-pic"><center><img id="pro-pic" src="user_data/file/'.$postimg1.'"/></center></div>';
						}
						
						$re_post1=str_replace($newsfeed_post_tracker,$postimg,$post_msg2);
						$re_post2=str_replace($newsfeed_post_tracker,'',$post_msg2);
						$re_post_t=$re_post2;
						
						
						
						//CHECKING THE CHARACTER IN THE POST IF IT IS MORE THAN 150
			  if(strlen($re_post_t)>100){
$post_msg=substr($re_post2,0 ,100)."..."."<a href='post/$post_id'>more</a>.$postimg";
 }
else{
 $post_msg=$re_post2.$postimg;
 }
 
						// echo 'succ img';
						 $re_post=$post_msg;
						
					}
					
						
						
					
					
					//GETTING POSTED FROM INFO
					$get_data=$dbh->prepare('SELECT ID,PROFILE_PIC,FIRST_NAME,OTHER_NAME FROM users WHERE USERNAME="'.$post_by.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$userid=$get_info["ID"];
			$profile_pic=$get_info["PROFILE_PIC"];
			$first_name=$get_info['FIRST_NAME'];
			$other_names=$get_info['OTHER_NAME'];
			
			
			if(empty($profile_pic)){
			 	$profile_pic3="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic3="user_data/user_photo/".$profile_pic;
			 }
			 
					//GETTING THE NUMBER OF LIKES THE POST HAS RECEIVED
					$sql_like=$dbh->prepare('SELECT *FROM like_post WHERE POST_ID="'.$n_post_id.'" AND POSTED_FROM="'.$post_by.'" AND LIKED="YES" AND UNLIKED="NO"');
					$sql_like->execute();
					$fetch_sql_like=$sql_like->fetch(PDO::FETCH_ASSOC);
					$like_from=$fetch_sql_like['LIKED_FROM'];
					$num_sql_like=$sql_like->rowCount();
					//CHECKING IF THE USER LOGIN HAS LIKED THE POST BEFORE
					if($num_sql_like==0){
						if($num_sql_like==0){
							$n_sql_like='';
						}
						else{
							$n_sql_like=$num_sql_like;
						}
			$get_liked="<input type='submit' name='like' value='Like' />";
			$num_w_like='';
			$world_note_like='';	
		}
		else{
			if($like_from==$user_id){
				$num_w_like=$num_sql_like-1;
				$world_note_like="<p>You and $num_w_like others like this post</p>";
			}
			else{
			$num_w_like='';
			$world_note_like='';	
			}
			//CHECKING IF THE USER HAS ALREADY unliked THE WORLD
		
			$get_liked="<input type='submit' name='dislike' value='Dislike' />";
		}
		//===========================================================================
		//GETTING COMMENTS  FOR EACH POST
		//=============================================================================
		
		$sql_comment='SELECT *FROM comments WHERE POST_ID="'.$n_post_id.'" AND COMMENTED_FROM="'.$newsfeed_post_from.'" AND REMOVED="NO" ORDER BY "id" DESC LIMIT 5';
$result_comment=$dbh->prepare($sql_comment);
$result_comment->execute();

//counting the nunber of rows returned
$get_rowc=$result_comment->rowCount();
if($get_rowc>0){
	
		$get_n_comm=$get_rowc;
	
	$fetch_newsfeed_comment=$result_comment->fetch(PDO::FETCH_ASSOC);
	$comment_by=$fetch_newsfeed_comment['COMMENTED_FROM'];
	$comment_tracker=$fetch_newsfeed_comment['COMMENT_TRACKER'];
	$comment=$fetch_newsfeed_comment['COMMENT'];
	
	//getting comment user info
$get_data1=$dbh->prepare('SELECT ID,PROFILE_PIC,FIRST_NAME,OTHER_NAME FROM users WHERE USERNAME="'.$comment_by.'"');
			$get_data1->execute();
			$get_info3=$get_data1->fetch(PDO::FETCH_ASSOC);
			
			$profile_picC=$get_info3["PROFILE_PIC"];
			$first_nameC=$get_info3['FIRST_NAME'];
			$other_namesC=$get_info3['OTHER_NAME'];
			$idc=$get_info3['ID'];
			}
			else{
				
		$get_n_comm='';
	
	}
			

//COMMENTS END HERE
//getting time diff

$get_time=datetimediff(date('Y-m-d H:i:s'),$date_posted);

			 if($post_by==$user_login){
			//echo $newsfeed_post_tracker;
	$get_post='
	<a href="post.php?pid='.$n_post_id.'"><div class="n-body">
	    <div style"padding-bottom:50px; width:100%; border-bottom:2px solid; height:40%; background-color:red;">
		<div class="nu-pro">
		'.$first_name.' '.$other_names.'<p><i class="fa fa-clock-o"></i>'.$get_time.'</p>
		</div>
		<div class="n-img" ><img class=" nu-img " src="'.$profile_pic3.'" alt="'.$first_name.' pic"/></div>
		</div>
		<div class="n-post">'.nl2br($post_msg).'</div>
		
	<div class="n-footer">
				'.$world_note_like.'
				<div class="n-link"><label class="fa fa- n-by fa-comment btn btn-large">'.$get_n_comm.' comments</label>
				
				<label class="fa fa- n-by fa-comment btn btn-large">shares</label><label class="fa n-by fa- fa-comment btn btn-large">'.$n_sql_like.' likes</label></div></div></div></a>
 ';
 
			 }
			 else{
			
			$get_post='	
	<a href="post.php?pid='.$n_post_id.'"><div class="n-body">
		<div class="nu-pro">
		'.$first_name.' '.$other_names.'<p>'.$date_posted.'</p>
		</div>
		<div class="n-img"><img class="nu-img" src="'.$profile_pic3.'" alt="'.$first_name.' pic"/></div>
		<div class="n-post">'.nl2br($post_msg).'</div>
		
		<div class="n-footer">
				'.$world_note_like.'
				<div class="n-link"><label class="fa fa- n-by fa-comment btn btn-large">'.$get_n_comm.' comments</label>
				
				<label class="fa fa- n-by fa-comment btn btn-large">shares</label><label class="fa n-by fa- fa-comment btn btn-large">'.$n_sql_like.' likes</label></div></div>
	</div></a>               
 ';
		 
		  		
			 }
			 echo $get_post;
//$newsfeed_news=$get_post;

}
}
		
				
				
			
	
		elseif($newsfeed_category=='world_tbl'){
			$get_world_post1=$dbh->prepare('SELECT *FROM world_post WHERE WORLD_ID="'.$newsfeed_category_id.'" AND POST_TRACKER="'.$newsfeed_post_tracker.'" AND POST_BY="'.$newsfeed_post_from.'" AND REMOVED="NO" AND PUBLISHED="YES" ORDER BY `DATE_POSTED` DESC');
	$get_world_post1->execute();
	
	$num_row=$get_world_post1->rowCount();

	if($num_row>0){
		
		$result1=$get_world_post1->fetch(PDO::FETCH_ASSOC);

		$post_by=$result1["POST_BY"];
		$world_post_title=$result1["POST_TITLE"];
		$world_post_id=$result1['ID'];
		$world_post_content1=$result1["POST_CONTENT"];
		$world_idp=$result1["WORLD_ID"];
		$date_posted=$result1["DATE_POSTED"];
		
		//get users info in the databases
		
		//==============================================================
		//GETTING THEY WORLD NAME
		//===============================================================
		$sql_world=$dbh->prepare('SELECT *FROM worlds_tbl WHERE ID="'.$world_idp.'"');
		$sql_world->execute();
		$sql_fetch_world=$sql_world->fetch(PDO::FETCH_ASSOC);
		$world_addr=$sql_fetch_world['WORLD_ADRESS'];
		$w_name=$sql_fetch_world['WORLD_NAME'];
		$world_profile_pic1=$sql_fetch_world['WORLD_PROFILE_PIC'];
		$world_view_access=$sql_fetch_world["WORLD_VIEW"];
		$world_creator=$sql_fetch_world['CREATED_BY'];
	 	
	 	

		//CHECKING WORLD VIEW PERMISSION
		
	 	//CHECKING IF THE VIEWER IS PERMITED TO VIEW THE WORLD BY THE CREATOR
	 	if($user_login != $world_creator){
	
	 	if($world_view_access=="Only me"){
			if($user_login != $world_creator){
			   $access_permission=0;
			}
			
		}
		elseif($world_view_access=="Friends"){
			if($user_login != $world_creator){
				$sql3='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$user_login.'" AND REMOVED="NO"  OR  SENT_TO="'.$user_login.'" AND REMOVED="NO"';
$stmt=$dbh->prepare($sql3);
$stmt->execute();
$num_row=$stmt->rowCount();
if($num_row<1){
	//echo"YOU HAVE NO FRIENDS AT THE MOMENT";
}
else{
	

while($get_result=$stmt->fetch(PDO::FETCH_ASSOC)){

$sent_to=$get_result['SENT_TO'];
$sent_from=$get_result['SENT_FROM'];
//CHECKING IF $USER LOGGED IN IS SENT TO OR SENT FROM IN THE FRIEND TABLE
if($sent_to==$user_login){
	$users_friends=$sent_from;
}
else{
	$users_friends=$sent_to;
}
			}
		//CHECKING IF THE VIEWER IS A FREIND OF A CREATOR
	
		
		if($users_friends != $user_login){
			
			$access_permission=0;
		}
		else{
			$access_permission=1;
		}
		}
		}
		}
elseif($world_view_access=="Followers"){
			if($user_login!=$world_creator){
					//CHECKING IF THE USER HAS IS A FOLLOWER THE WORLD
		$sqlfollower=$dbh->prepare('SELECT *FROM follow_worlds WHERE FOLLOWER="'.$user_login.'" AND FOLLOWED="YES" AND WORLD_ADRESS="'.$world_adress.'"  AND WORLD_ID="'.$world_id.'" AND UNFOLLOWED="NO"');
		$sql->execute();
		$num_follower=$sqlfollower->rowCount();
		if($num_follower!=1){
			$access_permission=0;
		}
		else{
			$access_permission=1;
		}
			}
		}
elseif($world_view_access=="Public"){
			//ALLOW ALL USERS
			$access_permission=1;
		}
elseif($world_view_access=="Only Those Allowed"){
	
	if($user_login != $world_creator){
		
	$access_permission=0;
	}
	else{
		$access_permission=1;
	}
}
	else{
		
	}
		}
		
	 	//CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($world_profile_pic1)){
			 	$world_profile_pic="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$world_profile_pic="user_data/world_photos/$world_profile_pic1";
			 }
			 
		//==============================================================
		//GETTING TOTAL WORLD POST COMMENT
		//=============================================================
		$sql_world_comment=$dbh->prepare('SELECT *FROM world_post_comments where POST_ID="'.$world_post_id.'"');
		$sql_world_comment->execute();
		$num_sql_world_comment=$sql_world_comment->rowCount();
		if($num_sql_world_comment>0){
			$num_world_comm=$num_sql_world_comment;
		}
		else{
			$num_world_comm='';
		}
		//===========================================================
		//GETTING TOTAL WORLD POST LIKE
		//===========================================================
		$sql_world_like=$dbh->prepare('SELECT *FROM like_post WHERE CATEGORY="world" AND POST_ID="'.$world_post_id.'" AND UNLIKED="NO"');
		$sql_world_like->execute();
		$num_sql_world_like=$sql_world_like->rowCount();
		
		
		if($num_sql_world_like>0){
			$fetch_sql_world_like=$sql_world_like->fetch(PDO::FETCH_ASSOC);
			$world_like_from=$fetch_sql_world_like['LIKED_FROM'];
			$world_post_like=$num_sql_world_like;
			if($world_like_from==$user_login){
				$num_w_like=$world_post_like-1;
				$world_note_like="<p>You and $num_w_like others like this post</p>";
			}
			else{
				$num_w_like='';
				$world_note_like="";
			}
			
			
		}
		else{
			$world_post_like='';
			$num_w_like='';
				$world_note_like="";
		}
		//============================================================
		//GETTING USER INFO
		//===========================================================
		$get_data=$dbh->prepare('SELECT ID,FIRST_NAME,OTHER_NAME,PROFILE_PIC FROM users WHERE USERNAME="'.$post_by.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$first_name=$get_info['FIRST_NAME'];
			$other_names=$get_info['OTHER_NAME'];
			$profile_pic=$get_info['PROFILE_PIC'];
			$user_id=$get_info['ID'];
		if(empty($profile_pic)){
			 	$profile_picw2="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_picw2="user_data/user_photo/$profile_pic";
			 }
			 
//ALLOWING CERTAIN SPECIAL CHAR
$p=str_replace('gt;','>',$world_post_content1);
$y=str_replace('&lt;','<',$p);
$t=str_replace('#%%','"',$y);
$world_post_content=$t;		

	 						//CHECKING IF POST HAS AN IMAGE
					if(strpos($world_post_content,$newsfeed_post_tracker)==0){
						$re_post1=$world_post_content;
						$postimg='';
						$re_post_t=$world_post_content;
						//CHECKING THE CHARACTER IN THE POST IF IT IS MORE THAN 150
			  if(strlen($re_post_t)>100){
$world_post_contents=substr($re_post_t,0 ,100)."...."."<a href='readmore.php?rd=$world_addr&pid=$world_post_id &title=$world_post_title'>more</a>.".$postimg;
 }
else{
 $world_post_contents=$re_post_t.$postimg;
 }
 
						 
						 $post_msg=$world_post_contents;
					}
					else{
						
						$sql_img=$dbh->prepare('SELECT *FROM uploaded_pics_tbl WHERE USER_UPLOADED="'.$post_by.'" AND TRACKER="'.$newsfeed_post_tracker.'"');
						$sql_img->execute();
						$num_sql_img=$sql_img->rowCount();
						//echo $num_sql_img;
						if($num_sql_img>0){
							$fetch_sql_img=$sql_img->fetch(PDO::FETCH_ASSOC);
							$postimg1=$fetch_sql_img['UPLOADED_FILE'];
							//$$newsfeed_post_tracker1=' '.$newsfeed_post_tracker;
							$postimg='<br /><div class="pro-pic"><center><img id="pro-pic" src="user_data/world_photos/'.$postimg1.'"/></center></div>';
						}
						
						$re_post1=str_replace($newsfeed_post_tracker,$postimg,$world_post_content);
						$re_post2=str_replace($newsfeed_post_tracker,'',$world_post_content);
						$re_post_t=$re_post2;
						
						
						
						//CHECKING THE CHARACTER IN THE POST IF IT IS MORE THAN 150
			  if(strlen($re_post_t)>100){
$world_post_contents=substr($re_post2,0 ,100)."..."."<a href='readmore.php?rd=$world_addr&pid=$world_post_id &title=$world_post_title'>more</a>.$postimg";
 }
else{
 $world_post_contents=$re_post2.$postimg;
 }
 
						// echo 'succ img';
						 $post_msg=$world_post_contents;
						
					}
					
						
	 		 	
			
 //REPLACING SPACE IN THE POST TITLE;
 
			 $replace_space1=str_replace(" ","-",$world_post_title);
			 $replace_space=$replace_space1."-".$world_post_id;
 	
				//$d_url=base64_encode($user_id);
				$encoded_url=$user_id;
				
				$get_time=datetimediff(date('Y-m-d H:i:s'),$date_posted);
				//CHECKING IF WORLD VIEWER IS IN Session
				If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){
			
			 //CHECKING IF THE VIEWER OF THE POST IS THE USER THAT POSTED
		if($user_login==$post_by){
			$get_world_post='
		<a href="readmore.php?rd='.$world_addr.'&pid='.$world_post_id.'&title='.$world_post_title.'">
		<div class="n-body">
				<label class="wp-title">'.nl2br($world_post_title).'<br/></label>
				<label style="float:right;width:70%;"class="wp-name">@'.$w_name.'<p><i class="fa fa-clock-o"></i>'.$get_time.'</p></label>
				<div class="n-img"><img class="nu-img" src="'.$world_profile_pic.'" alt="'.$w_name.' pic"/></div>				<p><div class="n-post">'.nl2br($post_msg).'</div></p>
				<div class="n-footer">
				
				'.$world_note_like.'
				<div class="n-link"><label class="fa fa- n-by fa-comment btn btn-large">'.$num_world_comm.' comments</label>
				
				<label class="fa fa- n-by fa-comment btn btn-large">shares</label><label class="fa n-by fa- fa-comment btn btn-large">'.$world_post_like.' likes</label></div>
			</div>
			</div>
			</a>    
 ';
		echo $get_world_post;

		}
		else{
			if($access_permission==1){
				
					$get_world_post='
		<a href="readmore.php?rd='.$world_addr.'&pid='.$world_post_id.'&title='.$world_post_title.'">
		<div class="n-body">
				<label class="wp-title">'.nl2br($world_post_title).'<br/></label>
				<label style="float:right;width:70%;"class="wp-name">@'.$w_name.'<p><i class="fa fa-clock-o"></i>'.$get_time.'</p></label>
				<div class="n-img"><img class="nu-img" src="'.$world_profile_pic.'" alt="'.$w_name.' pic"/></div>				<p><div class="n-post">'.nl2br($post_msg).'</div></p>
				<div class="n-footer">
				
				'.$world_note_like.'
				<div class="n-link"><label class="fa fa- n-by fa-comment btn btn-large">'.$num_world_comm.' comments</label>
				
				<label class="fa fa- n-by fa-comment btn btn-large">shares</label><label class="fa n-by fa- fa-comment btn btn-large">'.$world_post_like.' likes</label></div>
			</div>
			</div>
			</a>    
 ';
		echo $get_world_post;
 }
	
		}
	

		//$newsfeed_news=$get_world_post;
		//echo $newsfeed_news;
	
					}
		else{
			//echo 'AN ERROR OCCURED';
		}
			
			}
	}
	elseif($newsfeed_category=='profile_pic'){
		//===========================================================
		//GET PROFILE PIC IN NEWSFEED
		//===========================================================
		
		$sql_newsfeed_pic=$dbh->prepare('SELECT *FROM uploaded_pics_tbl WHERE USER_UPLOADED="'.$newsfeed_post_from.'" AND TRACKER="'.$newsfeed_post_tracker.'" AND REMOVED="NO"');
		$sql_newsfeed_pic->execute();
		$num_sql_newsfeed_pic=$sql_newsfeed_pic->rowCount();
		if($num_sql_newsfeed_pic>0){
			$fetch_sql_newsfeed_pic=$sql_newsfeed_pic->fetch(PDO::FETCH_ASSOC);
			$newsfeed_uploaded_pic=$fetch_sql_newsfeed_pic['UPLOADED_FILE'];
			$date_uploaded=$fetch_sql_newsfeed_pic['DATE_UPLOADED'];
			$upload_type=$fetch_sql_newsfeed_pic['UPLOADED_TYPE'];
			$upload_from=$fetch_sql_newsfeed_pic['USER_UPLOADED'];
			$post_id=$fetch_sql_newsfeed_pic['ID'];
		//==============================================================
		//GETTING TOTAL WORLD POST COMMENT
		//=============================================================
		$sql_comment=$dbh->prepare('SELECT *FROM comments where POST_ID="'.$post_id.'"');
		$sql_comment->execute();
		$num_sql_comment=$sql_comment->rowCount();
		if($num_sql_comment>0){
			$num_comm=$num_sql_comment;
		}
		else{
			$num_comm='';
		}
		//===========================================================
		//GETTING TOTAL WORLD POST LIKE
		//===========================================================
		$sql_like=$dbh->prepare('SELECT *FROM like_post WHERE CATEGORY="world" AND POST_ID="'.$post_id.'" AND UNLIKED="NO"');
		$sql_like->execute();
		$num_sql_like=$sql_like->rowCount();
		
		
		if($num_sql_like>0){
			$fetch_sql_like=$sql_like->fetch(PDO::FETCH_ASSOC);
			$like_from=$fetch_sql_like['LIKED_FROM'];
			$post_like=$num_sql_like;
			if($like_from==$user_login){
				$num_w_like=$post_like-1;
				$note_like="<p>You and $num_w_like others like this post</p>";
			}
			else{
				$num_w_like='';
				$note_like="";
			}
			
			
		}
		else{
			$post_like='';
			$num_w_like='';
				$note_like="";
		}
			//======================================================
			//GETTING USER INFO
			//=======================================================
			$get_data=$dbh->prepare('SELECT ID,FIRST_NAME,OTHER_NAME,PROFILE_PIC FROM users WHERE USERNAME="'.$upload_from.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$first_name=$get_info['FIRST_NAME'];
			$other_names=$get_info['OTHER_NAME'];
			$profile_pic=$get_info['PROFILE_PIC'];
			$user_id=$get_info['ID'];
		if(empty($profile_pic)){
			 	$profile_picw3="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_picw3="user_data/user_photo/$profile_pic";
			 }
			 $get_time=datetimediff(date('Y-m-d H:i:s'),$date_uploaded);
			if($upload_type=='image'){
				$get_pic='<div class="n-body"><label class="wp-title">'.$first_name.' '.$other_names.' <label id="l-com">added a new profile picture</label><hr>
					<p><i class="fa fa-clock-o"></i>'.$get_time.'</p>
				</label>
				<div class="n-img"><img class="nu-img" src="'.$profile_picw3.'" alt="'.$first_name.' pic"/></div>
				<div class="pro-pic"><center><img id="pro-pic" src="user_data/user_photo/'.$newsfeed_uploaded_pic.'" /></center></div><div class="n-footer">
				
				<div class="n-link"><label class="fa fa- n-by fa-comment btn btn-large"> comments</label>
				
				<label class="fa fa- n-by fa-comment btn btn-large">shares</label><label class="fa n-by fa- fa-comment btn btn-large">likes</label></div></div>
				</div>';  
				echo $get_pic; 
				//$newsfeed_news=$get_pic;    

				
			}
		}
	}
	
	//}//echo $newsfeed_news;
}
}
}
catch(PDOException $e){
echo ("error".$e->getMessage());

}

?>