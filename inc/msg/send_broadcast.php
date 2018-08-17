<?php
 require_once('../INC/check.php');
//sending messages to a user script
if($_SERVER['REQUEST_METHOD']=='POST'){
 if(!empty($_POST['broadcast_body'])){
  $check_broadcast=test_input($_POST['broadcast_body']);
$check_len=strlen($check);
if($check_len>=3){
$get_broadcass=check_broadcast;
  }
else{
$broadcasterr="Message should be greater than 2 character";
   }
else{
    $broadcasterr="Cannot  send an empty message"
  }
 }

}
  if(empty($broadcasterr)){
try{
 require('../INC/config.php');
    $ insert_broadcast="INSERT INTO broadcast(USER_FROM,MSG_BODY,DATE_SENT,TIME_SENT) VALUE($user_login,get_broadcast,$date,$time)";

$result=$dbh->prepare($insert_broadcast);
$result execute();
}
catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}
}
?>