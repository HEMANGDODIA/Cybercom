<?php
function has_space($string){
	if(preg_match('/ /', $string)){
		return true;
	}else{
		return false;
	}
}
if(has_space('no spaceavailable')){
	echo "has at least one space";
}else{
	echo "no space";
}
?>