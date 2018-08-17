<?php
try{
	
$sql_full_users=$dbh->prepare('SELECT *FROM users WHERE REMOVED="NO"');
$sql_full_users->execute();

//getting no of users 
$num_full_users=$sql_full_users->rowCount();

if($num_full_users>0){
	echo '<table>';
	
	while($fetch_full_users=$sql_full_users->fetch(PDO::FETCH_ASSOC)){
$username=$fetch_full_users['USERNAME'];
$professional_skill=$fetch_full_users['PROFESSIONAL_SKILLS'];
$education_c=$fetch_full_users['EDUCATION'];
$hobby_c=$fetch_full_users['HOBBY'];
$country_of_origin=$fetch_full_users['COUNTRY_OF_ORIGIN'];
$country_of_residence=$fetch_full_users['COUNTRY_OF_RESIDENCE'];
$state_of_origin=$fetch_full_users['STATE_OF_ORIGIN'];
$state_of_residence=$fetch_full_users['STATE_OF_RESIDENCE'];
$city=$fetch_full_users['CITY'];
$contacts=$fetch_full_users['CONTACTS'];
$occupation=$fetch_full_users['OCCUPATION'];
$marital_status=$fetch_full_users['MARITAL_STATUS'];
$complete_profile=$fetch_full_users['COMPLETE'];
$about_user=$fetch_full_users['ABOUT_USER'];
$date_update=$fetch_full_users['DATE_UPDATED'];
$signup_date=$fetch_full_users['SIGNUP_DATE'];
$signup_time=$fetch_full_users['SIGNUP_TIME'];
$u_profile_pic1=$fetch_full_users['PROFILE_PIC'];


//checking users picture
if(empty($u_profile_pic1)){
			 	$u_profile_pic="images/default-pic/images_012.jpg";
			 }
			 else{
			 	$u_profile_pic="user_data/profile_pic/$u_profile_pic1";
			 }
			 
			  $user_pic="<img src='.$u_profile_pic.' width:50px; height:50px; />";
$total_users="<tr>

<td>$user_pic</td><td>$username</td><td>$professional_skill</td><td>$education_c</td><td>$hobby_c</td><td>$country_of_origin</td><td>$country_of_residence</td><td>$city</td><td>$contacts</td><td>$occupation</td><td>$marital_status</td><td>$complete_profile</td><td>$about_user</td><td>$date_update</td><td>$signup_date</td><td>$signup_time</td>
   			 </tr>";
   			 //echo $total_users;
   			// $total_users="<a></a>"
      
	}
	echo '</table>';
}
}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
?>