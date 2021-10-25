<?php

if(count($_POST) > 0){ 
    require_once 'fileClass.php'; 
    $addFile = new FileClass(); 
    $msg = $addFile->returnMsg();
    $path =$addFile->returnPath();
    $output = $addFile->addFile(); 
  } 

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Project 5</title>
        </head>
        <body>
            <div class="container">
                <h1>File and Directory Assignment</h1>
                <b1>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only<br><br></b1>
                <b1><?php echo $msg ?></b1>
                <b1><?php echo $path ?></b1>
                <form action="project5.php" method="post">
                    
                    <div class="form-group">
                        <label for="directoryName">Folder Name</label>
                        <input type="text" class="form-control" name="directoryName" id="directoryName">
                    </div>

                    <div class="mb-3">  
                        <label for="fileContent" class="form-label">File Content</label>
                        <textarea style="height: 500px;" class="form-control" 
                        input type="text"id="fileContent" name="fileContent"></textarea>                
                    </div>

                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" name="submitButton" id="submitButton" value="Submit" />                            
                    </div>
                </form>
            </div>
        </body>
</html>