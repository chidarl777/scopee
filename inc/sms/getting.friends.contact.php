<?php
try{
	
if(isset($_POST['contact-friends'])){
	
	require("inc/db/config.php");
	//require("inc/check.php");
$sql='SELECT *FROM friends_tbl WHERE SENT_FROM="'.$user_login.'" AND REMOVED="NO"  OR  SENT_TO="'.$user_login.'" AND REMOVED="NO"';
$stmt=$dbh->prepare($sql);
$stmt->execute();
$num_row=$stmt->rowCount();
if($num_row<1){
	//echo"YOU HAVE NO FRIENDS AT THE MOMENT";
}
else{
	//getting only one contact
$get_result1=$stmt->fetch(PDO::FETCH_ASSOC);
$sent_to1=$get_result1['SENT_TO'];
$sent_from1=$get_result1['SENT_FROM'];
//CHECKING IF $USER LOGGED IN IS SENT TO OR SENT FROM IN THE FRIEND TABLE
if($sent_to1==$user_login){
	$users_friends1=$sent_from1;
}
else{
	$users_friends1=$sent_to1;
}
//GETTING USERS INFO FROM THE USER TABLE
$sql12='SELECT *FROM users WHERE USERNAME="'.$users_friends1.'"';
$stmt12=$dbh->prepare($sql12);
$stmt12->execute();
$get_info2=$stmt12->fetch(PDO::FETCH_ASSOC);
$contacts_fr1=$get_info2["CONTACTS"];

//getting all contact;
while($get_result=$stmt->fetch(PDO::FETCH_ASSOC)){
$sent_id=$get_result['ID'];
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
$contacts_fr=$get_info["CONTACTS"];


				if(empty($contacts_fr)){
					//echo "None of your friends has inserted there add there contact to there profile yet!!";
				}
				else{
				//	$textarea=test_input($_POST['contact-textarea']);
				//	echo strpos($textarea,$contacts_fr);
				if(empty($_POST['contact-textarea'])){
					//just paste or echo
					if($num_row==1){
						echo test_input($contacts_fr);
					}
					else{
						$textarea=test_input($_POST['contact-textarea']);
						if(strpos($textarea,$contacts_fr)==0){
							$contact1=$contacts_fr;
						//echo it in text field
						$cont_user=$contact1;
						if($cont_user==$users_friends1){
							
						}
						else{
							$cont1=",".$cont_user;
							echo $contacts_fr1.$cont1;
						}
						}
						else{
							// don noting to avoid duplication
							//echo $textarea;
						}
						
					}
					
					}
				else{
					$contact1=$contacts_fr;
						//echo it in text field
						//echo ",".$contact1;
					$textarea=test_input($_POST['contact-textarea']);
						if(strpos($textarea,$contacts_fr)==0){
						//echo it in text field
						echo $textarea.",".$contact1;
						
						
						}
						else{
							// don noting to avoid duplication
							echo $textarea;
						}
				}
				}

		}
		//end of while loop
		//echo ",".$textarea;
	}
}
	}	
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>