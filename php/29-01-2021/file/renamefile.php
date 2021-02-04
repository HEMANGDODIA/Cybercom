<?php
$filename='file.txt';
$rand=rand(10000,9999);

if(@rename($filename, $rand.'.txt')){
	echo "File <strong> $filename </strong> has been rename with <strong>$rand.txt </strong> <br> ";
}else{
	echo "FIle can't rename";
}


?>