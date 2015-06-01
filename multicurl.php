<?php


   $url_1 = 'http://www.spiritsons.com/PicTrunk/upload.php';
   
   
    
    $uploaddir = "uploads/";
    $filename=$_POST['name'];
    $target=$uploaddir.$filename;
    
    $file_name_with_full_path = realpath($target);
       
        $headers = array('Content-Type: multipart/form-data');
	$postfields = array('file'=>'@'.$file_name_with_full_path,"filename" =>$filename);
        
        $ch_1 = curl_init($url_1);
        
        
        $options_1 = array(
            CURLOPT_URL => $url_1,
            CURLOPT_HEADER => true,
            CURLOPT_POST => 1,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_RETURNTRANSFER => true
        );
        
        
        curl_setopt_array($ch_1, $options_1);
        
        
       
        $mh = curl_multi_init();
        curl_multi_add_handle($mh, $ch_1);
        
       

        $running = null;
        do {
           curl_multi_exec($mh, $running);
        } while ($running);

        curl_multi_close($mh);
?>