<?php

if(count($_POST) > 0){ 
    require_once 'addNameProc.php'; 
    $addName = new AddNamesProc(); 
  
    $output = $addName->addClearNames(); 
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

    <title>Project 4</title>
        </head>
        <body>
            <div class="container">
                <h1>Add Names</h1>
                <form action="main.php" method="post">
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" name="addNameButton" id="addNameButton" value="Add Name" />                            
                        <input type="submit" class="btn btn-primary" name="clearNameButton" id="clearNameButton" value="Clear Names" />
                    </div>

                    <div class="form-group">
                        <label for="wholeName">Enter Name</label>
                        <input type="text" class="form-control" name="wholeName" id="wholeName">
                    </div>

                    <div class="mb-3">  
                        <label for="namelist" class="form-label">List of Names</label>
                        <textarea style="height: 500px;" class="form-control" 
                        id="namelist" name="namelist"><?php echo $output ?></textarea>                
                    </div>
                </form>
            </div>
        </body>
</html>