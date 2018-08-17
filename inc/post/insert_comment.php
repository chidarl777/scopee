<?php
$get_comment="";
$opened="";
$commenterr="";
//require("../aut_session.inc.php");
//require("get_post.php");

 require_once("inc/check.php");
 
//sending messages to a user script
if(isset($_POST["send-comment"])){
	
 if(!empty($_POST['comment-box'])){
  $check_comment=test_input($_POST['comment-box']);
$check_len=strlen($check_comment);
if($check_len>=2){
$get_comment=$check_comment;
  }
else{
$commenterr="comment should be greater than 2 character";
   }
 }
else{
    $commenterr="Cannot  send an empty comment";
  } 
//GETTING THE LENGTH OF THE COMMENT
$get_str_comment=strlen($get_comment);
if($get_str_comment<100){
	$opened="YES";
}
else{
	$opened="NO";
}

  if(empty($commenterr)){
try{

	$date=date('Y-m-d h:i:s a');
 require('inc/db/config.php');
 
//echo $post_id_h;
  $result_post=$dbh->prepare('SELECT *FROM posts_tbl WHERE ID="'.$post_id_h.'" AND REMOVED="NO"');
     $result_post->execute();
     
     //GETTING THE TOTAL NUMBER OF POST BY FRIEND
    $get_total_post_by_friend=$result_post->rowCount();
    
    if($get_total_post_by_friend==0){
		
	//do nothing
	
		
	}
	else{
		
		//do nothing
	$total_friend_post=$get_total_post_by_friend;
$get_result=$result_post->fetch(PDO::FETCH_ASSOC);
	
	
    	$posted_from=$get_result["POSTED_FROM"];
    
	$id=$post_id_h;
	$comment_tracker=mt_rand(100000000000000,10000000000).round(microtime(TRUE)).base64_encode($id);	
	
 //inserting into comment_tbl
    $insert_comment="INSERT INTO comments(COMMENTED_FROM,COMMENTED_TO,COMMENT,POST_ID,DATE_COMMENTED,OPENED,COMMENT_TRACKER) VALUE(:comment_from,:comment_to,:comment_body,:id,:date,:opened,:comment_tracker)";

$SQL=$dbh->prepare($insert_comment);
 $SQL->bindParam(":comment_from",$user_login);
	$SQL->bindParam(":comment_to",$posted_from);
	$SQL->bindParam(":id",$id);
	$SQL->bindParam(":comment_body",$get_comment);
	$SQL->bindParam(":comment_tracker",$comment_tracker);
	$SQL->bindParam(":date",$date);
	$SQL->bindParam(":opened",$opened);
	//$SQL->bindParam(":removed",$removed);
	
     $SQL->execute();
   
  

 }
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}
}
}
?>