<?php
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
		
				
		if((!empty($_FILES["fileUpload"])) && ($_FILES['fileUpload']['error'] == 0)) { //Сheck that we have a file
			  $filename = basename($_FILES['fileUpload']['name']);
			  $ext = substr($filename, strrpos($filename, '.') + 1);
 			  	//echo 'File extension:  '.$ext."</br>";     
 			  	
			    if (($ext == "xml") && ($_FILES["fileUpload"]["type"] == "text/xml")){
				  	$file = $_FILES['fileUpload']['name'];
					$testObj = $objDoc->fileExist($file);
									/* @check to see if there is a similar file located in uploads_temp
									 * -> proceed to delete the file if it exists 
									 *  */
						if($testObj == 'TRUE'){
							if (($objDoc->fileDel($file))=='TRUE'){
								 	echo 'previous copy of '.$file.' has been deleted</br>';
							}else{
									echo 'file not deleted.';}	
						}else{
							echo 'file ' .$file.' does not exist... Creating file.....';
						}
		   			  $url = 'D:/xampp/htdocs/dslweb/'; //change directory first
			 		  chdir($url);
			 
				 	if ( move_uploaded_file ($_FILES['fileUpload'] ['tmp_name'],"uploads_temp/{$_FILES['fileUpload'] ['name']}")){			
						$sDatas = $objDoc->fileCreate($file);	/* instantiate a new (clean) file PSI_DSL_INPUT.txt */
							foreach ($sDatas as $sData => $values){								
								$GLOBALS[$sData]= $values;
							}											
						$_SESSION['fDir'] = $fDir; 
						$_SESSION['fDate'] = $fDate;
	
							if (($objDoc->createDir($fDir)) == "TRUE"){
								echo 'Successfully created '.$fDir.'</br>';
								$outEcho .='Successfully created '.$fDir.'</br>';
							}else{
								echo 'Failed to create '.$fDir.'</br>';
								$outEcho .= 'Failed to create '.$fDir.'</br>';
								$_SESSION['outEcho'] = $outEcho;
								Header("Location:webHtml.php");
							}	
						echo 'PSI_DSL_INPUT.txt'.' has been created successfully. </br>';
						$outEcho .= 'PSI_DSL_INPUT.txt'.' has been created successfully. </br>';
															
														/*
														 * INSERT SHELL EXEC -> CALL DLL VIA ASP (SIR PAUL)
														 */
														//echo 'call executable (sir paul) '; 
														//sleep(5);
						$_SESSION['outEcho'] = $outEcho;
						Header("Location:afterCallExec2.php");	
					}
	 	}
		 		else{
		 		 
		 		 $outEcho .= "Error: Only xml files can be uploaded";
		 		 $_SESSION['outEcho']=$outEcho;
		 		 Header("Location:webHtml.php");
		 		 
			  	}
				  
		}
		else {
		 $outEcho .= "Error: Please select a file.";;
		 $_SESSION['outEcho']=$outEcho;
		 Header("Location:webHtml.php");
		}
  
