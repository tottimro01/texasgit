<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
	require('conn.php');
	require('function.php');

	if($_SESSION["AGlang"]=="")
	{
		$_SESSION["AGlang"]="th";
	}

	require('../lang/sa_lang.php');
	require('../lang/function_th_new.php');

	$lot_typeArry = $lot_type["th"][1];
	$lotHun_typeArry = $lot_type["th"][3]; 
 ?>