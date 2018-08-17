<?php
//requi


if(isset($_GET["lp"])){
		
	try{
		
		$l_post_id=$_GET["lp"];
		require_once("inc/check.php");
		
	
		   $date=date('Y-m-d h:i:s a');
		require("inc/db/config.php");
		//CHECKING IF THE USER HAS ALREADY like THE WORLD
		$sql=$dbh->prepare('SELECT *FROM like_post WHERE POSTED_FROM="'.$user_login.'" AND LIKED="YES" AND UNLIKED="NO"');
		$sql->execute();
		
		$num_row=$sql->rowCount();
		if($num_row>0){
			while($like_result=$sql->fetch(PDO::FETCH_ASSOC)){
				$like_from=$like_result['LIKED_FROM'];
				$post_id_like=$like_result['POST_ID'];
				
				//comments
				$sql_com='SELECT *FROM comments WHERE COMMENTED_TO="'.$user_login.'" AND REMOVED="NO"';
$result=$dbh->prepare($sql_com);
$result->execute();

//counting the nunber of rows returned
$get_row=$result->rowCount();

if($get_row>0){
		
	while($get_col=$result->fetch(PDO::FETCH_ASSOC)){
	
$comment_id=$get_col['ID'];
$comment_by=$get_col["COMMENTED_FROM"];
$comment1=$get_col['COMMENT'];
$date=$get_col['DATE_COMMENTED'];
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
}
?>