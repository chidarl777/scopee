<?php
//code for checking analytics
//get post views from db
//get world views from db
try{
	
require("inc/db/config.php");
// checking worlds that are valid
$sql_check_world=$dbh->prepare('SELECT *FROM worlds_tbl WHERE CREATED_BY="'.$user_login.'" AND REMOVED="NO"');
$sql_check_world->execute();
$num_sql_check_world=$sql_check_world->rowCount();

if($num_sql_check_world>0){
	
while($fetch_sql_check_world=$sql_check_world->fetch(PDO::FETCH_ASSOC)){
	
$world_address=$fetch_sql_check_world["WORLD_ADRESS"];
$world_name=$fetch_sql_check_world["WORLD_NAME"];

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
			$world_pic_u_b="user_data/world_photos/$world_pic_us";
		}
		else{
			$world_pic_u_b="img/k1.jpg";
		}
// getting analytics data
$sql_wor_views=$dbh->prepare('SELECT *FROM post_views WHERE WORLD_ADDRESS="'.$world_address.'"');
$sql_wor_views->execute();
$num_sql_wor_views=$sql_wor_views->rowCount();
//NOW THE TOTAL NUMBER OF WORLD POST VIEWS ARE
    $total_num_wor_views=$num_sql_wor_views;
  //  echo $total_num_wor_views;
 $show_world= '<p><li> <a href="analytics.php?wor='.$world_address.'">
                                <img class="world-img" src="'.$world_pic_u.'" alt="no pic" />
                                <p style=" margin-left:15px;float:right; margin-right:10px;">'.$world_name.'<br/> Total Number Of Views :- '.$total_num_wor_views.' </p>
                             </a>
                            </li></p>';
	if($num_sql_wor_views >0){
		
			//Getting the total number of world post views
	if(isset($_GET["wor"])){
		if(!empty($_GET["wor"]))
	while($fetch_sql_post_views=$sql_wor_views->fetch(PDO::FETCH_ASSOC)){
	
	$world_id=$fetch_sql_post_views["WORLD_ID"];
	$world_address1=$fetch_sql_post_views["WORLD_ADDRESS"];
	$post_id=$fetch_sql_post_views["POST_ID"];
	
	if(isset($_GET['pid'])){
		if(!empty($_GET['pid'])){
			$world_post_id=$fetch_sql_post_views['POST_ID'];
			
			//getting post view
			$count_post_id= count($world_post_id);
//NOW THE TOTAL NUMBER OF WORLD POST VIEWS ARE
    $total_num_post_views=$num_sql_wor_views;
			 $show_post= '<p><li> <a href="analytics.php?wor='.$world_address1.'">
          
                   <p style=" margin-left:15px;float:right; margin-right:10px;">'.$world_post_title.'<br/> Total Number Of Views:- '.$total_num_post_views.' </p>
                             </a>
                            </li></p>';
		}
	}


	}	
	 
}
else{
	
echo $show_world;
}
	}
	else{
	echo $show_world;
	}
	}
}
else{
	echo 'NO WORLD FOUND ACTIVE!<br/> CREATE A WORLD FOR YOUR BUSINESS NOW <a href="createworld.php">Click Here To Create</a>';
}
}
catch(PDOException $errors){
	echo ("error".$errors->getMessage());
}	
?>