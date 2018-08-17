<?php
try{
	
if(isset($_POST['read_msg'])){
//GETTING READ MESSAGE FROM MESSAGE TABLE WHERE USERNAME=USER_LOGIN AND OPENED=YES
$sql=$dbh->prepare("SELECT *FROM message_tbl WHERE USERNAME=$user_login AND OPENED='YES' AND REMOVED='NO'");
$sql->execute();
//CHECK THE NUMBER OF MSG RETURNED
$num_row=$sql->rowCount();
if($num_row==0){
	$read_msg="You have not read message yet";
}
else{
	
	do{
		//GETTING THE USERS INFORMATION FROM THE USERS TABLE
		$stmt=$dbh->prepare("SELECT FIRST_NAME,OTHER_NAME,PROFILE_PIC FROM user WHERE USERNAME=$user_login");
	//PUTTING INFOMATION OF USER_LOGIN IN AN ARRAY
    // $get_info=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    // $Firstname=$get_info['FIRST_NAME'];
    // $Othername=$get_info['OTHER_NAME'];
    // $Profile_pic=$get_info['PROFILE_PIC']
	}
	//FETCHING THE MESSAGES IN AN array an
    while($get_message=$sql->setFetchMode(PDO::FETCH_ASSOC)){
$id=$get_message['id'];
$firstname=$get_info['FIRST_NAME'];
$othername=$get_info['OTHER_NAMES'];
$profilepic=$get_info['PROFILE_PIC'];
$message=$get_message['MESSAGE'];
$time=$get_message['TIME_SENT'];
$date=$get_message['DATE_SENT'];
$opened=$get_message['OPENED'];
$deleted=$get_message['REMOVED'];
	}
}
}
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}
?>