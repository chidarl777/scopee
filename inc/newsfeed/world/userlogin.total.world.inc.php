
<?php
require_once("inc/check.php");
//CODE TO SELECT WORLD
$num_worlderr="";
try{
$SQL=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$user_login.'" AND REMOVED="NO" LIMIT 7');
$SQL->execute();
$num_world=$SQL->rowCount();
if($num_world>0){
	
	while($fetch_world=$SQL->fetch(PDO::FETCH_ASSOC)){
		
	
	$world_name_u=$fetch_world['WORLD_NAME'];
		$world_adress_u=$fetch_world['WORLD_ADRESS'];
	$user_world='<li><a href="world.php?wor='.$world_adress_u.'">'.$world_name_u.'</a><li>';
	echo $user_world;
	}
}
else{
	$user_world="";
}
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>