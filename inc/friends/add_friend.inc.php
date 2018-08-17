<?php
//CODE FOR WHEN THE ADD FRIEND BUTTON IS CLICKED

//require("get_users_that_are_not_friends_and_no_request_has_been_sent.inc.php");
try{
	require("inc/db/config.php");
				if(isset($_POST["add".$encoded_id])){
					
	
					$decode_id=json_decode($encoded_id);
					
	$time=date('h:i:s a');
    $date=date('Y-m-d');
    /*
    1.THESE IS WHAT IS NEEDED FOR THE FRIEND REQUEST TABLE(ID,USER_FROM,USER_TO,ACCEPTED,IGNORED,TIME_SENT,DATE_SENT,TIME_ACCEPTED,DATE_ACCEPTED,TIME_IGNORED,DATE_IGNORED);
    *
	*/
	$user_from=$user_login;		
	//CODE TO CHECK IF $USER2 IS EMPTY
	if(empty($users2)){
		echo "no more friends to add";
		
	}
	else{
	$users3=$users2;
	//checking if request has been sent before
	$check_request='SELECT *FROM friend_request WHERE REQUEST_TO="'.$users3.'" AND REQUEST_FROM="'.$user_login.'" OR REQUEST_FROM="'.$users3.'" AND REQUEST_TO="'.$user_login.'"';
	$result=$dbh->prepare($check_request);
	$result->execute();
	$num_row=$result->rowCount();
	
	if($num_row>0){
		echo"cannot send request twice sorry";
	}
	else{
		//INSERTING FRIEND REQUEST INTO THE USER FROM
	$sql='INSERT INTO friend_request (REQUEST_FROM,REQUEST_TO,TIME_SENT,DATE_SENT) VALUES(:user_from,:user_to,:time_sent,:date_sent)';
	
	
    $STM=$dbh->prepare($sql);
     
	$STM->bindParam(":user_from",$user_login);
	$STM->bindParam(":user_to",$users3);
	$STM->bindParam(":time_sent",$time);
	$STM->bindParam(":date_sent",$date);
	$STM->execute();
	}
	}
	
	}	
	else{
		//echo "not equal";
	}	
	}	
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}

?>