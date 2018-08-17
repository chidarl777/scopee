<?php
//echo 'sssssssssssss';
require("../../aut_session.php");
//CODE FOR INSERTING WORLDS POST
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
 // $data = htmlspecialchars($data);
  return $data;
}

$post_title=$post_content=$post_tagerr="";
$error=$post_titleerr=$post_tagerr=$post_contenterr="";
//if(isset($_POST['publish-post'])){
		
	if(!empty($_POST['post-title'])){
		$post_title=test_input($_POST["post-title"]);
	}
	else{
		$post_titleerr="Add a title to your post";
	}
	if(!empty($_POST['post-summary'])){
		$post_summary=test_input($_POST["post-summary"]);
	}
	else{
		$post_summaryerr="Add a summary to your post";
	}
	if(!empty($_POST['post-tag'])){
		$post_tag=test_input($_POST["post-tag"]);
	}
	else{
		$post_tagerr="Add a tag to your post(note: tags enhances post visibility)";
	}
	if(!empty($_POST["world-post-area"])){
		$post_content2=test_input($_POST['world-post-area']);
		$post_content1=str_replace('="',"u##!",$post_content2);
		$post_content3=str_replace('<',"u##$",$post_content1);
		$post_content4=str_replace('>',"u##&",$post_content3);
		$post_content=str_replace(';"',"u##%!",$post_content4);
		//echo $post_content;
		//die();
	}
	else{
		$post_contenterr="Content area cannot be empty";
	}

//$time=date('h:i:s a');
$date=date('Y-m-d h:i:s a');
try{
	require("../db/config.php");
	if($error==""){
		$world_id_w=$_SESSION['world_id'];
		
		//CHECKING IF THE USER LOGGED CLICKED ON THE PUBLISH BUTTON TWICE
		$check_post=$dbh->prepare('SELECT *FROM world_post WHERE POST_BY="'.$user_login.'" AND WORLD_ID="'.$world_id_w.'" AND POST_TITLE="'.$post_title.'" AND POST_CONTENT="'.$post_content.'"');
		$check_post->execute();
		$num_row=$check_post->rowCount();
		//getting result
		if($num_row==0 || $num_row>0){
			//getting world name
			$get_world=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$user_login.'" AND ID="'.$world_id_w.'"');
			
		$get_world->execute();
		$fetch_world=$get_world->fetch(PDO::FETCH_ASSOC);
		$world_name=$fetch_world['WORLD_NAME'];
		$world_adress=$fetch_world['WORLD_ADRESS'];
		$created_by=$fetch_world['CREATED_BY'];
		//INSERT DATA
		//$save="NO";
		$post_tracker1=mt_rand(1000000000,10000000000000000);
		$encode1_username=str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		$encode_username=substr($encode1_username,5,15);
		$post_tracker="wpost".round(microtime(true)).$encode_username.$post_tracker1;
		$publish="YES";
		$insert_world_post='INSERT INTO world_post (POST_BY,POST_TRACKER,WORLD_ID,POST_TITLE,POST_TAG,POST_CONTENT,DATE_POSTED,PUBLISHED,DATE_PUBLISHED) VALUES(:post_by,:post_tracker,:world_id,:post_title,:post_tag,:post_content,:date_posted,:published,:date_published)';
		$STM=$dbh->prepare($insert_world_post);
	$STM->bindParam(":post_by",$user_login);
	$STM->bindParam(":post_tracker",$post_tracker);
	$STM->bindParam(":world_id",$world_id_w);
	$STM->bindParam(":post_title",$post_title);
	$STM->bindParam(":post_tag",$post_tag);
	$STM->bindParam(":post_content",$post_content);
	$STM->bindParam(":date_posted",$date);
	//$STM->bindParam(":save",$save);
	$STM->bindParam(":published",$publish);
	$STM->bindParam(":date_published",$date);
	$STM->execute();
	
	//=================================================
	//REGISTERING IN NEWSFEED
	//-----------------------------------------------
	 $category='world_tbl';
	 $post_category_id=$world_id_w;
     $sub_category='';
	require('../newsfeed/insert_newfeed.inc.php');
	
	//INSERTING INTO NOTIFICATION
	
	$comment=''.$world_name.' posted';
	$category='world';
	$sub_category='';
	$posted_to='follow_worlds';
	
	require('../notification/notification.php');
	//sending post to the users email
	
	echo 'SUCCESSFUL';
	
	}
	
		
		
		}
			}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
//}
?>