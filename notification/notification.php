
<?php

try{
	$sql_register_newsfeed=$dbh->prepare('INSERT INTO notification (posted_by,posted_to,tracker,sub_category,category,date_added) VALUES(:posted_by,:posted_to,:post_id,:sub_category,:category,:date_added)');
	
	 $sql_register_newsfeed->bindParam(":post_id",$post_tracker); 
      $sql_register_newsfeed->bindParam(":posted_by",$user_login);
      $sql_register_newsfeed->bindParam(":posted_to",$posted_to);
       $sql_register_newsfeed->bindParam(":sub_category",$sub_category);
       $sql_register_newsfeed->bindParam(":category",$category);
       $sql_register_newsfeed->bindParam(":date_added",$date);
      
	$sql_register_newsfeed->execute();
	echo 'post successful';
}
catch(PDOException $e){
echo ("error".$e->getMessage());

}

?>