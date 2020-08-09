<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

if($_SESSION["AGlang"]=="")
{
	$_SESSION["AGlang"]="th";
}
require('lang/ag_'.$_SESSION["AGlang"].'.php');

if($_POST[save] == "save")
{
	if($_POST[tnumber] == "")
	{
		$data = array(
			'msg' 				=> 	$lang_message[22],
			'status_flag'	=> 	false
		);
	}
	else
	{
		$data = array(
			'msg' 				=>	$lang_message[5],
			'status_flag' => 	true
		);
	}
}
else if($_POST[delete] == "delete")
{
	if($_POST[tnumber] == "")
	{
		$data = array(
			'msg' 				=> 	$lang_message[22],
			'status_flag' =>	false
		);
	}
	else
	{
		$data = array(
			'msg' 				=> 	$lang_message[6],
			'status_flag' => 	true
		);
	}
}
else
{
	$data = array(
		'msg' 				=> 	$lang_message[22],
		'status_flag' => 	false
	);
}

echo json_encode($data);

?>