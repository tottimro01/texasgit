<?php 
	require('../conn.php');
	require('../function.php');

	require('../ag_function.php');
	if(!checkUrlRequest()){ exit(); }
	
	if($_POST["session"]["AGlang"]=="")
	{
		$_POST["session"]["AGlang"]="th";
	}

	require('../../lang/ag_'.$_POST["session"]["AGlang"].'.php');
	require('../../../lang/function_'.$_POST["session"]["AGlang"].'_new.php');
 ?>