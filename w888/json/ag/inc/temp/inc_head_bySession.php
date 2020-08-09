<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
	require('../conn.php');
	require('../function.php');

	if($_SESSION["AGlang"]=="")
	{
		$_SESSION["AGlang"]="th";
	}

	require('../../lang/ag_'.$_SESSION["AGlang"].'.php');
	require('../../../lang/function_'.$_SESSION["AGlang"].'_new.php');

 ?>