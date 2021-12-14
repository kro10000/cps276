<?php

$error = '';
$output = '';

/* HERE I REQUIRE AND USE THE STICKYFORM CLASS THAT DOES ALL THE VALIDATION AND CREATES THE STICKY FORM.  THE STICKY FORM CLASS USES THE VALIDATION CLASS TO DO THE VALIDATION WORK.*/
require_once('classes/StickyForm.php');
$stickyForm = new StickyForm();

/*THE INIT FUNCTION IS WRITTEN TO START EVERYTHING OFF IT IS CALLED FROM THE INDEX.PHP PAGE */
function init(){
  global $elementsArr, $stickyForm;

  /* IF THE FORM WAS SUBMITTED DO THE FOLLOWING  */
  if(isset($_POST['submit'])){

    /*THIS METHODS TAKE THE POST ARRAY AND THE ELEMENTS ARRAY (SEE BELOW) AND PASSES THEM TO THE VALIDATION FORM METHOD OF THE STICKY FORM CLASS.  IT UPDATES THE ELEMENTS ARRAY AND RETURNS IT, THIS IS STORED IN THE $postArr VARIABLE */
    $postArr = $stickyForm->validateForm($_POST, $elementsArr);

    require_once 'classes/Validation.php';
    $admin = new Validation();
    $output = $admin->login($_POST);

    if($postArr['masterStatus']['status'] == "noerrors" && $output === 'success'){
      
      header('location:index.php');

    }
    else{
      /* IF THERE WAS A PROBLEM WITH THE FORM VALIDATION THEN THE MODIFIED ARRAY ($postArr) WILL BE SENT AS THE SECOND PARAMETER.  THIS MODIFIED ARRAY IS THE SAME AS THE ELEMENTS ARRAY BUT ERROR MESSAGES AND VALUES HAVE BEEN ADDED TO DISPLAY ERRORS AND MAKE IT STICKY */
      //echo $output;
      return getForm($output,$postArr);
      
    }
    
  }

  /* THIS CREATES THE FORM BASED ON THE ORIGINAL ARRAY THIS IS CALLED WHEN THE PAGE FIRST LOADS BEFORE A FORM HAS BEEN SUBMITTED */
  else {
      return getForm("", $elementsArr);
    } 
}

/* THIS IS THE DATA OF THE FORM.  IT IS A MULTI-DIMENTIONAL ASSOCIATIVE ARRAY THAT IS USED TO CONTAIN FORM DATA AND ERROR MESSAGES.   EACH SUB ARRAY IS NAMED BASED UPON WHAT FORM FIELD IT IS ATTACHED TO. FOR EXAMPLE, "NAME" GOES TO THE TEXT FIELDS WITH THE NAME ATTRIBUTE THAT HAS THE VALUE OF "NAME". NOTICE THE TYPE IS "TEXT" FOR TEXT FIELD.  DEPENDING ON WHAT HAPPENS THIS ASSOCIATE ARRAY IS UPDATED.*/
$elementsArr = [
  "masterStatus"=>[
    "status"=>"noerrors",
    "type"=>"masterStatus"
  ],

	"email"=>[
		"errorMessage"=>"<span style='color: red; margin-left: 15px;'>Email cannot be blank and must be written as a proper email</span>",
    "errorOutput"=>"",
    "type"=>"text",
		"value"=>"sshaper@test.com",
		"regex"=>"email"
  ],

  "password"=>[
	  "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Password cannot be blank and must be valid</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"password",
		"regex"=>"name"
	],
];


/*THIS IS THE GET FORM FUCTION WHICH WILL BUILD THE FORM BASED UPON UPON THE (UNMODIFIED OF MODIFIED) ELEMENTS ARRAY. */
function getForm($acknowledgement, $elementsArr){

global $stickyForm;
$options = $stickyForm->createOptions($elementsArr['status']);

/* THIS IS A HEREDOC STRING WHICH CREATES THE FORM AND ADD THE APPROPRIATE VALUES AND ERROR MESSAGES */
$form = <<<HTML
    <form method="post" action="index.php?page=login">
    <header>
      <h1>Login</h1>
    </header>

    <div class="form-group">
      <label for="email">Email{$elementsArr['email']['errorOutput']}</label>
      <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
    </div>

    <div class="form-group">
      <label for="password">Password {$elementsArr['password']['errorOutput']}</label>
      <input type="password" class="form-control" id="password" name="password" value="{$elementsArr['password']['value']}" >
    </div>
   
    <div>
    <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </div>
  </form>
HTML;


/* HERE I RETURN AN ARRAY THAT CONTAINS AN ACKNOWLEDGEMENT AND THE FORM.  THIS IS DISPLAYED ON THE INDEX PAGE. */
return [$acknowledgement, $form];

}

?>