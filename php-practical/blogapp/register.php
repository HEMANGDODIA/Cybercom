<?php
include 'connect.php';
   
?>

<?php
if (isset($_POST['submit'])) {
    $prefix=$_POST['prefix'];   
	$fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
	$pword=$_POST['password'];
    $cpword=$_POST['cpassword'];
	$information=$_POST['information'];
	$agrement=$_POST['agrement'];
	if ( !empty($prefix) && !empty($fname) && !empty($lname) && !empty($email) && !empty($mobile) && !empty($pword) && !empty($cpword) && !empty($information)  && !empty($agrement) ) {
	    
         $prefix = mysqli_real_escape_string($con,$_POST['prefix'] );
         $fname = mysqli_real_escape_string($con,$_POST['firstname'] );
         $lname = mysqli_real_escape_string($con, $_POST['lastname']);
         $email = mysqli_real_escape_string($con, $_POST['email']);
         $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
         $password = mysqli_real_escape_string($con, $_POST['password']);
         $information= mysqli_real_escape_string($con, $information );

         $query = "INSERT INTO user ( prefix,firstname,lastname,mobile,email, passwordhash,information) 
              VALUES( '$prefix','$fname','$lname','$mobile','$email','$password','$information')";
       mysqli_query($con, $query);
	
	    
	    
	}
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/Rstyle.css" />
    <script src="script.js"></script>
    <title> Ragister</title>
</head>

<body>

    <form action="register.php" method="POST">
        <center>
            <h1>Registration</h1>
        </center>
        <div class="regcontainer">
        <div>
        <label>Prefix</label>
         <select id="prefix" name="prefix"> 
                <option value=""> 
                </option>
                <option value="user">user
                </option>
                <option value="employee"> employee
                </option>
                <option value="CEO"> CEO
                </option>
            </select>
        </div><br> 
        <div>   
        <label>First Name</label>
        <input type="text"  name="firstname" id="firstname" required>
        </div><br>
        <div>
        <label>Last Name</label>
        <input type="text" placeholder="LastName" name="lastname" id="lastname" required>
        </div><br>
        <div>
        <label>Email</label>
        <input type="email" placeholder="Email" name="email" id="email" required>
        </div><br>
        <div>
        <label>Mobile</label>
        <input type="text" placeholder="Mobile" name="mobile" id="mobile" required>
        </div><br>
        <div>
        <label>Password</label>
       <input type="password" placholder="Password"e name="password" id="password" required>
        </div><br>
        <div>
        <label>Confirm Password</label>
        <input type="password"  name="cpassword" required>
        </div><br>
        <div>
        <label>Information</label>
        <textarea placeholder="Information" rows="8" cols="30" name="information" id="information" required></textarea>
        </div><br>
        <div>
            <input type="checkbox" name="agrement"> 
            <label>Terms & Conditions</label>
        </div><br>
            <button type="submit" class="regbtn" name="submit" value="Add">Register</button>

        </div>
    </form>
</body>

</html>