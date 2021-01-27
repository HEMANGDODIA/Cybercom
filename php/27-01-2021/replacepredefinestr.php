<?php
$find=array('good','a','item');
$repalce=array('bad','a','product');
$string="this is a good item";
$new_string=str_replace($find, $repalce, $string);	

echo $new_string;
?>