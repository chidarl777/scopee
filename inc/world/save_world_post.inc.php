<?php
require("../aut_session.inc.php");
require("select_world.inc.php");
require("insert_world.inc.php");

//CODE FOR INSERTING WORLDS POST
require_once("inc/check.php");
$post_title=$post_content="";
$error=$post_titleerr=$post_contenterr="";
if(isset($_POST['save-post'])){
	if(!empty($_POST['post-title'])){
		$post_title=test_input($_POST["post-title"]);
	}
	else{
		$post_titleerr="Add a title to your post";
	}
	if(!empty($_POST["world-post"])){
		$post_content=test_input($_POST["world-post"]);
	}
	else{
		$post_contenterr="Content area cannot be empty";
	}
	
//$time=date('h:i:s a');
$date=date('Y-m-d h:i:s a');
try{
	if($error==""){
		//CHECKING IF THE USER LOGGED CLICKED ON THE PUBLISH BUTTON TWICE
		$check_post=$dbh->prepare('SELECT *FROM world_post WHERE POST_BY="'.$user_login.'" AND WORLD_ID="'.$world_id.'" AND POST_TITLE="'.$post_title.'" AND POST_CONTENT="'.$post_content.'"');
		$check_post->execute();
		$num_row=$check_post->rowCount();
		//getting result
		if($num_row>0){
			//do nothing 
		}
		else{
		//INSERT DATA
		$save="YES";
		$publish="YES";
		$insert_world_post="INSERT INTO world_post (POST_BY,WORLD_ID,POST_TITLE,POST_CONTENT,DATE_POSTED,SAVED,DATE_SAVED) VALUES(:post_by,:world_id,:post_title,:post_content,:date_posted,:saved,:date_saved)";
		$STM=$dbh->prepare($insert_world_post);
	$STM->bindParam(":post_by",$user_login);
	$STM->bindParam(":world_id",$world_id);
	$STM->bindParam(":post_title",$post_title);
	$STM->bindParam(":post_content",$post_content);
	$STM->bindParam(":date_posted",$date);
	$STM->bindParam(":saved",$save);
	//$STM->bindParam(":published",$publish);
	$STM->bindParam(":date_saved",$date);
	$STM->execute();
	}
	
		
		}
			}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
?>