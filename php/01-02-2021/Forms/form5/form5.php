<?php
if (isset($_POST['signin'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	if (!empty($email) && !empty($password)  ) {
	     echo "<h2> <strong> Your Information </strong> as per you Enter:</h2>";
	     echo "<b>E-mail :</b> $email <br> <br>";
	     echo "<b>Password :</b> $password<br> <br>";
	     
	  
	     
	}
}	

?>


<!DOCTYPE html>
<html>
<head>

	<title>
		
	</title>
	<script src="form5.js"></script>
<style>
	
form{
	width: 300px;
	border:1px solid black;
	border-radius: 20px;
	margin:40px;
	height: 300px;
}
form input,textarea,label{
	padding: 10px;
	margin:15px;

}
form label{
	color: #778899;
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form action="form5.php" method="POST" onsubmit="return (validateform())" name="form">
	<div style="margin-bottom:15px;height:30px ;color: white;background-color:#DC143C;border-radius: 80px;" >
		<i class="fa fa-lock" style="font-size:24px;padding-left: 20px;"> Sign In</i>
	</div>
	<div >
		<label>E-mail Address </label><br>
		<input type="email" name="email" placeholder="mail@address.com" style="background-color:#F5F5F5"><br><br>
	    
		<label>Password </label><br>
		<input type="password" name="password" placeholder="********" style="background-color: #F5F5F5"><br><br>

		<center><input type="submit" name="signin" value="Sign In" style="background-color:green;border: none;color: white;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;border-radius: 5px"></center><br><br>
	</div>
</form>

</body>
</html>