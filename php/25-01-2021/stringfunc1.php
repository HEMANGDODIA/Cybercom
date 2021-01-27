<?php
$string = "Hello world as good  string . welcome to my page ";
$string_word_count = str_word_count($string, 1,'.');

print_r( $string_word_count);
?>