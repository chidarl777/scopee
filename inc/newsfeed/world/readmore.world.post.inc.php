<?php
//CODE FOR SELECTING USERS WORLDS
//require("inc/check.php");
$get_world_post=$get_followed="";
$world_post_title=$get_btns="";
$world_post_content=$post_msg="";
$date_posted=$post_image=$replace_space="";
$get_content=$adword=$original='';
try{
	$w_post_id=$post_id;
	
	require("inc/db/config.php");
	$get_world_post=$dbh->prepare('SELECT *FROM world_post WHERE ID="'.$w_post_id.'" AND WORLD_ID="'.$world_id_w.'" AND REMOVED="NO" AND PUBLISHED="YES"');
	$get_world_post->execute();
	$num_row=$get_world_post->rowCount();

	if($num_row>0){
		$result=$get_world_post->fetch(PDO::FETCH_ASSOC);
		$post_by=$result["POST_BY"];
		$world_post_title=$result["POST_TITLE"];
		$world_post_id=$result['ID'];
		$world_pc=$result["POST_CONTENT"];
		$world_idp=$result["WORLD_ID"];
		$date_posted=$result["DATE_POSTED"];
		//$world_adress=$result["WORLD_ADRESS"];
		//get users info in the databases
		
		$get_data=$dbh->prepare('SELECT FIRST_NAME,OTHER_NAME,PROFILE_PIC FROM users WHERE USERNAME="'.$post_by.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$first_name=$get_info['FIRST_NAME'];
			$other_names=$get_info['OTHER_NAME'];
			$profile_pic=$get_info['PROFILE_PIC'];
		if(empty($profile_pic)){
			 	$profile_pic2="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/user_photo/".$profile_pic;
			 }
			 If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){
			 	//CHECKING IF USER LOGGED IN HAS FOLLOWED THEY WORLD
			  $check_follow=$dbh->prepare('SELECT *FROM follow_worlds WHERE FOLLOWER="'.$user_login.'" AND FOLLOWED="YES"AND WORLD_POST_ID="'.$post_id.'" AND WORLD_ID="'.$world_id_w.'" AND UNFOLLOWED="NO"');
		$check_follow->execute();
		
		$num_row=$check_follow->rowCount();
		if($num_row==0){
			$get_followed='<a href="readmore.php?rd='.$w_adress.'&pid='.$world_post_id.'&follow-world='.$world_post_id.'&title='.$world_post_title.'" class="fa fa- fa-heart btn btn-large">follow</a><';
		}
		else{
			//CHECKING IF THE USER HAS ALREADY unliked THE WORLD
		
			$get_followed= '<a href="readmore.php?rd='.$w_adress.'&pid='.$world_post_id.'&unfollow-world='.$world_post_id.'&title='.$world_post_title.'" class="fa fa- fa-broken-heart btn btn-large">unfollow</a>&nbsp;';
		}
		$get_btns=' <a href="readmore.php?rd='.$w_adress.'&pid='.$world_post_id.'&share='.$world_post_id.'&title='.$world_post_title.'"class="fa fa- fa-share btn btn-large">share</a>
                  <a class="fa fa- fa-comment btn btn-large">comments</a><br>
                                     
<hr><br>
 <div style=" width:100%; margin-right:20px; float:left:">
 <form method="post">
 <textarea name="comment-box" style="height:40px;width:400px;" placeholder="Add comment..."></textarea>
  <input type="submit" class="btn btn-success btn-sms " style="height:40px;width:60px;" id="send-comment" value="send"> 
          </form>   
                        
                                      </div>
                                       <br><br>
                                     
<hr>   ';
		}	 
			 //¶ 	
			 
			// GETTING THEY LENGTH OF THE ARTICLE TO PLACEMY SECOND ADWORD
		
			  if(strlen($world_post_content)>700){
$adword2='<br><div> <!-- Begin BidVertiser code -->
<SCRIPT SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=727004&bid=1847030" TYPE="text/javascript"></SCRIPT>
<!-- End BidVertiser code --> </div><br>';
 }
else{
 $adword2='';
 }
			$numberedString =$world_pc;
$adword='<div class="ad-frame" >  <!-- Begin BidVertiser code -->
<SCRIPT SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=727004&bid=1847030" TYPE="text/javascript"></SCRIPT>
<!-- End BidVertiser code --> </div><br>';
	$world_post_content=$adword.$numberedString.$adword2;

			 	//CHECKING THE CHARACTER IN THE POST IF IT IS MORE THAN 150
			  if(strlen($world_pc)>150){
$post_msg=substr($world_pc,0 ,150)."...";
 }
else{
 $post_msg=$world_pc;
 }
 //REPLACING SPACE IN THE POST TITLE;
			 $replace_space1=str_replace(" ","-",$world_post_title);
			 $replace_space=$replace_space1."-".$world_post_id;
			 //CHECKING IF THE VIEWER OF THE POST IS THE USER THAT POSTED

$get_content=' <div class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
          <div class="pull-left">
              <h2><b> '.$world_post_title.'</b></h2>
             
              &nbsp;&nbsp;<i class="fa fa-clock-o"></i> '.$date_posted.'
             
          </div>
      </div>
      <div class="widget-container margin-top-0">
          <div class="widget-content">

              <div class="activities-container">
                <p style="padding:20px; font-size: 17px;">'. nl2br($world_post_content).'</p>
                
              </div>

                  <br><hr>
              '.$get_followed.'
               '.$get_btns.'                                                       
          <!-- end post -->
        
          <p style="margin-left:15px; float:left;"><h4>Created by</h4></p>
             <div class="user-thumb" style="padding-top:15px;margin-bottom:0px;">
                                        <a ><img style="width:70px; height:70px; float:left; border-radius:100%;" src="'.$profile_pic2.'" alt="user"></a>     <ul style=" margin-left:30px;">
                                   <a style="margin-left:15px;">'.$first_name.' '.$other_names.' </a>
                                   
                                      </ul></div>
                                      </div> <br/><br/>
        </div>
  </div>';
 

	}
	else{
	
	}
} 		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>