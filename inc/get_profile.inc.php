
<?php
//equire("../aut_session.inc.php");
$post_id="";
$get_post="";
$frienderr="";

try {
	
     require("inc/db/config.php");
    //GETTING USERS PROFILE INFO
    $sql='SELECT *FROM users WHERE USERNAME="'.$userlog.'"';
$stmt=$dbh->prepare($sql);
$stmt->execute();
$num_row=$stmt->rowCount();

if($num_row>1){
echo "sorry an error ocurred";
}
else{
	

while($get_result=$stmt->fetch(PDO::FETCH_ASSOC)){

$professional_skill=$get_result['PROFESSIONAL_SKILLS'];
$education_c=$get_result['EDUCATION'];
$hobby_c=$get_result['HOBBY'];
$country_of_origin=$get_result['COUNTRY_OF_ORIGIN'];
$country_of_residence=$get_result['COUNTRY_OF_RESIDENCE'];
$state_of_origin=$get_result['STATE_OF_ORIGIN'];
$state_of_residence=$get_result['STATE_OF_RESIDENCE'];
$city=$get_result['CITY'];
$contacts=$get_result['CONTACTS'];
$occupation=$get_result['OCCUPATION'];
$marital_status=$get_result['MARITAL_STATUS'];
$complete_profile=$get_result['COMPLETE'];
$about_user=$get_result['ABOUT_USER'];
$date_update=$get_result['DATE_UPDATED'];

if($complete_profile=="YES"){

$get_user_profile='<div class="col-md-6 pull-right" style="padding-right:0px;">
    <div class="stats-widget stats-widget">
        <div class="widget-header">
            <h3>About</h3>
            <!-- ss -->
        </div>
        <div class="widget-stats-list">
            <ul>
                <li><label>Summary:</label> <div style="width:150px;margin-left:60px;">'.nl2br($about_user).'</div></li>
                <li><label>Occupation:</label>'.$occupation.' </li>
                <li><label>education:</label>'.$education_c.'</li>
                 <li><label>Professional Skill:</label>'.$professional_skill.' </li>
                
               <li><label>Marital Status:</label>'.$marital_status.'</li>
                <li><label>My contacts:</label>'.$contacts.' </li>
                 <li><label>Lives in:</label>'.$city.'</li>
               
                <li><label>State of Residence:</label>'.$state_of_residence.'</li>
                 <li><label>Country Of Residence:</label>'.$country_of_residence.'</li>

                <li><label>State of origin:</label>'.$state_of_origin.' </li>
                 <li><label>country of origin:</label>'.$country_of_origin.'</li>

            </ul>
        </div>
         
    </div>
</div>

        ';
        echo $get_user_profile;
}
else{


	$getinfo='	<div class="col-md-6 pull-right" style="padding-right:0px;margin-bottom:20px; ">
    <div class="stats-widget stats-widget">
        <div class="widget-header">
            <h3>Notice</h3>
            <!-- ss -->
        </div>
        <div class="widget-stats-list">
    <label style="color:#ff0000;">Note: You have not complete your profile.<br>
		It is mandatory to get your profile completed to enjoy full features of scopee.
		     
	</label>

        </div>
         
    </div>
</div>';
	echo $getinfo;
}
}	
}
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>


