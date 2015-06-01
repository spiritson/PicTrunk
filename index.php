<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PicTrunk UserDashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="userpage.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Courgette">
	<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
	

	<link href="css/dropzone.css" type="text/css" rel="stylesheet">

	<script src="js/dropzone.min.js"></script>
	<script src="js/jquery.min.js"></script>
	
<script>

Dropzone.options.myDropzone = {
    init: function() {
    
     	this.on("addedfile", function(file) { alert("Added file."); });
	this.on("success", function(file) {
	    
	    alert(file.name);
	    $.ajax({
	    url: "multicurl.php",
	    type: "POST",
	    data: { 'name': file.name}
	    });
		
		
		});
	
    }
    
};
</script>
</head>
	
<body>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand">PicTrunk</a>
            </div>
         
    </nav>

       
    
    <form action="upload.php" class="dropzone" id="my-dropzone"></form>
    
    <div class="row">
           <?php
            //scan "uploads" folder and display them accordingly
           $folder = "uploads";
	   $path1 = "http://www.spiritsons.com/PicTrunk/";
	  

	   
	   if(is_dir($folder)){
	    
           $results = scandir('uploads');
           foreach ($results as $result) {
            if ($result == '.' or $result == '..') continue;
            
	
            if (is_file($folder . '/' . $result)) {
		
	    
	  	echo '
           		<div class="column" >
                <div class="col-md-3">
                 <a href="'.$folder . '/' . $result.'" target="_blank" class="thumbnail"</a>
                    <img src="'.$folder . '/' . $result.'" alt="...">
		    
                   
                </a>
		
		<div class="lead" id="viewtext">
		<p class="text-center text-danger">View Image on website of</p>
		</div>
		<div class="btn-group btn-group-justified row-fluid">
			<a href="'.$path1.$folder . '/' . $result.'" target="_blank" class="btn btn-success" >Vinit</a>
			<a href="'.$path2.$folder . '/' . $result.'" target="_blank" class="btn btn-success" >Renu</a>
			<a href="'.$path3.$folder . '/' . $result.'" target="_blank" class="btn btn-success" >Hardik</a>
		</div>
                </div>
               </div>';
            }
          }
	}
           ?>
    	 
     </div>

   
    
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>