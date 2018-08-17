<?php
//check ads cookie
//if exists
// check adresses
//if matched do norhing
//else
//create cookie
//insert into db postby clickfrom macadress cookie date clicked  ads url
//credit post by
if(empty($user_login)){
	// do nothing 
}
else{

if(isset($_POST['ads'])){
	
	try{
  function get_client_ip(){
		$ip_address="";
		if(getenv('HTTP_CLIENT_IP')){
			$ip_address=getenv('HTTP_CLIENT_IP');
		}
		elseif(getenv('REMOTE_ADDR')){
			$ip_address=getenv('REMOTE_ADDR');
		}
		elseif(getenv('HTTP_X_FORWARDED_FOR')){
			$ip_address=getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif(getenv('HTTP_X_FORWARDED')){
			$ip_address=getenv('HTTP_X_FORWARDED');
		}
		
		else{
			$ip_address='UNKNOWN';
			 
		}
		return $ip_address;
	}
	
	$ip_address=get_client_ip();

require("inc/db/config.php");
	$url='network.com';
	$post_by='samuel134';
	$post_id='1';
	$category='world';
	$post_tracker="idsldl";
	
	//CHECKING IF  COOKIE ARE ENABLE
setcookie("test_cookie", "test", time() + 3600, '/');
if(count($_COOKIE) > 0) {
    echo "Cookies are enabled.";
} else {
    echo "Cookies are disabled.";
}


$cookie_name="diwredng";


		
if(isset($_COOKIE[$cookie_name])) {
	echo 'success cookie is set';
	//SELECT COOKIE VALUE FROM ADS TRACK TABLE
	//if clickfrom is  equal to post_by
	
	if($user_login==$post_by){
		echo  "<script>alert('<div style='color:red;'>YOU ARE NOT ALLOWED TO CLICK ADVERT IN POST POSTED BY YOU</div>');</script>";
	}
	else{
	
	$sql_cookie=$dbh->prepare('SELECT *FROM ads_tracker WHERE CLICK_FROM="'.$user_login.'" AND COOKIE_VALUE="'.$cookie_value.'" AND IP_ADDRESS="'.$ip_address.'" AND ADS_URL="'.$url.'" OR CLICK_FROM="'.$user_login.'" AND IP_ADDRESS="'.$ip_address.'" AND ADS_URL="'.$url.'" OR COOKIE_VALUE="'.$cookie_value.'" AND IP_ADDRESS="'.$ip_address.'" AND ADS_URL="'.$url.'" OR IP_ADDRESS="'.$ip_address.'" AND ADS_URL="'.$url.'"');
	$sql_cookie->execute();
	$ads_num_row=$sql_cookie->rowCount();
	//numberof rows returned
	
	if($ads_num_row>0){
		//insert user in fraud _tbl to no how many time the user has clicked the same ads
		$fraud_check=$dbh->prepare('SELECT *FROM fraud_tbl WHERE FRAUD_FROM="'.$user_login.'" AND COOKIE_VALUE="'.$cookie_value.'" AND IP_ADDRESS="'.$ip_address.'" AND FRAUD_URL="'.$url.'" OR FRAUD_FROM="'.$user_login.'" AND IP_ADDRESS="'.$ip_address.'" AND FRAUD_URL="'.$url.'" OR COOKIE_VALUE="'.$cookie_value.'" AND IP_ADDRESS="'.$ip_address.'" AND FRAUD_URL="'.$url.'" OR IP_ADDRESS="'.$ip_address.'" AND FRAUD_URL="'.$url.'"');
		$fraud_check->execute();
		//to get the number of fraud attempt by that user
		$num_fraud=$fraud_check->rowCount();
		
		//IF THE USER HAS CLICKED ON THE ADWORD MORE THAN FIVE TIME
	if($num_fraud>3){
 $no_of_clicks=$num_fraud;
			$fraud_report_sql=$dbh->prepare("INSERT INTO fraud_report(FRAUD_FROM,FRAUD_URL,POST_ID,IP_ADDRESS,CATEGORY,COOKIE_VALUE,FRAUD_DATE) VALUES(:fraud_from,:fraud_url,:post_id,:ip_address,:category,:cookie_value,:fraud_date,)");
			
			$STM_FRAUD_REPORT=$fraud_report_sql;
		
		$STM_FRAUD_REPORT->bindParam(":fraud_from",$user_login);
		$STM_FRAUD_REPORT->bindParam(":post_id",$post_id);
		$STM_FRAUD_REPORT->bindParam(":fraud_url",$url);
		$STM_FRAUD_REPORT->bindParam(":category",$category);
		$STM_FRAUD_REPORT->bindParam(":cookie_value",$cookie_value);
		$STM_FRAUD_REPORT->bindParam(":ip_address",$ip_address);
		$STM_FRAUD_REPORT->bindParam(":fraud_date",$date);
		
		
		$STM_FRAUD_REPORT->execute();
			
		}
		//inserting Attempt by user into fraud tbl
			$fraud_sql=$dbh->prepare("INSERT INTO fraud_tbl(FRAUD_FROM,FRAUD_URL,POST_ID,IP_ADDRESS,CATEGORY,COOKIE_VALUE,FRAUD_DATE) VALUES(:fraud_from,:fraud_url,:post_id,:ip_address,:category,:cookie_value,:fraud_date)");
			
			$STM_FRAUD=$fraud_sql;
		
		$STM_FRAUD->bindParam(":fraud_from",$user_login);
		$STM_FRAUD->bindParam(":post_id",$post_id);
		$STM_FRAUD->bindParam(":fraud_url",$url);
		$STM_FRAUD->bindParam(":category",$category);
		$STM_FRAUD->bindParam(":cookie_value",$cookie_value);
		$STM_FRAUD->bindParam(":ip_address",$ip_address);
		$STM_FRAUD->bindParam(":fraud_date",$date);
		$STM_FRAUD->execute();
	}
	else{
		//FIELD CLICKE
			//register ads click in my database
		$ads_tracker=$post_tracker.round(microtime(true));
		$sql_insert_ads=$dbh->prepare('INSERT INTO ads_tracker (POST_BY,CLICK_FROM,IP_ADDRESS,COOKIE_VALUE,ADS_URL,ADS_TRACKER,POST_TRACKER,POST_SECTION,DATE_CLICKED) VALUES(:post_by,:click_from,:ip_address,:cookie_value,:ads_url,:ads_tracker,:post_tracker,:post_section:,date_clicked)');
		
		$STM=$sql_insert_ads;
		
		$STM->bindParam(":post_by",$post_by);
		$STM->bindParam(":click_from",$user_login);
		$STM->bindParam(":ip_address",$ip_address);
		$STM->bindParam(":cookie_value",$cookie_value);
		$STM->bindParam(":ads_url",$url);
		$STM->bindParam(":ads_tracker",$ads_tracker);
		$STM->bindParam(":post_tracker",$post_tracker);
		$STM->bindParam(":post_section",$category);
		$STM->bindParam(":date_clicked",$date);
		
		$STM->execute();
		
		//GETTING THE ADS _TRACKER ID OF THE ADS CLICKED
		$sql_get_ads_id=$dbh->prepare('SELECT ID FROM ads_tracker WHERE CLICK_FROM="'.$user_login.'" AND POST_BY="'.$post_by.'" AND POST_ID="'.$post_id.'" AND COOKIE_VALUE="'.$cookie_val.'" AND IP_ADDRESS="'.$ip_address.'" AND ADS_URL="'.$url.'"');
	$sql_get_ads_id->execute();
	$ads_id_num=$sql_cookie->rowCount();
	if($ads_id_num>0){
	//FETCHING ADS_ID
	$ads_id_result=$sql_get_ads_id->fetch(PDO::FETCH_ASSOC);
	$ads_id=$ads_id_result["ID"];
	
		//INSERT NUT EARNED IN EARNINGS TABLE
		$earned="250";
		$sql_earned=$dbh->prepare("INSERT INTO earnings_tbl (USERNAME,ADS_ID,POST_ID,CATEGORY,EARNED,DATE_EARNED) VALUES(:user_earned,:ads_id,:post_id,:category,:earned,:date_earned)");
		
		$STM_EARNED=$sql_earned;
		
		$STM_EARNED->bindParam(":user_earned",$user_login);
		$STM_EARNED->bindParam(":ads_id",$ads_id);
		$STM_EARNED->bindParam(":post_id",$post_id);
		$STM_EARNED->bindParam(":category",$category);
		$STM_EARNED->bindParam(":earned",$earned);
		$STM_EARNED->bindParam(":date_earned",$date);
		
		$STM_EARNED->execute();
			
	}
	}
}
}
else{
		echo "not set";
	//THESE MEAN COOKIE HAS NOT BEEN CREATED OR IT IS THE USER FIRST TIME OF CLICKING THE WEBSITE COOKIE
	//create cookie
	//insert into db
		//CODE FOR SETTING COOKIE IN THE USER BROWSER THAT EXPIRE AFTER 1 WEEK
		
		$s_uname=base64_encode($ip_address);

		$cookie_time=time() + (60*60*24*366);
		$path="/php/";
		$domain='m_scopee';
		
$cookie_value =substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzAmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"),50,50).round(microtime(true)).$s_uname.substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABCD"),50,50);

 setcookie($cookie_name,$cookie_value,$cookie_time,$path,$domain);
 
 
	//SELECT COOKIE VALUE FROM ADS TRACK TABLE
	//if clickfrom is  equal to post_by
	if($user_login==$post_by){
		echo  "<script>alert('<div style='color:red;'>YOU ARE NOT ALLOWED TO CLICK ADVERT IN POST POSTED BY YOU</div>');</script>";
	}
	else{
		
	
	$sql_cookie=$dbh->prepare('SELECT *FROM ads_tracker WHERE CLICK_FROM="'.$user_login.'" AND COOKIE_VALUE="'.$cookie_value.'" AND IP_ADDRESS="'.$ip_address.'" AND ADS_URL="'.$url.'" OR CLICK_FROM="'.$user_login.'" AND IP_ADDRESS="'.$ip_address.'" AND ADS_URL="'.$url.'" OR COOKIE_VALUE="'.$cookie_value.'" AND IP_ADDRESS="'.$ip_address.'" AND ADS_URL="'.$url.'" OR IP_ADDRESS="'.$ip_address.'" AND ADS_URL="'.$url.'"');
	$sql_cookie->execute();
	$ads_num_row=$sql_cookie->rowCount();
	//numberof rows returned
	
	if($ads_num_row>0){
		//insert user in fraud _tbl to no how many time the user has clicked the same ads
		$fraud_check=$dbh->prepare('SELECT *FROM fraud_tbl WHERE FRAUD_FROM="'.$user_login.'" AND COOKIE_VALUE="'.$cookie_value.'" AND IP_ADDRESS="'.$ip_address.'" AND FRAUD_URL="'.$url.'" OR FRAUD_FROM="'.$user_login.'" AND IP_ADDRESS="'.$ip_address.'" AND FRAUD_URL="'.$url.'" OR COOKIE_VALUE="'.$cookie_value.'" AND IP_ADDRESS="'.$ip_address.'" AND FRAUD_URL="'.$url.'" OR IP_ADDRESS="'.$ip_address.'" AND FRAUD_URL="'.$url.'"');
		$fraud_check->execute();
		//to get the number of fraud attempt by that user
		$num_fraud=$fraud_check->rowCount();
		
		//IF THE USER HAS CLICKED ON THE ADWORD MORE THAN FIVE TIME
	if($num_fraud>3){
 $no_of_clicks=$num_fraud;
			$fraud_report_sql=$dbh->prepare("INSERT INTO fraud_report(FRAUD_FROM,FRAUD_URL,POST_ID,IP_ADDRESS,CATEGORY,COOKIE_VALUE,FRAUD_DATE) VALUES(:fraud_from,:fraud_url,:post_id,:ip_address,:category,:cookie_value,:fraud_date)");
			
			$STM_FRAUD_REPORT=$fraud_report_sql;
		
		$STM_FRAUD_REPORT->bindParam(":fraud_from",$user_login);
		$STM_FRAUD_REPORT->bindParam(":post_id",$post_id);
		$STM_FRAUD_REPORT->bindParam(":fraud_url",$url);
		$STM_FRAUD_REPORT->bindParam(":category",$category);
		$STM_FRAUD_REPORT->bindParam(":cookie_value",$cookie_value);
		$STM_FRAUD_REPORT->bindParam(":ip_address",$ip_address);
		$STM_FRAUD_REPORT->bindParam(":fraud_date",$date);
		
		
		$STM_FRAUD_REPORT->execute();
			
		}
		
		//inserting Attempt by user into fraud tbl
			$fraud_sql=$dbh->prepare("INSERT INTO fraud_tbl(FRAUD_FROM,FRAUD_URL,POST_ID,IP_ADDRESS,CATEGORY,COOKIE_VALUE,FRAUD_DATE) VALUES(:fraud_from,:fraud_url,:post_id,:ip_address,:category,:cookie_value,:fraud_date)");
			
			$STM_FRAUD=$fraud_sql;
		
		$STM_FRAUD->bindParam(":fraud_from",$user_login);
		$STM_FRAUD->bindParam(":post_id",$post_id);
		$STM_FRAUD->bindParam(":fraud_url",$url);
		$STM_FRAUD->bindParam(":category",$category);
		$STM_FRAUD->bindParam(":cookie_value",$cookie_value);
		$STM_FRAUD->bindParam(":ip_address",$ip_address);
		$STM_FRAUD->bindParam(":fraud_date",$date);
		$STM_FRAUD->execute();
	}
	else{
		//FIELD CLICKE
			//register ads click in my database
		$ads_tracker=$post_tracker.round(microtime(true));
		$sql_insert_ads=$dbh->prepare('INSERT INTO ads_tracker (POST_BY,CLICK_FROM,IP_ADDRESS,COOKIE_VALUE,ADS_URL,ADS_TRACKER,POST_TRACKER,POST_SECTION,DATE_CLICKED) VALUES(:post_by,:click_from,:ip_address,:cookie_value,:ads_url,:ads_tracker,:post_tracker,:post_section,:date_clicked)');
		
		$STM=$sql_insert_ads;
		
		$STM->bindParam(":post_by",$post_by);
		$STM->bindParam(":click_from",$user_login);
		$STM->bindParam(":ip_address",$ip_address);
		$STM->bindParam(":cookie_value",$cookie_value);
		$STM->bindParam(":ads_url",$url);
		$STM->bindParam(":ads_tracker",$ads_tracker);
		$STM->bindParam(":post_tracker",$post_tracker);
		$STM->bindParam(":post_section",$category);
		$STM->bindParam(":date_clicked",$date);
		
		$STM->execute();
		
		//GETTING THE ADS _TRACKER ID OF THE ADS CLICKED
		$sql_get_ads_id=$dbh->prepare('SELECT ID FROM ads_tracker WHERE CLICK_FROM="'.$user_login.'" AND POST_BY="'.$post_by.'" AND POST_ID="'.$post_id.'" AND COOKIE_VALUE="'.$cookie_value.'" AND IP_ADDRESS="'.$ip_address.'" AND ADS_URL="'.$url.'"');
	$sql_get_ads_id->execute();
	
	$ads_id_num=$sql_get_ads_id->rowCount();
	echo $ads_id_num;
	if($ads_id_num==0){
	//FETCHING ADS_ID
	$ads_id_result=$sql_get_ads_id->fetch(PDO::FETCH_ASSOC);
	//$ads_id=$ads_id_result["ID"];
	echo $ads_id;
	$ads_id=1;
		//INSERT NUT EARNED IN EARNINGS TABLE
		$earned="250";
		$sql_earned=$dbh->prepare("INSERT INTO earnings_tbl (USERNAME,ADS_ID,POST_ID,CATEGORY,EARNED,DATE_EARNED) VALUES(:user_earned,:ads_id,:post_id,:category,:earned,:date_earned)");
		
		$STM_EARNED=$sql_earned;
		
		$STM_EARNED->bindParam(":user_earned",$user_login);
		$STM_EARNED->bindParam(":ads_id",$ads_id);
		$STM_EARNED->bindParam(":post_id",$post_id);
		$STM_EARNED->bindParam(":category",$category);
		$STM_EARNED->bindParam(":earned",$earned);
		$STM_EARNED->bindParam(":date_earned",$date);
		
		$STM_EARNED->execute();
			echo 'successful';
	}
	}
 

} 
}
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
}
}		
}
?>