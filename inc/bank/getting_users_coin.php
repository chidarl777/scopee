

<?php

try{
	
	//=======================================================================================================
	//GETTING VALID PEECOIN OF USERS
	//=======================================================================================================
	$sql_coin=$dbh->prepare('SELECT *FROM bank WHERE username="'.$user_login.'"');
	$sql_coin->execute();
	
	$num_sql_coin=$sql_coin->rowCount();
	if($num_sql_coin>0){
		$fetch_sql_coin=$sql_coin->fetch(PDO::FETCH_ASSOC);
		$peecoin=$fetch_sql_coin['coin'];
	}
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}



?>