<?php
if (isset($_POST['sendmessage'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	if (!empty($name) && !empty($email) && !empty($subject) && !empty($message) ) {
	     echo "<h2> <strong> Your Information </strong> as per you Enter:</h2>";
	     echo "<b>Name :</b> $name <br>";	
	     echo "<b>E-mail :</b> $email <br> <br>";
	     echo "<b>Subject :</b> $subject<br>";
	     echo "<b>Message :</b> $message <br> <br>";
	     
	     
	     
	}
}	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="form4.js"></script>
<style>
form{
	width: 195px;
}	
.container{
	background-color: #FFFACD;
}
form input,textarea{
	padding: 5px;
	margin:5px;

}
</style>
</head>
<body>
<form action="form4.php" name="form" onsubmit="return (validateform())" method="POST">
	<div class="header">
		<button name="contactus" style="background-color:#FF6347;border: none;color: white;padding: 15px 40px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;font-style: bold;font:1.0em sans-serif;"> CONTACT US!</button>
	</div>
	<div class="container">
		<input type="text" name="name" placeholder="Name..."><br>
		<input type="email" name="email" placeholder="Email..."><br>
		<input type="text" name="subject" placeholder="Subject..."><br>
		<textarea cols="20" rows="5" name="message" placeholder="Message..."></textarea><br>

	</div>
	<div class="footer">
		<input type="submit"  name="sendmessage" value="SEND MESSAGE" style="background-color: #FFA500;border: none;color: #8B4513;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;font:1.0em sans-serif;">
	</div>
</form>
</body>
</html>