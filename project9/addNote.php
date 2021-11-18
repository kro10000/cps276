<?php
 require_once 'classes/Crud.php';
 $crud = new Crud();
 
 if(isset($_POST['submitButton'])){
    $output = $crud->addNote();
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Project9</title>
</head>
<body class="container">
    <header> 
        <h1>Add Note</h1>
    </header>
    <main> 
        <a href ="http://russet.wccnet.edu/~koneill5/cps276/project9/notes.php">Display Notes<br><br></a>
        
        <form action="addNote.php" method="post">
                    
                    <div class="form-group">
                        <label for="dateAndTime">Date and Time</label>
                        <input type="text" class="form-control" placeholder="mm/dd/yyyy --:-- --" name="dateAndTime" id="Date And Time">
                    </div>

                    <div class="mb-3">  
                        <label for="noteContent" class="form-label">Note</label>
                        <textarea style="height: 500px;" class="form-control" 
                        input type="text"id="noteContent" name="noteContent"></textarea>                
                    </div>

                    <div class="mb-3"> 
                        <br></br>
                    </div>

                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" name="submitButton" id="submitButton" value="Add Note" />                            
                    </div>
                </form>
    </main>
   
</body>
</html>

