<?php
  //  ini_set('display_errors',1);  
  //  error_reporting(E_ALL);
    $url_1 = "http://www.spiritsons.com/PicTrunk/up2.php";
    $url_2 = "http://www.spiritsons.com/PicTrunk/up2.php";
    $url_3 = "http://www.spiritsons.com/PicTrunk/up2.php";
    $url_4 = "http://www.spiritsons.com/PicTrunk/up2.php";    

    $filename = $_FILES['userfile']['name'];
    $filedata = $_FILES['userfile']['tmp_name'];
    $uploadOk = 1;
    $uploadpath = "uploads/";
    $target_file = $uploadpath . $filename;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $fileExists = "";
    $fileSize = "";
    $fileType = "";
    $fileUploaded = "";
    $empty = "";

$uploadOk = 1;
if (file_exists($target_file))
{
    $fileExists = "You already uploaded the file, Jim...!!";
    $uploadOk = 0;
}

// Maximum file size limit

if ($_FILES["userfile"]["size"] > 1000000)
{
    $fileSize = "Too large file, Jim...!!";
    $uploadOk = 0;
}

// Allow certain file types only

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" )
{
    $fileType = "Only JPG, JPEG, PNG & GIF file types are allowed, Jim...!!";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0)
{
    $fileUploaded = "The file cannot be uploaded.";
}
else
{
	  
    if ($filedata != '')
    {
        $headers = array("Content-Type:multipart/form-data");
        $postfields = array("filedata" => "@$filedata", "filename" =>$filename);
   
        $ch_1 = curl_init($url_1);
        $ch_2 = curl_init($url_2);
        $ch_3 = curl_init($url_3);
	  $ch_4 = curl_init($url_4);

        $options_1 = array(
            CURLOPT_URL => $url_1,
            CURLOPT_HEADER => true,
            CURLOPT_POST => 1,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_RETURNTRANSFER => true
        );
        $options_2 = array(
            CURLOPT_URL => $url_2,
            CURLOPT_HEADER => true,
            CURLOPT_POST => 1,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_RETURNTRANSFER => true
        );
        $options_3 = array(
            CURLOPT_URL => $url_3,
            CURLOPT_HEADER => true,
            CURLOPT_POST => 1,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_RETURNTRANSFER => true
        );
	  $options_4 = array(
            CURLOPT_URL => $url_4,
            CURLOPT_HEADER => true,
            CURLOPT_POST => 1,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch_1, $options_1);
        curl_setopt_array($ch_2, $options_2);
        curl_setopt_array($ch_3, $options_3);
	curl_setopt_array($ch_4, $options_4);
       
        $mh = curl_multi_init();
        curl_multi_add_handle($mh, $ch_1);
        curl_multi_add_handle($mh, $ch_2);
        curl_multi_add_handle($mh, $ch_3);
	curl_multi_add_handle($mh, $ch_4);
 
        $running = null;
        do {
           curl_multi_exec($mh, $running);
        } while ($running);
	
        curl_multi_close($mh);
	$success = "The file ". basename( $_FILES["userfile"]["name"]). " has been uploaded.";

    }
    else
    {
    $empty = "No file Present.";
    }
}
echo $fileExists.$fileSize.$fileType.$fileUploaded.$empty.$success;
?>