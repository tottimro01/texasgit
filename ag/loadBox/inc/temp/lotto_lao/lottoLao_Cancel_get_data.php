<?php
header('Content-type: application/json');
 require('inc_head_bySession.php'); 

$level=$_SESSION["r_level"];
$r_level=$_SESSION["r_level"]+1;


$rob=1;
$zone=3;

$sql="select * from bom_tb_lotto_ok where lot_zone='$zone' and lot_rob='$rob'    and o_limit_time>'$time_stam'    order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$ok_id=$re_ok['ok_id'];

$sql="select * from bom_tb_lotto_ok  where lot_zone='$zone' and  lot_rob='$rob'   order by ok_id desc limit 1";
$re_ok2=sql_array($sql);

$ok_id2=$re_ok2['ok_id'];

$r_id = $_SESSION["r_id"];

 $m_user=array();
  $m_id=array();
$sql="select * from bom_tb_member where m_agent_id like '%*$r_id*%' ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
 $m_user[$rs['m_id']]=$rs['m_user'];
 $m_id[$rs['m_user']]=$rs['m_id'];
}	



$data = array();
$data["calcel_list"] = array();
$data["calceled_list"] = array();


if($_POST['q']!=""){
	  $ww=" and ( play_id like '%$_POST[q]%' or  bill_id like '%$_POST[q]%' or  play_number like '$_POST[q]'  or  m_id like '".$m_id[$_POST['q']]."')";
}


 $sql="select 
   *,
   (
   	ROUND( 	(b_total)*((b_myshare_".$level.")/100) ,10)
   ) as r1 ,  
    (
   	ROUND( 	( b_total - br_pay_".$r_level.")*((b_myshare_".$level.")/100) ,10)
   ) as r2 
   
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id' and lot_type = 31 and r_agent_id like '%*$r_id*%' and r_id != '$r_id'    and b_accept=1 and play_status=7  $ww  order by play_id desc    limit 500   ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$sum10a=$rs[r1];
$sum10b=-$rs[r2];
$sum10c=$rs[r1]-$rs[r2];

	$data["calcel_list"][] = array(
		'play_id' => $rs["play_id"],
		'play_timestam' => date("d/m/Y H:i:s",$rs["play_timestam"]),
		'm_user' => $m_user[$rs['m_id']],
		'lot_type' => $lotHun_typeArry[$rs["lot_type"]],
		'play_number' => _dt($rs["play_number"]),
		'b_total' => number_format($rs["b_total"],2),
		'sum10a' => number_format($sum10a,2),
		'sum11a' => number_format($sum10b,2),
		'xm_sum3' => _cbn($sum10c,2),
	);
	
}



 $sql="select 
   *,
   (
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 ,  
    (
   	ROUND( 	( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r2 
   
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id' and lot_type = 31 and r_id = '$r_id'  and b_accept=1 and play_status=7  $ww  order by play_id desc    limit 500   ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$sum10a=$rs[r1];
$sum10b=-$rs[r2];
$sum10c=$rs[r1]-$rs[r2];

	$data["calcel_list"][] = array(
		'play_id' => $rs["play_id"],
		'play_timestam' => date("d/m/Y H:i:s",$rs["play_timestam"]),
		'm_user' => $m_user[$rs['m_id']],
		'lot_type' => $lotHun_typeArry[$rs["lot_type"]],
		'play_number' => _dt($rs["play_number"]),
		'b_total' => number_format($rs["b_total"],2),
		'sum10a' => number_format($sum10a,2),
		'sum11a' => number_format($sum10b,2),
		'xm_sum3' => _cbn($sum10c,2),
	);
	
}



 $sql="select 
   *,
   (
   	ROUND( 	(b_total)*((b_myshare_".$level.")/100) ,10)
   ) as r1 ,  
    (
   	ROUND( 	( b_total - br_pay_".$r_level.")*((b_myshare_".$level.")/100) ,10)
   ) as r2 
   
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id2' and lot_type = 31 and r_agent_id like '%*$r_id*%' and r_id != '$r_id'    and b_accept=0  $ww  order by play_id desc    limit 500   ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$sum10a=$rs[r1];
$sum10b=-$rs[r2];
$sum10c=$rs[r1]-$rs[r2];

	$data["calceled_list"][] = array(
		'play_id' => $rs["play_id"],
		'play_timestam' => date("d/m/Y H:i:s",$rs["play_timestam"]),
		'm_user' => $m_user[$rs['m_id']],
		'lot_type' => $lotHun_typeArry[$rs["lot_type"]],
		'play_number' => _dt($rs["play_number"]),
		'b_total' => number_format($rs["b_total"],2),
		'sum10a' => number_format($sum10a,2),
		'sum11a' => number_format($sum10b,2),
		'xm_sum3' => _cbn($sum10c,2),
		'cancel_by' => $rs["can_by"],
		'cancel_time' => $rs["can_date"],
	);

}


 $sql="select 
   *,
   (
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 ,  
    (
   	ROUND( 	( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r2 
   
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id2' and lot_type = 31  and r_id = '$r_id'    and b_accept=0  $ww  order by play_id desc    limit 500   ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$sum10a=$rs[r1];
$sum10b=-$rs[r2];
$sum10c=$rs[r1]-$rs[r2];

	$data["calceled_list"][] = array(
		'play_id' => $rs["play_id"],
		'play_timestam' => date("d/m/Y H:i:s",$rs["play_timestam"]),
		'm_user' => $m_user[$rs['m_id']],
		'lot_type' => $lotHun_typeArry[$rs["lot_type"]],
		'play_number' => _dt($rs["play_number"]),
		'b_total' => number_format($rs["b_total"],2),
		'sum10a' => number_format($sum10a,2),
		'sum11a' => number_format($sum10b,2),
		'xm_sum3' => _cbn($sum10c,2),
		'cancel_by' => $rs["can_by"],
		'cancel_time' => $rs["can_date"],
	);

}



echo json_encode($data);

 ?>
