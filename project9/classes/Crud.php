<?php
require_once 'PdoMethods.php';
class Crud {

    public function getNotes(){
        $pdo = new PdoMethods();
        
        $bDate = strtotime($_POST['beginningDate']);
        $eDate = strtotime($_POST['endingDate']);

        $sql = "SELECT * FROM project9 WHERE dateStamp BETWEEN $bDate AND $eDate";

        $records = $pdo->selectNotBinded($sql);

        /* IF THERE WAS AN ERROR DISPLAY MESSAGE */
        if($records == 'error'){
            return 'There has been and error processing your request';
        }
        else {
            if(count($records) != 0){
                return $this->makeTable($records);	
            }
            else {
                return 'no notes found';
            }
        }
    }

    public function addNote(){
	
		$pdo = new PdoMethods();

		/* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
		$sql = "INSERT INTO project9 (dateStamp, note) VALUES (:dateAndTime, :noteContent)";

			 
	    /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
	    $bindings = [
			[':dateAndTime',strtotime($_POST['dateAndTime']),'str'],
			[':noteContent',$_POST['noteContent'],'str']
		];

		/* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
		$result = $pdo->otherBinded($sql, $bindings);

		/* HERE I AM RETURNING EITHER AN ERROR STRING OR A SUCCESS STRING */
		if($result === 'error'){
			return 'There was an error adding the name';
		}
		else {
			return 'Name has been added';
		}
	}


    private function makeTable($records){
        $output = "<table class='table table-bordered table-striped'><thead><tr>";
		$output .= "<th>Date and Time</th><th>Note</th><tbody>";

		foreach ($records as $row){
            $dateHolder = date("n/j/Y  h:i a",$row['dateStamp']);
            $output .= "<tr><td> $dateHolder </td>";
            
            $output .= "<td>{$row['note']}</td>";
		}
		
		$output .= "</tbody></table></form>";
		return $output;
    }
}

?>