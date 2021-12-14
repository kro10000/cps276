<?php
require_once 'classes/Pdo_methods.php';
class Validation extends PdoMethods{
	/* USED AS A FLAG CHANGES TO TRUE IF ONE OR MORE ERRORS IS FOUND */
	private $error = false;

	/* CHECK FORMAT IS BASCALLY A SWITCH STATEMENT THAT TAKES A VALUE AND THE NAME OF THE FUNCTION THAT NEEDS TO BE CALLED FOR THE REGULAR EXPRESSION */
	public function checkFormat($value, $regex)
	{
		switch($regex){
			case "name": return $this->name($value); break;
			case "phone": return $this->phone($value); break;
			case "address": return $this->address($value); break;
			case "email": return $this->email($value); break;
			case "dob": return $this->dob($value); break;
			
		}
	}


		
	/* THE REST OF THE FUNCTIONS ARE THE INDIVIDUAL REGULAR EXPRESSION FUNCTIONS*/
	private function name($value){
		$match = preg_match('/^[a-z-\' ]{1,50}$/i', $value);
		return $this->setError($match);
	}

	private function phone($value){
		$match = preg_match('/\d{3}\.\d{3}.\d{4}/', $value);
		return $this->setError($match);
	}

	private function email($value){
		$match = preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $value);
		return $this->setError($match);
	}

	private function address($value){
		$match = preg_match('/\d+ [a-zA-Z ]+/', $value);
		return $this->setError($match);
	}

	private function dob($value){
		$match = preg_match('/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/', $value);
		return $this->setError($match);
	}
	
	private function setError($match){
		if(!$match){
			$this->error = true;
			return "error";
		}
		else {
			return "";
		}
	}


	/* THE SET MATCH FUNCTION ADDS THE KEY VALUE PAR OF THE STATUS TO THE ASSOCIATIVE ARRAY */
	public function checkErrors(){
		return $this->error;
	}
	
	
	public function login($post){
		
		$pdo = new PdoMethods();
		$sql = "SELECT email, password, status, name FROM adminMod WHERE email = :email";
		$bindings = array(
			array(':email', $post['email'], 'str')
		);

		$records = $pdo->selectBinded($sql, $bindings);

		/** IF THERE WAS AN RETURN ERROR STRING */
		if($records == 'error'){
			return "There was an error logging in";
		}
		
		/** */
		else{
			if(count($records) != 0){
				/** IF THE PASSWORD IS NOT VERIFIED USING PASSWORD_VERIFY THEN RETURN FAILED, OTHERWISE RETURN SUCCESS, IF NO RECORDS ARE FOUND RETURN NO RECORDS FOUND. */
				if($post['password'] == $records[0]['password']) {
					
					if($records[0]['status'] == 'Admin'){
						session_start();
						$_SESSION['access'] = "administrator";
						$_SESSION["username"] = $records[0]['name'];
						return "success";
						
					}
					else if($records[0]['status'] == 'Staff'){
						session_start();
						$_SESSION['access'] = "staff";
						$_SESSION["username"] = $records[0]['name'];
						return "success";
					}
					
				}
				else {
					return "Login Credentials Incorrect";
				}
				
			}
			else {
				
				return "Login Credentials Incorrect";
			}

		}
	}
}