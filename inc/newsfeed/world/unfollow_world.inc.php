<?php
//require("/aut_session.inc.php");

if(isset($_GET['unfollow-world'])){
	
	try{
		   $date=date('Y-m-d h:i:s a');
		require("inc/db/config.php");
		//CHECKING IF THE USER HAS ALREADY FOLLOW THE WORLD
		$sql=$dbh->prepare('SELECT *FROM follow_worlds WHERE FOLLOWER="'.$user_login.'" AND FOLLOWED="YES" AND WORLD_ADRESS="'.$w_adress.'"  AND WORLD_ID="'.$world_id.'" AND UNFOLLOWED="YES"');
		$sql->execute();
		
		$num_row=$sql->rowCount();
		//UPDATING
			$follow="YES";
			$update_follower='UPDATE follow_worlds SET UNFOLLOWED="YES",DATE_UNFOLLOWED="'.$date.'" WHERE FOLLOWER="'.$user_login.'" AND WORLD_ADRESS="'.$w_adress.'"  AND WORLD_ID="'.$world_id.'"';
			$stmt=$dbh->prepare($update_follower);
			$stmt->execute();
			
			echo'<meta http-equiv="refresh" content="0, url=readmore.php?rd='.$w_adress.'&pid='.$world_post_id.'&title='.$world_post_title.'" />';
			
	
	}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
?>