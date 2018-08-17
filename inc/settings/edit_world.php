<?php
require_once("inc/check.php");
	//$world_adress1="";
	$world_edit=$world_name=$view_world=$post_world=$comment_world=$gender_view=$age_criteria="";
	$error=$world_nameerr=$world_editerr=$view_worlderr=$age_criteriaerr=$post_worlderr=$comment_worlderr=$gender_viewerr=$view_worlderr="";
//coding for the world create world page
if(isset($_POST['update-world'])){
	if(!empty($_POST['world-edit'])){
		$world_edit=test_input($_POST["world-edit"]);
	}
	else{
		$world_editerr="Mandatory!!! select an option";
	}
	if(!empty($_POST['world-name'])){
		$world_name=test_input($_POST["world-name"]);
	}
	else{
		$world_nameerr="Enter world name";
	}

	if($_POST["view-world"]!=""){
		$view_world=test_input($_POST["view-world"]);
	}
	else{
		$view_worlderr="select an option";
	}
	if($_POST["post-world"]!=""){
		$post_world=test_input($_POST["post-world"]);
	}
	else{
		$post_worlderr="select an option";
	}
	if($_POST["comment-world"]!=""){
		$comment_world=test_input($_POST["comment-world"]);
	}
	else{
		$comment_worlderr="Select an option";
	}
	if($_POST["gender-view"]!=""){
		$gender_view=test_input($_POST["gender-view"]);
	}
	else{
		$gender_viewerr="select an option";
	}
	if(empty($_POST['age-criteria'])){
		$age_criteriaerr="Choose an age criteria to view world";
	}
	else{
		$age_criteria=test_input($_POST["age-criteria"]);;
	}
	
	if($error==""){
	//replacing white space with _

	
	//$time=date('h:i:s a');
$date=date('Y-m-d h:i:s a');
try{
	require("inc/db/config.php");
	//CHECKING IF WORLD NAME EXIST
	$check_pass=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$user_login.'" AND REMOVED="NO" AND WORLD_ADRESS="'.$world_edit.'"');
	$check_pass->execute();
	$num_pass=$check_pass->rowCount();
	if($num_pass==1){
		
	//INSERTING DATA RECEIVED INTO THE DATABASE
	$STM=$dbh->prepare('UPDATE worlds_tbl SET WORLD_NAME='.$world_name.',AGE_CRITERIA='.$age_criteria.',WORLD_VIEW='.$view_world.',WORLD_POST='.$post_world.',WORLD_COMMENT='.$comment_world.',WORLD_GENDER='.$gender_view.',DATE_UPDATED='.$date.' WHERE CREATED_BY='.$user_login.' AND WORLD_ADRESS='.$world_edit.'  AND REMOVED="NO"');

	$STM->execute();
	$js_alert1='<script type="text/javascript">alert("Saved successful!");</script>';
	echo $js_alert1;
	}
else{
  $js_alert='<script type="text/javascript">alert("SORRY AN ERROR OCURRED!!!");</script>';
	echo $js_alert;
}
	
}		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
}
?>