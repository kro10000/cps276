<?php

require_once 'fileUploadProc.php';
$output = "";


if(isset($POST['executeButton'])){ 
     
    $uploaded = true; 
  } else {
    $uploaded = false;
}

if($uploaded = true) {
    $fileName = new FileUpload;
    $output = $fileName->fileValidity();
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Project 7</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="public/css/main.css">
  </head>
  <body>
    <div id="wrapper">
      <h1>File Upload</h1>
      
      <?php

        $linksFile = "showLinks.php";
        echo "<a href= $linksFile>Show file list</a><br><br>";
        echo $output;        

      ?>
      <br><br>
        <form action="main.php" method="post" enctype="multipart/form-data">
            <label for="fileName">File Name:</label><input type="text" id="fileName" name="fileName" class="form-control"><br>
            <input type="file" id="indexName" name="indexName" class="btn-file"><br>
            <input class="btn btn-primary" type="submit" name="submitButton" id="submitButton" value="Upload File">
        </form>
    </div>

  </body>
</html>