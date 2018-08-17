<?php include("inc/header.php"); ?>
<h2>Unread Message</h2>
<?php  
try{
	//GETTING THE USERS INFOMATION FROM THE USERS TABLE
	$sql="SELECT *FROM users WHERE USERNAME=$user_login";
	$result1=$dbh->prepare($sql);
	//GETTING THE UNREAD MESSAGES FROM THE MESSAGE TABLE
$sql="SELECT *FROM pvt_messages WHERE USER_TO=$user_login  && $opened='No' && $deleted='No'";
$result=$dbh->prepare($sql);
numrow=$result->rowCount();
if(numrow!=0){

//getting the messages of user login
while($get_message=$result->setFetch_Mode(PDO::FETCH_ASSOC)){
$id=$get_message['id'];
$firstname=$get_message['FIRST_NAME'];
$othername=$get_message['OTHER_NAMES'];
$profilepic=$get_message['PROFILE_PIC'];
$msg_title=$get_message['MSG_TITLE'];
$message=$get_message['MESSAGE'];
$time=$get_message['TIME_SENT'];
$date=$get_message['DATE_SENT'];
$opened=$get_message['OPENED'];
$deleted=$get_message['DELETED'];
}
}
}
?>
<script type="text/javascript">
 function Toggle<?php echo $pvt_msgId?>(){
 ele=document.getElementById('toggleText<?php echo $pvt_msgId?>');
Text=document.getElementById('displayText<?php echo $pvt_msgId?>')
if(ele.style.display=='block'){
 ele.style.display='none';
}
else{
ele.style.display='block';

}
  }
</script>

<?php
//CODING TO CHECK IF THE TEXT MSG CHARACTERS IS GREATER THAN 150 
if(strlen($message)>150){
msg_body=substr($message,0 ,150,)."....";
 }
else{
 $msg_body=$message;
 }
 //IF THE TEXT MSG IS GREATER THAN 150 CHARACTERS
 //CHECKING IF THE MORE BUTTON WAS CLICKED
 if(isset($_POST['read_more_btn'])){
 	
 }
else{
echo"you have not read any message.";
  }
echo "<div id="msgPic">.$profilepic."</div>";

if(@$_POST['setpened_' .$pvt_msg_Id.' ']){ 
//updating the private message table when messages has been read by turning opened='yes'
$sql="UPDATE pvt_messages SET opened='yes' WHERE ID=$id";
$result=$dbh->prepare($sql);



}
echo "<form method='POST' action='pvt_messages.php' name='pvt_msgtitle'>
<b> <a href="$user_from">$user_from</a></b>
<input type='button' name='pvt_openmsg' value='$pvt_msgtitle' onclick='javascript:Toggle$pvt_msgId();' />
<input type='submit' name='setopened_$pvt_msg_Id' value='I have read this' />

</form>
<div id='toggleText$pvt_msgId' style='display:none;'>
<br / >$pvt_msgbody;
</div><br /><hr />
";

echo $date;
}
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}
?>
//coding for read messages
<h2>Read Message</h2>
<?php include("../../inc/headerMenu.php"); ?>
<h2>Unread Message</h2>
<?php  
try{
$sql="SELECT *FROM pvt_messages,signup WHERE USER_TO=$user_login  && $opened='yes' && $deleted='No'";
$result=$dbh->prepare($sql);
numrow_read=$result->rowCount();
if(numrow_read!=0){
//getting the messages of user login
while($get_message=$result->setFetch_Mode(PDO::FETCH_ASSOC)){
$id=get_message['id'];
$firstname=get_message['FIRST_NAME'];
$othername=get_message['OTHER_NAMES'];
$profilepic=get_message['PROFILE_PIC'];
$msg_title=get_message['MSG_TITLE'];
$message=get_message['MESSAGE'];
$date=get_message['DATE_SENT'];
$opened=get_message['OPENED'];
$deleted=get_message['DELETED'];

?>
<?php
<script type='text/javascript' language='javascript'>
 function Toggle<?php echo $pvt_msgId?>(){
 ele=document.getElementById('toggleText<?php echo $pvt_msgId?>');
Text=document.getElementById('displayText<?php echo $pvt_msgId?>')
if(ele.style.display=='block'){
 ele.style.display='none';
}
else{
ele.style.display='block';

}
  }
</script>

?>
if(strlen($message)>150){
msg_body=substr($message,0 ,150,)."....";
 }
else{
 $msg_body=$message;
 }
}
else{
echo"you have not read any message.";
  }
echo "<div id="msgPic">.$profilepic."</div>";
if(@$_POST['delete_' .$pvt_msg_Id.' ']){ 
//updating the private message table when messages has been deleted by turning delete='yes'
$sql="UPDATE pvt_messages SET $delete='yes' WHERE ID=$id";
$result=$dbh->prepare($sql);



}
if(@$_POST['reply_' .$pvt_msg_Id.' ']){ 
header("location:reply_msg.php");
}

echo "<form method='POST' action='pvt_messages.php' name='pvt_msgtitle'>
<b> <a href="$user_from">$user_from</a></b>
<input type='button' name='pvt_openmsg' value='$pvt_msgtitle' onclick="javascript:Toggle$pvt_msgId();" />
<input type='submit' name='delete_$pvt_msg_Id' title='Delete Message'  value='X'/>
<input type='submit' name='reply_$pvt_msg_Id' title='Reply Message'  value='Reply'/>

</form>
<div id="toggleText$pvt_msgId" style="display:none;">
<br / >$pvt_msgbody;
</div><br /><hr />
";
echo $msg_body."<hr />"."<br />";
echo $date;
}
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}


?>