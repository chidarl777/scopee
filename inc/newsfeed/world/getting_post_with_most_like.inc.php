<?php
//CODE FOR GETTING WORLD WITH MOST LIKE WORLDS
//require("inc/check.php");
$get_world_post="";
try{
	//GETTING WORLD THAT HAS NOT BEEN REMOVED
	$get_world=$dbh->prepare("SELECT *FROM worlds_tbl WHERE REMOVED='NO'");
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
		
		//GETTING ALL POST BY WORLD
		$sql=$dbh->prepare('SELECT *FROM world_post WHERE WORLD_ID="'.$world_id.'" AND PUBLISHED="YES" AND REMOVED="NO"');
		$sql->execute();
		//IF NUMBER OF POST IS GREATER THAN 0
		$num_post=$sql->rowCount();
		if($num_post>0){
			//FETCHING DATA
			$get_post=$sql->fetch(PDO::FETCH_ASSOC);
		$post_by=$get_post["POST_BY"];
		$world_post_title=$get_post["POST_TITLE"];
		$world_post_id=$get_post['ID'];
		$world_post_content=$get_post["POST_CONTENT"];
		$world_idp=$get_post["WORLD_ID"];
		$date_posted=$get_post["DATE_POSTED"];
			//GETTING THE POST WITH THE HIGHEST LIKE
			$like=$dbh->prepare('SELECT *FROM like_world_post WHEERE POST_BY="'.$post_by.'" AND POST_ID="'.$world_post_id.'" AND LIKED="YES" AND UNLIKE="NO"');
			$like->execute();
			//GETTING MUMBER OF LIKES RETURNED;
			$num_like=$like->rowCount();
			if($num_like>0){
				$post_title=$world_post_title;
				$post_content=$world_post_content;
				$posted_by=$post_by;
				$date=$date_posted;
				
				//GETTING POSTED BY INFO;
				$get_data=$dbh->prepare('SELECT FIRST_NAME,OTHER_NAME,PROFILE_PIC FROM users WHERE USERNAME="'.$post_by.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$first_name=$get_info['FIRST_NAME'];
			$other_names=$get_info['OTHER_NAME'];
			$profile_pic=$get_info['PROFILE_PIC'];
			//CHECKING IF THE USER HAS A PROFILE PIC
		if(empty($profile_pic)){
			 	$profile_pic2="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/".$profile_pic;
			 }
			 
			 //CHECING IF POST_CONTENT IS GREATER THAN 150 CHARACTER
			  if(strlen($post_content)>150){
$post_msg=substr($post_content,0 ,150)."...."."<a href='#'>more</a>";
 }
else{
 $post_msg=$post_content;
 }
			}
			else{
				$num_like="NO one has liked your post";
			}
		}
		else{
			$num_post="no post currently";
		}
		}
	}
	else{
		$num_world="NO ACTIVE WORLD CURRENTLY";
	}

} 		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>