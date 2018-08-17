<?php
// CODE FOR CHECKING THE TOTAL NUMBER OF REGISTERED USERS
try{
	require('inc/db/config.php');
$sql_num_users=$dbh->prepare('SELECT *FROM users WHERE REMOVED="NO"');
$sql_num_users->execute();
$num_row_user=$sql_num_users->rowCount();
echo $num_row_user;

}
catch(PDOException $e){
echo ("error".$e->getMessage());

}
?>
