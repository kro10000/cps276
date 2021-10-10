<?php

class Calculator {

    //private $_op = 0; $_firstNumber, $_secondNumber;
    public $op = "0";
    public $firstNumber = 0;
    public $secondNumber = 0;
    public function __call($name_of_function, $arguments) {
              
        if($name_of_function == 'calc') {
              
            switch (count($arguments)) {
                case 1:
                    return "You must enter a string and two numbers <br>\n";
                case 2:
                    return "You must enter a string and two numbers <br>\n";
                case 3:
                    
                    switch ($arguments[0]) {
                        case "+":
                            return "The sum of the numbers is " . ($arguments[1]+$arguments[2]) . "<br>\n"; 
                        case "-":
                            return "The difference of the numbers is " . ($arguments[1]-$arguments[2]) . "<br>\n";
                        case "*":
                            return "The product of the numbers is " . ($arguments[1]*$arguments[2]) . "<br>\n";
                        case "/":
                            if ($arguments[2] == 0) {
                                return "Cannot divide by zero <br>\n";
                            } else {
                                return "The division of the numbers is " . ($arguments[1]/$arguments[2]) . "<br>\n";
                            }
                    }   
            }
        }
    }
}
      
// Declaring a calculator type object
$s = new Calculator;
      
// Function call 
echo($s->calc());
?>
