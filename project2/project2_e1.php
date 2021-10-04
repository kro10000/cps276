<?php  

$numbersL = ["1","2","3","4"];
$numbersR = ["1","2","3","4","5"];

$output = "<ul>";

foreach ($numbersL as $numberL) {
  $output .= "<li>{$numberL}</li>";

  foreach ($numbersR as $numberR) {
    $output .= "<ul><li>{$numberR}</li></ul>";
  }

}
$output .= "</ul>";



?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Project2 Exercise 1</title>
  </head>
  <body>
    <main class="container">
      
      <?php echo $output; ?>
    </main>
  </body>
</html>