<?php 

	include_once 'dslWEb_Library/Class/constant.php';
	$objConst = new cConstant;
	$objConst->conSet();
	echo constant("DRV").constant("URL").'</br>';
	echo DRV.URL;
?>
