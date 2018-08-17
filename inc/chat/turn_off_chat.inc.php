<?php 
require("../aut_session.inc.php");


if(isset($_POST['turn_off_chat'])){
	try{
require("../db/config.php");
  $date=Date('Y-m-d h:i:s a');
//UPDATING THE ACTIVE LOG TABLE IF THE USER CLICKS THE LOG OUT LINK
$SQL=$dbh->prepare('UPDATE active_log SET TURNED_OFF="YES",DATE_TURNED_OFF="'.$date.'" WHERE USERNAME="'.$user_login.'"');
$SQL->execute();

   echo'<input type="submit" name="turn_on_chat" value="TURN ON CHAT" />';
}
catch(PDOException $e){
echo ("error".$e->getMessage());

}
}

//code for turning on chat
elseif(isset($_POST['turn_on_chat'])){
	try{
require("../db/config.php");
  $date=Date('Y-m-d h:i:s a');
//UPDATING THE ACTIVE LOG TABLE IF THE USER CLICKS THE LOG OUT LINK
$SQL=$dbh->prepare('UPDATE active_log SET TURNED_OFF="NO",DATE_TURNED_OFF="'.$date.'" WHERE USERNAME="'.$user_login.'"');
$SQL->execute();

echo '<input type="submit" name="turn_off_chat" value="TURN OFF CHAT" />';

}
catch(PDOException $e){
echo ("error".$e->getMessage());

}
}
else{
if(isset($_POST['turn_off_chat'])){
	try{
require("inc/db/config.php");
  $date=Date('Y-m-d h:i:s a');
//UPDATING THE ACTIVE LOG TABLE IF THE USER CLICKS THE LOG OUT LINK
$SQL=$dbh->prepare('UPDATE active_log SET TURNED_OFF="YES",DATE_TURNED_OFF="'.$date.'" WHERE USERNAME="'.$user_login.'"');
$SQL->execute();

   echo'<input type="submit" name="turn_on_chat" value="TURN ON" />';
}
catch(PDOException $e){
echo ("error".$e->getMessage());

}
}	
}
?>
