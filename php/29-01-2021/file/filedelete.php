<?php
$filename='file.txt';
if (@unlink($filename)) {
	echo "File <strong> $filename</strong> has been deleted";
}else{
	echo "File can not deleted";
}


?>