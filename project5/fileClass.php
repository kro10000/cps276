<?php

    class FileClass {

       public $outputMsg;
       public $filePath;

        public function __construct() {
            
            $directory = "directories/" . $_POST["directoryName"];
            
            if (!file_exists($directory)) {
                mkdir($directory,0777,TRUE);
                chmod($directory, 0777);
                touch($directory . "/readme.txt");
                chdir($directory);
                chmod("readme.txt", 0777);
                $handle = fopen("readme.txt", 'a');
                fwrite($handle, $_POST["fileContent"]);
                fclose($handle);
                $filePath = "<a href =" . "http://147.182.183.205/cps276/project5/" . $directory . "/readme.txt" . ">Path where file is located</a><br><br>";
                $this->filePath = $filePath;
                $outputMsg = "File and directory were created<br><br>";
                $this->outputMsg = $outputMsg;
                
            } else {
                $filePath = "<br>";
                $this->filePath = $filePath;                
                $outputMsg = "A directory already exists with that name<br><br>";
                $this->outputMsg = $outputMsg;                

            }
            
        }
        
        public $fileName;
        
    

        public function returnMsg(){
            return $this->outputMsg;
        }
        
        public function returnPath(){
            return $this->filePath;
        }

        public function addFile(){



        }
        
        
        

    }

?>