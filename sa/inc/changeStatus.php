<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

if($_SESSION["AGlang"]=="")
{
	$_SESSION["AGlang"]="th";
}

require('../lang/sa_lang.php');
require('conn.php');
require('function.php');
require('ag_function.php');
require('../../lang/function_array.php');



if($_POST['ctype'] == "A")
{
	$id = $_POST[id];
	$_active = $_POST[cvalue];


	if($_POST['acType'] == 'S')
	{
		$sql = "UPDATE `bom_tb_agent` SET `r_active` = '{$_active}' where r_id = {$id} and r_level= 1 ";
	}else{
		$sql = "UPDATE `bom_tb_agent` SET `r_sport_delete_bill` = '{$_active}' where r_id = {$id} and r_level= 1 ";
	}

	
	$re=sql_query($sql);

	if($re)
	{
		$data = array(
		'msg' => "สำเร็จ",
		'status' =>  true
		);
	}else{
		$data = array(
			'msg' => "ผิดพลาด",
			'status' => false
		);
	}

	echo json_encode($data);
	exit();

}