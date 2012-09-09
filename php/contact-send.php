<?php
//Catch any errors while testing our script
//Remove when going live.
//ini_set("display_errors", "1");
//error_reporting(E_ALL); 

//Ensures no one loads page and does simple spam check.
if(isset($_POST['email']))
{
	//Include our email validator for later use 
	require 'email-validator.php';
	$validator = new EmailAddressValidator();
	
	//Declare our $errors variable we will be using later to store any errors.
	$errors = array();
	
	//Setup our basic variables
//	$input_name = strip_tags($_POST['name']);
	$input_email = strip_tags($_POST['email']);
//	$input_subject = strip_tags($_POST['subject']);
	$input_message = "This email address would like to be notified of special offers: " . $input_email;
	
	//We'll check and see if any of the required fields are empty.
	//We use an array to store the required fields.
	$required = array('Email' => 'email');
	
	//Loops through each required $_POST value 
	//Checks to ensure it is not empty.
	foreach($required as $key=>$value)
	{
		if(isset($_POST[$value]) && $_POST[$value] !== '') 
		{
			continue;
		}
		else {
			$errors[] = $key . ' cannot be left blank';
		}
	}
	
	//Make sure the email is valid. 
    if (!$validator->check_email_address($input_email)) {
           $errors[] = 'Email address is invalid.';
    }
	
	//Now check to see if there are any errors 
	if(empty($errors))
	{
		
		//No errors, send mail using conditional to ensure it was sent.
		if(mail('info@travaasa.com', "Travaasa Special Offer Signup", $input_message, "From: $input_email"))
		{
			echo 'Thank you! You are now registered to receive special offers.';
		}
		else 
		{
			echo 'There was a problem sending your email.';
		}
		
	}
	else 
	{
		
		//Errors were found, output all errors to the user.
		echo implode('<br />', $errors);
		
	}
}
else
{
	die('Direct access to this page is not allowed.');
}
