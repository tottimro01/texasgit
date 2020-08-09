<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

if($_SESSION["AGlang"]=="")
{
	$_SESSION["AGlang"]="th";
}
require('lang/ag_'.$_SESSION["AGlang"].'.php');

$data = array(
	'status_flag' =>	true,
	'msg' 				=>	$lang_message[5],
);


echo json_encode($data);
 ?>