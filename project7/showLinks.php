<?php
    require_once 'listFilesProc.php';

    $nameList = new fList();

    $output = $nameList->makeList();


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Project 7 List of Files</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="public/css/main.css">
  </head>
  <body>
    <div id="wrapper">
      <h1>List Files</h1>
      
      <?php

        $mainFile = "main.php";
        echo "<a href= $mainFile>Add file</a>";
        echo $output;        

      ?>

    </div>

  </body>
</html>