<?php
//CODE FOR UPDATING WORLDS POST
require("inc/check.php");
$post_title=$post_content="";
$error=$post_titleerr=$post_contenterr="";
if(isset($_POST['update_post'])){
	if(!empty($_POST['post_title'])){
		$post_title=test_input($_POST["post_title"]);
	}
	else{
		$post_titleerr="Add a title to your post";
	}
	if(!empty($_POST["post_content"])){
		$post_content=test_input($_POST["post_content"]);
	}
	else{
		$post_contenterr="Content area cannot be empty";
	}
$time=date('h:i:s a');
$date=date('Y-m-d');
try{
	if($error==""){
		
		$get_world=$dbh->prepare("SELECT WORLD_NAME FROM worlds_tbl WHERE ID=$world_id");
		$get_world->execute();
		$num_row1=$get_world->rowCount();
		if($num_row1==0){
		//GETTING THE NAME OF THE WORLD ID
		$world_iderr="There is no world with this specific id.";
	
		}
		else{
		//CHECKING IF THE USER HAS CLICKED ON A POST BUTTOM TWICE ON A SPECIFIC POST
		$get_world_name=$get_world->fetch(PDO::FETCH_ASSOC);
		$world_name=$get_world_name["WORLD_NAME"];
	$sql=$dbh->prepare('SELECT *FROM world_post WHERE POST_BY="'.$user_login.'" AND WORLD_ID="'.$world_id.'" AND POST_TITLE="'.$post_title.'" AND POST_CONTENT="'.$post_content.'"');
	$sql->execute();	
	//GETTING THE ROWS RETURNED
	$num_row=$sql->rowCount();
	if($num_row>0){
	
	//if it has already been posted
	//do nothing......
	}
	else{
		$update_world_post='UPDATE world_post SET POST_TITLE="'.$post_title.'",POST_CONTENT="'.$post_content.'" WHERE WORLD_ID="'.$world_id.'" AND ID="'.$world_post_id.'" AND POST_BY="'.$user_login.'"';
		$STM=$dbh->prepare($update_world_post);
	$STM->execute();
	
	header("location:worlds.php");
	}
	
		}
}		
}
catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
}
?>

<?php
//CHECKING IF IT IS USER_LOGIN THAT POSTED THE MSG
try{

	require("inc/db/config.php");
	
	 $sql='SELECT *FROM world_post WHERE POST_BY="'.$user_login.'" AND ID="'.$world_post_id.'" AND WORLD_ID="'.$world_id.'" ';
	$sql1=$dbh->prepare($sql);
	 $sql1->execute();
	 //putting result in an array	
	 
	 $get_row=$sql1->fetch(PDO::FETCH_ASSOC);
	 $post_content=$get_row["POST_CONTENT"];
	 $post_title=$get_row['POST_TITLE'];
	
	 $edit_posts='
	<form method="post" action="">
	<input type="text" id="post_title" name="post_title"style="width:450px; height:50px;" placeholder="Add title" value="'.$post_title.'" />
<textarea style="width:500px;height: 150px;"  placeholder="edit your post" name="post_content"> '.$post_content.'</textarea>
<input type="submit" id="submit" name="update_post"  value="UPDATE"/>
</form>
     ';
	
	 
	}
	
	
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>