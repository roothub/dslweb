<?php
	session_start();
		$pid = $_SESSION['pid'];
		$sub = $_POST['subStop'];
		$prcName = $_SESSION['dslImageName'];
	switch($sub){
			case 'Terminate process':
				include_once 'dslWEb_Library/Class/Session.php';
				   $objSes = new cSession();
				   
						if (($objSes->pidDel($pid)=="TRUE")){
							$outEcho .= $prcName.': [PID] '. $pid.' terminated. </br>';
							$_SESSION['outEcho'] = $outEcho;
							HEADER("Location:webHtml.php");
						}
						else{
							$outEcho .='ERROR:failed to stop [PID]'.$pid.' Please contact administrator</br>'; 
							$_SESSION['outEcho'] = $outEcho;
							HEADER("Location:webHtml.php");
						}
			break;
				
			default:
							$outEcho .='ERROR:A process is still running in the background.</br> '; 
							$_SESSION['outEcho'] = $outEcho;
							HEADER("Location:webHtml.php");
			break;
	}
		
	