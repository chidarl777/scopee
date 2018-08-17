<?php

/**
 * Format an interval to show all existing components.
 * If the interval doesn't have a time component (years, months, etc)
 * That component won't be displayed.
 *
 * @param DateInterval $interval The interval
 *
 * @return string Formatted interval string.
 */

try{
switch($month_of_birth){
	 case "January":
        $month_num="01";
        break;
    case "February":
       $month_num="02";
        break;
    case "March":
      $month_num="03";
      
      case "April":
        $month_num="04";
        break;
    case "May":
       $month_num="05";
        break;
    case "June":
      $month_num="06";
      
      case "July":
        $month_num="07";
        break;
    case "August":
       $month_num="08";
        break;
    case "September":
      $month_num="09";
      
      case "October":
        $month_num="10";
        break;
    case "NOvember":
       $month_num="11";
        break;
    case "December":
      $month_num="12";
        break;
    default:
       $month_num="";
}
$first_date2 =20161013;
$second_date1 =$year_of_birth.$month_num.$day_of_birth;
$first_date1=substr_replace("-","",$first_date2);
echo $first_date2."<br>";
echo $second_date1."<br>";
$viewers_age=($first_date1 - $second_date1);
echo $viewers_age;
die();

//CHECKING THE AGE CRITERIA TO VIEW WORLD
if($world_creator != $user_login){
	//iF USERLOGGED IN AGE IS BELOW 17
if($age_criteria=="Below 18"){
	// CHECKING IF THE VIEWER IS BELOW 18
	if($viewers_age < 18){
		//taking the user logged in to home page
		//header("location:home.php");
	}
}	

elseif($age_criteria=="Above 18"){
	// CHECKING IF THE VIEWER IS ABOVE 18
	if($viewers_age > 18){
		//taking the user logged in to home page
		//header("location:home.php");
	}
}

elseif($age_criteria=="18-40"){
	// CHECKING IF THE VIEWER IS WITHING RANGE
	if($viewers_age >18 && $viewers_age < 40){
		//taking the user logged in to home page
		//header("location:home.php");
	}
}

elseif($age_criteria=="Above 35"){
	// CHECKING IF THE VIEWER IS WITHING RANGE
	if( $viewers_age > 35){
		//taking the user logged in to home page
		//header("location:home.php");
	}
}

elseif($age_criteria=="25-50"){
	// CHECKING IF THE VIEWER IS WITHING RANGE
	if( $viewers_age > 25 && $viewers_age <50){
		//taking the user logged in to home page
		//header("location:home.php");
	}
}

elseif($age_criteria=="Above 40"){
	// CHECKING IF THE VIEWER IS WITHING RANGE
	if( $viewers_age > 40){
		//taking the user logged in to home page
		//header("location:home.php");
	}
}

elseif($age_criteria=="General"){
	// CHECKING IF THE VIEWER IS WITHING RANGE
	
}

else{
		//taking the user logged in to home page
		//header("location:home.php");
	}
}


}


		catch(PDOException $error){
	echo("connection error,because:".$error->getMessage());
	
	}
		
?>