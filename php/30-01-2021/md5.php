<?php
if (isset($_POST['user_password']) && !empty($_POST['user_password'])) {
	$user_password=md5($_POST['user_password']);
	
	$filename='hash.txt';
	$handle=fopen($filename, 'r');
	 $file_password=fread($handle, filesize($filename));

	if ($user_password ==$file_password) {
		echo "password ok";
	}else{
		echo "password doesn't match";
	}
}else{
	echo "pls enter password";
}
?>

<form action="md5.php" method="POST">
	Password:<input type="text" name="user_password"><br><br>
	<input type="submit" name="submit">
</form>