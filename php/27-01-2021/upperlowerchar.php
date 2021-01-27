<?php
/*$string="This is a Statement";
$string_lower=strtolower($string);
echo $string_lower;

$string_upper=strtoupper($string);
echo "<br>$string_upper";*/

if (isset($_GET['username'])&& !empty($_GET['username'])) {
	$username=$_GET['username'];
	$username_lc=strtolower($username);

	if($username_lc=='hv'){
		echo "right $username";
	}
}

?>


<form action="upperlowerchar.php" method="GET">
	Name:<input type="text" name="username">
	<input type="submit" name="submit">
</form>
