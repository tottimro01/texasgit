<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);

require('../inc/conn.php');

$mid = $_POST["mid"];
$arr = array();


$sql="select * from bom_tb_member where m_id='$mid'";
$re=sql_array($sql);
	
if($re["m_id"]!="" and $re["m_active"]==1){
	
	$sql="select sum(b_sum) as btotal from bom_tb_football_bill_live where m_id='".$re['m_id']."'  and b_status=5 and b_accept=1  ";
	$reb1=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_play_live where m_id='".$re['m_id']."'  and play_status=7 and b_accept=1  ";
	$reb2=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_games_bill_play_live where m_id='".$re['m_id']."'  and play_status=7";
	$reb3=sql_array($sql);
	$sql="select sum(b_total) as btotal from bom_tb_casino_bill_play_live where m_id='".$re['m_id']."'  and play_status=7";
	#$reb4=sql_array($sql);

	$mnot=$reb1['btotal']+$reb2['btotal']+$reb3['btotal']+$reb4['btotal'];

	$arr["MemberID"] = $re["m_id"];
	$arr["Name"] = $re["m_name"];
	$arr["MemberCradit"] = $re["m_count"];
	$arr["MemberCraditOld"] = $re["m_count_de"];
	$arr["MemberCraditAcp"] = $mnot;
	
	$arr["Status"] = "1";
	$arr["Licen"] = "SC";
		
}else{
	$arr["Status"] = "2";	
}

echo json_encode($arr);
exit();
?>