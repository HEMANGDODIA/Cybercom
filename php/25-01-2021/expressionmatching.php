<?php
$string="Hello guys";
if(preg_match('/ /', $string)){
	echo "match found";
}else{
	echo "not found";
}

?>