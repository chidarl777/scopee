<?php
try{

//GETTING SMS PRICING
$sql_sms=$dbh->prepare("SELECT *FROM sms_plan WHERE removed='no'");
$sql_sms->execute();

$num_sql_sms=$sql_sms->rowCount();
if($num_sql_sms>0){
	while($sms_plan=$sql_sms->fetch(PDO::FETCH_ASSOC)){
		$unit_price=$sms_plan['unit_price'];
		$unit_range=$sms_plan['unit_range'];
		
		echo "<tr>
			<td>$unit_range</td>
			<td>$unit_price</td>
		</tr>";
	}
}
	}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}