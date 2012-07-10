<?php 
/**
 * Class Session: session instances: 
  * @author Choy
 *
 */
	class cSession {
		// session initialization
		function sesStart()
		{ 
			session_start();
		}
		
		/* check if the Process id exists for dslweb.exe*/
		function pidGet($arg1) 
		{
			exec( "TASKLIST /NH /FO \"CSV\" /FI \"imagename eq \"$arg1\" ", $output );
			$output = explode( ",", $output[0] );
			
			
			if (($output[0])=='INFO: No tasks are running which match the specified criteria.'){
				return false;
			}		
			else{
				$pid = $output[1];
				return $pid;
				$arg1 = '';
			}
		}
		
		function pidDel($arg2)
		{
			
			if(exec("TASKKILL /PID $arg2 /FI \"STATUS eq RUNNING \""))
			{
				return TRUE;
			}
			else 
			return(false);
		}
		
		
		function sesCheck() {
			if(session_start)
			 	return 'TRUE';
			else
				return 'FALSE';
		}
			
		function sesDestroy() {
			 	session_destroy();
				session_unset() ;	
		}
	}