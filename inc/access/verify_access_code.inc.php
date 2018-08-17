<?php
$access_codeerr="";
$access_code="";
if(isset($_POST['verify-access-code'])){
	require('inc/check.php');
if(!empty($_POST['world-view-access-code'])){
	$access_code=test_input($_POST['world-view-access-code']);
}
else{
	$access_codeerr='Field Empty';
}
try{
	if(empty($access_codeerr)){
		
		$category=$category_w;
		$category_id=$world_id_w;
	
	$sql_access_verify=$dbh->prepare('SELECT *FROM access WHERE username="'.$world_creator.'" and access_code="'.$access_code.'" and category="'.$category.'" and category_id="'.$category_id.'" and removed="NO"');
	$sql_access_verify->execute();
	$num_sql_access_verify=$sql_access_verify->rowCount();
	
	if($num_sql_access_verify > 0){
	$fetch_sql_access_verify=$sql_access_verify->fetch('PDO::FETCH_ASSOC');
		
		//permit user to view world files according to there access
		//send the user to the page according with his access
		header("location:world.php?wor=$w_adress&acs=$access_code");
		 
	}
	else{
		$access_codeerr="Wrong access code";
	}
	
}

}

catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
	}
?>
