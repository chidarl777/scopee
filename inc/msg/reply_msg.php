
<?php
 require_once('../INC/check.php');
//replying to messages from a user script
$replyerr="";
$get_reply="";
if(isset($_POST['send_reply'])){
 if(!empty($_POST['reply_body'])){
  $check_reply=test_input($_POST['reply_body']);
$check_len=strlen($check);
if($check_len>=3){
$get_reply=$check_reply;
  }
else{
$replyerr="Reply should be greater than 2 character";
   }
else{
    $replyerr="Cannot  send an empty reply";
  }
 }

}
  if(empty($replyerr)){
try{
 require('../INC/config.php');
// getting msg id that is been replied
$get_msg="SELECT * FROM messages WHERE user_from=$msg_from AND msg_id=$msg_id";
$result=$dbh->prepare($get_msg);
$result->execute();

//fetch row if result returned is true
$num_row=$result->rowCount();
if($num_row==1){
//puting result returned in an array
while($fetch_reply=$result->setFetchMode(PDO::FETCH_ASSOC)){

$msg_id=$fetch_reply['msg_id'];
$msg_from=$fetch_reply['user_from'];
$time=Date('h:i:s a');
$date=Date('Y-m-d');
$reply_by=$user_login;	
}
}
//inserting reply in reply table
    $ insert_reply="INSERT INTO reply_msg(user_from,user_to,msg_id,reply_body,date_replied,time_replied) VALUE($user_login,$username,msg_id,$reply_body,$date,$time)";

$result=$dbh->prepare($insert_reply);
$result-> execute();
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}
}