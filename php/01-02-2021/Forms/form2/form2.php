<?php
if (isset($_POST['submit'])) {
	$fname=$_POST['firstname'];
	$pword=$_POST['password'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$bmonth=$_POST['month'];
	$bday=$_POST['day'];
	$byear=$_POST['year'];
	$game=$_POST['game'];
	$mstatus=$_POST['mstatus'];
	$agrement=$_POST['agrement'];
	if (!empty($fname) && !empty($pword) && !empty($address) && !empty($gender) && !empty($bmonth) && !empty($bday) && !empty($byear) && !empty($game) && !empty($mstatus) && !empty($agrement) ) {
	     echo "<h2> <strong> Your Information </strong> as per you Enter:</h2>";
	     echo "<b>Name :</b> $fname <br>";	
	     echo "<b>Password :</b> $pword <br>";
	     echo "<b>Address :</b> $address <br>";
	     echo "<b>Games :</b>  <br>";
	     foreach ($game as $checked) {
	        echo " $checked <br>";
	     }
	     
	     echo "<b>Gender :</b>" .$_POST['gender']. "<br>";
	     echo "<b>Birthdate :</b> $bmonth $bday $byear <br>";
	     echo "<b>Marital Status :</b> $mstatus <br> <br>";
	}
}

?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
<script src="form2.js"></script>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<form action="form2.php" method="POST" name="form" onsubmit="return (validateform())" >
	<fieldset>
	<legend>User Form</legend>
	<ul>
	<li><div>
		<label for="firstname">First Name</label>
		<input type="text" name="firstname" style="margin-left: 160px;">
	</div></li>
	<li><div>
		<label for="password">Password</label>
		<input type="password" name="password" style="margin-left: 165px;">
	</div></li>
	<li><div>
		<label for="Gender">Gender</label>
		<input type="radio" name="gender" value="male" style="margin-left: 180px;">
		<label>Male</label>
		<input type="radio" name="gender" value="female">
		<label>Female</label>
		</div></li>
	<li><div>
		<label for="address">Address</label>
		<textarea cols="20" rows="5" name="address" style="margin-left: 170px;"></textarea>
	</div></li>
	<li><div>
		<label for="DOB">D.O.B</label>
		<select name="month" style="margin-left: 180px;"> 
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
	</div></li>
	<li><div>
		<label for="Select Game">Select Game</label>
		<input type="checkbox" id="game1" name="game[]" value="Hocky" style="margin-left: 140px;">
        <label for="game1">Hocky</label>
        <input type="checkbox" id="game2" name="game[]" value="Football">
        <label for="game2">Football</label>
        <input type="checkbox" id="game3" name="game[]" value="Badminton">
        <label for="game3">Badminton</label>
        <input type="checkbox" id="game4" name="game[]" value="Cricket">
        <label for="game4">Cricket</label>
	</div></li>
	<li><div>
		<label for="maritalstatus">Marital status</label>
		<input type="radio" name="mstatus" value="married" style="margin-left: 135px;">
		<label>Married</label>
		<input type="radio" name="mstatus" value="unmarried">
		<label>Unmarried</label>
		</div></li>
	<div>
		<input type="submit" name="submit" style="margin-left: 222px;">
		<input type="reset" name="reset">
	</div>
	<div>
		<input type="checkbox" name="agrement" style="margin-left: 222px;" >
		<label>I accept this agrement</label>
		</div>
    </ul>
	</fieldset>
</form>
</body>
</html>