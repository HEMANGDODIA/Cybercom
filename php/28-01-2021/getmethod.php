<?php
/*
1. does it exist? or "has it been submitted"
2. Is it empty? or "Does value == NULL"
3. Display back to user

*/


if (isset($_GET['day']) && isset($_GET['Month']	) && isset($_GET['Year']) ) {
	$day=$_GET['day'];
	$month=$_GET['Month'];
	$Year=$_GET['Year'];
	if (!empty($day) && !empty($month) && !empty($Year)) {
		echo "It is $day $month $Year";
	}else{
		echo "please fill all fields";
	}
}
?>

<form action="getmethod.php" method="GET">
	Day:<br><input type="text" name="day"><br><br>
	Month:<br><input type="text" name="Month"><br><br>
	Year:<br><input type="text" name="Year"><br><br>
	<input type="submit" name="submit">
</form>