<?php
require 'connect.inc.php';
$db = mysqli_connect('localhost', 'root', '', 'a_database');

echo $user_ip=$_SERVER['REMOTE_ADDR'];

function ip_exists($ip){
global $user_ip;

$db = mysqli_connect('localhost', 'root', '', 'a_database');

	$query="SELECT 'ip' FROM 'hits_ip' WHERE 'ip'='$user_ip'";
	$query_run=mysqli_query($db,$query);
	$query_num_rows=mysqli_num_rows($query_run);
	if ($query_num_rows==0) {
		return false;
	}else if( $query_num_rows>=1){
		return true;
	}
}
function ip_add($ip){

$db = mysqli_connect('localhost', 'root', '', 'a_database');

	$query="INSERT INTO 'hits_ip' VALUES ('$ip')";
	$query_run=mysqli_query($db,$query);
}

function update_count(){
$db = mysqli_connect('localhost', 'root', '', 'a_database');


$query="SELECT 'count' FROM 'hits_count'";
if(@$query_run=mysqli_query($db,$query)){
	$count =mysqli_result($query_run,0,'count');
	$count_inc=$count+1;

	$query_update="UPDATE 'hits_count' SET 'count'='$count_inc'";
	$query_update_run=mysqli_query($db,$query_update);
}

}


if (!ip_exists($user_ip)) {
	update_count();
	ip_add($user_ip);
}

?>