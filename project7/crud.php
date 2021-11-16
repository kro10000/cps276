<?php
require 'Pdo_methods.php';

class Crud extends PdoMethods{

	public function getNames(){
		
		/* CREATE AN INSTANCE OF THE PDOMETHODS CLASS*/
		$pdo = new PdoMethods();

		/* CREATE THE SQL */
		//$sql = "SELECT DISTINCT file_given_name, file_path, FROM assignment7 ORDER BY file_given_name";
        $sql = "SELECT * FROM assignment7";
		//PROCESS THE SQL AND GET THE RESULTS
		$records = $pdo->selectNotBinded($sql);

		/* IF THERE WAS AN ERROR DISPLAY MESSAGE */
		if($records == 'error'){
			return 'There has been and error processing your request';
		}
		else {
			if(count($records) != 0){
				return $this->createList($records);
			}
			else {
				return 'no files found';
			}
		}
	}

	public function addName(){
	
		$pdo = new PdoMethods();

		/* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
		$sql = "INSERT INTO assignment7 (file_name, file_path, file_given_name) VALUES (:fileName_t, :filePath_t, :givenName_t)";

			 
	    /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
	    $bindings = [
			[':file_name_t',$_FILES["fileName"]["name"],'str'],
			['filePath_t',"testdocuments/".$_FILES["fileName"]["name"],'str'],
			[':givenName_t',$_POST['indexName'],'str']



		];

		/* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
		$result = $pdo->otherBinded($sql, $bindings);

		/* HERE I AM RETURNING EITHER AN ERROR STRING OR A SUCCESS STRING */
		if($result === 'error'){
			return 'There was an error adding the file';
		}
		else {
			return 'File has been added';
		}
	}

	


	/*THIS FUNCTION TAKES THE DATA FROM THE DATABASE AND RETURN AN UNORDERED LIST OF THE DATA*/
	private function createList($records){
		$list = '<ul>';
		foreach ($records as $row){
			$list .= "<li><a target='_blank' href={$row['file_path']}>{$row['file_given_name']}</li>";
		}
		$list .= '</ul>';
		return $list;
	}

	/*THIS FUNCTION TAKES THE DATA AND RETURNS THE DATA IN INPUT ELEMENTS SO IT CAN BE EDITED.  */
	private function createInput($records){
		$output = "<form method='post' action='update_delete_name.php'>";
		$output .= "<input class='btn btn-success' type='submit' name='update' value='Update'>";
		$output .= "<input class='btn btn-danger' type='submit' name='delete' value='Delete'>";
		$output .= "<table class='table table-bordered table-striped'><thead><tr>";
		$output .= "<th>First Name</th><th>Last Name</th><th>Eye Color</th><th>Gender</th><th>State</th><th>Update/Delete</th><tbody>";
		foreach ($records as $row){
			$output .= "<tr><td><input type='text' class='form-control' name='fname^^{$row['id']}' value='{$row['first_name']}'></td>";

			$output .= "<td><input type='text' class='form-control' name='lname^^{$row['id']}' value='{$row['last_name']}'></td>";

			$output .= "<td><input type='text' class='form-control' name='color^^{$row['id']}' value='{$row['eye_color']}'></td>";

			$output .= "<td><input type='text' class='form-control' name='gender^^{$row['id']}' value='{$row['gender']}'></td>";

			$output .= "<td><input type='text' class='form-control' name='state^^{$row['id']}' value='{$row['state']}'></td>";

			$output .= "<td><input type='checkbox' name='inputDeleteChk[]' value='{$row['id']}'></td></tr>";
		}
		
		$output .= "</tbody></table></form>";
		return $output;
	}
}