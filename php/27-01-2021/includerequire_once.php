<?php
include 'header.inc.php';
include_once 'header.inc.php'; //ont show twice time

//same as 
if (defined('header.inc.php')) {
	include('header.inc.php');
}

?>