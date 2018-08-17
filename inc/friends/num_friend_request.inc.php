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
    
    echo $num_row;
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>