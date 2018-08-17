<?php

require("../../aut_session.php");
//CODE FOR INSERTING WORLDS POST
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
 // $data = htmlspecialchars($data);
  return $data;
}

$post_title=$post_content=$post_tag=$post_permission=$post_summary="";
$error=$post_titleerr=$post_tagerr=$post_contenterr=$post_summaryerr=$post_permissionerr="";
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
	if(!empty($_POST['post-permission'])){
		$post_permission=test_input($_POST["post-permission"]);
		
		
	}
	else{
		$post_permissionerr="Select a post permission (i.e how your post should be viewed)";
	}
	if(!empty($_POST['post-tag'])){
		$post_tag=test_input($_POST["post-tag"]);
	}
	else{
		$post_tagerr="Add a tag to your post(note: tags enhances post visibility)";
	}
	if(!empty($_POST['post-permission'])){
		$post_permission=test_input($_POST["post-permission"]);
		//echo $post_permission;
		//die();
	}
	else{
		$post_permissionerr="Select a post permission (i.e how your post should be viewed)";
	}
	if(!empty($_POST["world-post-area"])){
		$post_content1=test_input($_POST["world-post-area"]);
	}
	else{
		$post_contenterr="Content area cannot be empty";
	}

//$time=date('h:i:s a');
$date=date('Y-m-d H:i:s');
try{
	
	//allow special char
	$p=str_replace('>','gt;',$post_content1);
	$y=str_replace('"','#%%',$p);
$post_content=str_replace('<','&lt;',$y);

	require("../db/config.php");
	if($error==""){
		$world_id_w=$_SESSION['world_id'];
		$w_adress=$_SESSION['world_adress'];
		//CHECKING IF THE USER LOGGED CLICKED ON THE PUBLISH BUTTON TWICE
		$check_post=$dbh->prepare('SELECT *FROM world_post WHERE POST_BY="'.$user_login.'" AND WORLD_ID="'.$world_id_w.'" AND POST_TITLE="'.$post_title.'" AND POST_CONTENT="'.$post_content.'"');
		$check_post->execute();
		$num_row=$check_post->rowCount();
		//getting result
		if($num_row==0 || $num_row>0){
			//do nothing 
	//	}
	//	else{
		//INSERT DATA
		//$save="NO";
		$encode1_username=str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		$encode_username=substr($encode1_username,5,15);
		if(!empty($_POST['insert-file'])){
			$insert_option=$_POST['insert-file'];
			if($insert_option=="Yes"){
		if(isset($_SESSION['worpostimg-tracker']) && !empty( $_SESSION['worpostimg-tracker'])){
			$post_tracker=$_SESSION["worpostimg-tracker"];
			
		}
		else{
			$post_tracker1= str_shuffle('1234567890987');
			$post_tracker="worpost".round(microtime(true)).$encode_username.$post_tracker1;
		}
		
		if(isset($_SESSION['worpost-image'])&& !empty($_SESSION['worpost-image'])){
			
			$upload_img=$_SESSION['worpostimg-tracker'];
			
		}
		else{
			$upload_img='';
		}
		}
		else{
				$post_tracker1= str_shuffle('1234567890987');
			$post_tracker="worpost".round(microtime(true)).$encode_username.$post_tracker1;
			$upload_img='';
			}
		}
		else{
			$post_tracker1= str_shuffle('1234567890987');
			$post_tracker="worpost".round(microtime(true)).$encode_username.$post_tracker1;
			$upload_img='';
		}
		$post_body=$post_content.' '.$upload_img;
		$publish="YES";
		$insert_world_post="INSERT INTO world_post (POST_BY,POST_TRACKER,WORLD_ID,POST_TITLE,POST_SUMMARY,ACCESS_CODE,POST_TAG,POST_CONTENT,DATE_POSTED,PUBLISHED,DATE_PUBLISHED) VALUES(:post_by,:post_tracker,:world_id,:post_title,:post_summary,:access_code,:post_tag,:post_content,:date_posted,:published,:date_published)";
		$STM=$dbh->prepare($insert_world_post);
	$STM->bindParam(":post_by",$user_login);
	$STM->bindParam(":post_tracker",$post_tracker);
	$STM->bindParam(":world_id",$world_id_w);
	$STM->bindParam(":post_title",$post_title);
	$STM->bindParam(":access_code",$post_permission);
	$STM->bindParam(":post_tag",$post_tag);
	$STM->bindParam(":post_content",$post_body);
	$STM->bindParam(":date_posted",$date);
	$STM->bindParam(":post_summary",$post_summary);
	$STM->bindParam(":published",$publish);
	$STM->bindParam(":date_published",$date);
	$STM->execute();
	
	//=================================================
	//REGISTERING IN NEWSFEED
	//-----------------------------------------------
	 $category='world_tbl';
	 $post_category_id=$world_id_w;
     $sub_category='';
     
     unset($_SESSION["worpost-image"]);
     unset($_SESSION["worpostimg-tracker"]);
	require('../newsfeed/insert_newfeed.inc.php');
	//echo "Posted";
	echo'<meta http-equiv="refresh" content="0, url=world.php?wor='.$w_adress.'" />';
	//sending post to the users email
	
	//echo 'SUCCESSFUL';
	
	}
	
		
		
		}
			}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
//}
?>