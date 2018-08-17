<?php

if(isset($_GET["dlp"])){
	
	try{
		$dl_post_id=$_GET["dlp"];
		   $date=date('Y-m-d h:i:s a');
		require("inc/db/config.php");
		//CHECKING IF THE USER HAS ALREADY unliked THE WORLD
		$sql=$dbh->prepare('SELECT *FROM like_post WHERE LIKED_FROM="'.$user_login.'" AND LIKED="NO"AND POST_ID="'.$dl_post_id.'" AND UNLIKED="YES"');
		$sql->execute();
		
		$num_row=$sql->rowCount();
		if($num_row>0){
			
		}
		else{
			$unliked="YES";
			$update_likes='UPDATE like_post SET UNLIKED="YES",DATE_UNLIKED="'.$date.'" WHERE LIKED_FROM="'.$user_login.'"  AND POST_ID="'.$post_id.'"';
			$stmt=$dbh->prepare($update_likes);
			$stmt->execute();
			echo'<meta http-equiv="refresh" content="0, url=home.php" />';
		}
	}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
?>