<?php
require("../aut_session.inc.php");

//CODE FOR SELECTING USERS WORLDS
//require("inc/check.php");
$get_worlds="";
try{
	require("../db/config.php");

	$get_users_world=$dbh->prepare('SELECT *FROM worlds_tbl');
	$get_users_world->execute();
	$num_row=$get_users_world->rowCount();
	if($num_row>0){
		$result=$get_users_world->fetch(PDO::FETCH_ASSOC);
		$world_name=$result["WORLD_NAME"];
		$world_id=$result['ID'];
		$date_created=$result["DATE_CREATED"];
		$world_adress=$result["WORLD_ADRESS"];
		$created_by=$result['CREATED_BY'];
		
		if($created_by==$user_login){
		
		$get_worlds="<div class='worlds'>
	<a href='worlds.php'>$world_name
	</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='worlds_profile.php'>world_profile</a>
	<div>Created on: $date_created </div>
</div>";
		}
		else{
			$get_world_friends="<div class='worlds'>
	<a href='worlds.php'>$world_name
	</a>
	<div>Created on: $date_created </div>";
		}
	}
	else{
		//do nothing......
		$get_worlds="you have no world currently";
	}
} 		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>