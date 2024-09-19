<?php
function getNumber($num) {
    if ($num % 3 == 0 && $num % 5 == 0) {
        return "FizzBuzz";
    } elseif ($num % 3 == 0) {
        return "Fizz";
    } elseif ($num % 5 == 0) {
        return "Buzz";
    } else {
        return $num;
    }
}
$value = 36;
echo "The magic number is: " . getNumber($value);
?>