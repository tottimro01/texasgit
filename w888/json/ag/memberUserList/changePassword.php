<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
if($_SESSION["AGlang"]==""){
	$_SESSION["AGlang"]="th";
}
require('../inc/conn.php');
require('../inc/function.php');
require('../lang/ag_'.$_SESSION["AGlang"].'.php');

$id = $_POST[id];
$oldpass = $_POST[oldpass];
$newpass = $_POST[newpass];



if($_POST[id] == '' || $_POST[oldpass] == '' || $_POST[newpass] == '')
{
	$data = array(
		'msg' => $lang_message[7],
		'status' => "error"
	);
}else if($_POST[oldpass] != $_POST[newpass])
{
	$data = array(
		'msg' => $lang_message[13],
		'status' => "error"
	);
} 
else{

	if($_POST[futype] == "A")
	{

			$sql = "UPDATE `bom_tb_agent` SET `r_pass` = '{$newpass}' where r_agent_id like '%*$_SESSION[rid]*%'  and  r_id = {$id}";
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

	
	}else if($_POST[futype] == "M")
	{	

		$oldpass_hash = md5($oldpass);
		$newpass_hash = md5($newpass);

			$sql = "UPDATE `bom_tb_member` SET `m_pass` = '{$newpass_hash}' where m_agent_id like '%*$_SESSION[rid]*%'  and  m_id = {$id}";
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
					// 'sql' => $sql,
					'status' => "error"
				);
			}

	}else 
	{
		$data = array(
		'msg' => $lang_message[25],
		'status' => "error"
		);
	}


}


echo json_encode($data);
 ?>