<?php
$find=array('hemang','dodiya');
$replace=array('h****g','d****a');
if (isset($_POST['username']) && !empty($_POST['username'])) {
	$username=$_POST['username'];
	$username_replace=str_ireplace($find, $replace, $username); //use str_ireplace for apply case sensitive
	echo $username_replace;
}
?>
<hr>
<form action="wordcensoring.php" method="POST">
	<textarea name="username" cols="15" rows="6"><?php echo $username; ?></textarea><br><br>
	<input type="submit" name="submit">
</form>