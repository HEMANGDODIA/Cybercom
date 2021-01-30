<?php
$browser=get_browser(null, true);
$browser=strtolower($browser['browser']);
echo $browser;

if ($browser!='chrome') {
	echo "you are not using google crome.please do!";
}
?>