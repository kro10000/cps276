<?php

class AddNamesProc {
    
    public $nameArr;
    public $formattedName;
    public $appendedName;
    public $tempNameArr1;
    public $tempNameArr2;

    public function addClearNames() {
        if(isset($_POST['clearNameButton'])){
            
            return "";
        }
        
        if(isset($_POST['addNameButton'])){ 
            
            $tempNameArr1 = explode(" ", $_POST["wholeName"]);
            $tempNameArr2[0] = $tempNameArr1[1];
            $tempNameArr2[1] = $tempNameArr1[0];
            $formattedName = implode(", ", $tempNameArr2);
            $appendedName = $formattedName . "\n";

            $nameArr = explode("\n", $_POST["namelist"]);
            array_push($nameArr, $appendedName);
            sort($nameArr);

            return implode("", $nameArr);

        }
    }
}

?>