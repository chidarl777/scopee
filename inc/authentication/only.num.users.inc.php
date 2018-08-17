<?php
//SHOW ONLY THE NUMBER OF USERS

require("inc/db/config.php");

$get_users=$dbh->prepare('SELECT *FROM users WHERE REMOVED="NO"');
$get_users->execute();
$num_get_users=$get_users->rowCount();

if($num_get_users>0){
	
	echo "<h4>Over ".$num_get_users." Users</h4>";
}
?>