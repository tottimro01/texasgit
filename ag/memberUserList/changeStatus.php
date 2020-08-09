<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
if($_SESSION["AGlang"]==""){
	$_SESSION["AGlang"]="th";
}
require('../inc/conn.php');
require('../inc/function.php');
require('../lang/ag_lang.php');


if($_POST[ctype] == "M") // member
{

	$id = $_POST[id];
	$_active = $_POST[cvalue];

	$date_loct = "";
	if($_active == "3")
	{
		$date_loct = " ,  `m_date_lock` = now() ";
	}else if($_active == "1")
	{
		$date_loct = " , `m_date_lock` = NULL ";
	}

	$sql = "update IGNORE `bom_tb_member` SET `m_active` = {$_active} $date_loct where m_agent_id like '%*$_SESSION[rid]*%'  and  m_id = {$id}";
	$re=sql_query($sql);

	if($re)
	{
		$data = array(
		'msg' => $lang_ag[5],
		// 'sql' => $sql,
		'status' => "success"
		);
	}else{
		$data = array(
			'msg' => $lang_ag[4],
			// 'sql' => $sql,
			'status' => "error"
		);
	}

}else if($_POST[ctype] == "A")
{


	$id = $_POST[id];
	$_active = $_POST[cvalue];

	$date_loct = "";
	if($_active == "3")
	{
		$date_loct = " ,  `r_date_lock` = now() ";
	}else if($_active == "1")
	{
		$date_loct = " , `r_date_lock` = NULL ";
	}

	$sql = "update IGNORE `bom_tb_agent` SET `r_active` = {$_active}  $date_loct where r_agent_id like '%*$_SESSION[rid]*%'  and  r_id = {$id}";
	$re=sql_query($sql);

	if($re)
	{
		$data = array(
		'msg' => $lang_ag[5],
		'status' => "success"
		);
	}else{
		$data = array(
			'msg' => $lang_ag[4],
			'status' => "error"
		);
	}

}

echo json_encode($data);


?>