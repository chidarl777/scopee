<?php require_once("../check.php"); ?>
<?php
//coding for the send chat script
require("../../aut_session.php");
//require('../../inc/chat/show_logged_in_friends.inc.php');
$chat_body="";
$chat_bodyerr="";
if (!empty($_POST["send-chat"])) {
	if(!empty($_POST['chat-area'])){
		$chat_body=test_input($_POST['chat-area']);
	}
	else{
		$chat_bodyerr="Cannot send an empty messages ";
	}
	//$time=Date('h:i:s a');
	
	$sent_from="$user_login";
	if($chat_bodyerr==""){
		
	
	try{
	$user_login=$_SESSION['user_login_aut'];
		$chat_tracker1=substr(str_shuffle(12345678900987654321),5,12);
		$encode1_username=base64_encode($user_login);
		$encode_username=str_replace("=","w1dr5g","$encode1_username");
		$chat_tracker="chat".round(microtime(true)).$encode_username.$chat_tracker1;
      require("../db/config.php");
      $sent_to=$_SESSION['chat-sent-to'];
      $SQL=$dbh->prepare("INSERT INTO chat_tbl(CHAT_FROM,CHAT_TO,CHAT_CONTENT,CHAT_TRACKER,DATE_SENT) VALUES(:chat_from,:chat_to,:chat_body,:msg_tracker,:date)");
     $SQL->bindParam(":msg_tracker",$chat_tracker); 
     $SQL->bindParam(":chat_from",$sent_from);
      $SQL->bindParam(":chat_to",$sent_to);
	$SQL->bindParam(":chat_body",$chat_body);
	//$SQL->bindParam(":msg_tracker",$msg_tracker);
	$SQL->bindParam(":date",$date);
     $SQL->execute();
 //echo 'successful';
      
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}

	}
	
}

?>
<?php require('view_chat.inc.php'); ?>