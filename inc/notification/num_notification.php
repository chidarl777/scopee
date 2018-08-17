
<?php


 require_once('inc/check.php');
 try{
 	require('inc/db/config.php');
 	$num_s_notification='';
 	$num_s_msg='';
 	//======================================
 	//getting number of notification
 	//======================================
 	$sql_n_notification=$dbh->prepare('SELECT *FROM notification WHERE opened="no" AND posted_to="'.$user_login.'"');
 	$sql_n_notification->execute();
 	$num_sql_n_notification=$sql_n_notification->rowCount();
 
   // $fetch_sql_n_nofication=$sql_n_notification->fetch(PDO::FETCH_ASSOC);
  //  $posted_to=$fetch_sql_n_nofication['posted_to'];
 	
 	
 	if($num_sql_n_notification>0){
		$num_s_notification='You have '.$num_sql_n_notification.' new notification';
	}
	else{
		$num_s_notification='You have no new notification';
	}
		

	//==========================================
	//GETTING NUMBER OF UNREAD MSG
	//==========================================
	
	$sql_n_msg=$dbh->prepare('SELECT *FROM messages WHERE OPENED="NO" AND MESSAGE_TO="'.$user_login.'"');
	$sql_n_msg->execute();
	$num_sql_n_msg=$sql_n_msg->rowCount();
	if($num_sql_n_msg>0){
		$num_s_msg='You have '.$num_sql_n_msg.' unread messages';
	}
	else{
		$num_s_msg='You have no new messages at the moment';
	}
	$global_num_notification=$num_sql_n_msg+$num_sql_n_notification;
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}

?>