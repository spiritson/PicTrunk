<?php 

ini_set('display_errors',1);

$uploaddir = "uploads/";

$filename=$_FILES['file']['name'];
$target = $uploaddir.$filename; 


$timestamp= time();

if (!empty($_FILES)) {
if(file_exists($target)){
	$file=pathinfo($target,PATHINFO_FILENAME);
	$extension=pathinfo($target,PATHINFO_EXTENSION);
	$target=$uploaddir.$file."_".$timestamp.".".$extension;
}
 

move_uploaded_file($_FILES['file']['tmp_name'], $target);
}

?>