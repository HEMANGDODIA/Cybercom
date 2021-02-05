<?php
require 'connect.inc.php';
?>

<form action="select.php" method="GET">
	Choose a food type:
	<select name="uh">
		<option value="u">Unhealthy</option>
		<option value="h">Healthy</option>

	</select><br><br>
	<input type="submit" name="submit">
</form>

<?php

if (isset($_GET['uh']) && !empty($_GET['uh'])) {
$uh=strtolower($_GET['uh']);
if($uh='u' || $uh='h'){
$conn=mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

$query='SELECT food,calories FROM food WHERE healthy_unhealthy="h"  ORDER BY "id" DESC';
if($query_run=mysqli_query($conn,$query)){
	if (mysqli_num_rows($query_run)==NULL) {
		echo "No result found";
	}else{

	echo "Query success<br>";
	$query_row=mysqli_fetch_assoc($query_run);

	while ($query_row=mysqli_fetch_assoc($query_run)) {
		$food=$query_row['food'];
		$calories=$query_row['calories'];
		echo "$food has $calories".'<br>';
	}
}

}else{
	echo "Query failed";
}
}
}
?>