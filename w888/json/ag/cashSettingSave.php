<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
if($_SESSION["AGlang"]==""){
	$_SESSION["AGlang"]="th";
}

require('lang/ag_'.$_SESSION["AGlang"].'.php');


	$data = array(
		"msg"  => $lang_message[3] ,
		"status"  => true 
	);


	echo json_encode($data);
 ?>