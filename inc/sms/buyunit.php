<?php
try{
	if(isset($_POST["send-amt-unit"])){
		
if(!empty($_POST['amt-to-pay'])){
			$amount_paid=test_input($_POST['amt-to-pay']);
			
		}
		else{
			$amount_paid='input empty';
		}
		
		
		if(empty($error)){
			require('inc/db/config.php');
			$sms_unit_username=$user_login;
			$sql_unit=$dbh->prepare('SELECT *FROM users WHERE USERNAME="'.$sms_unit_username.'"');
			$sql_unit->execute();
			$num_sql_unit=$sql_unit->rowCount();
		
			if($num_sql_unit>0){
				$fetch_user_unit=$sql_unit->fetch(PDO::FETCH_ASSOC);
				$unit_remaining=$fetch_user_unit['SMS_UNIT'];
				$user_bank=$fetch_user_unit['BANK'];
				
				if($amount_paid>$user_bank){
					echo '<div style="background-color: #c6f06f; color:#ff0000; font-size: 17px; font-weight: bold;">You do not have enough fund to buy sms unit <br/>
please refill your wallet and try again!!!
</div>';
echo "
<script>
	alert('Insufficient fund to buy sms unit');
</script>";
				}
				else{
					
				//SELECTING FROM PLAN TABLE
				$sql_plan=$dbh->prepare('SELECT *FROM sms_plan WHERE removed="no"');
				$sql_plan->execute();
				$fetch_plan=$sql_plan->fetch(PDO::FETCH_ASSOC);
				$name=$fetch_plan['name'];
				$highest_amount=$fetch_plan['highest_range'];
				$lowest_amount=$fetch_plan['lowest_range'];
				$unit_price=$fetch_plan['unit_price'];
				
				if($amount_paid>$lowest_amount && $amount_paid<$highest_amount){
					$unit_paid=$amount_paid/$unit_price;
					
					$sms_total_unit=$unit_paid+$unit_remaining;
				
				//INSERTS UNIT IN UNIT TABLE
				$comfirmed='yes';
				$insert_world_post='INSERT INTO buy_sms_unit(username,amount_paid,sms_total_unit,date,comfirmed,unit_remaining,unit_paid) VALUES(:username,:amount_paid,:sms_total_unit,:date,:comfirmed,:unit_remaining,:unit_paid)';
		$STM=$dbh->prepare($insert_world_post);
	$STM->bindParam(":username",$sms_unit_username);
	$STM->bindParam(":amount_paid",$amount_paid);
	$STM->bindParam(":unit_paid",$unit_paid);
	$STM->bindParam(":sms_total_unit",$sms_total_unit);
	$STM->bindParam(":date",$date);
	$STM->bindParam(":comfirmed",$comfirmed);
	$STM->bindParam(":unit_remaining",$unit_remaining);
	$STM->execute();
	
	$user_new_unit=$unit_paid+$unit_remaining;
	$new_bank_amt=$user_bank-$amount_paid;
	//UPDATE USERS UNIT
	$unit_update=$dbh->prepare('UPDATE users SET SMS_UNIT="'.$user_new_unit.'",BANK="'.$new_bank_amt.'" WHERE USERNAME="'.$sms_unit_username.'"');
	$unit_update->execute();
	
	echo '<div style="background-color: #2ebd2b; color:#ffffff; box-shadow: 10px 10px 5px #888888; border:none; font-size: 17px; font-weight: bold; padding:4px; border-radius:5px; margin-bottom:10px;">Your transaction was Successfully complete <br/>
	Please refresh the page to view updated unit amount;
</div>';
echo "
<script>
	alert('Transaction Successful');
</script>";
	
	}
				}
			}
			
			else{
				echo('USERNAME NOT FOUND');
			}
			}
		}
		
	}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}