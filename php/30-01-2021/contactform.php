<?php

if (isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_text']) ) {
	$contact_name=$_POST['contact_name'];
	$contact_email=$_POST['contact_email'];
	$contact_text=$_POST['contact_text'];

	if (!empty($contact_name) && !empty($contact_email) && !empty($contact_text)) {

		$to='dodiyahemang48@gmail.com';
        $subject="Contact form submitted";
        $body="$contact_name"."\n".$contact_text;
        $headers='From:'.$contact_email;

            if(mail($to,$subject,$body,$headers)){
	            echo "Email has been sent to".to;
           }else{
	         echo "there was an error sending to email";
                }




	}else{
		echo "pls fill all fields";
	}
}

?>
<form action="contactform.php" method="POST" >
	Name:<br><input type="text" name="contact_name"><br><br>
	Email Adddres:<br><input type="text" name="contact_email"><br><br>
	Message:<br>
	<textarea name="contact_text" rows="6" cols="30">
		
	</textarea><br><br>
	<input type="submit" name="submit">
</form>