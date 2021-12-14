<?php
function init(){

    require_once 'classes/Pdo_methods.php';

    if(isset($_POST['delete'])){
        if(isset($_POST['chkbx'])){
            $error = false;
            foreach($_POST['chkbx'] as $id){
                $pdo = new PdoMethods();

                $sql = "DELETE FROM adminMod WHERE id=:id";
                
                $bindings = [
                    [':id', $id, 'int'],
                ];


                $result = $pdo->otherBinded($sql, $bindings);

                if($result === 'error'){
                    $error = true;
                    break;
                }
            }
        }
    }

    $output = "";
    
    $pdo = new PdoMethods();

    /* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
    $sql = "SELECT * FROM adminMod";

    $records = $pdo->selectNotBinded($sql);

    if(count($records) === 0){
        $output =    
            "<header>
                <h1>Delete Admin(s)</h1>
            </header>";
        $output .= "<p>There are no records to display</p>";
        return [$output,""];
    }
    else {

        $output =    
            "<header>
                <h1>Delete Admin(s)</h1>
            </header>"; 
        $output .= "<form method='post' action='index.php?page=deleteAdmin'>";
        $output .= "<input type='submit' class='btn btn-danger' name='delete' value='Delete'/><br><br><table class='table table-striped table-bordered'>
    <thead>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Status</th>
        <th>Delete</th>
        </tr>
    </thead><tbody>";

    foreach($records as $row){
        $output .= "<tr><td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['password']}</td>
        <td>{$row['status']}</td>
        <td><input type='checkbox' name='chkbx[]' value='{$row['id']}' /></td></tr>";
    }

    $output .= "</tbody></table></form>";

    if(isset($error)){
        if($error){
            $msg = "<p>Could not delete the admin</p>";
        }
        else {
            $msg = "<p>Admin(s) deleted</p>";
        }
    }
    else {
        $msg="";
    }
    return [$msg, $output];
    }
}
?>


