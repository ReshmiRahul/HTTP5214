<?php
$timeNow = rand(0, 23);
if ($timeNow >= 5 && $timeNow < 9) {
    $meal = "The animals should have Breakfast: Bananas, Apples, and Oats";
} elseif ($timeNow >= 12 && $timeNow <14) {
    $meal = "The animals should have Lunch: Fish, Chicken and Vegetables";
} elseif ($timeNow >= 19 && $timeNow < 21) {
    $meal = "The animals should have Dinner: Steak, Carrots, and Broccoli";
} else {
    $meal = "The animals are not being fed";
}
echo $meal;
?>