<?php
try{
	session_start();
echo 'i love you';
$ads=$_POST['ads'];

$clicked_from='ytrytryryt';
$posted_from='uuuuuu';

if($clicked_from==$posted_from){
	
}
else{
	require('inc/db/config.php');
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
	
	echo 'inserted';
	unset($_SESSION['ads']);
	}
	else{
		//do nothing
	}
		
}

}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>