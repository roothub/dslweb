<?php
/**
 * Class 
 * 
 * @author Choy
 *
 */
	class cDocuments {
		
		function baseUrl(){
		  //$protocol = $_SERVER['HTTPS'] ? "https" : "http";
		  //return $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		return "http" . "://" . $_SERVER['HTTP_HOST']; 
		  		}
				
			 
		function fileExist($arg1){
			
			$oldDir  ='D:/xampp/htdocs/dslweb/uploads_temp/';
			//echo $oldDir;
					chdir($oldDir);
			
			if (file_exists($arg1)){
				echo 'the file [ '.$arg1.' ] exists'. '</br>';
				return TRUE;
			}
			else {
				return FALSE;
				echo 'file not found (ex)';
			}
		} 
		
		function fileDel($arg2)
		{
			
			$oldDir = "D:/xampp/htdocs/dslweb/uploads_temp/";
					chdir($oldDir);
			
				if(unlink($arg2)){
					return TRUE;			
				}
				else{	
					return FALSE;
				}
		}
		function fileCreate($arg3){
			$dir  = 'D:/xampp/htdocs/dslweb/files/dslweb_input/';
			chdir($dir);
				$dateNow = cDocuments::getDate(); 
			$file = 'PSI_DSL_DLL_INPUT.txt';
			$fh = fopen($file,'w') or die ('can\'t open '.$file);
			$sData = 'D:\\xampp\\htdocs\\dslweb\\uploads_temp\\'.$arg3."\n";
			fwrite($fh,$sData);
				$sData = "D:\\xampp\\htdocs\\dslweb\\files\\dslweb_output\\$dateNow".PHP_EOL;
				$sData2 ="D:\\xampp\\htdocs\\dslweb\\files\\dslweb_output\\$dateNow\\";
				fwrite($fh,$sData);
			$sData = "D:\\xampp\\htdocs\\dslweb\\files\\dslweb_config\\config.xml";			
			fwrite($fh,$sData);
			fclose($fh);
			$sDatas = array('fDir'=>$sData2,'fDate'=>$dateNow);
			return $sDatas;		
			$sData2= '';
			$sData = '';
			}
		function getDate()
		{
			$timezone = 'Asia/Manila';
			date_default_timezone_set($timezone);
			$timeNow =date("m-d-Y-Hia");
			return $timeNow;
		}
		function createDir($arg2)
		{
			if(cDocuments::existDir($arg2)=="TRUE"	){
				echo 'ERROR:The directory already exists.';
				echo '<a href ="//localhost/dslweb/dslWeb.php"> home </a></br> ';
				return false;;
			}
			else{
							
					if(mkdir($arg2)=="TRUE"){
						return TRUE;
					}
					else{
						return false;
					} 
					
					}
		}
		function existDir($arg)
		{
			if(is_dir($arg) == "TRUE"){
				echo ' not a directrory eixt'; 
				return TRUE;
			}
			else{
				return FALSE;
			}
			$arg='';
		}
		function isEmpty($arg)
		{
			if(!isset($arg)){
				return TRUE;
				unset($arg);
			}
			else
			return false;
			unset($arg);
		}
		function listFiles()
		{
 			if ($handle = opendir('.')) {
   			while (false !== ($file = readdir($handle))){
	        	  if ($file != "." && $file != ".."){	
	         	 	$thelist .= '<a href="'.$file.'">'.$file.'</a>';
	        }
       		}
 			
  			closedir($handle);
 		}
		
	}
}