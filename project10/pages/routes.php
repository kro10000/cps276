<?php

session_start();
//redirects to login if unauthorized
if($_SESSION['access'] !== "administrator" && $_SESSION['access'] !== "staff"){
    require_once('pages/login.php');
        $result = init();

} 

$path = "index.php?page=welcome";

//locks out links to nonadmin
if($_SESSION['access'] == "administrator"){
    $addAdminLink = '<div class="col"><a href="index.php?page=addAdmin">Add Admin</a></div>';
    $deleteAdminLink = '<div class="col"><a href="index.php?page=deleteAdmin">Delete Admin</a></div>';
} else {
    $addAdminLink = '';
    $deleteAdminLink = '';
}
//removes links from unauthorized session
if($_SESSION['access'] == "administrator" || $_SESSION['access'] == "staff"){
    $addContactLink = '<div class="col"><a href="index.php?page=addContact">Add Contact</a></div>';
    $deleteContactLink = '<div class="col"><a href="index.php?page=deleteContacts">Delete contact(s)</a></div>';
    $logoutLink = '<div class="col"><a href="index.php?page=logout">logout</a></div>';
} else{
    $addContactLink = '';
    $deleteContactLink = '';
    $logoutLink = '';
}

//display links
$nav=<<<HTML
    <nav>
    
        <div class="row g-5">

            $addContactLink
            $deleteContactLink
            $addAdminLink
            $deleteAdminLink
            $logoutLink            
            
        </div>
    </nav>
HTML;

//checks session session admin or staff status before redirect
if(isset($_GET)){

    if($_GET['page'] === "login"){
        require_once('pages/login.php');
        $result = init();
    }

    else if($_GET['page'] === "logout"){
        require_once('logout.php');
        $result = init();
    }

    else if($_GET['page'] === "addContact"){
        if($_SESSION['access'] == "administrator" || $_SESSION['access'] == "staff"){
            require_once('pages/addContact.php');
            $result = init();
        }
        else{
            require_once('logout.php');
            $result = init();
        }    
    }

    else if($_GET['page'] === "addAdmin"){
        if($_SESSION['access'] == "administrator"){
            require_once('pages/addAdmin.php');
            $result = init();
        }
        else{
            require_once('logout.php');
            $result = init();
        }    
    }

    else if($_GET['page'] === "deleteAdmin"){
        if($_SESSION['access'] == "administrator"){
            require_once('pages/deleteAdmin.php');
            $result = init();
        }
        else{
            require_once('logout.php');
            $result = init();
        }    
    }

    else if($_GET['page'] === "deleteContacts"){
        if($_SESSION['access'] == "administrator" || $_SESSION['access'] == "staff"){
            require_once('pages/deleteContacts.php');
            $result = init();
        }
        else{
            require_once('logout.php');
            $result = init();
        }    
    }

    else if($_GET['page'] === "welcome"){
        if($_SESSION['access'] == "administrator" || $_SESSION['access'] == "staff"){
            require_once('pages/welcome.php');
            $result = init();
        }
        else{
            require_once('logout.php');
            $result = init();
        }    
    }

    else {
        header('location: '.$path);
    }
}

else {
    header('location: '.$path);
}

?>