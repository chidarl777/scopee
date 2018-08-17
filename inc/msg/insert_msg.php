<?php require_once("inc/check.php"); ?>
<?php
//coding for the send message script
$msg_body="";
$msg_bodyerr="";
if (isset($_POST["send_message"])) {
	if(!empty($_POST['message-area'])){
		$msg_body=test_input($_POST['message-area']);
	}
	else{
		$msg_bodyerr="Cannot send an empty messages ";
	}
	$time=Date('h:i:s a');
	$date=Date('Y-m-d');
	$sent_from="$user_login";
	
	try{
	
		$msg_tracker=mt_rand(100000000000000,10000000000);
      require("inc/db/config.php");
      
      $SQL=$dbh->prepare("INSERT INTO messages(MSG_TRACKER,SENT_FROM,SENT_TO,SENT_MSG,TIME_SENT,DATE_SENT) VALUES(:msg_tracker,:sent_from,:sent_to,:msg_body,:time,:date)");
     $SQL->bindParam(":msg_tracker",$msg_tracker); 
     $SQL->bindParam(":sent_from",$sent_from);
      $SQL->bindParam(":sent_to",$sent_to);
	$SQL->bindParam(":msg_body",$msg_body);
	$SQL->bindParam(":time",$time);
	$SQL->bindParam(":date",$date);
     $SQL->execute();
      
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}

	
}
?>
?>