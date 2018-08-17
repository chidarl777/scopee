
<?php

try{
	$sql_register_newsfeed=$dbh->prepare('INSERT INTO newsfeed (posted_by,post_tracker,post_category_address,post_category,post_category_id,date_added) VALUES(:posted_by,:post_id,:sub_category,:category,:post_category_id,:date_added)');
	
	 $sql_register_newsfeed->bindParam(":post_id",$post_tracker); 
      $sql_register_newsfeed->bindParam(":posted_by",$user_login);
      $sql_register_newsfeed->bindParam(":post_category_id",$post_category_id);
       $sql_register_newsfeed->bindParam(":sub_category",$sub_category);
       $sql_register_newsfeed->bindParam(":category",$category);
       $sql_register_newsfeed->bindParam(":date_added",$date);
      
	$sql_register_newsfeed->execute();
	//echo 'post successful';
}
catch(PDOException $e){
echo ("error".$e->getMessage());

}

?>