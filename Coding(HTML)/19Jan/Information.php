<!DOCTYPE html>
<html>
<head>
	<title>Information</title>
<style>
	tr,th,td{
		border:1px solid black;
		border-collapse: separate;
	}
</style>
</head>
<body>

</body>
</html>
<table>
<tr>
	<th colspan="2">Personal Information</th>
</tr>
<tr>
	<td>Firstname : </td>
	<td><?php
	$fname=$_POST['firstname'];
    echo $fname;?>
    </td>
</tr>
<tr>
	<td>Lastname : </td>
	<td><?php
	$lname=$_POST['lastname'];
    echo $lname;?>
    </td>
</tr>
<tr>
	<td>Date of Birth : </td>
	<td><?php
	$month=$_POST['month'];
	$day=$_POST['day'];
	$year=$_POST['year'];
	echo $month;
	echo " ";
	echo $day;
	echo " ";
	echo $year;

	?></td>
</tr>
<tr>
	<td>Gender: </td>
	<td><?php
	$gender=$_POST['gender'];
	echo $gender;
	?></td>
</tr>
<tr>
	<th colspan="2">Account Information</th>
</tr>
<tr>
	<td>Email:</td>
	<td><?php
	$email=$_POST['email'];
	echo $email;
	?></td>
</tr>
<tr>
	<td>Password:</td>
	<td><?php
	$password=$_POST['password'];
	echo $password;
	?></td>
</tr>
<tr>
	<td>Security Question:</td>
	<td><?php
	$securityque=$_POST['securityquestion'];
	echo $securityque;
	?></td>
</tr>
<tr>
	<td>Security Answer:</td>
	<td><?php
	$securityans=$_POST['securityans'];
	echo $securityans;
	?></td>
</tr>
<tr>
	<th colspan="2">Contact Information</th>
</tr>
<tr>
	<td>Address:</td>
	<td><?php
	$address=$_POST['address'];
	echo $address;
	?></td>
</tr>
<tr>
	<td>City:</td>
	<td><?php
	$city=$_POST['city'];
	echo $city;
	?></td>
</tr>
<tr>
	<td>State:</td>
	<td><?php
	$state=$_POST['state'];
	echo $state;
	?></td>
</tr>
<tr>
	<td>Zip Code:</td>
	<td><?php
	$zipcode=$_POST['zipcode'];
	echo $zipcode;
	?></td>
</tr>
<tr>
	<td>Phone no:</td>
	<td><?php
	$mobile=$_POST['mobile'];
	echo $mobile;
	echo "  ";
	$phone=$_POST['phone'];
	echo $phone;
	?></td>
	
</tr>
</table>
