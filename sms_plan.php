<?php

try{
	
 if(isset($_POST['send-sms'])){
 	
 	//get option for the user
 	//the want to send to followers
 	//or contact or phone book imported
 	//checking plan active and amount remaining
 	
 	//GETTING USER FOLLOWERS
 	if(!empty($_POST['follower'])){
		$sql_follower=$dbh->prepare('SELECT *FROM follow_tbl WHERE USER_FOLLOWED="'.$user_login.'" AND FOLLOWED="YES" AND UNFOLLOWED="NO"');
		$sql_follower->execute();
		$num_sql_follower=$sql_follower->rowCount();
		
		if($num_sql_follower>0){
			while($fetch_followers=$sql_follower->fetch(PDO::FETCH_ASSOC)){
				$follower=$fetch_followers['FOLLOWER'];
				
				//GETTING FOLLOWERS CONTACT
				$sql_f_contact=$dbh->prepare('SELECT *FROM users WHERE USERNAME="'.$follower.'" AND REMOVED="NO"');
				$follow_contact=$sql_f_contact->fetch(PDO::FETCH_ASSOC);
				$follower_contact=$follow_contact['CONTACTS'];
			}
		}
		else{
			$error="You have not yet been followed at they moment";
		}
	}
 	elseif(!empty($_POST['import-contacts'])){
		//GETTING IMPORTED USERS CONTACT
		$contact=count($phone_contacts);
		for($i=1; $i<$contact, $i++){
			if($i==$contact){
				$num_contact=$i;
			}
		}
		
	}
	elseif(!empty($_POST['both-sms-opt'])){
		//copy both above and paste here
		
	}
	
	if(empty($sms_error)){
		
 	$sql_plan=$dbh->prepare('SELECT *FROM sms_plan WHERE username="'.$user_login.'" AND active="yes"');
 	$sql_plan->execute();
 	//number of rows returned
 	$num_sql_plan=$sql_plan->rowCount();
 	
 	if($num_sql_plan>0){
		//echo active plan
		
		while($fetch_plan=$sql_plan->fetch(PDO::FETCH_ASSOC)){
			$plan_name=$fetch_plan['name'];
			$amount_subscribe=$fetch_plan['amount_subscribed'];
			$plan_type=$fetch_plan['type'];
			$amount_remaining=$fetch_plan['amount_remaining'];
			$amt_per_sms=$fetch_plan['amt_per_sms'];
			$plan_tracker=$fetch_plan['tracker'];
			$plan_date=$fetch_plan['date'];
			
			//getting amount for all contact
			$sms_amt=$amt_per_sms * $num_contact;
			
			if($amount_remaining>=$sms_amt){
				//send sms to contact
			}
			else{
				// echo amount remaining not sufficient to send sms
			}
		}
	}
	else{
		//echo no plan active
		//the user will be charged at reqular rate
		//with  peecoin
	}
 }
 }
 }
catch(PDOException $errors){
	echo ("error".$errors->getMessage());
}	
?>