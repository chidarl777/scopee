<?php
//convert nut to dollar
//get a fixed amount of nut  which is equal to 100 dollar
//check if nut is equal to amount fixed
//get the post that they nut was gotten from 
//show the withdrawal button if nut is equal to or greater than fixed amount

$nut_earn=$nut_to_reach_before_withdrawal="";
$nut_to_reach_before_withdrawal="100000";

//GETTING TOTAL NUMBER OF NUT IN BANK
require("inc/db/config.php");
$check_nut=$dbh->prepare('SELECT *FROM bank WHERE USERNAME='.$user_login.'');
$check_nut->execute();

//GETTING ROW RETURNED
$num_check_nut_1=$check_nut->rowCount();
if($num_row>1){
	//FETCH IN ARRAY
	$num_check_nut=$num_check_nut_1;
	$result_check_nut=$check_nut->fetch(PDO::FETCH_ASSOC);
	$post_adress_id=$result_check_nut["POST_ID"];
	$adress_type=["ADRESS_TYPE"];
	$time_earned=["TIME_EARNED"];
	
}


?>