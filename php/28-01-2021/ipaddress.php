<?php
/*require 'conf2.inc.php';
foreach ($ip_blocked as $ip) {
	if ($ip=$ip_address) {
		die('your IP address, '.$ip_address.' has been blocked');
	}
}*/



$http_client_ip=$_SERVER['HTTP_CLIENT_IP'];
$http_x_forwared_for=$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote_addr=$_SERVER['REMOTE_ADDR'];

if(!empty($http_client_ip)){
	$ip_address=$http_client_ip;
} else if (!empty($http_x_forwared_for)) {
	$ip_address=$http_x_forwared_for;

}else{
	$ip_address=$remote_addr;
}

echo $ip_address;
?>

<h1>Welcome!</h1>