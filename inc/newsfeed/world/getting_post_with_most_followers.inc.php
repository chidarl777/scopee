<?php
//CODE FOR GETTING WORLD WITH MOST follow WORLDS
//require("inc/check.php");
$get_world_post="";
$login_info=$get_r_content=$error="";
$trending="";

try{
	require "inc/db/config.php";
	//GETTING WORLD THAT HAS NOT BEEN REMOVED
	$get_world=$dbh->prepare('SELECT *FROM worlds_tbl WHERE REMOVED="NO"');
	$get_world->execute();

	//GETTING ROWS RETURNED
	$num_world=$get_world->rowCount();
	
	if($num_world>0){
		while($worlds=$get_world->fetch(PDO::FETCH_ASSOC)){
		
			$world_name=$worlds["WORLD_NAME"];
		$world_id=$worlds['ID'];
		$date_created=$worlds["DATE_CREATED"];
		$world_adress=$worlds["WORLD_ADRESS"];
		$created_by=$worlds['CREATED_BY'];
		
		
			//checking if world creator is an acyive user acoount
				$get_data5=$dbh->prepare('SELECT *FROM users WHERE USERNAME="'.$created_by.'" AND REMOVED="NO"');
			$get_data5->execute();
			$num_user=$get_data5->rowCount();
			if($num_user==1){
		
				
		
		//GETTING ALL POST BY WORLD
		$sql=$dbh->prepare('SELECT *FROM world_post WHERE WORLD_ID="'.$world_id.'" AND PUBLISHED="YES" AND REMOVED="NO" LIMIT 1');
		$sql->execute();
		//IF NUMBER OF POST IS GREATER THAN 0
		$num_post=$sql->rowCount();
		
		if($num_post>0){
			$trending="TRENDING";
			//FETCHING DATA
		while($get_post=$sql->fetch(PDO::FETCH_ASSOC)){
			
		$world_post_by=$get_post["POST_BY"];
		$world_post_title=$get_post["POST_TITLE"];
		$world_post_id=$get_post['ID'];
		$world_post_content=$get_post["POST_CONTENT"];
		$world_idp=$get_post["WORLD_ID"];
		$date_posted=$get_post["DATE_POSTED"];
			//$post_adress=$world_adress.'/'.$post_id;
			//GETTING THE POST WITH THE HIGHEST follow
			$follow=$dbh->prepare('SELECT *FROM follow_worlds WHERE WORLD_POST_ID="'.$world_post_id.'" AND WORLD_POST_BY="'.$world_post_by.'" AND FOLLOWED="YES" AND UNFOLLOWED="NO"');
			$follow->execute();
			//GETTING MUMBER OF followS RETURNED;
			$num_follow=$follow->rowCount();
			$post_title=$world_post_title;
				$post_content=$world_post_content;
				$posted_by=$world_post_by;
				$date=$date_posted;
				//getting user info
	$get_data=$dbh->prepare('SELECT FIRST_NAME,OTHER_NAME,PROFILE_PIC FROM users WHERE USERNAME="'.$world_post_by.'" AND REMOVED="NO"');
			$get_data->execute();
			
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$first_name_f=$get_info['FIRST_NAME'];
			$other_names_f=$get_info['OTHER_NAME'];
			$profile_pic=$get_info['PROFILE_PIC'];
			
				//CHECKING IF THE USER HAS A PROFILE PIC
		if(empty($profile_pic)){
			 	$profile_pic2="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/$profile_pic";
			 }
			if($num_follow>0){
	 
	 
		
			 
			 //CHECING IF POST_CONTENT IS GREATER THAN 150 CHARACTER
			  if(strlen(nl2br($post_content))>150){
$post_msg=substr(nl2br($post_content),0 ,150)."...";
 }
else{
 $post_msg=nl2br($post_content);
 }	
// echo $post_msg;
    $get_r_content='<div class="col-md3 colsm3">
            <div class="col-md-12 col-sm-12 widget-wrap">
                <!-- <div class="img-responsive">
                    <div class="post-image"></div>
                </div> -->
                <div class="widget-header block-header margin-bottom-0 clearfix">
                    <div class="pull-left">
                        <h2><a >'.$world_post_title.'</a></h2>
                    </div>
                </div>
                <div class="widget-container margin-top-0">
                    <div class="widget-content">
                        <div class="recent-comments-list">
                            <div class="recent-comments">
                                <div class="recent-comment-meta">
                                    <div class="comment-user-thumb">
                                        <a ><img src="'.$profile_pic2.'" alt="user"></a>
                                    </div>
                                    <div class="comment-user-info">
                                        <ul>
                                         
                                          
                                        </ul>
                                    </div>
                                    
                                </div>
                                <div class="comment-text">
                                    <p>'.nl2br($post_msg).'</p>
                                </div>
                            </div>
                            <a href="readmore.php?rd='.$world_adress.'&pid='.$world_post_id.'&title='.$world_post_title.'"><button class="btn btn-link btn-block btn-loadmore">Load More</button></a>
                        </div>
                    </div>
                </div>
            </div>       
        </div>';
        
      			$login_info="";
			}
			else{
				
				//GETTING POST LIMIT 3
				
				if(strlen(nl2br($post_content))>150){
$post_msg=substr(nl2br($post_content),0 ,150)."....";
 }
else{
 $post_msg=nl2br($post_content);
 }	
 
				$get_r_content='<div class="col-md-3 col-sm-3">
            <div class="col-md-12 col-sm-12 widget-wrap">
                <!-- <div class="img-responsive">
                    <div class="post-image"></div>
                </div> -->
                <div class="widget-header block-header margin-bottom-0 clearfix">
                    <div class="pull-left">
                        <h2><a >'.$world_post_title.'</a></h2>
                    </div>
                </div>
                <div class="widget-container margin-top-0">
                    <div class="widget-content">
                        <div class="recent-comments-list">
                            <div class="recent-comments">
                                <div class="recent-comment-meta">
                                    <div class="comment-user-thumb">
                                       <!-- <a ><img src="user_data/user_photo/'.$profile_pic2.'" alt="user"></a> -->
                                    </div>
                                    <div class="comment-user-info">
                                        <ul>
                                       
                                       <!--     <li class="p-time"><i class="fa fa-clock-o"></i> 2 Hours Ago</li>
                                        </ul>
                                    </div>
                                    <span class="comments-reply"><a ><i class="fa fa-comment"></i></a></span>-->
                                </div>
                                <div class="comment-text">
                                    <p>'.nl2br($post_msg).'</p>
                                </div>
                            </div>
                            <a href="readmore.php?rd='.$world_adress.'&pid='.$world_post_id.'&title='.$world_post_title.'"><button class="btn btn-link btn-block btn-loadmore">Load More</button></a>
                        </div>
                    </div>
                </div>
            </div>       
        </div>';
			}
			$login_info="";
			 echo $get_r_content;
		}
		}
		else{
			
		}
	}
		
			}
	}
	else{
	}
	
  } 		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>