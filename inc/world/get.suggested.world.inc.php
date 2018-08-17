
<?php
require_once("inc/check.php");
//CODE TO SELECT WORLD

$num_worlderr="";
try{
	//GETTING USER FRIEND
	$sql='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$user_login.'" AND REMOVED="NO"  OR  SENT_TO="'.$user_login.'" AND REMOVED="NO"';
$stmt=$dbh->prepare($sql);
$stmt->execute();
$num_row=$stmt->rowCount();
if($num_row<1){
	///echo"YOU HAVE NO FRIENDS AT THE MOMENT";
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
//GETTING USERS INFO FROM THE USER TABLE
$sql1='SELECT *FROM users WHERE USERNAME="'.$users_friends.'"';
$stmt1=$dbh->prepare($sql1);
$stmt1->execute();
$get_info=$stmt1->fetch(PDO::FETCH_ASSOC);
$friends_gender=$get_info["GENDER"];
//$friend_age=$get_info["OTHER_NAME"];
//$profile_pic=$get_info["PROFILE_PIC"];

$SQL=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$users_friends.'" AND REMOVED="NO"AND WORLD_VIEW="Public" AND AGE_CRITERIA="General" AND WORLD_GENDER="BOTH" || CREATED_BY="'.$users_friends.'" AND REMOVED="NO" AND WORLD_VIEW="Friends" AND AGE_CRITERIA="General" AND  WORLD_GENDER="BOTH" || CREATED_BY="'.$users_friends.'" AND REMOVED="NO" AND WORLD_VIEW="Friends" AND AGE_CRITERIA="General" AND WORLD_GENDER="'.$friends_gender.'"');
$SQL->execute();
$num_world=$SQL->rowCount();
if($num_world>0){
	while($fetch_world=$SQL->fetch(PDO::FETCH_ASSOC)){
		
	
	$world_name_u=$fetch_world['WORLD_NAME'];
		$world_adress_u=$fetch_world['WORLD_ADRESS'];
		$world_pic_us=$fetch_world['WORLD_BACKGROUND_PIC'];
			 	$world_profile_pic1=$fetch_world['WORLD_PROFILE_PIC'];
	 	
	 	//CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($world_profile_pic1)){
			 	$world_pic_u="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$world_pic_u="user_data/world_photos/$world_profile_pic1";
			 }
		if(!empty($world_pic_us)){
			$world_pic_u_b="user_data/world_photos/$world_pic_us";
		}
		else{
			$world_pic_u_b="img/k1.jpg";
		}
	$friends_world='<p><li>
                              <a href="world/'.$world_adress_u.'">
                                <img style="width:70px; heigth:80px;" src="'.$world_pic_u.'" alt="no pic" />
                                <p style=" margin-left:15px;float:right; margin-right:10px;">'.$world_name_u.'</p>
                              </a>
                            </li></p>';
                            echo $friends_world;
	
	}
}
else{
	//$friends_world="NO SUGGESTED WORLD AT THE MOMENT";
	//echo $friends_world;
}
}
	}
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>



<?php
require_once("inc/check.php");
//CODE TO SELECT WORLD
$suggest_world="";

$num_worlderr="";
try{
	/*if ($friends_world==0){
		$suggest_world="SUGGESTED WORLD";
	//	echo $suggest_world;
	}
	else{
		
		
	}*/
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>