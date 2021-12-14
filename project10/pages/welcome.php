<?php




function init(){
    session_start();
    $msg = "Welcome " . $_SESSION['username'];
    return ["<h1>Welcome</h1>", $msg];

    
}

?>