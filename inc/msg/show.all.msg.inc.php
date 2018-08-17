<?php
$num_msg="";
$first_name_m="";
$other_name_m="";

$get_message_all="";
try{
//CODING TO CHECK IF THE TEXT MSG CHARACTERS IS GREATER THAN 150
require("inc/db/config.php");
//view messages scripts
if(isset($_GET["mid"])){
	$d_user=$_GET["mid"];
	//$d_user=str_replace("_2rtTz","=",$d_user1);
	
	$msg_ids=$d_user;
	
	//$edit_profile_btn="";

	$check_u=test_input($msg_ids);
	
		
$sql='SELECT *FROM messages WHERE MESSAGE_TO="'.$user_login.'" AND ID="'.$check_u.'" AND REMOVED="NO"  ||  MESSAGE_FROM="'.$user_login.'" AND ID="'.$check_u.'" AND REMOVED="NO"';
$result=$dbh->prepare($sql);
$result->execute();

//counting the nunber of rows returned
$get_row=$result->rowCount();

if($get_row>0){
	$num_msg=$get_row;
while($get_col=$result->fetch(PDO::FETCH_ASSOC)){
$msg_id=$get_col['ID'];
$message_from=$get_col['MESSAGE_FROM'];
$message_to=$get_col['MESSAGE_TO'];
$message=$get_col['MESSAGE'];
$date_m=$get_col['DATE_SENT'];

//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$message_from.'"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$first_name_m=$get_info["FIRST_NAME"];
$other_name_m=$get_info["OTHER_NAME"];
$profile_pic=$get_info["PROFILE_PIC"];

	if(empty($profile_pic)){
			 	$profile_pic4="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic4="user_data/profile_pic/$profile_pic";
			 }
			 if(strlen($message)>150){
$show_msg=$message;
 }
else{
 $show_msg=$message;
 }
 
 
 //=================================================
 //UPDATING MESSAGE TO OPENED TO YES
 //==================================================

 if($user_login==$message_to){
 
 $msg_opened=$dbh->prepare('UPDATE messages SET OPENED="YES" WHERE ID="'.$check_u.'"');
 $msg_opened->execute();
 
		
 }	
 		
				
				$encoded_url=$msg_id;
				
				 if($user_login==$message_from){
				 	$get_img='                                         <a href="'.$encoded_url.'" class="message-thumb"><img src='.$profile_pic4.' alt="image"></a>';
			 	$get_message_all='		 
		  <li class="clearfix">
'.$show_msg.'
                                          </li><br>';
			 }
			 else{
			 	$get_img='                                          <a href="'.$encoded_url.'" class="message-thumb"><img src='.$profile_pic4.' alt="image"></a>';
			
		$get_message_all='		 
		  <li class="clearfix">
'.$show_msg.'
                                          </li><br>';
			 }
		 
		  		
			 }
		//	echo $get_message;
}

else{

echo"You do not have any messages currently";
}

	
}
}


catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}
?>