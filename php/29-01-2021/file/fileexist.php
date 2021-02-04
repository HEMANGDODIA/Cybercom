<?php
$filename='file.txt';

if(file_exists($filename)){
	echo "file already exist ";
}else{
	$handle=fopen($filename, 'w');
	fwrite($handle, "CLean file");
	fclose($handle);
}

?>