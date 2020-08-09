<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
if($_SESSION["AGlang"]==""){
	$_SESSION["AGlang"]="th";
}
require('../inc/conn.php');
require('../inc/function.php');
require('../lang/ag_'.$_SESSION["AGlang"].'.php');


if($_POST[ctype] == "M") // member
{

	$id = $_POST[id];
	$_active = $_POST[cvalue];

	$sql = "UPDATE `bom_tb_member` SET `m_active` = '{$_active}' where m_agent_id like '%*$_SESSION[rid]*%'  and  m_id = {$id}";
	$re=sql_query($sql);

	if($re)
	{
		$data = array(
		'msg' => $lang_message[5],
		'status' => "success"
		);
	}else{
		$data = array(
			'msg' => $lang_message[4],
			'status' => "error"
		);
	}

}else if($_POST[ctype] == "A")
{


	$id = $_POST[id];
	$_active = $_POST[cvalue];

	$sql = "UPDATE `bom_tb_agent` SET `r_active` = '{$_active}' where r_agent_id like '%*$_SESSION[rid]*%'  and  r_id = {$id}";
	$re=sql_query($sql);

	if($re)
	{
		$data = array(
		'msg' => $lang_message[5],
		'status' => "success"
		);
	}else{
		$data = array(
			'msg' => $lang_message[4],
			'status' => "error"
		);
	}

}

echo json_encode($data);


?>