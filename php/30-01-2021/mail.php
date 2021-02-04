<?php
$to='dodiyahemang48@gmail.com';
$subject="This is an email";
$body="this is a test  email ";
$headers='From:hvdodiya9162@gmail.com';

if(mail($to,$subject,$body,$headers)){
	echo "Email has been sent to".to;
}else{
	echo "there was an error sending to email";
}


?>