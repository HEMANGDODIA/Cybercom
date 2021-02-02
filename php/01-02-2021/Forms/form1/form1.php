<?php
if(isset($_POST['submit'])) {
	$name=$_POST['name'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	$game=$_POST['game'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$file=$_POST['file'];
	if (!empty($name) && !empty($password) && !empty($address) && !empty($age) && !empty($gender) && !empty($game) && !empty($file) ) {
	     echo "<h2> <strong> Your Information </strong> as per you Enter:</h2>";
	     echo "<b>Name :</b> $name <br>";	
	     echo "<b>Password :</b> $password <br>";
	     echo "<b>Address :</b> $address <br>";
	     echo "<b>Games :</b>  <br>";
	     foreach ($game as $checked) {
	        echo " $checked <br>";
	     }
	     
	     echo "<b>Gender :</b>" .$_POST['gender']. "<br>";
	     echo "<b>Age :</b> $age <br>";
	     echo "<b>file :</b> $file <br> <br>";
	}
	
}


?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="style1.css">
<script src="form1.js"></script>

</head>
<body>


<form name="form" action="form1.php" method="POST" onsubmit="return (validateform())" >
	<table>
		<tr>
			<th colspan="2" style="background-color: #FAFAD2;color:#FF000F"><center><label><strong>User Form</strong></label></center></th>
		</tr>
		<tr style="background-color: #87CEFA">
			<td ><label>Enter Name</label></td>
			<td><input type="text" name="name" style="width: 90%; background-color: #E0FFFF" ></td>
		</tr>
		<tr style="background-color: #87CEFA">
			<td><label>Enter Password</label></td>
			<td><input type="password" name="password" style="width: 90%;background-color: #E0FFFF" 	></td>
		</tr>
		<tr style="background-color: #87CEFA">
			<td><label>Enter Address </label></td>
			<td><textarea cols="40" rows="5" name="address" style="background-color: #E0FFFF"></textarea></td>
		</tr>
		<tr style="background-color: #87CEFA">
			<td><label>Select Game</label></td>
			<td>
				<input type="checkbox" id="game1" name="game[]" value="Hocky"/>
                    <label for="game1">Hocky</label><br>
                    <input type="checkbox" id="game2" name="game[]" value="Football">
                    <label for="game2">Football</label><br>
                    <input type="checkbox" id="game3" name="game[]" value="Badminton">
                    <label for="game3">Badminton</label><br>
                    <input type="checkbox" id="game4" name="game[]" value="Cricket">
                    <label for="game4">Cricket</label><br>

				
			</td>
		</tr>
		<tr style="background-color: #87CEFA">
			<td><label>Gender</label></td>
			<td><input type="radio" name="gender" value="male">
				<label for="male">Male</label>
			<input type="radio" name="gender" value="female">
			<label for="female">Female</label>

			</td>

		</tr>
		<tr style="background-color: #87CEFA">
			<td><label>Select ur age</label></td>
			<td>
				<select name="age" style="width: 90%;background-color: #E0FFFF">
					<option value="-1">select</option>
					<option value="0-10">0-10</option>
					<option value="11-20">11-20</option>
					<option value="21-30">21-30</option>
					<option value="31-40">31-40</option>
					<option value="41-50">41-50</option>
					<option value="51-60">51-60</option>
					<option value="60 above">Above 60</option>
			
				</select>
			</td>
		</tr>
		<tr style="background-color: #87CEFA">
			<td colspan="2"> <center><input type="file" id="file" name="file" style="background-color: #E0FFFF"></center></td>
		</tr>
		<tr style="background-color: #87CEFA">
			<td colspan="2"><center><button name="reset" style="background-color: #E0FFFF">Reset</button>
			<button name="submit" style="background-color: #E0FFFF">Submit Form</button></center>
		</tr>
    </table>
</form>
</body>
</html>