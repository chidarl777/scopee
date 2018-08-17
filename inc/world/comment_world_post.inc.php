<?php
$get_comment="";
$opened="";
$commenterr="";
//require("../../aut_session.php")l
 require_once("inc/check.php");
//sending messages to a user script
if(isset($_POST['send-comment'])){
 if(!empty($_POST['comment-box'])){
  $check_comment=test_input($_POST['comment-box']);
$check_len=strlen($check_comment);
if($check_len>=1){
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
	//$opened="NO";
}
echo "sdaffaaaaaaaaa1";
  if(empty($commenterr)){
try{

	$date=date('Y-m-d h:i:s a');
 require('inc/db/config.php');
 //CHECKING IF POST COMMENT BOTTOM WAS CLICK TWICE  FOR THE SAME COMMENT
 $stmt=$dbh->prepare('SELECT * FROM world_post_comments WHERE COMMENTED_FROM="'.$user_login.'"  AND REMOVED="NO" AND COMMENTS="'.$get_comment.'"');
 $stmt->execute();
 echo "sdaffaaaaaaaaa2";
 //GETTING ROWS RETURNED
 $num_row=$stmt->rowCount();
 if($num_row>0){
 	$commenterr="Cannot send the same comment twice";
 }
 else{
 	echo "sdaffaaaaaaaaa3";
	$idwc=$world_post_id;
	$comment_tracker=mt_rand(100000000000000,10000000000);	
 //inserting into comment_tbl
    $insert_comment="INSERT INTO world_post_comments(COMMENTED_FROM,COMMENTED_TO,COMMENTS,POST_ID,DATE_COMMENTED,COMMENT_TRACKER) VALUE(:comment_from,:comment_to,:comment_body,:id,:date,:comment_tracker)";

$SQL=$dbh->prepare($insert_comment);
 $SQL->bindParam(":comment_from",$user_login);
	$SQL->bindParam(":comment_to",$world_creator);
	$SQL->bindParam(":id",$world_post_id);
	$SQL->bindParam(":comment_body",$get_comment);
	$SQL->bindParam(":comment_tracker",$comment_tracker);
	$SQL->bindParam(":date",$date);
	
	
     $SQL->execute();
   echo  "<script>alert('sssssssssssssssssssssssss');</script>";

 }
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}
}
}
?>

