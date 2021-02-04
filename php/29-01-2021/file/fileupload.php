<?php
$name=$_FILES['file']['name'];
$extention=strtolower(substr($name, strpos($name, '.')+1));

$size=$_FILES['file']['size'];
$max_size='100000000';
$type=$_FILES['file']['type'];

$tmp_name=$_FILES['file']['tmp_name'];

//$error=$_FILES['file']['error'];
//echo "$name <br> $size <br> $type <br> $tmp_name <br> $error";

if (isset($name)) {
	if (!empty($name)) {
		if(($extention=='jpg' || $extention=='jpeg' || $extention=='pdf') && $size<=$max_size)
		{
		$location='uploads/';	
		
			if(move_uploaded_file($tmp_name, $location.$name)){
				echo "uploaded!";
			}else{
			echo "there was an eror";
		}
	}else{
		echo "file must be jpg  and size must be 2mb";
	}

		}else{
		echo "pls upload your file";
	}
	
}


?>


<form method="POST" action="fileupload.php" enctype="multipart/form-data">

	<input type="file" name="file"><br><br>
	<input type="submit" name="submit">

</form>