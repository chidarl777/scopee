<?php

//CODE FOR removing ACCESS CODE
 try{
 		$update_access_code=$update_access_comment="";
 		$error=$update_access_codeerr=$update_access_commenterr="";
 	if(isset($_POST["remove-$access_code"])){
 		
			$category=$category_w;
			$category_id=$world_id_w;
			
			$sql_acs_code=$dbh->prepare('SELECT *FROM access WHERE username="'.$user_login.'" and category="'.$category.'" and category_id="'.$category_id.'" and removed="NO"');
			$sql_acs_code->execute();
			$num_sql_acs_code=$sql_acs_code->rowCount();
			
			if($num_sql_acs_code>0){
				//UPDATING ACCESS TABLE
			$sql_update_acs_code=$dbh->prepare('UPDATE access SET removed="YES" WHERE username="'.$user_login.'" and access_code="'.$update_access_code.'" and category="'.$category.'" and category_id="'.$category_id.'" and removed="NO"');
			$sql_update_acs_code->execute();
			
			//CHECKING IF ACCESS CODE IS USED IN POST
			$sql_check_post=$dbh->prepare('SELECT *FROM world_post WHERE WORLD_ID="'.$category_id.'" AND ACCESS_CODE="'.$update_access_code.'" AND REMOVED="NO"');
			$sql_check_post->execute();
			$num_sql_check_post=$sql_check_post->rowcount();
			if($num_sql_check_post>0){
				$sql_update_post_code=$dbh->prepare('UPDATE world_post SET REMOVED="YES" WHERE WORLD_ID="'.$category_id.'" AND ACCESS_CODE="'.$update_access_code.'" AND REMOVED="NO"');
			$sql_update_post_code->execute();
			echo 'success';
			}
			}
			else{
			
				$view_access_codeerr='You have no access code for these world';
			}
		
	}
	}
 catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>
