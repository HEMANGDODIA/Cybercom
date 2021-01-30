<?php
$match='user123';
if (isset($_POST['password'])) {
	$password=$_POST['password'];
	if (!empty($password)) {
	 
	if ($password==$match) {
		echo "this is correct";
	}else{
		echo "this is incorrect";
	}
}else{
	echo "please enter password";
}
}
?>
<form action="postmethod.php" method="POST">
	Password:<br><input type="password" name="password"><br><br>
	<input type="submit" name="submit">
</form>