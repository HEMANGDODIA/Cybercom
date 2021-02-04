<?php

if (isset($_POST['name'])) {
	$name=$_POST['name'];
	if(!empty($name)){
		$handle=fopen("new.txt", "a");
		fwrite($handle, $name."\n");
		fclose($handle);

echo "current name in file:";
        $count=1;
		$readfile=file('new.txt');
		$readfile_count=count($readfile);
		foreach ($readfile as $fname) {
			echo trim($fname);
			if ($count<$readfile_count) {
				echo ',';
			}
			$count++;
		}
	}else{
		echo "Please type name";
	}
}
?>

<form action="fileappend.php" method="POST">
	<input type="text" name="name" placeholder="Enter name">
	<input type="submit" name="submit">
</form>