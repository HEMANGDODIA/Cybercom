<?php
$filename='new.txt';
$handle=fopen($filename, 'r');
$datain = fread($handle,filesize($filename));
$name_array=explode(' ', $datain);

foreach ($name_array as $name) {
	echo "$name <br>";
}

echo $name_array[0];


?>