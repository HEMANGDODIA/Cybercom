<?php
if (isset($_POST['day']) && isset($_POST['month']) && isset($_POST['year'])) {
	$day=$_POST['day'];
	$month=$_POST['month'];
	$year=$_POST['year'];
	if (!empty($day) && !empty($month) && !empty($year)) {
		echo "it's $day $month $year";
	}else{
		echo "fill in all fields";
	}
}


?>
<form action="htmlentities.php" method="POST">
	Day:<br><input type="text" name="day"><br><br>
	Month:<br><input type="text" name="month"><br><br>
	Year:<br><input type="text" name="year"><br><br>
	<input type="submit" name="submit">
</form>