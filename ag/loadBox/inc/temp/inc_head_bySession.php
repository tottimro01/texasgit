<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
	require('../conn.php');
	require('../function.php');

	if($_SESSION["AGlang"]=="")
	{
		$_SESSION["AGlang"]="th";
	}

	require('../../lang/ag_lang.php');
	require('../../lang/function_array.php');

 ?>