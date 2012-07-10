<?php	
include_once 'dslWEb_Library/Class/Documents.php';
include_once 'dslWEb_Library/Class/Session.php';
include_once 'dslWEb_Library/Class/status.php';
include_once 'dslWEb_Library/Class/zipFile.php';
include_once 'dslWEb_Library/Class/exec.php';

$objDoc = new cDocuments();
$objSes = new cSession();
$objExec = new cExec();
$objStat = new cStatus;

	$objSes->sesStart();	
	
echo '<div class= "error">';	
echo 'Processing DATA please wait </br>';
echo '</div>';
echo 'after call exec</br>';
	/*Shell execution
	 * function: call dslExe.exe 
	 * define: folder loc;
	 * 
	 */

	$directory = "C:\\dslexe\\";
	$objExec->_callExe2($directory);

/*@todo check if dirout exists */ 
		$dirOut = "C:\\dslweb\\output\\";
	
		$pregfile = 'C:\\dslweb\\output\\';
		
		
 	$fileXmls = glob($dirOut."*.xml");
	$fileXml= array();
			 foreach ($fileXmls as $fileXml)
			 {	
			 	$fileXml2 = $fileXml;
				$fileXml = basename($fileXml);		 	
				
			   	echo "<a href =\"file://C:/dslweb/output/$fileXml\"> $fileXml </a>"."</br>";
			 }
	
//exec ("%SystemRoot%/explorer.exe \"C:\\dslweb\\output\"");

//echo '<a href = "files/dslWeb_output/f6_tcreport.xml"> test</a>';

	/**
	 * Determine value for retval: Cstatus->f:statretval
	 * allow zipfile to be prompted if retval = 0:"success|no error" 
	 */
	
	 $dataRet = $objStat->statReadPSI();
	$dataRet = strval(trim($dataRet));
	$retVal = $objStat->statRetVal($dataRet);
			
			$fDir= $_SESSION['fDir'];
			$fDate= $_SESSION['fDate']; 
			
			
		
	 if($retVal == "No Error</br>"){
		
	 	$objZipFile = new zipFile();
		//$myZip =$objZipFile->compress("E:/xampp/htdocs/dslweb/files/dslweb_output/03-20-2012-915am/");
		$myZip =$objZipFile->compress($fDir);
		
			if(($objDoc->isEmpty($myZip))=="TRUE")
				{echo "ERROR: Compression error. No file found.";
				$outEcho .="ERROR: Compression error. No file found.</br>";
				}else {
				echo $myZip;
			}
			
			
		$outEcho.= 'No errors found </br>';
			
			
			
			
			
	}else{
		
		$outEcho .= 'Error Result Summary : '.$retVal.'</br>';
	 	
	}
		$outEcho.= "(Segregation process completed.)</br> Process Summary:</br>";
		$outEcho.= "Folder Location: ".$fDate."</br>"; 
		$_SESSION['outEcho']=$outEcho;
	Header("Location:webHtml.php");
?>