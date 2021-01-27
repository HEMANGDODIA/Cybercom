<?php

$string1="good morning sir, my name is hemang dodiya";
//$string2="good morning sir, nice to meet you";
$string2="nice to meet you";
similar_text($string1, $string2, $result);
echo "the similarity between is $result<br>";


$string_length=strlen($string1);
echo $string_length;
?>