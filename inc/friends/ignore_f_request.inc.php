<?php
//CODE FOR ACCEPTING FRIEND REQUEST
if(isset($_POST["ignore_request"])){
	
	$time=date('h:i:s a');
    $date=date('Y-m-d h:i:s a');
    /*
    1.THESE IS WHAT IS NEEDED FOR THE FRIEND ARRAY TABLE(ID,USER_FROM,USER_TO,TIME_ACCEPTED,DATE_ACCEPTED,REMOVED,USER_REMOVED,TIME_REMOVED,DATE_REMOVED,BLOCKED)
    *
	*/
	try{
	$sql="UPDATE friend_tbl SET ACCEPTED='NO' IGNORED=YES' TIME_IGNORED=$time DATE_IGNORED=$date REMOVED='NO' BLOCKED='NO'WHERE REQUEST_TO=$user_login AND REQUEST_FROM=$user_from";
	
	
    $STM=$dbh->prepare($sql);
	
	//GETTING FRIEND OF A USER LOGGED IN
	
	$SQL=$dbh->prepare("SELECT *FROM friend_tbl WHERE USER_TO=$user_login || USER_FROM=$user_login ACCEPTED='YES' && IGNORED='NO'");
	
    $num_row=$SQL->rowCount();
    if($num_row==0){
		$get_requesterr="You have no request at the moment";
	}
	else{
		while($get_friend=$SQL->setFetchMode(PDO::FETCH_ASSOC)){
			//CHECKING IF USER LOGGED IN IS USER_FROM OR USER_TO IN THE FRIEND ARRAY TABLE
			if($user_to==$user_login){
				$user_from=$get_friend['USER_FROM'];
				$get_friend_array=$user_from;
			}
			elseif($user_from==$user_login){
				$user_to=$get_friend['USER_TO'];
				$get_friend_array=$user_to;
			}
			else{
			   $get_friend_arrayerr="An error occurred while trying to get your Friend";
			}
		}
	}
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
?>