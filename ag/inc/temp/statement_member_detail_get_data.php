<?php 
require('inc_head_bySession.php');

$view_date=_bdate();

if(empty($_POST["sdate"]) || empty($_POST["edate"]))
{
  $_d=$view_date;
  $_e=$view_date;
}else{
  $_d = $_POST["sdate"];
  $_e = $_POST["edate"];
}

$e1=explode("-",$_d);
  $dbg=mktime(9,0,0,$e1[1],$e1[0],$e1[2]);
$e2=explode("-",$_e);
  $dbe=mktime(8,59,59,$e2[1],$e2[0]+1,$e2[2]);

  $datediff = $dbe-$dbg;
  $num_date = floor($datediff / (60 * 60 * 24));
if($num_date>90){
  $_e = date("d-m-Y", strtotime("+90 day", $dbg));
}
$eshow=explode("-",$_d);
  $dbg_show=mktime(9,0,0,$e1[1],$e1[0],$e1[2]);
$e2show=explode("-",$_e);
  $dbe_show=mktime(8,59,59,$e2[1],$e2[0]+1,$e2[2]);

$dsearch = date("Y-m-d H:i:s" , $dbg_show);
$esearch = date("Y-m-d H:i:s" , $dbe_show);

$r_id = sql_escape_str($_POST['id']);




// ดึงข้อมูล agent ภายใต้
$sql_agent =  "select r_id , r_name , r_user , r_agent_id , r_level from bom_tb_agent where  r_id = $r_id";
$result_agent = sql_array_as($sql_agent);
$agent_name = "[ ".$result_agent['r_user']." ] : ";
$_r_agent_id =  $result_agent['r_agent_id'].$result_agent['r_id']."*";

$sql_payment = "select * from bom_tb_all_payment where `m_agent_id` = '".$_r_agent_id."' and bap_type IN (5,6) and `m_id` IS NOT NULL and bap_date between '$dsearch' and '$esearch' ORDER BY bap_id desc";
$re=sql_query($sql_payment);

$sum = 0;
while($rs=sql_fetch($re)){
	$m_id_list[] =  $rs["m_id"];
	$bap_by_id[] =  $rs["bap_by_id"];
	$change = ($rs['bap_in'] == "") ? $rs['bap_out'] : $rs['bap_in'];

	$sum += floatval($change);

	$arr["list"]["list_".$rs['bap_id']] = array(
		'id' => $rs['bap_id'] , 
		'mid' => $rs['m_id'] , 
		'date' => $rs['bap_date'],
		'user' => "OHO",
		'type' => $all_payment[$rs['bap_type']],
		'before_credit' => _cbp($rs['bap_before'],2),
		'before_win_loss' => number_format(0,2),
		'before_kang' => number_format(0,2),
		'after_credit' =>  _cbp(floatval($rs['bap_after']),2),
		'after_win_loss' => number_format(0,2),
		'after_kang' => number_format(0,2),
		'change' => _cbp($change,2),
		'change_by' => $rs['bap_by_id'],
		'bap_by_type' => $rs['bap_by_type'],
	);

	
}

$sql ="select r_id, r_user from `bom_tb_agent` WHERE `r_id` IN (".implode(',', array_map('intval', array_unique($bap_by_id))).")";
$re=sql_query($sql);
$agents_list = array();
while($rs=sql_fetch($re)){
	$agents_list[$rs["r_id"]]["r_user"] = $rs["r_user"];
}


$sql_subagent =  "select u_id , u_name , u_user from bom_tb_agent_use where  r_id = $r_id";
$re = sql_query($sql_subagent);

$subagent_list = array();
while($rs=sql_fetch($re)){

	$subagent_list[$rs['u_id']]["r_user"] = $rs["u_user"];
}

$sql ="SELECT `m_id` ,`m_name`,`m_user` FROM `bom_tb_member` WHERE `m_id` IN (".implode(',', array_map('intval', array_unique($m_id_list))).") and m_agent_id  = '".$_r_agent_id."'";
$re=sql_query($sql);
$members_list = array();
while($rs=sql_fetch($re)){

	$members_list[$rs["m_id"]]["m_user"] = $rs["m_user"];
	$members_list[$rs["m_id"]]["m_name"] = $rs["m_name"];
}

if(count($arr["list"]) == 0){
  $arr["list"] = [];
}
// $data["sql_payment"] = $sql_payment;
// $data["sql_subagent"] = $sql_subagent;
$data["sum"] = _cbp($sum,2);
$data["list"] = $arr["list"];
$data["members_list"] = $members_list;
$data["agents_list"] = $agents_list;
$data["subagent_list"] = $subagent_list;
$data["head"]= $lang_statement_daily[19]." $agent_name ".$lang_statement_daily[8]." {$_POST['sdate']} - {$_POST['edate']}";

echo json_encode($data);


?>