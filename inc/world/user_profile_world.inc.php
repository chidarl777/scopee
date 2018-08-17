
<?php
require_once("inc/check.php");
//CODE TO SELECT WORLD
$num_worlderr="";
try{
$SQL=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$userlog.'" AND REMOVED="NO"');
$SQL->execute();
$num_world=$SQL->rowCount();
if($num_world>0){
	while($fetch_world=$SQL->fetch(PDO::FETCH_ASSOC)){
		
	
	$world_name_u=$fetch_world['WORLD_NAME'];
		$world_adress_u=$fetch_world['WORLD_ADRESS'];
		$world_pic_us=$fetch_world['WORLD_BACKGROUND_PIC'];
			 	$world_profile_pic1=$fetch_world['WORLD_PROFILE_PIC'];
	 	
	 	//CHECKING IF THE USER HAS UPLOADED ANY PROFILE PIC
			 if(empty($world_profile_pic1)){
			 	$world_pic_u="image/default-pic/images_012.jpg";
			 }
			 else{
			 	$world_pic_u="user_data/world_photos/$world_profile_pic1";
			 }
		if(!empty($world_pic_us)){
			$world_pic_u_background="user_data/world_photos/$world_pic_us";
		}
		else{
			$world_pic_u_background="img/k1.jpg";
		}
	$user_world='<p><li>
                              <a href="'.$world_adress_u.'">
                                <img class="world-img" src="'.$world_pic_u.'" alt="no pic" />
                                <p style=" margin-left:15px;float:right; margin-right:10px;">'.$world_name_u.'</p>
                              </a>
                            </li></p>';
                            echo $user_world;
	
	}
}
else{
	$user_world="";
	echo "<h4 style='background-color:#ffffff;margin:15px;'>No world has been created at the moment</h4>";
}
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>