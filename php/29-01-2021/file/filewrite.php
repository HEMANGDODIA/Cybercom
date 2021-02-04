<?php
$handle=fopen("new.txt", "w");
fwrite($handle, "Dodiya "."\n");
fwrite($handle, "Hemang");

fclose($handle);

echo "Written";
?>