<?php
	/*##################################################################*/
	require_once 'dslWEb_Library/Class/Documents.php';
	require_once 'dslWEb_Library/Class/Session.php';
		/**
		 * Object instances 
		 * Document Class->objDoc, Session Class->objSes 
		 * $sData - path to directory ( cDocuments class)-> f:fileCreate	 
		 */
	$objDoc = new cDocuments();
	$objSes = new cSession();
	$objSes->sesStart();
	/*##################################################################*/
	
	/* the switch option evaluates what value is used from the POSTED name submit in 
	 * the formOption.php form 
	 */  
	switch($_POST['Submit']){
		case 'Segregate':
			//header("Locattion:success.php");
			//echo 'value is segregate';
			break;
		case 'Sanitize':
			echo 'value is sanitize';
			//break;
		default:
			echo 'error:cannot find switch $_POST';
	
	}


?>