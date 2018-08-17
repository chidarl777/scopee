<?php

//require("../aut_session.inc.php");
/*
    1.THESE IS WHAT IS NEEDED FOR THE FRIEND REQUEST TABLE(ID,USER_FROM,USER_TO,ACCEPTED,IGNORED,TIME_SENT,DATE_SENT,TIME_ACCEPTED,DATE_ACCEPTED,TIME_IGNORED,DATE_IGNORED);
    *
	*/
	try{
		$encoded_id="";
		
		require("inc/db/config.php");

	//GETTING FRIEND REQUEST FOR A USER LOGGED IN
	
	$SQL=$dbh->prepare('SELECT *FROM friend_request WHERE REQUEST_TO="'.$user_login.'" AND ACCEPTED="NO" AND IGNORED="NO"');
	$SQL->execute();
    $num_row=$SQL->rowCount();
    
    if($num_row<1){
		echo "&nbsp;&nbsp;No friend request at the moment";
	}
	else{
		while($get_request=$SQL->fetch(PDO::FETCH_ASSOC)){
		
			$user_from=$get_request['REQUEST_FROM'];
			$time_sent=$get_request['TIME_SENT'];
			$date_sent=$get_request['DATE_SENT'];
			$request_id=$get_request['ID'];
		$get_info='SELECT *FROM users WHERE USERNAME="'.$user_from.'"';
		$get_request_info=$dbh->prepare($get_info);
		$get_request_info->execute();
		
		$array_info=$get_request_info->fetch(PDO::FETCH_ASSOC);
		$first_name=$array_info['FIRST_NAME'];
		$other_names=$array_info['OTHER_NAME'];
		$profile_pic=$array_info['PROFILE_PIC'];
			$idr=$array_info['ID'];
		if(empty($user_from)){
			//do nothing
		}
		else{
			$user_from1=$user_from;
		}
		
		if(empty($profile_pic)){
			 	$profile_pic2="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic2="user_data/user_photo/$profile_pic";
			 }
			 $encoded_id=$request_id;
					$get_friend_r='<div class="individual-user info-expand">
                              <div class="user-intro friend">
                                  <div class="user-thumb"><a href="profile.php?u='.$idr.'><img src='.$profile_pic2.' alt="user"></a></div>
                                  <div class="users-info">
                                      <ul>
                                          <li class="u-name"><a href="profile.php?u='.$idr.'">'.$first_name.' '.$other_names.' </a></li>
                                   
                                      </ul>
                                  </div>
                                  <!-- this is for the toggle icon -->
                                    <a href="friends.php?accept-fr='.$encoded_id.'"> <span class="pull-right"><input type="submit" name="accept-request'.$encoded_id.'" value="accept" class="btn btn-success" id="acc" /></span></a>&nbsp;
                                  <a href="friends.php?ignore-fr='.$encoded_id.'"><span class="pull-right"><input type="submit" name="ignore-request'.$encoded_id.'" value="Ignore" class="btn btn-warning" id="ign"  /></span></a>
                                 
                              </div>';
		echo $get_friend_r;
   
	}
		
		}
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>
<?php
//CODE FOR ACCEPTING FRIEND REQUEST
 if(isset($_GET['accept-fr'])){
	$time=date('H:i:s');
    $date=date('Y-m-d');
    /*
    1.THESE IS WHAT IS NEEDED FOR THE FRIEND ARRAY TABLE(ID,USER_FROM,USER_TO,TIME_ACCEPTED,DATE_ACCEPTED,REMOVED,USER_REMOVED,TIME_REMOVED,DATE_REMOVED,BLOCKED)
    */
	
	try{
		require("inc/db/config.php");
		if(empty($user_from1)){
			//echo "No friend request at the moment";
		}
		else{
			
		
		$user_from2=$user_from1;
	$sql='UPDATE friend_request SET ACCEPTED="YES",IGNORED="NO", TIME_ACCEPTED="'.$time.'",DATE_ACCEPTED="'.$date.'" WHERE REQUEST_TO="'.$user_login.'" AND REQUEST_FROM="'.$user_from2.'"';
	$stmt=$dbh->prepare($sql);
	$stmt->execute();
	//GETTING THE USER FROM IN THE FRIEND TABLE
	$SQLT=$dbh->prepare('SELECT *FROM  friend_request WHERE REQUEST_TO="'.$user_login.'" AND REQUEST_FROM="'.$user_from2.'" AND ACCEPTED="YES" AND IGNORED="NO" AND CANCELLED="NO"' );
	$SQLT->execute();
	$get_result=$SQLT->Fetch(PDO::FETCH_ASSOC);
	$user_to=$get_result['REQUEST_TO'];
	$user_from3=$get_result['REQUEST_FROM'];
  
  //CHECKING IF USER_FROM IS USER LOGGED IN
  if($user_from3==$user_login){
  	echo "Sorry you cannot send yourself a friend request";
  }
  else{
  
	//INSERTING USERS AS FRIEND IN THE FRIENDS TABLE
	$sql="INSERT INTO friends_tbl(SENT_FROM,SENT_TO,TIME_FRIENDS,DATE_FRIENDS) VALUES(:user_from,:user_to,:time,:date)";
    $STM=$dbh->prepare($sql);
	$STM->bindParam(":user_from",$user_from3);
	$STM->bindParam(":user_to",$user_login);
	$STM->bindParam(":time",$time);
	$STM->bindParam(":date",$date);
	$STM->execute();
	
	//INSERTING INTO NOTIFICATION
	$users3=$user_from;
	$posted_to=$user_from;
	$comment='accepted your friend request';
	$category='friend_request';
	$sub_category='';
	$post_tracker='';
	require('inc/notification/notification.php');
	echo'<meta http-equiv="refresh" content="0, url=friends.php" />';	
	}	
  }
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
?>
<?php
//CODE FOR IGNORING FRIEND REQUEST
if(isset($_GET['ignore-fr'])){
	$time=date('h:i:s a');
    $date=date('Y-m-d');
	require("inc/db/config.php");
		if(empty($user_from1)){
			//echo "you have no friend request at the moment";
		}
		else{
			
		
		$user_from3=$user_from1;
		
	try{
	$sql='UPDATE friend_request SET ACCEPTED="NO",IGNORED="YES", TIME_IGNORED="'.$time.'",DATE_IGNORED="'.$date.'" WHERE REQUEST_TO="'.$user_login.'" AND REQUEST_FROM="'.$user_from3.'"';
	
	
    $STM=$dbh->prepare($sql);
    $STM->execute();
	
		echo'<meta http-equiv="refresh" content="0, url=friends.php" />';	

}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
}
?>

<?php
//CODE FOR IGNORING FRIEND REQUEST
if(isset($_GET["undo-fr"])){
	$time=date('h:i:s a');
    $date=date('Y-m-d');
	require("inc/db/config.php");
		if(empty($user_from1)){
			//echo "you have no friend request at the moment";
		}
		else{
			
		
		$user_from4=$user_from1;
		
	try{
	$sql='UPDATE friend_request SET ACCEPTED="NO",IGNORED="NO",CANCELLED="YES", TIME_CANCELLED="'.$time.'",DATE_CANCELLED="'.$date.'" WHERE REQUEST_TO="'.$user_login.'" AND REQUEST_FROM="'.$user_from4.'"';
	
	
    $STM=$dbh->prepare($sql);
    $STM->execute();
	

}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
}
?>