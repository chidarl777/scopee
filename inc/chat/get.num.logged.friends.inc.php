
<?php
$get_logged_friends="No friends";

$active_symbol="";
//CODE TO VIEW FRIENDS OF USER LOGGED IN
try{
	require("inc/db/config.php");
$sql='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$user_login.'" AND REMOVED="NO" OR SENT_TO="'.$user_login.'" AND REMOVED="NO"';
$stmt=$dbh->prepare($sql);
$stmt->execute();
$num_row=$stmt->rowCount();
if($num_row<1){
	
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

$users_friends1=$users_friends;
//CHECKING IF FRIEND CURRENTLY LOGGED IN ;
$check_user=$dbh->prepare('SELECT *FROM active_log WHERE USERNAME="'.$users_friends1.'" AND ACTIVE="YES" AND INACTIVE="NO" AND TURNED_OFF="NO"');
	 $check_user->execute();
	 //getting result from active log
	 $get_logged_friends2=$check_user->rowCount();
	
	if($get_logged_friends2>0){
		
	$get_logged_friends=$get_logged_friends2."Friends";
	}
	else{
		$get_logged_friends="No Friend";
	}
		}		
     }
	}	
catch(PDOException $error){
	echo("An error occurred");
	
	}

?>
