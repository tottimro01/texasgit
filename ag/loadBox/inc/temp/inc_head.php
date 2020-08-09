<?php 
	require('../conn.php');
	require('../function.php');

	require('../ag_function.php');
	if(!checkUrlRequest()){ exit(); }
	
	if($_POST["session"]["AGlang"]=="")
	{
		$_POST["session"]["AGlang"]="th";
	}

	require('../../lang/ag_lang.php');
	require('../../lang/function_array.php');
 ?>