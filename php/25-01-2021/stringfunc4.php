<?php


$string =" hello friends ";
$string_trimmed=trim($string);
//rtrim  ltrim for if condition comparism

echo $string_trimmed ;

echo "<br>";

// addslashes add slashes for security
$string ='this is <img src="image.jpg"> the example';
$string_addslash=htmlentities(addslashes($string));

echo $string_addslash;

?>