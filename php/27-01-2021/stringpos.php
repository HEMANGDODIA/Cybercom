<?php
$find='g';
$findlength=strlen($find);
$offset=0;
$string="hello guys,good afternoon";
//echo strpos($string, $find,7);

while ($string_position=strpos($string, $find,$offset)) {
	echo "<strong> $find </strong> is found at $string_position <br>";
	$offset=$string_position+$findlength;
}

?>