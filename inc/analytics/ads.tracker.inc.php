<?php
if(empty($user_login)){
	// do nothing 
}
else{

if(isset($_POST['ads'])){
//check ads cookie
//if exists
// check adresses
//if matched do norhing
//else
//create cookie
//insert into db postby clickfrom macadress cookie date clicked  ads url
//credit post by

	try{

if(isset($_COOKIE["$cookie_name"])){
	//COOKIE EXIST GET COOKIE
	$cookie_name=$_COOKIE["$cookie_name"];
	$cookie_val=$_COOKIE["$cookie_value"];
	$cookie_time=$_COOKIE["$cookie_time"];
	//SELECT COOKIE VALUE FROM ADS TRACK TABLE
	require("inc/db/config.php");
	$sql_cookie=$dbh->prepare('SELECT *FROM ads_tracker WHERE CLICK_FROM="'.$user_login.'" AND COOKIE_VALUE="'.$cookie_val.'" AND IP_ADRESS="'.$ip_address.'" AND ADS_URL="'.$url.'" OR CLICK_FROM="'.$user_login.'" AND IP_ADRESS="'.$ip_address.'" AND ADS_URL="'.$url.'" OR COOKIE_VALUE="'.$cookie_val.'" AND IP_ADRESS="'.$ip_address.'" AND ADS_URL="'.$url.'" OR IP_ADRESS="'.$ip_address.'" AND ADS_URL="'.$url.'"');
	$sql_cookie->execute();
	$ads_num_row=$sql_cookie->rowCount();
	//numberof rows returned
	if($ads_num_row>0){
		//insert user in fraud _tbl to no how many time the user has clicked the same ads
		$fraud_check=$dbh->prepare('SELECT *FROM fraud_tbl WHERE CLICK_FROM="'.$user_login.'" AND COOKIE_VALUE="'.$cookie_val.'" AND IP_ADRESS="'.$ip_address.'" AND ADS_URL="'.$url.'" OR CLICK_FROM="'.$user_login.'" AND IP_ADRESS="'.$ip_address.'" AND ADS_URL="'.$url.'" OR COOKIE_VALUE="'.$cookie_val.'" AND IP_ADRESS="'.$ip_address.'" AND ADS_URL="'.$url.'" OR IP_ADRESS="'.$ip_address.'" AND ADS_URL="'.$url.'"');
		$fraud_check->execute();
		//to get the number of fraud attempt by that user
		$num_fraud=$fraud_check->rowCount();
		
		//IF THE USER HAS CLICKED ON THE ADWORD MORE THAN FIVE TIME
	if($num_fraud>3){
 $no_of_clicks=$num_fraud;
			$fraud_report_sql=$dbh->prepare("INSERT INTO fraud_report(FRAUD_FROM,NO_OF_CLICKS,DATE_reported,IP_ADDRESS) VALUES(:fraud_from,:no_of_clicks,:date_reported,:ip_address)");
			
			$STM_FRAUD_REPORT=$fraud_report_sql;
		
		$STM_FRAUD_REPORT->bindParam(":fraud_from",$user_login);
		$STM_FRAUD_REPORT->bindParam(":no_of_clicks",$no_of_clicks);
		$STM_FRAUD_REPORT->bindParam(":ip_address",$ip_address);
		$STM_FRAUD_REPORT->bindParam(":date_reported",$date);
		
		
		$STM_FRAUD_REPORT->execute();
			
		}
		//inserting Attempt by user into fraud tbl
			$sql_insert_fraud=$dbh->prepare('INSERT INTO fraud_tbl (POST_BY,CLICK_FROM,IP_ADDRESS,COOKIE_VALUE,ADS_URL,DATE_CLICKED) VALUES(:post_by,:click_from,:ip_address,:cookie_value,:ads_url,:date_clicked)');
		
		$STM_FRAUD=$sql_insert_fraud;
		
		$STM_FRAUD->bindParam(":post_by",$post_by);
		$STM_FRAUD->bindParam(":click_from",$user_login);
		$STM_FRAUD->bindParam(":ip_address",$ip_address);
		$STM_FRAUD->bindParam(":cookie_value",$cookie_val);
		$STM_FRAUD->bindParam(":ads_url",$ads_url);
		$STM_FRAUD->bindParam(":date_clicked",$date);
		$STM_FRAUD->execute();
	}
	else{
		//FIELD CLICKE
		//register ads click in my database
		$sql_insert_ads=$dbh->prepare('INSERT INTO ads_tracker (POST_BY,CLICK_FROM,ip_address,COOKIE_VALUE,ADS_URL,DATE_CLICKED) VALUES(:post_by,:click_from,:ip_address,:cookie_value,:ads_url,:date_clicked)');
		
		$STM=$sql_insert_ads;
		
		$STM->bindParam(":post_by",$post_by);
		$STM->bindParam(":click_from",$user_login);
		$STM->bindParam(":ip_address",$ip_address);
		$STM->bindParam(":cookie_value",$cookie_val);
		$STM->bindParam(":ads_url",$ads_url);
		$STM->bindParam(":date_clicked",$date);
		
		$STM->execute();
		
		//GETTING THE ADS _TRACKER ID OF THE ADS CLICKED
		$sql_get_ads_id=$dbh->prepare('SELECT *FROM ads_tracker WHERE CLICK_FROM="'.$user_login.'" AND POST_BY="'.$post_by.'" AND POST_ID="'.$post_id.'" AND COOKIE_VALUE="'.$cookie_val.'" AND IP_ADRESS="'.$ip_address.'" AND ADS_URL="'.$url.'"');
	$sql_get_ads_id->execute();
	$ads_id_num=$sql_cookie->rowCount();
	if($ads_id_num>0){
	//FETCHING ADS_ID
	$ads_id_result=$sql_get_ads_id->fetch(PDO::FETCH_ASSOC);
	$ads_id=$ads_id_result["ID"];
	
		//INSERT NUT EARNED IN EARNINGS TABLE
		$earned="200";
		$sql_earned=$dbh->prepare("INSERT INTO earnings_tbl (USERNAME,ADS_ID,EARNED,DATE_EARNED) VALUES(:user_earned,:ads_id,:earned,:date_earned)");
		
		$STM_EARNED=$sql_earned;
		
		$STM_EARNED->bindParam(":user_earned",$user_login);
		$STM_EARNED->bindParam(":ads_id",$ads_id);
		$STM_EARNED->bindParam(":earned",$earned);
		$STM_EARNED->bindParam(":date_earned",$date);
		
		$STM_EARNED->execute();
			
	}
	}
	
}
else{
	//THESE MEAN COOKIE HAS NOT BEEN CREATED OR IT IS THE USER FIRST TIME OF CLICKING THE WEBSITE COOKIE
	//create cookie
	//insert into db
		//CODE FOR SETTING COOKIE IN THE USER BROWSER THAT EXPIRE AFTER 1 WEEK
		$cookie_name = substr(base64_encode("Scopeeaninternationsocialmedia"),10,10);
		$s_uname=base64_encode($ip_address);

		$cookie_time=time() + (60*60*24*366);
		$path="/php/";
		$domain='www.scopee.in';
		
$cookie_value =substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"),50,80).round(microtime(true)).$s_uname.substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"),50,80);
 setcookie($cookie_name,$cookie_value,$cookie_time,$path,$domain);

} 

}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
	
	}
		
}
?>