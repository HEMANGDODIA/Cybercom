<?php

if (isset($_POST['name'])) {
	$name=$_POST['name'];
	if(!empty($name)){
		$handle=fopen("new.txt", "a");
		fwrite($handle, $name."\n");
		fclose($handle);

	}else{
		echo "Please type name";
	}
}
?>

<form action="fileappend.php" method="POST">
	<input type="text" name="name" placeholder="Enter name">
	<input type="submit" name="submit">
</form>