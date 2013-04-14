<?php
/**********************************************************************************************

 Author: Winona Tong

 eenie_meenie($group_size, $starting_position, $interval)

 $group_size - number of people in the group
 $starting_postion - position of (first) person eliminated
 $interval - interval-th person to eliminate

 This function takes 3 integers, $group_size, $starting_position and $interval. Assuming 
 the group of people are standing in a circle, this function finds the original position of the 
 last person standing if one were to go around the circle, eliminating every $interval-th 
 person starting from $starting_position

**********************************************************************************************/

// inputs to function
// 100 people are standing in a circle, numbered 1-100, for a chance to win a million dollars.  We're going to go around the circle, eliminating every other person, starting with #2.  The last person left wins the money.  Who is the winner?

function eenie_meenie($circle, $starting_position, $interval) {
  $num_people = count($circle);
  if ($num_people >1) {
    if ($num_people >= $starting_position) {
      unset($circle[$starting_position]);
      //echo '<br/>';
      $new_circle = array_combine(range(0, $num_people-2), $circle); // re-index array
      //print_r ($new_circle);
      $next_position = ($starting_position + $interval-1) % ($num_people-1);
      return eenie_meenie($new_circle, $next_position, $interval);
      
    } else {
      echo 'out of bounds error. starting position greater than size of group.';
    }
  } else if ($num_people == 1) {
    return $circle[0];
  } else {
    echo 'something bad happened';
  }
}

$group_size = 100;
$starting_position = 1;
$interval = 2;
$circle = range(1,$group_size);
//print_r($circle);

echo eenie_meenie($circle, $starting_position, $interval);

