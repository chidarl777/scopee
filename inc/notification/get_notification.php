<?php
//==============================================================
//CODE TO GET NOTIFICAION
//==============================================================
try{
	
	require('inc/db/config.php');
	if(isset($_GET['ntf'])){
	$ntf=test_input($_GET["ntf"]);
}
else{
	$ntf=0;
}
$offset_ntf=$ntf+7;
	// LIMIT '.$offset_ntf.'
$sql_notification=$dbh->prepare('SELECT *FROM notification WHERE posted_to="'.$user_login.'" ORDER BY id,opened="no" DESC  LIMIT '.$offset_ntf.'');
$sql_notification->execute();

$num_sql_notification=$sql_notification->rowCount();
//echo $num_sql_notification;

if($num_sql_notification>0){
	
	while($fetch_sql_notification=$sql_notification->fetch(PDO::FETCH_ASSOC)){
		$tracker=$fetch_sql_notification['tracker'];
		$date_sent=$fetch_sql_notification['date_added'];
		$notified_from=$fetch_sql_notification['posted_by'];
		$notified_to=$fetch_sql_notification['posted_to'];
		$category=$fetch_sql_notification['category'];
		$sub_category=$fetch_sql_notification['sub_category'];
		$post_id=$fetch_sql_notification['post_id'];
		$comment=$fetch_sql_notification['comment'];
		$opened=$fetch_sql_notification['opened'];
		$notification_id=$fetch_sql_notification['id'];
		
		require_once('inc/datetimediff.inc.php');
		//==============================================
		//UPDATING NOTIFICATION TO OPENED ==YES
		//=============================================
		if($num_sql_notification>$offset_ntf OR $num_sql_notification==$offset_ntf){
			
			for($i=0;$i<$offset_ntf; $i++){
				$sql_ntf_update=$dbh->prepare('UPDATE notification SET opened="yes" WHERE ID="'.$notification_id.'"');
				$sql_ntf_update->execute();
			}
		}
		else{
			$sql_ntf_update=$dbh->prepare('UPDATE notification SET opened="yes" WHERE ID="'.$notification_id.'"');
				$sql_ntf_update->execute();
		}
		
		 if($category=='friend_request'){
		 	
		 	$get_data=$dbh->prepare('SELECT ID,PROFILE_PIC,FIRST_NAME,OTHER_NAME FROM users WHERE USERNAME="'.$notified_from.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$userid=$get_info["ID"];
			$profile_pic=$get_info["PROFILE_PIC"];
			$first_name=$get_info['FIRST_NAME'];
			$other_names=$get_info['OTHER_NAME'];
			
			if(empty($profile_pic)){
			 	$profile_pic3="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic3="user_data/user_photo/".$profile_pic;
			 }
			$get_time=datetimediff(date('Y-m-d H:i:s'),$date_sent);
			 	if($notified_to==$user_login){
			 		
						$notification='
                                          <li><a href="friends.php" class="clearfix"><span class="message-thumb" ><img src='.$profile_pic3.' alt="image"></span><span class="notification-message">'.$first_name.' '.$other_names.' '.$comment.'<span class="notification-time clearfix">'.$get_time.'</span></span></a>
                                          </li>
                                         ';
                                        
									
				echo $notification;  	
					
				}
			 }
			 else{
			 	
		$SQL=$dbh->prepare('SELECT *FROM friends_tbl WHERE SENT_TO="'.$user_login.'" AND SENT_FROM="'.$notified_from.'" AND REMOVED="NO" OR SENT_TO="'.$notified_from.'" AND SENT_FROM="'.$user_login.'" AND REMOVED="NO"');
	$SQL->execute();
    $num_row=$SQL->rowCount();
  // echo $num_row;
    if($num_row<1){
		//$get_frienderr="You have no request at the moment";
	}
	else{
		
				$get_result=$SQL->fetch(PDO::FETCH_ASSOC);

$sent_to=$get_result['SENT_TO'];
$sent_from=$get_result['SENT_FROM'];

if($sent_from==$user_login){
	$notification_post_from=$sent_to;
}
else{
	$notification_post_from=$sent_from;
}
//GETTING POSTED FROM INFO
					$get_data=$dbh->prepare('SELECT ID,PROFILE_PIC,FIRST_NAME,OTHER_NAME FROM users WHERE USERNAME="'.$notification_post_from.'"');
			$get_data->execute();
			$get_info=$get_data->fetch(PDO::FETCH_ASSOC);
			$userid=$get_info["ID"];
			$profile_pic=$get_info["PROFILE_PIC"];
			$first_name=$get_info['FIRST_NAME'];
			$other_names=$get_info['OTHER_NAME'];
			
			if(empty($profile_pic)){
			 	$profile_pic3="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$profile_pic3="user_data/user_photo/".$profile_pic;
			 }
			}
			
		}
		//echo $notification;
	}
}
}
catch(PDOException $e){
echo ("error".$e->getMessage());

}

?>