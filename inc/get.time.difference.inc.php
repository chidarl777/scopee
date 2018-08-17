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
function format_interval(DateInterval $interval) {
    $result = "";
    if ($interval->y) { $result .= $interval->format("%y years "); }
    if ($interval->m) { $result .= $interval->format("%m months "); }
   if ($interval->d && $interval->d >7) { $result .= $interval->format("%d week "); }
    if ($interval->h) { $result .= $interval->format("%h hours "); }
    if ($interval->i) { $result .= $interval->format("%i minutes "); }
    if ($interval->s) { $result .= $interval->format("%s seconds "); }

    return $result;
}


//$first_date = new DateTime("2016-11-30 17:03:30");
//$second_date = new DateTime("2012-12-21 00:00:00");

//$difference = $first_date->diff($second_date);

//echo format_interval($difference);
?>