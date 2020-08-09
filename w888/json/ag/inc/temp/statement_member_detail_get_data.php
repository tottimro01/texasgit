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
$agent_name = $result_agent['r_user']."[".$result_agent['r_name']."]";
$_r_agent_id =  $result_agent['r_agent_id'].$result_agent['r_id']."*";

$sql_payment = "select * from bom_tb_payment where `r_agent_id` = '".$_r_agent_id."'  and `m_id` IS NOT NULL and p_date between '$dsearch' and '$esearch'";
$re=sql_query($sql_payment);

$sum = 0;
while($rs=sql_fetch($re)){
	$m_id_list[] =  $rs["m_id"];
	$arr["list"][$rs['m_id']][] = array(
		'id' => $rs['p_id'] , 
		'date' => $rs['p_date'],
		'user' => "OHO",
		'type' => $rs['p_comment'],
		'before_credit' => $rs['p_from'],
		'before_win_loss' => number_format(0,2),
		'before_kang' => number_format(0,2),
		'after_credit' =>  floatval($rs['p_from'])+floatval($rs['p_pay']),
		'after_win_loss' => number_format(0,2),
		'after_kang' => number_format(0,2),
		'change' => $rs['p_pay'],
		'change_by' => $rs['p_by'],
	);

	$sum += floatval($rs['p_pay']);
}


$sql ="SELECT `m_id` ,`m_name`,`m_user` FROM `bom_tb_member` WHERE `m_id` IN (".implode(',', array_map('intval', array_unique($m_id_list))).") and m_agent_id  = '".$_r_agent_id."'";
$re=sql_query($sql);

while($rs=sql_fetch($re)){
	foreach ($arr["list"][$rs["m_id"]] as $key => $value) {
		$arr["list"][$rs["m_id"]][$key]["m_user"] = $rs["m_user"];
        $arr["list"][$rs["m_id"]][$key]["m_name"] = $rs["m_name"];
	}
}

if(count($arr["list"]) == 0){
  $arr["list"] = [];
}

$data["sum"] = $sum;
$data["list"] = $arr["list"];
$data["head"]= $lang_statement_daily[19]." $agent_name ".$lang_statement_daily[8]." {$_POST['sdate']} - {$_POST['edate']}";

echo json_encode($data);

?>