<?php
	class cStatus
	{
		function statReadPSI()
		{
			$dir2  = "D:\\xampp\\htdocs\\dslWeb\\files\\dslWeb_input\\";
			chdir($dir2);
			$file = 'PSI_DLL_OUTPUT_RETVAL.txt';
			
				$fh = fopen($file, 'r');
				$data = fread($fh, 10);
				return $data;

				fclose($fh);
	
		}
		
		function statRetVal($argRet)
		{
			$argRet = strval($argRet);
				switch ($argRet){
					case '0':
						return 'No Error</br>';
						break;				
					case '10':
						return '(ERROR:10) Input XML file path is invalid</br>';
						break;
					case '11':
						return '(ERROR:11) Output directory is invalid</br>';
						break;
					case '12':
						return '(ERROR:12) Lookup directory is invalid</br>';
						break;
					case "2001":
						return '(ERROR:2001) File contains error in the Tree Construction (TC) process</br>';
						break;
					case '3001':
						return '(ERROR:3001) File contains error in the Engineering Attributes (EA) process</br>';
						break;
					case '4001':
						return '(ERROR:4001) File contains error in both checking process (TC AND EA)</br>';
						break;
					case '5001':
						return '(ERROR:5001) DSL Segregator Error - Not all buses are connected</br>';
						break;
					case '5002':
						return '(ERROR:5002) DSL Segregator Error - Base Impedance is equal to zero</br>';
						break;
					case '5003':
						return '(ERROR:5003) Divergent Load Flow</br>';
						break; 					
					case '-10':
						return '(ERROR:-10) Computer is invalid to run the function</br>';
						break;
					default:
						return 'undefined error function</br>';
						break;
				}
			$argRet = '';
		}
	}