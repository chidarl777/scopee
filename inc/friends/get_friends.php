<?php
//CODE FOR SENDING FRIEND REQUEST
if(isset($_POST['send_friend_request'.$user_from])){
	
	$time=date('h:i:s a');
    $date=date('Y-m-d');
    /*
    1.THESE IS WHAT IS NEEDED FOR THE FRIENDS ARRAY TABLE(ID,USER_FROM,USER_TO,REMOVED,USER_REMOVED,TIME_REMOVED,DATE_REMOVED)
    *
	*/
	try{
	$sql="INSERT INTO friend_array(USER_FROM,USER_TO) VALUES(:user_to,user_from)";
    $STM=$dbh->prepare($sql);
	$STM->bindParam(":user_from",$user_from);
	$STM->bindParam(":user_to",$user_to);
	
	//GETTING FRIEND OF A USER LOGGED IN
	
	$SQL=$dbh->prepare("SELECT *FROM friend_array WHERE USER_TO=$user_login || USER_FROM=$user_login");
	
    $num_row=$SQL->rowCount();
    if($num_row==0){
		$get_frienderr="You have no request at the moment";
	}
	else{
		while($get_friend=$SQL->setFetchMode(PDO::FETCH_ASSOC)){ 
		//getting data
		$user_to=$get_friend['USER_TO'];
		$user_from=$get_friend['USER_FROM'];
			//CHECKING IF USER LOGGED IN IS USER_FROM OR USER_TO IN THE FRIEND ARRAY TABLE
			if($user_to==$user_login){
				$user_from=$get_friend['USER_FROM'];
				
			//getting user info
			$user_friend=$user_from;
			}
			elseif($user_from==$user_login){
				$user_to=$get_friend['USER_TO'];
				//getting user info
			$user_friend=$user_to;
			}
			$get_data=$dbh->prepare("SELECT *FROM users WHERE USERNAME=$user_friend");
			$get_data->execute();
			while($get_info=$get_data->setFetchMode(PDO::FETCH_ASSOC)){
		$firstname=$get_info['FIRST_NAME'];
		$othername=$get_info['OTHER_NAME'];
		$get_pic=$get_info['PROFILE_PIC'];		
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