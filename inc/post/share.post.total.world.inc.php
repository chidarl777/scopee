<?php
//CODE FOR SELECTING USERS WORLDS
//require("inc/check.php");
$get_worlds="";
try{
	require("inc/db/config.php");
	$get_users_world=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$user_login.'"');
	$get_users_world->execute();
	$num_row=$get_users_world->rowCount();
	if($num_row>0){
	while($result=$get_users_world->fetch(PDO::FETCH_ASSOC)){
		
	
		$world_name=$result["WORLD_NAME"];

	//	$world_id=$result['ID'];
	//	$date_created=$result["DATE_CREATED"];
		$world_adress=$result["WORLD_ADRESS"];
		$world_id=$result["ID"];
		$created_by=$result['CREATED_BY'];
		
		if($created_by==$user_login){
		
		$share_worlds="<option value='$world_adress'>$world_name</option>";
		//echo $share_worlds;
		}
		else{
		//do nothing
		}
	}
	}
	else{
		//do nothing......
		$share_worlds="";
	}		
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>