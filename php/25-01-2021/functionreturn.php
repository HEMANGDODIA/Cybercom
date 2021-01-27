<?php

function module($x,$y){
	$result=$x % $y;
	return $result;

}

function add($x,$y){
	$result=$x +$y;
	return $result;
}

echo add(module(58,5),5);
?>