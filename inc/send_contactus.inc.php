<?php
 require_once('inc/check.php');
//sending messages to a user script
$msgerr="";
$received_msg='';
$received_msg1='';
if(isset($_POST['send-message'])){
	if(!empty($_POST['message-from'])){
  if(empty($_POST['message-from'])){
$msg_fromerr='Invalid !!!'."<br />".'Email or Phone number required';
}
else{
$msg_from=test_input($_POST['message-from']);
  if (!filter_var($msg_from, FILTER_VALIDATE_EMAIL)) {
 if (!preg_match("/^[0-9]*$/",$msg_from)){
 	$msg_fromerr='Invalid  !!!'."<br />".'Email or Phone number required';
 }
 }
    }
      }
    
	
  
 if(!empty($_POST['message-body'])){
  $check_msg=test_input($_POST['message-body']);
$check_len=strlen($check_msg);
if($check_len>=1){
$get_msg=$check_msg;
  }
else{
//$msgerr="Message should be greater than 1 character";
   }
   }
else{
    $msgerr="Cannot send an empty message";
  }

//GETTING THE LENGTH OF THE COMMENT
$get_str_msg=strlen($get_msg);
if($get_str_msg<100){
	$opened="YES";
}
else{
	$opened="NO";
}
  if(empty($msgerr)){
try{
 require('inc/db/config.php');
 	$date=date('Y-m-d h:i:s a');
 	//CHECKING IF CONTACTUS WAS FOR WORLD OR ADMIN
 	if(isset($_GET['wor'])){
	$msg_to=test_input($_GET['wor']);
 	If(empty($msg_to)){
		$message_to="ADMIN";
	}
	else{
		$message_to=$msg_to;
	}	
	}
	else{
		$message_to="ADMIN";
	}
	
 //CHECKING IF SEND MESSAGE BOTTOM WAS CLICK TWICE  FOR THE SAME COMMENT
 $stmt=$dbh->prepare('SELECT * FROM messages WHERE MESSAGE_FROM="'.$msg_from.'"  AND REMOVED="NO" AND MESSAGE="'.$get_msg.'" AND MESSAGE_TO="'.$message_to.'"');
 $stmt->execute();
 
 //GETTING ROWS RETURNED
 $num_row=$stmt->rowCount();
 
 	
	$msg_tracker=mt_rand(1000000,10000000000).microtime(true);	
    $insert_msg="INSERT INTO messages(MESSAGE_FROM,MESSAGE_TO,MESSAGE,MESSAGE_TRACKER,DATE_SENT,OPENED) VALUE(:message_from,:message_to,:message,:msg_tracker,:date,:opened)";

$SQL=$dbh->prepare($insert_msg);
$SQL->bindParam(":message_from",$msg_from);
     $SQL->bindParam(":message_to",$message_to);
	$SQL->bindParam(":message",$get_msg);
	$SQL->bindParam(":msg_tracker",$msg_tracker);
	$SQL->bindParam(":date",$date);
	$SQL->bindParam(":opened",$opened);
$SQL->execute();

$received_msg='<span  >
 <span class="btn btn-success">Your message has been noted and we will get back to you.</span><br /><br/>';
 if($message_to=="ADMIN"){
 	
 $received_msg1='
&nbsp;&nbsp;&nbsp;Help  improve this site by reporting any error you found or by giving us your sincere suggestion on what you think should be added or improved.<br />
 Thank you<br />
<label style="font-weight:bolder;color:#258e0f;">From:&nbsp;Scopee Team</label></span>';

 }
 else{
 	$received_msg1="";
 }
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}
}
}
?>