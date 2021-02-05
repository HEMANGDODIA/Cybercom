<?php
$conn_error="COund not connect";
$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';
$mysql_db='a_database';

//host name, username, password
//mysql_select_db($mysql_db);

if (!mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db)) {
	die($conn_error);
}else{

echo "Connected!";
}
?>