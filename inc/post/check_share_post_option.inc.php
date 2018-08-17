<?php
//CODE TO CHECK WHAT THE USER HAS SELECTED TO SHARE POST WITH SO THAT THE SHARE TO WILL BE GOTTEN
require_once("inc/check.php");
$get_friend=""; 
/**
 * @author
 * @copyright 2015
 */
//checking for dangerous html characters and strimming white spaces
$errors=$shareerr="";
//$users_friends="";
$share="";
;
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['select_option_to_share'])){
//if the user did not select and click the send button
if($_POST['share_with']=='Select'){
$shareerr='select an option to share';
}
else{
	//if user has selected
$share=test_input($_POST['share_with']);
}
$time=date('h:i:s a');
$date=date('Y-m-d');


 if (empty($errors)){
try{
	$post_from=$posted_from;
	$id=$post_id;
      require("inc/db/config.php");//====================================================================
	
		if($_POST['share_with']=='Friends'){
			//if user wants to share with friends
			
			//CHECK IF USER HAS ANY FRIEND TO SHARE THE POST WITH
			$sql='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$user_login.'" AND REMOVED="NO"  OR  SENT_TO="'.$user_login.'" AND REMOVED="NO"';
$stmt=$dbh->prepare($sql);
$stmt->execute();
$num_row=$stmt->rowCount();
if($num_row<1){
	//if no friend
	echo"YOU HAVE NO FRIENDS AT THE MOMENT";
}
else{
	$post_from=$posted_from;
	$share_with=$_POST['share_with'];
	$share_to=$_POST['share_with'];
 $SQL='SELECT *FROM share_tbl WHERE SHARED_FROM="'.$user_login.'" AND POSTED_FROM="'.$post_from.'"AND POST_ID="'.$id.'"';
		$result=$dbh->prepare($SQL);
		$result->execute();
		$row_count=$result->rowCount();
		
		if ($row_count>0){
		$shareerr ='You have already shared this post with friend';
		}
		else{
		//insert data to database if value are not empty and sanitized
   $SQL="INSERT INTO share_tbl(SHARED_FROM,POSTED_FROM,POST_ID,SHARED_WITH,SHARED_TO,DATE_SHARED)
    VALUES(:shared_from,:posted_from,:post_id,:shared_with,:shared_to,:date)";
    
    
   $STM=$dbh->prepare($SQL);
    $STM->bindParam(":shared_from",$user_login);
	$STM->bindParam(":posted_from",$post_from);
	$STM->bindParam(":post_id",$id);
	$STM->bindParam(":shared_with",$share_with);
	$STM->bindParam(":shared_to",$share_to);
	$STM->bindParam(":date",$date);
	
	$STM->execute();
	 echo successul;
}
}
}
	elseif($_POST['share_with']=='World'){
			$get_request="worlds_tbl";
		}
		elseif($_POST['share_with']=='Message'){
			//GETTING A SPECIFIC FRIEND OF USER TO SHARE THE POST
			//$get_request="friends_tbl";
	$sql='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$user_login.'" AND REMOVED="NO"  OR  SENT_TO="'.$user_login.'" AND REMOVED="NO"';
$stmt=$dbh->prepare($sql);
$stmt->execute();
$num_row=$stmt->rowCount();
if($num_row<1){
	echo"YOU HAVE NO FRIENDS AT THE MOMENT";
}
else{
	

while($get_result=$stmt->fetch(PDO::FETCH_ASSOC)){

$sent_to=$get_result['SENT_TO'];
$sent_from=$get_result['SENT_FROM'];
//CHECKING IF $USER LOGGED IN IS SENT TO OR SENT FROM IN THE FRIEND TABLE
if($sent_to==$user_login){
	$users_friends=$sent_from;
}
else{
	$users_friends=$sent_to;

}




//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$users_friends.'"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$first_name=$get_info["FIRST_NAME"];
$other_name=$get_info["OTHER_NAME"];
$profile_pic=$get_info["PROFILE_PIC"];

	if(empty($profile_pic)){
			 	$profile_pic2="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/profile_pic/".$profile_pic;
			 }
			 
			
			 
				$get_friend="
	<div id='add_friends'>
	<img src='$profile_pic2'/>	
	<a href='messages.php'>$first_name $other_name</a>
	<input type='checkbox' id='add_friend' name='checkbox_user[]' title='check to add Friend' value='$users_friends'>
	</div>";
		
	 echo $get_friend;
		
		}
				
     }
     
			}

}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}

}

}

?>
