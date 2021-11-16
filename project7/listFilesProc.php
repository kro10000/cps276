<?php

require_once 'crud.php';


    class fList{

        function makeList()
        {
            $list = new Crud();
            
            return $list->getNames();
        }

    }

?>