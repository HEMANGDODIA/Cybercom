<?php
$friends=array('good'=>
	                   array('ram','samay'),
	            'bad'=>
	                   array('raj','sayam'));
foreach ($friends as $element => $inner_array) {
	echo "<strong> $element </strong>";
	echo "<br>";
	foreach ($inner_array as $inner_element) {
		echo $inner_element;
		echo "<br>";
	}
}

?>