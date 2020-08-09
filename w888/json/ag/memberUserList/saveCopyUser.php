<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php
if($_SESSION["AGlang"]==""){
	$_SESSION["AGlang"]="th";
} 
require('../inc/conn.php');
require('../inc/function.php');
require('../inc/ag_function.php');
require('../lang/ag_'.$_SESSION["AGlang"].'.php');


if($_POST['futype'] == "a")
{

	$data = array(
		'msg' => $lang_message[5],
		'status' => "success"
	);




}else if($_POST['futype'] == "M")
{

	$data = array(
		'msg' => $lang_message[5],
		'status' => "success"
	);


}

echo json_encode($data);


 ?>