<?php
$xml=simplexml_load_file('example.xml');

foreach ($xml->developer as $developer) {
	echo "$developer->name is $developer->age <br>";
	foreach ($developer->show as $show) {
		echo $show->showname .'on'. $show->showdate.'<br>';
	}
}
?>