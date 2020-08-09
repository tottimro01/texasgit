<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php

if($_SESSION["AGlang"]=="")
{
	$_SESSION["AGlang"]="th";
}


if($_SESSION['r_id'] == "")
{
	exit();
}

require('inc/conn.php');
require('inc/function.php');
require('inc/ag_function.php');
require('lang/ag_lang.php');
require('lang/function_array.php');


if($_POST["save"] == "save")
{
	if($_POST["tnumber"] == "" || $_POST["tsum"] == "" )
	{
		$data = array(
			'msg' 				=>	$lang_ag[7],
			'status' =>	false
		);
	}
	else
	{

			$r_id= $_SESSION["r_id"];
			$tnumber = sql_escape_str($_POST["tnumber"]);
			$l_zone = sql_escape_str($_POST["l_zone"]);
			$l_rob = sql_escape_str($_POST["l_rob"]);
			$l_type = sql_escape_str($_POST["ttype"]);
			$tsum = sql_escape_str($_POST["tsum"]);

			$l_zone = ($l_zone =="") ? 1 : $l_zone;
			$l_rob = ($l_rob =="") ? 1 : $l_rob;
			$tsum = ($tsum =="") ? 0 : $tsum;

			if($tsum==0){
				$slock = 1;
			}else{
				$slock = 0;
			}

			


			$sql = "SELECT * FROM `bom_tb_".$l_zone."_ag` WHERE `play_number` = $tnumber and `lot_type` = $l_type and `lot_rob` = $l_rob and `r_id` = $r_id ";
			$rs = sql_array_lot($sql);

			if($rs["play_number"]=="")
			{
				$sql = "INSERT INTO `bom_tb_".$l_zone."_ag`(`play_number`, `lot_type`, `lot_rob`, `r_id`, `s_sum`, `s_lock`) VALUES ('$tnumber',$l_type,$l_rob,$r_id,$tsum,'$slock')";
				$rs = sql_query_lot($sql);
				$data = array(
					'msg' 				=>	$lang_ag[5],
					'status' =>	true,
					'sql' =>	$sql,
				);
			}else{
				$sql = "update `bom_tb_".$l_zone."_ag` set `s_sum` = $tsum , `s_lock` = '$slock' WHERE `play_number` = '$tnumber' and `lot_type` = $l_type and `lot_rob` = $l_rob and `r_id` = $r_id ";
				$rs = sql_query_lot($sql);
				$data = array(
					'msg' 				=>	$lang_ag[5],
					'status' =>	true,
					'sql' =>	$sql,
				);
				/*$data = array(
					'msg' 				=>	$lang_message[27],
					'status' =>	false
				);*/
			}
	}
}
else if($_POST["deleted"] == "deleted")
{

	if($_POST[tnumber] == "")
	{
		$data = array(
			'msg' 				=>	$lang_ag[4],
			'status' =>	false
		);
	}
	else
	{

		$r_id= $_SESSION["r_id"];
		$tnumber = sql_escape_str($_POST["tnumber"]);
		$l_zone = sql_escape_str($_POST["l_zone"]);
		$l_rob = sql_escape_str($_POST["l_rob"]);
		$l_type = sql_escape_str($_POST["ttype"]);

		$l_rob = ($l_rob =="") ? 1 : $l_rob;

		$sql = "DELETE FROM `bom_tb_".$l_zone."_ag` WHERE `play_number` = $tnumber and `lot_type` = $l_type and `lot_rob` = $l_rob and `r_id` = $r_id ";
		$rs = sql_query_lot($sql);
		$data = array(
			'msg' 				=>	$lang_ag[6],
			'status' =>	true
		);
	}
}
else
{
	$data = array(
		'msg' 				=>	$lang_ag[21],
		'status' =>	"false"
	);
}

echo json_encode($data);
?>