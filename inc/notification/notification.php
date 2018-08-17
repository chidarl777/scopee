
<?php

try{
	$date_n=date('Y-m-d H:i:s');
	$retval='';
	$sql_register_newsfeed=$dbh->prepare('INSERT INTO notification (posted_by,posted_to,tracker,sub_category,category,date_added,comment) VALUES(:posted_by,:posted_to,:post_id,:sub_category,:category,:date_added,:comment)');
	
	 $sql_register_newsfeed->bindParam(":post_id",$post_tracker); 
      $sql_register_newsfeed->bindParam(":posted_by",$user_login);
      $sql_register_newsfeed->bindParam(":posted_to",$posted_to);
       $sql_register_newsfeed->bindParam(":sub_category",$sub_category);
       $sql_register_newsfeed->bindParam(":category",$category);
       $sql_register_newsfeed->bindParam(":date_added",$date_n);
       $sql_register_newsfeed->bindParam(":comment",$comment);
      
	$sql_register_newsfeed->execute();
	
				//MAILING THE USER PASSWORD TO USERNAME
		
	
	if($category=='world'){
		$subject="$world_name posted-:$post_title";
		$message="$post_summary...";
		
		//GETTING ALL WORLD FOLLOWER AND SUBSCRIBER
		
		$sql_follower=$dbh->prepare('SELECT *FROM follow_worlds WHERE WORLD_ID="'.$world_id_w.'" AND WORLD_ADRESS="'.$world_adress.'" AND CREATED_BY="'.$created_by.'"');
		$sql_follower->execute();
		$num_sql_follower=$sql_follower->rowCount();
		if($num_sql_follower>0){
			
			while($fetch_follower=$sql_follower->fetch(PDO::FETCH_ASSOC)){
				
			$follower=$fetch_follower['FOLLOWER'];
			
			//$headers .= "CC: support@scoppee.com\r\n";
			$to = $follower;
$headers = "MIME-Version: 1.0"."\r\n";;
$headers = "Content-Type: text/html; charset=ISO-8859-1"."\r\n";
  
   $header = "From:Scopee"."\r\n";
   $retval = mail ($to,$subject,$message,$header);
   
			}
			
		}
		
	}
	else{
	
	}




 //   echo $retval;	
			
			
 if( $retval == true )
   {
      //$success="<div class='btn-block btn btn-success' style='color:#ffffff;font-size:17px;'>
		//	 has been sent to this username!!!
		//	</div>";
   }
   else
   {
   //  ECHO"Message could not be sent...";
   }
	//echo 'post successful';
}
catch(PDOException $e){
echo ("error".$e->getMessage());

}

?>