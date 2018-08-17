<?php
try{
	
if(isset($_POST['contact-followers'])){
	//require('inc/check.php');
	require("inc/db/config.php");
	$world_id=$_SESSION['world_id'];

	$sql_fol=$dbh->prepare('SELECT *FROM follow_worlds WHERE WORLD_ID="'.$world_id.'" AND WORLD_ADRESS="'.$world_address.'" AND FOLLOWED="YES" AND UNFOLLOWED="NO"');
	$sql_fol->execute();
	$num_sql_fol=$sql_fol->rowCount();
	
	if($num_sql_fol>0){
		
		$fetch_fol1=$sql_fol->fetch(PDO::FETCH_ASSOC);
		$world_fol1=$fetch_fol1['FOLLOWER'];
			
			//GETTING USER CONTACT FROM THE USERS TABLE
			
			$sql_info1=$dbh->prepare('SELECT *FROM users WHERE USERNAME="'.$world_fol1.'" AND REMOVED="NO"');
			$sql_info1->execute();
			$fetch_info1=$sql_info1->fetch(PDO::FETCH_ASSOC);
			$contacts12=$fetch_info1['CONTACTS'];
				
			if(empty($contacts12)){
					//echo "None of your friends has inserted there add there contact to there profile yet!!";
				}
				else{
					$contacts2=$contacts12;
					}
			
		while($fetch_fol=$sql_fol->fetch(PDO::FETCH_ASSOC)){
			$world_fol=$fetch_fol['FOLLOWER'];
			
				
			//GETTING USER CONTACT FROM THE USERS TABLE
			
			$sql_info=$dbh->prepare('SELECT *FROM users WHERE USERNAME="'.$world_fol.'" AND REMOVED="NO"');
			$sql_info->execute();
			$num_sql_info=$sql_info->rowCount();
			
			if($num_sql_info>0){
				$fetch_info=$sql_info->fetch(PDO::FETCH_ASSOC);
				$contacts=$fetch_info['CONTACTS'];
				
				if(empty($contacts)){
					//echo "None of your friends has inserted there add there contact to there profile yet!!";
				}
				else{
					
				if(empty($_POST['contact-textarea'])){
					//just paste or echo
					if($num_sql_fol==1){
						echo test_input($contacts);
					}
					else{
						$textarea=test_input($_POST['contact-textarea']);
						if(strpos($textarea,$contacts)==0){
							$contact1=$contacts;
						//echo it in text field
						if($contacts2=$contacts1){
							// don nothing
						}
						else{
							$cont_fol=",".$contact1;
							echo $contacts2.",".$cont_fol;
						}
						}
						else{
							// don noting to avoid duplication
						}
						
					}
					
					}
				else{
					$textarea=test_input($_POST['contact-textarea']);
					if(strpos($textarea,$contacts)==0){
						//echo it in text field
						echo $textarea.",".$contacts;
						
						}
						else{
							echo $textarea;
						}
						
				}
			}
			
		}
	}
	}
	else{
				//echo 'no followers at the moment';
			}
}
	}	
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>