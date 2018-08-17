<?php
//CODE FOR SELECTING USERS WORLDS
//require("inc/check.php");
$more_post_titleo="";
$get_world_posto="";
$world_post_titleo="";
$world_post_contento="";
$date_postedo="";
try{
	$w_post_ido=$post_id;
	require("inc/db/config.php");
	$get_world_posto=$dbh->prepare('SELECT *FROM world_post WHERE WORLD_ID="'.$world_id.'" AND ID!="'.$w_post_id.'" AND REMOVED="NO" AND PUBLISHED="YES"');
	$get_world_posto->execute();
	$num_row=$get_world_posto->rowCount();
	

	if($num_row>0){
		while($result2=$get_world_posto->fetch(PDO::FETCH_ASSOC)){
			
		
	//	$post_byo=$result["POST_BY"];
		$world_post_titleo=$result2["POST_TITLE"];
		$world_post_ido=$result2['ID'];
		
		$world_idpo=$result2["WORLD_ID"];
		$date_postedo=$result2["DATE_POSTED"];
		
		$get_world_a=$dbh->prepare('SELECT *FROM worlds_tbl WHERE ID="'.$world_idpo.'" AND REMOVED="NO"');
	$get_world_a->execute();
	$num_row_a=$get_world_a->rowCount();
	if($num_row_a==1){
		$result1=$get_world_a->fetch(PDO::FETCH_ASSOC);
		$world_adresso=$result1["WORLD_ADRESS"];
		$more_post_title=$world_post_titleo;
 	$world_post_date=$date_postedo;
 	 
 	 $get_other_post="
		 <li><a href='readmore.php?rd=$world_adresso&pid=$world_idpo&title=$more_post_title'>$more_post_title</a></li>";
 	 echo $get_other_post;
	}
	
		//GETTING OTHER POST BY USER EXCLUDING THE CURRENT POST

	}

	}
	else{
		echo "No more post at the moment";
		//do nothing......
		
	}
} 		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>