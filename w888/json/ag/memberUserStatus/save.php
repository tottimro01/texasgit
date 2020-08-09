<?php 
ob_start(); if (!isset($_SESSION)) { session_start(); }
  
if($_SESSION["AGlang"]==""){
  $_SESSION["AGlang"]="th";
}

require('../lang/ag_'.$_SESSION["AGlang"].'.php');
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
		'msg' => $lang_message[4],
		'status' => false,		
	);
	echo json_encode($data);
	exit();
}



if($futype == "ag")
{
	$sql="select * from bom_tb_agent where r_id = $id";
	$rs = sql_array($sql);

	$xy["r_open"] = $rs["r_open"];
	$xy["ctype"] = $ctype;
	$xy["active"] = $active;

	$ex_r_open =  explode(",", $rs["r_open"]);
	$ex_r_open[$ctype] = $active;
	$r_open = implode(",",$ex_r_open);	

	$update_sql = "UPDATE `bom_tb_agent` SET `r_open`= '{$r_open}' WHERE r_id = $id";
	$query = sql_query($update_sql);
	if($query)
	{
		$data  = array(
			'msg'     =>  $lang_message[5],
			'status'  =>  true,
			'xy'  =>  $xy,
		);
	}else{
		$data  = array(
			'msg' => $lang_message[4],
			'status' => false,
		);
	}	
	
}else if($futype == "m"){

	$sql="select * from bom_tb_member where m_id = $id";
	$rs = sql_array($sql);

	$xy["ctype"] = $ctype;
	$xy["active"] = $active;

	$ex_m_open =  explode(",", $rs["m_open"]);
	$ex_m_open[$ctype] = $active;
	$m_open = implode(",",$ex_m_open);

	$xy["m_open"] = $m_open;	



	$update_sql = "UPDATE `bom_tb_member` SET `m_open`= '{$m_open}' WHERE m_id = $id";
	$query = sql_query($update_sql);
	if($query)
	{
		$data  = array(
			'msg'     =>  $lang_message[5],
			'status'  =>  true,
			'xy'  =>  $xy,
		);
	}else{
		$data  = array(
			'msg' => $lang_message[4],
			'status' => false,
		);
	}	


	// $data  = array(
	// 		'msg' => $lang_message[4],
	// 		'status' => false,
	// 		'xy' => $xy,
	// );

}else{

	$data = array(
		'msg' => $lang_message[4],
		'status' => false,		
	);

}

echo json_encode($data);
 ?>