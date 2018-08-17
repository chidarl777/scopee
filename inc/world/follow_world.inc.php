<?php
//require("../aut_session.inc.php");

if(!empty($_GET['follow-world'])){
	
	try{
		
			
	
				   $date=date('Y-m-d h:i:s a');
		require("inc/db/config.php");
		//CHECKING IF THE USER HAS ALREADY FOLLOW THE WORLD
		$sql=$dbh->prepare('SELECT *FROM follow_worlds WHERE FOLLOWER="'.$user_login.'" AND FOLLOWED="YES" AND WORLD_ADRESS="'.$w_adress.'"  AND WORLD_ID="'.$world_id.'" AND UNFOLLOWED="NO"');
		$sql->execute();
		
		$num_row=$sql->rowCount();
		if($num_row>0){
			//echo "you have already followed this world";
		}
		else{
			$created_by=$world_creator;
			$follow="YES";
			$insert_follower="INSERT INTO follow_worlds(FOLLOWER,WORLD_ADRESS,WORLD_ID,CREATED_BY,WORLD_POST_ID,WORLD_POST_BY,FOLLOWED,DATE_FOLLOWED) 
			VALUES(:follower,:world_adress,:world_id,:created_by,:world_post_id,:world_post_by,:followed,:date_followed)";
			$stmt=$dbh->prepare($insert_follower);
			
			
$stmt->bindParam(':follower',$user_login);
$stmt->bindParam(':world_adress',$w_adress);
$stmt->bindParam(':world_id',$world_id);
$stmt->bindParam(':created_by',$created_by);
$stmt->bindParam(':world_post_id',$world_post_id);
$stmt->bindParam(':world_post_by',$post_by);
$stmt->bindParam(':followed',$follow);
$stmt->bindParam(':date_followed',$date);
$stmt->execute();
     // echo("you are now a follower");
	echo'<meta http-equiv="refresh" content="0, url=readmore.php?rd='.$w_adress.'&pid='.$world_post_id.'&title='.$world_post_title.'" />';		
		}
	
		}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
?>