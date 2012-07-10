<?php
set_time_limit(0);
class cExec {
    /**
     * Run Application in background
     *
     * @param     unknown_type $Command
     * @param     unknown_type $Priority
     * @return     PID
     */
	function _callExe($directory){
		/*@todo: create an ini that will provide user the default location of the directory */
		set_time_limit(0);
		$dir2 = $directory.'dslexe.exe';
		if (exec($dir2)){
			return true;
		}else{
			return false;
		}
		
		
	}
    function background($Command, $Priority = 0){
       if($Priority)
           $PID = shell_exec("nohup nice -n $Priority $Command > /dev/null & echo $!");
       else
           $PID = shell_exec("nohup $Command > /dev/null & echo $!");
       return($PID);
   }
   /**
    * Check if the Application running !
    *
    * @param     unknown_type $PID
    * @return     boolen
    */
   function is_running($PID){
       exec("ps $PID", $ProcessState);
       return(count($ProcessState) >= 2);
   }
   /**
    * Kill Application PID
    *
    * @param  unknown_type $PID
    * @return boolen
    */
   function kill($PID){
       if(exec::is_running($PID)){
           exec("kill -KILL $PID");
           return true;
       }else return false;
   }
};
?>