 
 <?php
 //$_GET['user']=strtok($_SERVER['HTTP_HOST'],"."); 
 //if(!empty($_GET['user'])){
 	
 //} 
$user_login="";
$user_login_userid='';
?>
<?php 
 $error1="";
    $ref_code="";
//$world_name="";
//getting the world adress on the adress bar
if(isset($_GET["ref"])){
	
	require_once('inc/check.php');
	$check_ref=test_input($_GET['ref']);
	$cookie_refname1 = substr(base64_encode("Scopeeuserref"),5,5);
	$cookie_refname=str_replace('=','sc',$cookie_refname1);
	
	//CODE FOR SETTING COOKIE IN THE USER BROWSER THAT EXPIRE AFTER 1 WEEK
		$cookie_time=time() + (60*60*24*7);
		$path='/';
		$domain='www.scopee.in';
	

$cookie_refvalue =$check_ref;
	
	try{
	
	require("inc/db/config.php");
	//CHECKING IF USER EXIST
	$SQL=$dbh->prepare('SELECT *FROM users WHERE USER_ID="'.$check_ref.'"');
	$SQL->execute();
	//getting rows returned
	$num_ref=$SQL->rowCount();
	
	 if($num_ref==1){
	 
	 	$result_ref=$SQL->fetch(PDO::FETCH_ASSOC);
	 $ref_id=$result_ref['ID'];
	// 	echo $ref_id;
	 	  //CREATING USER REF COOKIE
   	if(isset($_COOKIE[$cookie_refname])){
   		//DO NOTHING SINCE THE USER HAS BEEN REFERED BY SOMEONE
   		
   		}
   		else{
				
		
 setcookie($cookie_refname,$cookie_refvalue,$cookie_time,$path,$domain);
	}	
	 
	 }
	 else{
	 	//$error1="<div style='margin-top:50px; height:75px; width:200px; border-color:#ff0000 ; border:2px solid; background-color:#efefc0;'>SORRY AN ERROR OCCURRED !!!</div>";
	 echo"<script type='text/javascript'>alert('SORRY AN ERROR OCCURRED !!!');</script>";
	
	 	
	}	
	 }
catch(PDOException $error){
	echo("An error ocurred");
	
	}
	}
	
?>
<?php

$get_cookie_time="";
$get_cookie_val="";
try{
	$cookie_name ='Scopee';
	
if(isset($_COOKIE[$cookie_name])) {

   $get_cookie_val=$_COOKIE[$cookie_name];
  // $get_cookie_time=$_COOKIE["expire"];
   
   ///DECODING COOKIE VALUE
   $first_decode=convert_uudecode(base64_decode($get_cookie_val));
 
   require("inc/db/config.php");
   //CHECKING IF THE COOKIE VALUE BELONGS TO AND ACTIVE USER;
   $check_cookie=$dbh->prepare('SELECT *FROM active_log WHERE COOKIE_VALUE="'.$get_cookie_val.'"');
   $check_cookie->execute();
   $num_cookie=$check_cookie->rowCount();
  
   if($num_cookie==1){
   	//FETCHING DATA FROM ACTIVE LOG
   	$get_user_log=$check_cookie->fetch(PDO::FETCH_ASSOC);
   	$get_user=$get_user_log['USERNAME'];
   	
   	//CHECKING IF USERNAME RECEIVED IS A USER IN USERS TABLE AND HAS NOT BEEN REMOVED;
   	$check_user=$dbh->prepare('SELECT *FROM users WHERE USERNAME="'.$get_user.'" AND REMOVED="NO"');
   	$check_user->execute();
   	$num_user=$check_user->rowCount();
  
   	if($num_user==1){
   		$Uname=$get_user;
		  session_start();
$_SESSION["user_login"]=$Uname;

      header("location:home.php");
	   exit();
	}
   }
   
}
else{
	
	//do nothing
} 
}

catch(PDOException $error){
echo('connection error,because:'.$error->getMessage());

}
?>
 <nav class="navbar navbar-default header" role="navigation" style="padding-bottom:0px; background-color:#0db30d;">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header col-sm-2">
                <a class="navbar-brand" href="#/!" >scopee</a>
              <button type="button" style="background-color:#0db30d; color:#ffffff;"class="navbar-toggle" data-toggle="collapse" data-target="#NavCol">
                <span class="sr-only" >Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
          

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse " id="NavCol">
                <ul class="nav navbar-nav navbar-right">
                   
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="aboutus.php" class="linear"  title="home"><i class="fa fa-info-circle"></i>&nbsp;About</a></li>
                    <li><a href="registration.php" class="linear"  title="create account"><i class="fa fa-edit"></i>Sign Up</a></li>
                      <li><a href="login.php" class="linear"  title="login"><i class="fa fa-sign-in"></i>&nbsp;Sign In</a></li>
         <li><a href="contactus.php" class="linear"  title="contact us"><i class="fa fa-phone"></i>&nbsp;Contact Us</a></li> 
                <li><a href="howitworks.php" class="linear"  title="how it works"><i class="fa fa-question-circle"></i>&nbsp;How it works</a></li>
                 <div class="dropdown  " role="menu"  style=" display:inline-block; margin-left: 20px;top:4px;">
                                <button class="btn btn-default dropdown-toggle" title="Select World Category" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Category
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu " aria-labelledby="dropdownMenu1" style="height: 400px; overflow-x: hidden;">
              <?php require("inc/world/world_category.inc.php"); ?>
                                </ul>
                           
                        </div>
                      
                </ul>
            </div><!-- navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    
    	
   