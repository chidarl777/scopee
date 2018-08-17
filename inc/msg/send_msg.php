
<?php


 require_once('inc/check.php');
 $message_to1=$user_from=$search_result_u=$users2=$users_friends="";
 $msgerr='';
//sending messages to a user script
if(isset($_POST['send-msg'])){
	
 if(!empty($_POST['msg-area'])){
  $check_msg=test_input($_POST['msg-area']);
$check_len=strlen($check_msg);
if($check_len>=1){
$get_msg=$check_msg;
  }
else{
$msgerr="Message should be greater than 2 character";
   }
   }
else{
   $msgerr="Cannot send an empty message";
  }

//GETTING THE LENGTH OF THE COMMENT
$get_str_msg=strlen($get_msg);
if($get_str_msg<100){
	$opened="NO";
}
else{
	$opened="NO";
}
  if(empty($msgerr)){
try{
 require('inc/db/config.php');
 	$date=date('Y-m-d h:i:s a');
 //CHECKING IF SEND MESSAGE BOTTOM WAS CLICK TWICE  FOR THE SAME COMMENT
 $stmt=$dbh->prepare('SELECT * FROM messages WHERE MESSAGE_FROM="`'.$user_login.'`"  AND REMOVED="NO" AND MESSAGE="`'.$get_msg.'`"');
 $stmt->execute();
 //GETTING ROWS RETURNED
 $num_row=$stmt->rowCount();
 
//CHECKING IF THE MSG IS BEEN SENT BY THE USER LOGGED IN
if($userlog==$user_login){
	$msgerr="Cannot send yourself a message";
}
else{
	
     $min=12334567890;
     $max=123456789900987654321;
 	$message_to=$userlog;
	$msg_tracker1=mt_rand($min,$max).microtime(true);	
    $insert_msg="INSERT INTO messages(MESSAGE_FROM,MESSAGE_TO,MESSAGE,MESSAGE_TRACKER,DATE_SENT,OPENED) VALUE(:message_from,:message_to,:message,:msg_tracker,:date,:opened)";

$SQL=$dbh->prepare($insert_msg);
$SQL->bindParam(":message_from",$user_login);
     $SQL->bindParam(":message_to",$message_to);
	$SQL->bindParam(":message",$get_msg);
	$SQL->bindParam(":msg_tracker",$msg_tracker1);
	$SQL->bindParam(":date",$date);
	$SQL->bindParam(":opened",$opened);
$SQL->execute();

}
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}
}

}
?>