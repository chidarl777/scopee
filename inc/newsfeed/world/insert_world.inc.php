<?php
require_once("inc/check.php");

	//$world_adress1="";
	$world_name=$world_adress=$world_adress1=$world_description=$world_tag=$world_catergory=$view_world=$post_world=$comment_world=$gender_view=$age_criteria="";
	$error=$world_nameerr=$world_adresserr=$world_descriptionerr=$world_tagerr=$world_catergoryerr=$comment_worlderr=$post_viewerr=$gender_viewerr=$view_worlderr=$age_criteriaerr="";
//coding for the world create world page
if(isset($_POST['create-world'])){
	if(!empty($_POST['world-name'])){
		$world_name=test_input($_POST["world-name"]);
	}
	else{
		$world_nameerr="Enter world name";
	}
	if(!empty($_POST['world-adress'])){
		$world_adress1=test_input($_POST["world-adress"]);
	}
	else{
		$world_adresserr="Enter world adress";
	}
	if(!empty($_POST['world-description'])){
		$world_description=test_input($_POST["world-description"]);
	}
	else{
		$world_descriptionerr="Describe your world";
	}
	if(!empty($_POST['world-tag'])){
		$world_tag=test_input($_POST["world-tag"]);
	}
	else{
		$world_tagerr="Add world tags <br> example: come,go,yes etc";
	}
	if(empty($_POST['world-catergory'])){
		$world_catergoryerr="Choose a world catergory";
	}
	else{
		$world_catergory=test_input($_POST["world-catergory"]);;
	}
	if($_POST["view-world"]!=""){
		$view_world=test_input($_POST["view-world"]);
	}
	if($_POST["post-world"]!=""){
		$post_world=test_input($_POST["post-world"]);
	}
	if($_POST["comment-world"]!=""){
		$comment_world=test_input($_POST["comment-world"]);
	}
	if($_POST["gender-view"]!=""){
		$gender_view=test_input($_POST["gender-view"]);
	}
	if(empty($_POST['age-criteria'])){
		$age_criteriaerr="Choose an age criteria to view world";
	}
	else{
		$age_criteria=test_input($_POST["age-criteria"]);;
	}
	
	if($error==""){
	//replacing white space with _
	$world_adress=str_replace(" ","_","$world_adress1");
	
	//$time=date('h:i:s a');
$date=date('Y-m-d h:i:s a');
try{
	require("inc/db/config.php");
	//CHECKING IF WORLD adress ALREADY EXIST
	$check_adress=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$user_login.'" AND WORLD_ADRESS="'.$world_adress.'" AND REMOVED="NO"');
	$check_adress->execute();
	$num_adress=$check_adress->rowCount();
	
	if($num_adress==0){

	//INSERTING DATA RECEIVED INTO THE DATABASE
	$STM=$dbh->prepare("INSERT INTO worlds_tbl(CREATED_BY,WORLD_NAME,WORLD_ADRESS,WORLD_DESCRIPTION,WORLD_TAG,AGE_CRITERIA,WORLD_CATEGORY,WORLD_VIEW,WORLD_POST,WORLD_COMMENT,WORLD_GENDER,DATE_CREATED) VALUES (:created_by,:world_name,:world_adress,:world_description,:world_tag,:age_criteria,:world_catergory,:world_view,:world_post,:world_comment,:world_gender,:date_created)");
	
//$STM=$sql);

	$STM->bindParam(":created_by",$user_login);
	$STM->bindParam(":world_name",$world_name);
	$STM->bindParam(":world_adress",$world_adress);
	$STM->bindParam(":world_description",$world_description);
	$STM->bindParam(":world_tag",$world_tag);
	$STM->bindParam(":world_catergory",$world_catergory);
	$STM->bindParam(":world_view",$view_world);
	$STM->bindParam(":world_post",$post_world);
	$STM->bindParam(":world_comment",$comment_world);
	$STM->bindParam(":world_gender",$gender_view);
	$STM->bindParam(":age_criteria",$age_criteria);
	$STM->bindParam(":date_created",$date);
	
	$STM->execute();

	echo'<meta http-equiv="refresh" content="0, url=world.php?wor='.$world_adress.'" />';
	}
	else{
		$world_adresserr="World adress already exist";
	}

}		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
}
?>