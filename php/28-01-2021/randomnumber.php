<?php

$rand=rand();
//$max=getrandmax();
//echo "$rand / $max";

if(isset($_POST['roll'])){
	echo "you rolled a $rand";
}
?>

<form action="randomnumber.php" method="POST">

	<input type="submit" name="roll" value="Roll dice">
	
</form>