<?php

$string="asdfghjkl012345678.";
$string_shuffled=str_shuffle($string);

$half=substr($string_shuffled, 0, strlen($string)/2);

echo $half;

$string1= "this is good example of string";
$string_reverse=strrev($string1);
echo "<br>$string_reverse";
?>