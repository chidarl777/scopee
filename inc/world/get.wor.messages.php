<?php
$num_msg="";
$first_name_m="";
$other_name_m="";
//require("../aut_session.inc.php");
$get_message="";

try{
//CODING TO CHECK IF THE TEXT MSG CHARACTERS IS GREATER THAN 150
require("inc/db/config.php");
//view messages scripts
//if(!empty($_Post['offset'])  ||  $_POST['offset']!=""){
	if(isset($_GET['wor'])){
	$w_adress=test_input($_GET["wor"]);

	
if(isset($_GET['msgl'])){
	$msgl=test_input($_GET["msgl"]);
}
else{
	$msgl=0;
}

if(isset($_GET['read'])){
	$read=test_input($_GET["read"]);
	if($read=="No"){
		$opened='AND OPENED="NO"';
	}
	else{
		$opened='AND OPENED="YES"';
	}
}
else{
	$read="";
	$opened="";
}

$offset=$msgl+7;
//$offset= $_POST['offset'];
$sql='SELECT *FROM messages WHERE MESSAGE_TO="'.$w_adress.'" AND REMOVED="NO" '.$opened.'  ||  MESSAGE_FROM="'.$w_adress.'" AND REMOVED="NO" '.$opened.' ORDER BY ID DESC ';
$result=$dbh->prepare($sql);
$result->execute();

//counting the nunber of rows returned
$get_row=$result->rowCount();
if($get_row>0){
	$num_msg=$get_row;
while($get_col=$result->fetch(PDO::FETCH_ASSOC)){
$msg_id=$get_col['ID'];
$msg_from=$get_col['MESSAGE_FROM'];
$message_to=$get_col['MESSAGE_TO'];
$message=$get_col['MESSAGE'];
$msg_opened=$get_col['OPENED'];
$date=$get_col['DATE_SENT'];

//checking if world address is meg from
if($msg_from==$w_adress){
	// do nothing
}
else{
	$message_from=$msg_from;

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
$msg_body=substr($message,0 ,150)."<a href='messages.php/$msg_id'>....more</a>";
 }
else{
 $msg_body=$message;
 }
 
 
				
				$d_url=base64_encode($message_from);
				$encoded_url=str_replace("=","_2rtTz",$d_url);
				
				 if($user_login==$message_from){
			 	$get_message='
		 
		  <li class="clearfix" style="background-color:#ffffff;">
                                              <a href="#" class="message-thumb"><img src='.$profile_pic4.' alt="image">
                                              </a><a href="messages.php?mid='.$msg_id.'" class="message-intro"><span class="message-meta">'.$first_name_m.' '.$other_name_m.'<br></span>'.$msg_body.'<span class="message-time">'.$date.'</span></a>
                                          </li><br>';
			 }
			 else{
			 	if($msg_opened=="NO"){
					$get_message='
		 
		  <li class="clearfix">
                                              <a href="#" class="message-thumb"><img src='.$profile_pic4.' alt="image">
                                             </a><a href="messages.php?mid='.$msg_id.'" class="message-intro"><span class="message-meta">'.$first_name_m.' '.$other_name_m.'<br></span>'.$msg_body.'<span class="message-time">'.$date.'</span></a>
                                          </li>';
		 
				}
			else{
			
			$get_message='
		 
		  <li class="clearfix" style="background-color:#ffffff;">
                                              <a href="'.$message_from.'" class="message-thumb"><img src='.$profile_pic4.' alt="image">
                                             </a><a href="messages.php?mid='.$msg_id.'" class="message-intro"><span class="message-meta">'.$first_name_m.' '.$other_name_m.'<br></span>'.$msg_body.'<span class="message-time">'.$date.'</span></a>
                                          </li>';
		 
		  			
			}
			 }
			 echo $get_message;
}

}
}
else{

echo"You do not have any messages currently";
}

}
else{
	header("location:logout.php");
}
}


catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}
?>