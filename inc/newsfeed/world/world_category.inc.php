<?php
try{
	
//selecting all world category
require('inc/db/config.php');
$sql_cat=$dbh->prepare('SELECT *FROM category WHERE removed="no"');
$sql_cat->execute();
$num_sql_cat=$sql_cat->rowCount();
if($num_sql_cat>0){
	//fetching category
	while($fetch_sql_cat=$sql_cat->fetch(PDO::FETCH_ASSOC)){
		$category=$fetch_sql_cat['category'];
		
		//echoing category
		$call_category="<li><a href='worldcategory.php?cat=$category'>$category</a></li>";
		echo $call_category;
	}
}
	}
	catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
?>