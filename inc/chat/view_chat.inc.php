<?php
require("../../aut_session.php");
//$get_chat="";
$msg_id="";
$chat_from="";
$chat_to="";
$chat="";
$date="";
try{
//CODING TO CHECK IF THE TEXT MSG CHARACTERS IS GREATER THAN 150
require("../db/config.php");
//view CHATs scripts

$date_sent=Date('Y-m-d h:i:s a');
$date=Date('Y-m-d');
$sql='SELECT *FROM chat_tbl WHERE CHAT_TO="'.$user_login.'" AND REMOVED="NO"||  CHAT_FROM="'.$user_login.'" AND REMOVED="NO"';
$result=$dbh->prepare($sql);
$result->execute();

//counting the nunber of rows returned
$get_row=$result->rowCount();

if($get_row>0){
while($get_col=$result->fetch(PDO::FETCH_ASSOC)){
$msg_id=$get_col['ID'];
$chat_from=$get_col['CHAT_FROM'];
$chat_to=$get_col['CHAT_TO'];
$chat=$get_col['CHAT_CONTENT'];
$date=$get_col['DATE_SENT'];

//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$chat_from.'"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$first_namechat=$get_info["FIRST_NAME"];
$other_namecaht=$get_info["OTHER_NAME"];
$profile_pic=$get_info["PROFILE_PIC"];

	if(empty($profile_pic)){
			// 	$profile_picchat="image/default-pic/images_012.jpg";
			 }
			 else{
			// 	$profile_picchat="user_data/profile_pic/".$profile_pic;
			 }
			
				 if($user_login==$chat_from){
				 	$chat_by_user=$chat;
			 	$get_chat='<div class="conversation-row even">
          <ul class="conversation-list">
              <li>
                  <p>
                      '.$chat_by_user.'
                  </p>
              </li>
          </ul>
      </div>';
			 }
			 else{
			$chat_of_friend=$chat;
			$get_chat='<div class="conversation-row odd">
          <ul class="conversation-list">
              <li>
                  <p>
                     '.$chat_of_friend.'
                  </p>
              </li>
          </ul>
      </div>';

			 }
			 echo $get_chat;
}
}
else{

//echo"You do not have any chat currently";
}


}

catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}

?>