<?php
if (isset($_POST['submit'])) {
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$pword=$_POST['password'];
	$cpword=$_POST['cpassword'];
	$country=$_POST['country'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];
	$bmonth=$_POST['month'];
	$bday=$_POST['day'];
	$byear=$_POST['year'];
	$agrement=$_POST['agrement'];
	if (!empty($fname) && !empty($lname)  && !empty($pword) && !empty($cpword) && !empty($country) && !empty($gender) && !empty($bmonth) && !empty($bday) && !empty($byear) && !empty($email) && !empty($phone) && !empty($agrement) ) {
	     echo "<h2> <strong> Your Information </strong> as per you Enter:</h2>";
	     echo "<b>First Name :</b> $fname <br>";	
	     echo "<b>Last Name :</b> $lname <br>";	
	     echo "<b>Birthdate :</b> $bmonth $bday $byear <br>";
	     echo "<b>Gender :</b>" .$_POST['gender']. "<br>";
	     echo "<b>E-mail :</b> $email <br> <br>";
	     echo "<b>Phone :</b> $phone <br>";
	     echo "<b>Password :</b> $pword <br>";
	     
	     
	     
	}

}




?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
<script src="form3.js"></script>
<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<form action="form3.php" method="POST" name="form" onsubmit="return (validateform())">
<div class="header" style="color: #FFF000;padding: 10px">
	Sign up
</div>

<div class="container">
<div>
	<label for="firstname" style="margin-left: 50px;">First Name</label>
	<input type="text" name="firstname" placeholder="Enter First Name" style="margin-left: 25px;">
</div>
<div>
	<label for="lastname" style="margin-left: 50px;">Last Name</label>
	<input type="text" name="lastname" placeholder="Enter Last Name" style="margin-left: 25px;" >
</div>
<div>
	<label for="DOB" style="margin-left: 50px;">Date of Birth</label>
	<select name="month"  style="margin-left: 15px;"> 
			<option value="month">Month</option>
			<option value="Jan">Jan</option>
			<option value="Feb">Feb</option>
			<option value="March">March</option>
			<option value="April">April</option>
			<option value="May">May</option>
			<option value="June">June</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="September">September</option>
			<option value="October">October</option>
			<option value="November">November</option>
			<option value="December">December</option>
		</select>
		<select name="day" id="day">
			<option value="day">Day</option>
			<script>
				for(var x=1;x<=31;x++){
					var opt=document.createElement("OPTION");
					opt.text=x;
					opt.value=x;
					document.getElementById('day').options.add(opt);

				}

			</script>
			
		</select>
		<select name="year" id="year">
			<option value="year">Year</option>
			<script>
				for(var y=1995;y<=2021;y++){
					var opt=document.createElement("OPTION");
					opt.text=y;
					opt.value=y;

					document.getElementById('year').options.add(opt);

				}
			</script>
		</select>
	
</div>
<div>
	<label for="gender" style="margin-left: 50px;">Gender</label>
	<input type="radio" name="gender" value="male" style="margin-left: 45px;" >
		<label>Male</label>
		<input type="radio" name="gender" value="female">
		<label>Female</label>
</div>
<div>
	<label for="country" style="margin-left: 50px;">Country</label>
	<select name="country" style="margin-left: 45px;">
					<option value="-1">Country</option>
					<option value="India">India</option>
					<option value="USA">USA</option>
					<option value="Canada">Canada</option>
					<option value="China">China</option>
					<option value="Pakistan">Pakistan</option>
					<option value="nepal">Nepal</option>
					<option value="Shrilanka">Shri Lanka</option>
			
				</select>
</div>
<div>
	<label for="Email" style="margin-left: 50px;">E-mail</label>
	<input type="email" name="email" placeholder="Enter E-mail" style="margin-left: 50px;">
</div>
<div>
	<label for="phone" style="margin-left: 50px;">Phone</label>
	<input type="text" name="phone" placeholder="Enter Phone" style="margin-left: 50px;">
</div>
<div>
	<label for="password" style="margin-left: 50px;">Password</label>
	<input type="password" name="password" style="margin-left: 28px;" >
</div>
<div>
	<label for="cpassword" >Confirm Password</label>
	<input type="password" name="cpassword" style="margin-left: 22px;"  >
</div>
<div>
	
	<input type="checkbox" name="agrement" style="margin-left: 150px;" >
	<label for="agrement" style="">I Agree to the Terms of use</label>
</div>


</div>
<div class="footer">
	<input type="submit" name="submit" value="Submit" style="margin-left: 180px;background-color: #32CD32;color: white;border:none;padding: 5px 12px;text-align: center;">
	<input type="reset" name="cancel" value="Cancel" style="background-color: red;color: white;border:none;padding: 5px 12px;text-align: center;">
</div>
	
</form>
</body>
</html>