<?php
//CODE FOR SELECTING USERS WORLDS
//require("inc/check.php");
$get_world_post="";
$world_post_title="";
$world_post_content="";
$date_posted=$replace_space=$replace_space1="";
$result1="";
$loadmore='';
try{
	$w_post_id=$post_id;
	if(isset($_GET['loadmore'])){
	$loadmore1=$_GET['loadmore']+10;
}
else{
	$loadmore1=15;
}

	require("inc/db/config.php");
	if(empty($worlderr)){
		
					$sql_newsfeed=$dbh->prepare('SELECT *FROM newsfeed WHERE post_category="world_tbl" AND post_category_id="'.$world_id_w.'" ORDER BY id DESC LIMIT '.$loadmore1.' ');
$sql_newsfeed->execute();
$num_newsfeed=$sql_newsfeed->rowCount();

if($num_newsfeed>0){
	
	while($get_newsfeed=$sql_newsfeed->fetch(PDO::FETCH_ASSOC)){
		$newsfeed_id=$get_newsfeed['id'];
		$newsfeed_post_tracker=$get_newsfeed['post_tracker'];
		$newsfeed_category=$get_newsfeed['post_category'];
		$newsfeed_sub_category=$get_newsfeed['post_category_address'];
		$newsfeed_category_id=$get_newsfeed['post_category_id'];		
		$newsfeed_posted_by=$get_newsfeed['posted_by'];
	    $newsfeed_post_from=$newsfeed_posted_by;
	$get_world_post1=$dbh->prepare('SELECT *FROM world_post WHERE WORLD_ID="'.$newsfeed_category_id.'" AND POST_TRACKER="'.$newsfeed_post_tracker.'" AND POST_BY="'.$newsfeed_post_from.'" AND REMOVED="NO" AND PUBLISHED="YES" ORDER BY `DATE_POSTED` DESC');
	$get_world_post1->execute();
	
	$num_row=$get_world_post1->rowCount();

	if($num_row>0){
		if($num_row>5){
			
			 	$loadmore=' <div class="widget-container margin-top-0">
          <div class="widget-content">
              <div class="activities-container">
               <a href="world.php?wor='.$w_adress.'&loadmore='.$loadmore1.'"><button style="#27c21b;" class="btn btn-link btn-block btn-loadmore">Loadmore</button></a>
              </div>';
			 }
		$result1=$get_world_post1->fetch(PDO::FETCH_ASSOC);

		$post_by=$result1["POST_BY"];
		$world_post_title=$result1["POST_TITLE"];
		$world_post_id=$result1['ID'];
		$world_post_content1=$result1["POST_CONTENT"];
		$world_idp=$result1["WORLD_ID"];
		$date_posted=$result1["DATE_POSTED"];
		//$ac_code=$result1["ACCESS_CODE"];
		$get_time=datetimediff(date('Y-m-d H:i:s'),$date_posted);
		$date_sent=datetimediff(date('Y-m-d H:i:s'),$date_posted);
		$sql_world=$dbh->prepare('SELECT *FROM worlds_tbl WHERE ID="'.$world_idp.'"');
		$sql_world->execute();
		$fetch_sql_world=$sql_world->fetch(PDO::FETCH_ASSOC);
		
		$world_adress=$fetch_sql_world["WORLD_ADRESS"];
		$world_profile_pic1=$fetch_sql_world['WORLD_PROFILE_PIC'];
	 	
	 	//CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($world_profile_pic1)){
			 	$world_profile_pic="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$world_profile_pic="user_data/world_photos/$world_profile_pic1";
			 }
			 
		//get users info in the databases
		
		$get_data=$dbh->prepare('SELECT ID,FIRST_NAME,OTHER_NAME,PROFILE_PIC FROM users WHERE USERNAME="'.$post_by.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$first_name=$get_info['FIRST_NAME'];
			$other_names=$get_info['OTHER_NAME'];
			$profile_pic=$get_info['PROFILE_PIC'];
			$user_id=$get_info['ID'];
		if(empty($profile_pic)){
			 	$profile_pic2="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/user_photo/$profile_pic";
			 }
			 
			 					//GETTING THE NUMBER OF LIKES THE POST HAS RECEIVED
					$sql_like=$dbh->prepare('SELECT *FROM like_post WHERE POST_ID="'.$world_post_id.'" AND POSTED_FROM="'.$post_by.'" AND LIKED="YES" AND UNLIKED="NO"');
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
		
		$sql_comment='SELECT *FROM comments WHERE POST_ID="'.$world_post_id.'" AND REMOVED="NO" ORDER BY "id" DESC LIMIT 5';
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
			  if(strlen($re_post_t)>200){
$world_post_contents=substr($re_post2,0 ,200)."..."."<a href='readmore.php?rd=$world_addr&pid=$world_post_id &title=$world_post_title'>more</a>.$postimg";
 }
else{
 $world_post_contents=$re_post2.$postimg;
 }
 
						// echo 'succ img';
						 $post_msg=$world_post_contents;
						
					}
					
					
			//CHECKING THE CHARACTER IN THE POST IF IT IS MORE THAN 150
			/*  if(strlen($world_post_content)>300){
$post_msg=substr($world_post_content,0 ,300)."..."."&nbsp;&nbsp;"."<a href='readmore.php?rd=$w_adress&pid=$world_post_id &title=$world_post_title'>more</a>";

}
else{
 $post_msg=$world_post_content;
 } */
 //REPLACING SPACE IN THE POST TITLE;
			 $replace_space1=str_replace(" ","-",$world_post_title);
			 $replace_space=$replace_space1."-".$world_post_id;
 	
				//$d_url=base64_encode($user_id);
				$encoded_url=$user_id;
				
				//CHECKING IF WORLD VIEWER IS IN Session
				If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){
			
			//CHECKING WORLD VIEW PERMISSION
			if($world_view=="Only Those Allowed"){
				if(isset($_GET['acs'])){
					$ac_code=$_GET['acs'];
				
				$ac_code1='&acs='.$ac_code;
				}
				else{
					
				
				$ac_code1='';
				}
			}
			else{
				$ac_code1='';
			}
			 //CHECKING IF THE VIEWER OF THE POST IS THE USER THAT POSTED
		if($user_login==$post_by){
			$get_world_post='
		<a href="readmore.php?rd='.$world_adress.'&pid='.$world_post_id.'&title='.$world_post_title.'">
		<div class="n-body">
		
				<label class="wp-title">'.nl2br($world_post_title).'<br/></label>
				<label style="float:right;width:70%;"class="wp-name">@'.$w_name.'<br/>'.$get_time.'</label>
				<div class="n-img"><img class="nu-img" src="'.$world_profile_pic.'" alt="'.$w_name.' pic"/></div>				<p><div class="n-post">'.nl2br($post_msg).'</div></p>
				<div class="n-footer">
				
				'.$world_note_like.'
				<div class="n-link"><label class="fa fa- n-by fa-comment btn btn-large">'.$get_n_comm.' comments</label>
				
				<label class="fa fa- n-by fa-comment btn btn-large">shares</label><label class="fa n-by fa- fa-comment btn btn-large">'.$n_sql_like.' likes</label></div>
			</div>
			</div>
			</a>    
 ';
		

		}
		else{
					$get_world_post='
		<a href="readmore.php?rd='.$world_adress.'&pid='.$world_post_id.'&title='.$world_post_title.''.$ac_code1.'">
		<div class="n-body">
				<label class="wp-title">'.nl2br($world_post_title).'<br/></label>
				<label style="float:right;width:70%;"class="wp-name">@'.$w_name.'<br/><i class="fa fa-clock-o"></i>'.$date_sent.'</label>
				<div class="n-img"><img class="nu-img" src="'.$world_profile_pic.'" alt="'.$w_name.' pic"/></div>				<p><div class="n-post">'.nl2br($post_msg).'</div></p>
				<div class="n-footer">
				
				'.$world_note_like.'
				<div class="n-link"><label class="fa fa- n-by fa-comment btn btn-large">'.$get_n_comm.' comments</label>
				
				<label class="fa fa- n-by fa-comment btn btn-large">shares</label><label class="fa n-by fa- fa-comment btn btn-large">'.$n_sql_like.' likes</label></div>
			</div>
			</div>
			</a>    
 ';
		}
		}
		else{$get_world_post='
		<a href="readmore.php?rd='.$world_adress.'&pid='.$world_post_id.'&title='.$world_post_title.'">
		<div class="n-body">
				<label class="wp-title">'.nl2br($world_post_title).'<br/></label>
				<label style="float:right;width:70%;"class="wp-name">@'.$w_name.'<br/>'.$date_sent.'</label>
				<div class="n-img"><img class="nu-img" src="'.$world_profile_pic.'" alt="'.$w_name.' pic"/></div>				<p><div class="n-post">'.nl2br($post_msg).'</div></p>
				<div class="n-footer">
				
				'.$world_note_like.'
				<div class="n-link"><label class="fa fa- n-by fa-comment btn btn-large">'.$get_n_comm.' comments</label>
				
				<label class="fa fa- n-by fa-comment btn btn-large">shares</label><label class="fa n-by fa- fa-comment btn btn-large">'.$n_sql_like.' likes</label></div>
			</div>
			</div>
			</a>    
 ';
			//if viewer not in session
			
			
		}
		echo $get_world_post;
	
	}
	else{
	//	require("inc/world/get.other.world.post.inc.php");
		//do nothing......
	}
		}
		}
	}
} 		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>