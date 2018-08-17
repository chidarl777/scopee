<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title></title>
<meta name="" content="">
</head>
<body>
<div>
	<form method="post">
		<input type="text" class="input" name="username" placeholder="client username"/><br/>
		<input type="text" class="input" name="sms-plan" placeholder="client plan" /><br/>
		<input type="text" class="input" name="sms-unit" placeholder="client unit"/><br/>
		<input  type="submit" name="update" value="Update"/>
		
	</form>
	
	<?php
	require('inc/check.php');
	if(isset($_POST['update_unit'])){
		
		if(!empty($_POST['username'])){
			$username=test_input($_POST['username']);
			
		}
		else{
			$usernameerr='input empty';
		}
		if(!empty($_POST['sms-plan'])){
			$sms_plan=test_input($_POST['sms-plan']);
			
		}
		else{
			$sms_planerr='input empty';
		}
		if(!empty($_POST['sms-unit'])){
			$sms_unit=test_input($_POST['sms-unit']);
			
		}
		else{
			$sms_uniterr='input empty';
		}
		
		if(empty($error)){
			require('inc/db/config.php');
			$sql_unit=$dbh->prepare('SELECT *FROM users WHERE USERNAME="'.$username.'"');
			$sql_unit->execute();
			$num_sql_unit=$sql_unit->rowCount();
			
			if($num_sql_unit>0){
				$fetch_user_unit=$sql_unit->fetch(PDO::FETCH_ASSOC);
				$unit=$fetch_user_unit['SMS_UNIT'];
				
				//SELECTING FROM PLAN TABLE
				$sql_plan=$dbh->prepare('SELECT *FROM sms_plan WHERE REMOVED="NO"');
				$sql_plan->execute();
				$fetch_plan=$sql_plan->fetch(PDO::FETCH_ASSOC);
				$name=$fetch_plan['name'];
				$highest_amount=$fetch_plan['highest'];
				$lowest_amount=$fetch_plan['lowest'];
				$unit_price=$fetch_plan['unit_price'];
				
				if($amount_paid>$lowest && $amount_paid<$highest){
					$unit_paid=$amount_paid/$unit_price;
				
				//INSERTS UNIT IN UNIT TABLE
				
				$insert_world_post='INSERT INTO buy_unit(username,amount_paid,sms_unit,date,comfirmed,unit_remaining,unit_paid) VALUES(:username,:amount_paid,:sms_unit,:date,:comfirmed,:unit_remaining,:unit_paid)';
		$STM=$dbh->prepare($insert_world_post);
	$STM->bindParam(":username",$username);
	$STM->bindParam(":amount_paid",$amount_paid);
	$STM->bindParam(":unit_paid",$unit_paid);
	$STM->bindParam(":date",$date);
	$STM->bindParam(":comfirmed",$comfirmed);
	$STM->bindParam(":unit_remaining",$unit_remaining);
	$STM->execute();
	
	$user_new_unit=$unit_paid+$unit_remaining;
	//UPDATE USERS UNIT
	$unit_update=$dbh->prepare('UPDATE users SET SMS_UNIT="'.$user_new_unit.'" WHERE USERNAME="'.$username.'"');
	$unit_update->execute();
	}
			}
			else{
				echo('USERNAME NOT FOUND');
			}
		}
		
	}
	 ?>
</div>
</body>
</html>