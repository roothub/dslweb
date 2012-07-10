<?php
	include_once '/dslWEb_Library/Class/Session.php';
	$objSes = new cSession();
	$outEcho = '';
	$outEcho .= 'The DSL segragator program is currently running in the background with a proccess id of '."$pid".'</br>';
	$outEcho .= '(Please contact administrator for information.)</br>';
	$outEcho .= '<form action="stopPrcs.php" method ="post">
				<input type="submit" value="Terminate process" name ="subStop">
				<input type ="submit" value ="Wait" name ="subStop">
				</form>
				';
	$_SESSION['outEcho'] =$outEcho;




