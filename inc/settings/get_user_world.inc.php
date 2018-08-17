
<?php
require_once("inc/check.php");
//CODE TO SELECT WORLD
$num_worlderr="";
try{
$SQL=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$user_login.'" AND REMOVED="NO"');
$SQL->execute();
$num_world=$SQL->rowCount();

if($num_world>1){
	while($fetch_world=$SQL->fetch(PDO::FETCH_ASSOC)){
		
	
	$world_name_set=$fetch_world['WORLD_NAME'];
		$world_adress_set=$fetch_world['WORLD_ADRESS'];
	$user_world=' <option value="'.$world_adress_set.'">'.$world_name_set.'</option>';
	echo $user_world;
	
	}
}
else{
	$num_worlderr="SORRY! CURRENTLY INACTIVE"."<br>"."CREATE A WORLD TO ACTIVATE";
}
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>