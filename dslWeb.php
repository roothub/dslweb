<?php
	require_once 'dslWEb_Library/Class/Documents.php';
	require_once 'dslWEb_Library/Class/Session.php';
	
	$objSes = new cSession();
	$objSes->sesStart();
		
	/* before starting. make sure that no process is currently running in the background */
		
	$dslImageName = 'dslexe.exe'; //
	$_SESSION['dslImageName'] = $dslImageName; 
	$pid = $objSes->pidGet($dslImageName);
		
	/* check if the process id exists on the system. */
	
		if ($pid){
			$_SESSION['pid'] = $pid;
			include 'dslWeb_Html/form/formStopProcess.php';
		}else{
			session_destroy();
			unset($_SESSION['$outEcho']); 
			$objDoc = new cDocuments();
			//include_once 'dslWeb_Html/form/formUpload.php';
			include_once 'dslWeb_Html/form/formUpload.php';
		}
	
		