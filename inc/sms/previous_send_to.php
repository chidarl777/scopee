<?php
try{
	
//if(isset($_POST['previous_send_to'])){
	//check if the user has sent any message before
	//get the send tos
	//check if the send to is the same
	//if not_
	//echo send_to
	
	$user_login4='08033033382';
	
	require('../db/config.php');
		$sql_check_send_too=$dbh->prepare('SELECT *FROM sms_message WHERE POST_BY="'.$user_login4.'" AND REMOVED="NO" ORDER BY "ID" DESC');
	$sql_check_send_too->execute();
	
	$num_send_to=$sql_check_send_too->rowCount();
	echo $num_send_to;
	if($num_send_to>0){
		
		while($fetch_send_too=$sql_check_send_too->fetch(PDO::FETCH_ASSOC)){
			$pre_send_to_sms=$fetch_send_too['SMS_TO'];
			echo $pre_send_to_sms;
			if(empty($pre_send_to_sms)){
				ECHO 'EMPTY';
				}
				else{
						
			$id=$fetch_send_to['ID'];
			echo $pre_send_to_sms;
			
			$ar_send_to=array($pre_send_to_sms);
				echo $ar_send_to[0];
				//echo count($ar_send_to).'<br/>';{
					
				}
				die();
				
			$textarea_send_to='08106624566';
			if(empty($send_to)){
				//do nothing
				//in_array()
			}
			else{
				
			if($send_to==$textarea_send_to){
				//do nothing
				
			}
			else{
				
				//put in array(
				$ar_send_to=array($send_to);
				echo $ar_send_to[0];
				//echo count($ar_send_to).'<br/>';
				die();
				for($i=0;$i<count($ar_send_to);$i++){
					//get individual number
					$ar_single_num=$ar_send_to[0];
					//check individual number
					if(strpos($textarea_send_to,"$ar_single_num")==0){
						$ar_sin_num=$ar_single_num;
						//if not in textare echo number
						if(empty($textarea_send_to)){
							echo $ar_sin_num;
						}
						else{
							echo $textarea_send_to.','.$ar_sin_num.'<br/>';
						}
					}
					else{
						echo 'number exist';
					}
					
				}
			}
			}
		}
	}
	
	
//}
}	
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>