<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');
$mid = $_GET["mid"];
$date = $_GET["d"];	
	
$arr = array();
$i = 0;

$ball_type3= array(1 =>"ได้","ได้ครึ่ง","คืนทุน", "เสีย", "เสียครึ่ง", "ยกเลิก", "รอ"); 

$sql="select * from bom_tb_lotto_hun_bill where b_date='$date' and  m_id='$mid' and b_total > 0   and b_accept=1  order by bill_id desc";
$re=sql_query($sql);
$x=1;
$sum1=array();
$sum2=array();
$sum3=array();
$sum4=array();
 while($rs_bill=sql_fetch($re)){
	 
	 $sum1[]=-$rs_bill["b_total"];
	 $sum2[]=$rs_bill["b_total"]-$rs_bill["b_pay"];
	 $sum3[]=$rs_bill["b_bonus"];
	 $sum4[]=(-$rs_bill["b_pay"])+$rs_bill["b_bonus"];
	$arr[$i]["i"] = "";
	$arr[$i]["Nid"] = $rs_bill["bill_id"];
	$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["b_timestam"]);
	$arr[$i]["Ntime"] = date("H:i" , $rs_bill["b_timestam"]);
	$arr[$i]["Ntb"] = number_format(-$rs_bill["b_total"]);
	$arr[$i]["Ndis"] = number_format($rs_bill["b_total"]-$rs_bill["b_pay"]);
	$arr[$i]["Nbonus"] = number_format($rs_bill[b_bonus]);
	$arr[$i]["Ntotal"] = number_format((-$rs_bill["b_pay"])+$rs_bill["b_bonus"]);
	$arr[$i]["Nstatus"] = $rs_bill["b_status"];	
	
	$i++;
}
$arr[$i]["i"] = "";
$arr[$i]["Nid"] = "";
$arr[$i]["Ndate"] = "";
$arr[$i]["Ntime"] = "";
$arr[$i]["Ntb"] = number_format(@array_sum($sum1));
$arr[$i]["Ndis"] = number_format(@array_sum($sum2));
$arr[$i]["Nbonus"] = number_format(@array_sum($sum3));
$arr[$i]["Ntotal"] = number_format(@array_sum($sum4));
$arr[$i]["Nstatus"] = "";

echo json_encode($arr);
?>