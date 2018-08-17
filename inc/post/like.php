<?php
//requi


if(isset($_GET["lp"])){
		
	try{
		
		$l_post_id=$_GET["lp"];
		require_once("inc/check.php");
		
	
		   $date=date('Y-m-d h:i:s a');
		require("inc/db/config.php");
		//CHECKING IF THE USER HAS ALREADY like THE WORLD
		$sql=$dbh->prepare('SELECT *FROM like_post WHERE LIKED_FROM="'.$user_login.'" AND LIKED="YES"AND POST_ID="'.$l_post_id.'" AND UNLIKED="NO"');
		$sql->execute();
		
		$num_row=$sql->rowCount();
		if($num_row>0){
			//echo "you have already liked this world";
		}
		else{
			$like="YES";
			$insert_like_from="INSERT INTO like_post(LIKED_FROM,POSTED_FROM,POST_ID,LIKED,DATE_LIKED) 
			VALUES(:like_from,:posted_from,:post_id,:liked,:date_liked)";
			$stmt=$dbh->prepare($insert_like_from);
			
			
$stmt->bindParam(':like_from',$user_login);
$stmt->bindParam(':post_id',$post_id);
$stmt->bindParam(':posted_from',$posted_from);

$stmt->bindParam(':liked',$like);
$stmt->bindParam(':date_liked',$date);
$stmt->execute();
   
   echo'<meta http-equiv="refresh" content="0, url=home.php" />';
		}
	}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
?>