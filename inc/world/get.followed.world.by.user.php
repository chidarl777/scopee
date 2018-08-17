<?php
//CODE FOR GETTING WORLD WITH MOST follow WORLDS
//require("inc/check.php");
$get_world_post="";
$login_info=$get_r_content=$error="";
$trending="";

try{
	
		
	
	require "inc/db/config.php";
$follow=$dbh->prepare('SELECT *FROM follow_worlds WHERE FOLLOWER="'.$user_login.'" AND FOLLOWED="YES" AND UNFOLLOWED="NO"');
			$follow->execute();
			//GETTING MUMBER OF followS RETURNED;
			$num_follow=$follow->rowCount();
			if($num_follow<1){
				echo 'You have not followed any world';
			}
			else{
			while($fetch_follow=$follow->fetch(PDO::FETCH_ASSOC)){
				$world_creator=$fetch_follow['CREATED_BY'];
				$follow_world_id=$fetch_follow['WORLD_ID'];
				$follow_world_address=$fetch_follow['WORLD_ADRESS'];
				$follow_world_post=$fetch_follow['WORLD_POST_BY'];
				
		$SQL=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$world_creator.'" AND ID="'.$follow_world_id.'" AND REMOVED="NO"');
$SQL->execute();
$num_world=$SQL->rowCount();
if($num_world>0){
	$fetch_world=$SQL->fetch(PDO::FETCH_ASSOC);
		
	
	$world_name_u=$fetch_world['WORLD_NAME'];
		$world_adress_u=$fetch_world['WORLD_ADRESS'];
		$world_pic_us=$fetch_world['WORLD_BACKGROUND_PIC'];
			 	$world_profile_pic1=$fetch_world['WORLD_PROFILE_PIC'];
	 	
	 	//CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($world_profile_pic1)){
			 	$world_pic_u="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$world_pic_u="user_data/world_photos/$world_profile_pic1";
			 }
				//getting user info
	$get_data=$dbh->prepare('SELECT FIRST_NAME,OTHER_NAME,PROFILE_PIC FROM users WHERE USERNAME="'.$world_creator.'" AND REMOVED="NO"');
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
			 
			 $followed_world='<p><li>
                              <a href="world/'.$world_adress_u.'">
                                <img style="width:70px; heigth:80px;" src="'.$world_pic_u.'" alt="no pic" />
                                <p style=" margin-left:15px;float:right; margin-right:10px;">'.$world_name_u.'</p>
                              </a>
                            </li></p>';
                            echo $followed_world;
			 }
			 }
		}
  } 		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>