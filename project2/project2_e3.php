<?php  

$rows = 15;
$columns = 5;
$rowI = 1;
$rowC = 1;


$output = "<table border=\"2\">";

for ($j=1; $j <= $rows; $j++){
    for ($i=1 ; $i<=$columns; $i++){
        $rowI = $i;
        
        $output .= "<td>Row $j Cell $i </td>";
        }

        $output .= "</tr>";
        $output .= "<tr>";
    }
        $output .= "</tr>";
        $output .= "</table>";




?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">

    <title>Project2 Exercise 3</title>
  </head>
  <body>
    <main class="container">
      
    <?php echo $output; ?>
            
    </main>
  </body>
</html>