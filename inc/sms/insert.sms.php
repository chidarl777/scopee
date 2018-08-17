<?php
//echo 'sssssssssssss';
//require("../../aut_session.php");
//CODE FOR INSERTING WORLDS POST

try{

$sender_id=$sms_message=$send_to=$sms_unit="";
$error=$sender_iderr=$send_toerr=$sms_messageerr=$smslenerr="";
//if(isset($_POST['publish-post'])){
	if(isset($_POST['send-sms'])){
		
	if(!empty($_POST['sender-id'])){
		$sender_id=test_input($_POST["sender-id"]);
	}
	else{
		$sender_iderr="Add a title to your post";
	}
	
		if(!empty($_POST['contact-textarea'])){
		$send_to=test_input($_POST["contact-textarea"]);
	}
	else{
		$send_toerr="Send to required";
	}
	
	if(!empty($_POST["textmsg-area"])){
		$check_textmsg=test_input($_POST["textmsg-area"]);
		$textmsglen=strlen($check_textmsg);
				///getting the length of message and the unit ot be charge
		

 if($textmsglen<150){
		$sms_unit=1;
		}
	elseif($textmsglen<250){
		$sms_unit=2;
		}
	elseif($textmsglen<304){
		$sms_unit=3;
		}	
	elseif($textmsglen<450){
		$sms_unit=4;
		}	
	elseif($textmsglen<550){
		$sms_unit=5;
		 }
	elseif($textmsglen<650){
		$sms_unit=6;
		} 
	elseif($textmsglen<750){
		$sms_unit=7;
		} 	
	elseif($textmsglen<850){
		$sms_unit=8;
		} 
	elseif($textmsglen<950){
		$sms_unit=9;
		} 
	elseif($textmsglen<1050){
		$sms_unit=10;	
		}
	else{
		$smslenerr="Maximun length per sms to send is 1050 <br/>While your message length = $textmsglen";
		}

		
	}
	else{
		$sms_messageerr="Content area cannot be empty";
	}

//$time=date('h:i:s a');
$date=date('Y-m-d h:i:s a');

	require("inc/db/config.php");
	if(empty($error)){
		
		
		$world_id_w=$_SESSION['world_id'];
		$sms_message=$check_textmsg;
		
			//getting world name
			$get_world=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$user_login.'" AND ID="'.$world_id_w.'"');
			
		$get_world->execute();
		$fetch_world=$get_world->fetch(PDO::FETCH_ASSOC);
		$world_name=$fetch_world['WORLD_NAME'];
		$world_adress=$fetch_world['WORLD_ADRESS'];
		$created_by=$fetch_world['CREATED_BY'];
		
		//CHECKING USERS SMS UNIT
		$sql_unit=$dbh->prepare('SELECT SMS_UNIT FROM users where USERNAME="'.$user_login.'" AND REMOVED="NO" ');
		$sql_unit->execute();
		$num_sql_unit=$sql_unit->rowCount();
		if($num_sql_unit>0){
			$fetch_sql_unit=$sql_unit->fetch(PDO::FETCH_ASSOC);
			
			$user_sms_unit=$fetch_sql_unit['SMS_UNIT'];
			
			//CHECKING IF USERS SMS UNIT IS A ENOUGH TO SEND SMS FOR SMS LEN
			if($user_sms_unit<$sms_unit){
				$sms_uniterr='Not Enough Unit to Send SMS';
				echo "<script>
					alert('$sms_uniterr');
				</script>";
			}
			else{
				$r=array($send_to);
				echo count($r);
				//GETTING THE NUMBER OF USERS TO SEND THE SMS TO 
				$send_to_r=str_replace(',','#$%^,',$send_to);
				//echo $send_to_r;
			$no_sent_to1=str_word_count($send_to_r,0,',');
			$no_sent_to=$no_sent_to1+1;
			//GETTING THEY NUMBER OF UNIT TO BE SUBSTRACTED
			$sms_unit_used=($no_sent_to*$sms_unit);
			
		//INSERT DATA
		
		//$save="NO";
		$post_tracker1=mt_rand(1000000000,10000000000000000);
		$encode1_username=str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		$encode_username=substr($encode1_username,5,15);
		$post_tracker="sms".round(microtime(true)).$encode_username.$post_tracker1;
		$publish="YES";
		
		$insert_world_post='INSERT INTO sms_message (POST_BY,POST_TRACKER,CATEGORY_ID,SENDER_ID,SMS_TO,NO_OF_SEND_TO,SMS_MESSAGE,DATE_POSTED,PUBLISHED,DATE_PUBLISHED,SMS_UNIT,SMS_LENGTH) VALUES(:post_by,:post_tracker,:category_id,:sender_id,:sms_to,:no_send_to,:sms_message,:date_posted,:published,:date_published,:sms_unit,:sms_length)';
		$STM=$dbh->prepare($insert_world_post);
	$STM->bindParam(":post_by",$user_login);
	$STM->bindParam(":post_tracker",$post_tracker);
	$STM->bindParam(":category_id",$world_id_w);
	$STM->bindParam(":sender_id",$sender_id);
    $STM->bindParam(":sms_to",$send_to);
	$STM->bindParam(":sms_message",$sms_message);
	$STM->bindParam(":date_posted",$date);
	$STM->bindParam(":sms_unit",$sms_unit);
	$STM->bindParam(":no_send_to",$no_sent_to);
	$STM->bindParam(":sms_length",$textmsglen);
	$STM->bindParam(":published",$publish);
	$STM->bindParam(":date_published",$date);
	$STM->execute();
	
	//updating users sms unit table
	
	$user_new_unit=$user_sms_unit-$sms_unit_used;
	//UPDATE USERS UNIT
	$unit_update=$dbh->prepare('UPDATE users SET SMS_UNIT="'.$user_new_unit.'" WHERE USERNAME="'.$user_login.'"');
	$unit_update->execute();
  
    echo '<script>
         document.location.href ="http://api.ibulky.com/sendsms/?apikey=ccade003aea23aa6c5461541-da2a36e&sender='.$sender_id.'&recipient='.$send_to.'&message='.$sms_message.'&msgtype=text&delivery=no";
</script>';
	//echo 'SUCCESSFUL';
	
	unset($_SESSION['use-number']);
	}
			
		}
	
	}	
	else{
		echo 'error occur';
	}
		
		}
			}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
//}
?>