<?php
//CODE FOR SENDING FRIEND

	try{
	
	
	//GETTING FRIEND OF A USER LOGGED IN
	
	$SQL1=$dbh->prepare("SELECT *FROM friend_array WHERE USER_TO=$user_login || USER_FROM=$user_login");
	
    $num_row=$SQL->rowCount();
    if($num_row<1){
		$get_frienderr="You have no request at the moment";
	}
	else{
		while($get_friend=$SQL1->setFetchMode(PDO::FETCH_ASSOC)){ 
		//getting data
		$user_to=$get_friend['USER_TO'];
		$user_from=$get_friend['USER_FROM'];
			//CHECKING IF USER LOGGED IN IS USER_FROM OR USER_TO IN THE FRIEND ARRAY TABLE
			if($user_to==$user_login){
				$user_from=$get_friend['USER_FROM'];
				
			//getting user info
			$get_data=$dbh->prepare("SELECT *FROM users WHERE USERNAME=$user_from");
			while($get_info=$get_data->setFetchMode(PDO::FETCH_ASSOC)){
		$firstname=$get_info['FIRST_NAME'];
		$othername=$get_info['OTHER_NAME'];
		$get_pic=$get_info['PROFILE_PIC'];		
			}
			}
			elseif($user_from==$user_login){
				$user_to=$get_friend['USER_TO'];
				//getting user info
			$get_data1=$dbh->prepare("SELECT *FROM users WHERE USERNAME=$user_to");
			while($get_info1=$get_data1->setFetchMode(PDO::FETCH_ASSOC)){
		$firstname=$get_info1['FIRST_NAME'];
		$othername=$get_info1['OTHER_NAME'];
		$get_pic=$get_info['PROFILE_PIC'];				
			}
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

?>