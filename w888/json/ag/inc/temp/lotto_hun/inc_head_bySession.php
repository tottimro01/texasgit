<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
	require('../../conn.php');
	require('../../function.php');

	if($_SESSION["AGlang"]=="")
	{
		$_SESSION["AGlang"]="th";
	}

	require('../../../lang/ag_'.$_SESSION["AGlang"].'.php');
	require('../../../../lang/function_'.$_SESSION["AGlang"].'_new.php');

	$lot_typeArry = $lot_type[$_SESSION["AGlang"]][1];
	// lot_type หวยุ้น
	$lotHun_typeArry = $lot_type[$_SESSION["AGlang"]][3]; 

	// lot_type หวยุ้นตาม zone
	// $_REQUEST[zone] =($_REQUEST[zone] != "") ? $_REQUEST[zone] : 2; 
	// $lotHun_typeArry_byzone = $lot_type[$_SESSION[AGlang]][$_REQUEST[zone]];  
	$lotHun_typeArry_byzone = $lot_type[$_SESSION["AGlang"]][3];  

 ?>