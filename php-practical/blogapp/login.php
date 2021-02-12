<?php
include 'connect.php';

?>
<?php

// session_start();
/*if (!isset($_SESSION['user_login'])) {
} else {
    header("location: index.php");
}

$emails = "";
$passs = "";
$error_message = null;
if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        include './connect.php';
        

        $user_login = mysqli_real_escape_string($con, $_POST['email']);
        $user_login = mb_convert_case($user_login, MB_CASE_LOWER, "UTF-8");
        $password_login = mysqli_real_escape_string($con, $_POST['password']);
        $num = 0;
        $password_login_md5 = md5($password_login);

        $insertQ = "SELECT * FROM user WHERE email='$user_login' AND passwordhash ='$password_login_md5'";
        $result = mysqli_query($con, $insertQ) or die(mysqli_error($con));
        if (mysqli_num_rows($result) > 0) {
            session_start();
            $row = mysqli_fetch_array($result);
            $_SESSION['user_login'] = $row['email'];
            setcookie('user_login', $user_login, time() + (365 * 24 * 60 * 60), "/");
            header('location: index.php');
            exit();
        } else {
            $num = 10;
            $emails = $user_login;
            $passs = $password_login;
            $error_message = 'Email or Password incorrect';
        }
    }
}*/

@$email = $_POST["email"];
@$pass1 = $_POST["password"];
$passwordHash = md5($pass1);

if (!$con) {
    die("not connected");
} else {
    if (@$_POST['login']) {
        $select = "SELECT `id`,`email`,`passwordhash` FROM `user` WHERE `email`='$email' and `passwordhash` = '$passwordHash'";
        if (mysqli_query($con, $select)) {
            $row = mysqli_fetch_array(mysqli_query($con, $select));
            if ($row['id'] == "") {
                echo "<script>
            var answer = alert ('Email or Password incorrect.')
            if (!answer)
                window.location='index.php';
            </script>";
            } else {
            session_start();
            $_SESSION['firstName']=$row['firstName'];
            $_SESSION['id']=$row['userId'];	
            header("location:login.php");
            }
        }
    }
}



?>
<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/lstyle.css" />
    <title> Login</title>
   
        
    </script>
</head>

<body>
   
        
    
    
        <div class="container">
        <h1> LOGIN</h1>
        <form action="index.php" method="POST">
            <input type="text" placeholder="Email" name="email" id="uemail" required>

            <input type="password" placeholder="Password" name="password" id="upassword" required>
            <button type="submit" value="Login" name="submit">LOGIN</button>
            
            </form>
            <form action="register.php" method="POST">
            <button  style="color: inherit; text-decoration:none;cursor:pointer;" class="reg-btn">REGISTER NOW</button>
            </form>

        </div>

    
</body>

</html>