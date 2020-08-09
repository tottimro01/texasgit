<?php 
ob_start(); if (!isset($_SESSION)) { session_start(); }
  
if($_SESSION["AGlang"]==""){
  $_SESSION["AGlang"]="th";
}

require('../lang/ag_lang.php');
require('../inc/conn.php');
require('../inc/function.php');

$id				 = sql_escape_str($_POST['id']);
$username 		= sql_escape_str($_POST['username']);
$ctype 			= sql_escape_str($_POST['ctype']);
$futype 		= sql_escape_str($_POST['futype']);
$active 		= sql_escape_str($_POST['active']);

if($active == "Y"){
	$active = 1; 
}else if($active == "N"){
	$active = 0;
}else{
	$data = array(
		'msg' => $lang_ag[4],
		'status' => false,		
	);
	echo json_encode($data);
	exit();
}

if($futype == "ag")
{
	$update_sql = "update IGNORE `bom_tb_agent` SET `r_sport_delete_bill`= '{$active}' WHERE r_id = $id";
	$query = sql_query($update_sql);
	if($query)
	{
		$data  = array(
			'msg'     =>  $lang_ag[5],
			'status'  =>  true,
		);
	}else{
		$data  = array(
			'msg' => $lang_ag[4],
			'status' => false,
		);
	}	
	
}else if($futype == "m"){

	$sql="select * from bom_tb_member where m_id = $id";
	$rs = sql_array($sql);

	$m_lotto_del = $rs["m_lotto_del"];
	$m_lotto_convert = $rs["m_lotto_convert"];
	$m_confirm 		= $rs["m_confirm"];
	$m_sport_line 	= $rs["m_sport_line"];
	$m_sport_print 	= $rs["m_sport_print"];

	if($ctype == '2_list_open')
	{
		$m_confirm = $active;
	}else if($ctype == '3_list_open')
	{
		$m_sport_line = $active;
	}else if($ctype == '4_list_open')
	{
		$m_sport_print = $active;
	}
	else if($ctype == '1_list_lotto_open'){
		$m_lotto_del = $active;
	}else if($ctype == '2_list_lotto_open'){
		$m_lotto_convert = $active;
	}


	$update_sql = "update IGNORE `bom_tb_member` SET `m_confirm`= {$m_confirm} , `m_sport_line`= {$m_sport_line} , `m_sport_print`= {$m_sport_print} , `m_lotto_del`= {$m_lotto_del}  , `m_lotto_convert`= {$m_lotto_convert} WHERE m_id = $id";

	$query = sql_query($update_sql);
	if($query)
	{
		$data  = array(
			'msg'     =>  $lang_ag[5],
			'status'  =>  true,
		);
	}else{
		$data  = array(
			'msg' => $lang_ag[4],
			'status' => false,
		);
	}	

}else{

	$data = array(
		'msg' => $lang_ag[4],
		'status' => false,		
	);

}

echo json_encode($data);
?>