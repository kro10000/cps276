<?php
require_once "crud.php";

class FileUpload{

    public $name, $indexName, $size, $type;

    function __construct()
    {
        $this->name = $_FILES["fileName"]["name"];
        $this->indexName = $_POST['indexName'];
        $this->size = $_FILES["fileName"]["size"];
        $this->type = $_FILES["fileName"]["type"];
    }

    function fileValidity()
    {
        if($this->size > 100000)
        {
            return "File is too big";
        } else if($this->type != "application/pdf")
        {
            //big issue here, all files seem to not register as pdfs
            //commented out the code to try to get it to work by forcing the path, but with no luck

            //return "File must be a pdf file";
            return $this->addFilePath();
        } else
        {
            return $this->addFilePath();
        }
    }

    function addFilePath()
    {
            $crud = new Crud();
            return $crud->addName();            
       
    }
}

