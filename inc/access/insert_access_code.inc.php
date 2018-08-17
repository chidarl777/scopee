<?php
//CODE FOR INSERTING ACCESS CODE
 try{
 	$new_access_code=$new_access_comment="";
 		$error=$new_access_codeerr=$new_access_commenterr="";
 	if(isset($_POST['submit-access-code'])){
 		require_once('inc/check.php');
 		
 		if(!empty($_POST['new-access-code'])){
			
		$new_access_code=test_input($_POST['new-access-code']);
		}
		else{
			$new_access_codeerr='Input field empty';
		}
		if(!empty($_POST['new-access-comment'])){
			
		$new_access_comment=test_input($_POST['new-access-comment']);
		}
		else{
			$new_access_commenterr='Input field empty';
		}
		
		if(empty($error)){
			$date=date('Y-m-d H:i:s');
			$category=$category_w;
			$category_id=$world_id_w;
			
			$sql_add_code=$dbh->prepare('SELECT *FROM access WHERE username="'.$user_login.'" and category="'.$category.'" and category_id="'.$category_id.'" and access_code="'.$new_access_code.'" and removed="NO"');
			$sql_add_code->execute();
			$num_sql_add_code=$sql_add_code->rowCount();
			
			if($num_sql_add_code>0){
				$new_access_codeerr='Access code already exist for these world';
			}
			else{
				//inserting access code
				
				
				$ins_acc_code=$dbh->prepare('INSERT INTO access (username,category,category_id,access_code,comment,date) VALUE(:username,:category,:category_id,:access_code,:comment,:date)');
	$ins_acc_code->bindParam(":username",$user_login);
	$ins_acc_code->bindParam(":category",$category);
	$ins_acc_code->bindParam(":category_id",$category_id);
	$ins_acc_code->bindParam(":access_code",$new_access_code);
	$ins_acc_code->bindParam(":comment",$new_access_comment);
	$ins_acc_code->bindParam(":date",$date);
	$ins_acc_code->execute();
	
			}
		}
	}
 }
 catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>