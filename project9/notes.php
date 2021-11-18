<?php
require_once 'classes/Crud.php';
$crud = new Crud();
// $output = $crud->getNotes();

if(isset($_POST['submitButton'])){
    $output = $crud->getNotes();
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
        <h1>Display Notes</h1>
    </header>
    <main> 
        <a href ="http://russet.wccnet.edu/~koneill5/cps276/project9/addNote.php">Add Note<br><br></a>
        
        <form action="notes.php" method="post">
                    
            <div class="form-group">
                <label for="beginnningDate">Beginning Date</label>
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" name="beginningDate" id="beginningDate">
            </div>

            <div class="form-group">
                <label for="endingDate">Ending Date</label>
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" name="endingDate" id="endingDate">
            </div>


            <div class="col-12">
                <input type="submit" class="btn btn-primary" name="submitButton" id="submitButton" value="Get Notes" />                            
            </div>  

            <?php  
                echo $output; 
            ?>

        </form>

        

    </main>
   
</body>
</html>
