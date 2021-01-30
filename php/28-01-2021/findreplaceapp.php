<?php

$offset=0;

if(isset($_POST['data']) && isset($_POST['search']) && isset($_POST['replace']) ){
	$data=$_POST['data'];
	$search=$_POST['search'];
	$replace=$_POST['replace'];
	$str_length=strlen($search);

    if (!empty($_POST['data']) && !empty($_POST['search']) && !empty($_POST['replace']) ) {
    	
    	while ($strpos=strpos($data, $search, $offset)) {
    	     $offset=$strpos+$str_length;
    	     //echo "$offset<br>";
    	     $data=substr_replace($data, $replace, $strpos,$str_length);

    	}
       //echo $data;


    }else{
    	echo "Please fill in all fields";
    }

}

?>

<form action="findreplaceapp.php" method="POST">
	<textarea cols="30" rows="6" name="data"> <?php echo $data;?></textarea><br><br>
	Search For:<br>
	<input type="text" name="search"><br><br>
	Repalce With:<br>
	<input type="text" name="replace"><br><br>
	<input type="submit" name="Find and Replace">

</form>