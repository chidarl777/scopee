
<?php

try{
	
If(isset($_SESSION["user_login"]) && !(empty($_SESSION["user_login"]))){
	//CHECKING IF THE USERLOGIN IS THE WORLD CREATOR OR THE POST_BY
	
	if($user_login==$world_creator){
		//do nothing
		$show_info=1;
	}
	else{
		$show_info=0;
		
	}
		}
		else{
			$show_info=0;
		}
		if($show_info==0){
			//Getting world address
		$world_info_addr=$_GET['wor'];
		//checking if world address exist
		$SQL_w_info=$dbh->prepare('SELECT *FROM worlds_tbl WHERE WORLD_ADRESS="'.$world_info_addr.'" AND REMOVED="NO"');
	$SQL_w_info->execute();
	//getting rows returned
	$num_sql_info=$SQL_w_info->rowCount();
	if($num_sql_info>0){
		
		echo'<div class="btn-group btn-group-lg">
    <a href="aboutworld.php?wor='.$world_info_addr.'" class="btn btn-primary btn-success" >About '.$w_name.'</a>
    <a  href="contactus.php?wor='.$world_info_addr.'" class="btn btn-primary btn-success">Contact '.$w_name.'</a>
</div>';

	}
	else{
		//do nothing
	}
		}
		
		
}
catch(PDOException $errors){
	echo ("error".$errors->getMessage());
}	

?>