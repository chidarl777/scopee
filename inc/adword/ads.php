<?php
//if admin
//get post information
if(isset($_GET['ads_tkr'])){


try{
	require('inc/db/config.php');
	//checking if user_login is admin
	$sql_admin=$dbh->prepare('SELECT *FROM admin WHERE email="'.$user_login.'"');
	$sql_admin->execute();
	
	$num_sql_admin=$sql_admin->rowCount();
	
	if($num_sql_admin>0){
			
//CHECKING IF USER HAS CLICKED ON THAT ADS BEFORE
$sql_check_ads=$dbh->prepare('SELECT *FROM bank WHERE clicked_from="'.$clicked_from.'" AND ads_address="'.$ads.'" AND valid="yes"');
$sql_check_ads->execute();

$num_sql_check_ads=$sql_check_ads->rowCount();
if($num_sql_check_ads==0){


//inserting data into ads table

$date=Date('Y-m-d h:i:s a');
$sql_ads=$dbh->prepare('INSERT INTO bank (posted_by,clicked_from,ads_address,date_clicked) VALUES(:post_by,:clicked_from,:ads_address,:date_clicked)');
$sql_ads->bindParam(":post_by",$posted_from); 
     $sql_ads->bindParam(":clicked_from",$clicked_from);
	$sql_ads->bindParam(":ads_address",$ads);
	$sql_ads->bindParam(":date_clicked",$date);
	$sql_ads->execute();
	

	}
	else{
		//do nothing
	}
	}
	else{
		
	}


		
}

}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
	}
?>