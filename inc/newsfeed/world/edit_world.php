<?php

require("inc/check.php");
//IF A SPECIFIC BUTTON IS CLICKED FOR A SPECIFIC FIRLD IN THE EDIT WORLD PANEL OR EDIT ALL WAS CLICKED
$edit=$_POST['edit_all']=$_POST['edit_world_name']=$_POST['edit_world_description']=$_POST['edit_select_w_catergory']=$_POST['edit_s_w_catergory']=$_POST['edit_agedit_criteria']=$_POST['edit_world__worldview']=$_POST['edit_world_post']=$_POST['edit_world_comment']=$_POST['edit_world_gender'];
if(isset($edit_world)){
	//USING SWITCH TO DETECT WITH EDIT BUTTOM THE USER HAS CLICKED AND ALSO GETTING THAT BUTTON OPTION TO BE USED IN PROCESSING THE SELECT STATEMENT
	$get_world=$edit_world;
	switch ($get_world){
	case "$_POST['edit_all']":
		$edit="WORLD_NAME ,WORLD_DESCRIPTION, WORLD_CATEGORY , SUB_CATEGORY ,WORLD_GENDER,WORLD_POST,WORLD_COMMENT, AGE_CRITERIA , WORLD_VIEW";
		break;
	case "$_POST['edit_world_name']":
		$edit="WORLD_NAME";
		break;	
	case "$_POST['edit_world_description']":
		$edit="WORLD_DESCRIPTION";
		break;	
	case "$_POST['edit_select_w_catergory']":
		$edit="WORLD_CATEGORY";
		break;
	case "$_POST['edit_s_w_catergory']":
		$edit="SUB_CATEGORY";
		break;	
	case "$_POST['edit_agedit_criteria']":
		$edit="AGedit_CRITERIA";
		break;	
	case "$_POST['edit_world_view']":
		$edit="WORLD_VIEW";
		break;	
	case "$_POST['edit_world_post']":
		$edit="WORLD_POST";
		break;	
	case "$_POST['edit_world_comment']":
		$edit="WORLD_COMMENT";
		break;
	case "$_POST['edit_world_gender']":
		$edit="WORLD_GENDER";
		break;	
}

$SQL=$dbh->prepare("SELECT $edit FROM worlds_tbl WHERE CREATED_BY=$User_login AND WORLD_ID=$world_id");
$SQL->execute();
//using swith to get the field the user wants to edit
$get_field=$edit;
	switch ($get_field){
	case "WORLD_NAME,WORLD_DESCRIPTION, WORLD_CATEGORY , SUB_CATEGORY ,WORLD_GENDER,WORLD_POST,WORLD_COMMENT, AGE_CRITERIA , WORLD_VIEW":
		$rows=$SQL->fetch(PDO::FETCH_ASSOC);
		$world_name=$row["WORLD_NAME"];
		$world_description=$row["WORLD_DESCRIPTION"];
			$world_category=$row["WORLD_CATEGORY"];
				$sub_category=$row["SUB_CATEGORY"];
					$world_gender=$row["WORLD_GENDER"];
						$world_post=$row["WORLD_POST"];	
						$world_comment=$row["WORLD_COMMENT"];	
						$age_criteria=$row["AGE_CRITERIA"];
						$world_view=$row["WORLD_VIEW"];
		break;
	case "WORLD_NAME":
		$world_name=$row["WORLD_NAME"];
		break;	
	case "WORLD_DESCRIPTION":
		$world_description=$row["WORLD_DESCRIPTION"];
		break;	
	case "WORLD_CATEGORY":
		$world_category=$row["WORLD_CATEGORY"];
		break;
	case "SUB_CATEGORY":
		$sub_category=$row["SUB_CATEGORY"];
		break;	
	case "AGE_CRITERIA":
		$age_criteria=$row["AGE_CRITERIA"];	
						
		break;	
	case "WORLD_VIEW":
		$world_view=$row["WORLD_VIEW"];
		break;	
	case "WORLD_POST":
		$world_post=$row["WORLD_POST"];
		break;	
	case "WORLD_COMMENT":
		$world_comment=$row["WORLD_COMMENT"];
		break;
	case "WORLD_GENDER":
		$world_gender=$row["WORLD_GENDER"];
		break;	
}

}
//GETTING AND PROCESSING THE USER INPUT
	$public=$friends=$only_me=="unSelected";
	$General=$male=$female=="unSelected";
	$comment_only_me=$comment_public=$comment_friends=$comment_follower=="unSelected";
	$post_only_me=$post_public=$post_friends=$post_follower=="unSelected";
	$world_name=$world_description=$w_catergory=$s_w_catergory=$world_gender=$world_post=$world_comment=$age_criteria=$world_view="";
	$error=$world_nameerr=$world_descriptionerr=$w_catergoryerr=$s_w_catergoryerr=$world_gendererr=$world_posterr=$world_commenterr=$age_criteriaerr=$world_viewerr="";
//coding for the edit world page
if(isset($_POST['create_world'])){
	if(!empty($_POST['world_name'])){
		$world_name=test_input($_POST["world_name"]);
	}
	else{
		$world_nameerr="Enter world name";
	}
	if(!empty($_POST['world_description'])){
		$world_description=test_input($_POST["world_description"]);
	}
	else{
		$world_descriptionerr="Enter world name";
	}
	if($_POST['select_w_catergory']=="Select"){
		$w_catergoryerr="Select a category";
	}
	else{
		$w_catergory=test_input($_POST['select_w_catergory']);
	}
	if($_POST['s_w_catergory']=="Select"){
		$s_w_catergoryerr="Select a sub category";
	}
	else{
		$s_w_catergory=test_input($_POST['s_w_catergory']);
	}
	if($_POST['age_criteria']=="Select"){
		$age_criteriaerr="Select the age criteria of people to view your world";
	}
	else{
		$age_criteria=test_input($_POST['age_criteria']);
	}
	if($_POST['world_view']=="Public"){
		$world_view=$_POST['world_view'];
		$public="Selected";
	}
	else if($_POST['world_view']=="Friends"){
		$world_view=$_POST['world_view'];
		$friends="Selected";
	}
	else if($_POST['world_view']=="Only_me"){
		$world_view=$_POST['world_view'];
		$only_me="Selected";
	}
	else{
		$world_viewerr="Select an option";
	}
	if($_POST['world_post']=="Public"){
		$world_post=$_POST['world_post'];
		$post_public="Selected";
	}
	else if($_POST['world_post']=="Friends"){
		$world_post=$_POST['world_post'];
		$post_friends="Selected";
	}
	else if($_POST['world_post']=="Only_me"){
		$world_post=$_POST['world_post'];
		$post_only_me="Selected";
	}
	else if($_POST['world_post']=="followers"){
		$world_post=$_POST['world_post'];
		$post_followers="Selected";
	}
	else{
		$world_posterr="Select an option";
	}
	
		if($_POST['world_comment']=="Public"){
		$world_commment=$_POST['world_comment'];
		$comment_public="Selected";
	}
	else if($_POST['world_comment']=="Friends"){
		$world_comment=$_POST['world_comment'];
		$comment_friends="Selected";
	}
	else if($_POST['world_comment']=="Only_me"){
		$world_comment=$_POST['world_comment'];
		$comment_only_me="Selected";
	}
	else if($_POST['world_comment']=="followers"){
		$world_comment=$_POST['world_comment'];
		$comment_followers="Selected";
	}
	else{
		$world_commenterr="Select an option";
	}
		if($_POST['world_gender']=="General"){
		$world_gender=$_POST['world_gender'];
		$General="Selected";
	}
	else if($_POST['world_gender']=="Male"){
		$world_gender=$_POST['world_gender'];
		$Male="Selected";
	}
	else if($_POST['world_gender']=="Female"){
		$world_gender=$_POST['world_gender'];
		$Female="Selected";
	
	else{
		$world_gendererr="Select an option";
	}
	
	
	if($error==""){
	$time=date('h:i:s a');
$date=date('Y-m-d');
try{
	//UPDATING DATA RECEIVED INTO THE DATABASE
	$sql=$dbh->prepare("UPDATE SET(CREATED_BY , WORLD_NAME ,WORLD_DESCRIPTION, WORLD_CATEGORY , SUB_CATEGORY ,WORLD_GENDER,WORLD_POST,WORLD_COMMENT, AGE_CRITERIO , WORLD_VIEW , TIME_UPDATE , DATE_UPDATE ) VALUES (:created_by,:world_name,:world_description,:world_category,:sub_category,:world_gender,:world_post,:world_comment,:age_criteria,:world_view,:time_updated,date_updated) WHERE USERNAME=$User_login AND WORLD_ID=$world_id");
	
$STM=$dbh->prepare($sql);
    
	$STM->bindParam(":created_by",strtolower($User_login));
	$STM->bindParam(":world_name",$world_name);
	$STM->bindParam(":world_description",$world_description);
	$STM->bindParam(":world_category",$w_catergory);
	$STM->bindParam(":sub_category",$s_w_catergory);
	$STM->bindParam(":age_criteria",$age_criteria);
	$STM->bindParam(":world_view",$world_view);
	$STM->bindParam(":time_updated",$time);
	$STM->bindParam(":date_updated",$date);
	$STM->bindParam(":world_gender",$world_gender);
	$STM->bindParam(":world_post",$world_post);
	$STM->bindParam(":world_comment",$world_comment);
	
	
	
	
	$STM->execute();
	
	header("location:create_world_post.php");

}		
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
}
?>