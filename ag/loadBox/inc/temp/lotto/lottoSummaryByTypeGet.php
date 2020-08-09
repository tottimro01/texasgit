<?php
  require('inc_head_bySession.php');

$d = $_POST["d"];
$type = $_POST["type"];
$view  = $_POST["view"];
$ag_level=$_SESSION["r_level"];
$r_level=$_SESSION["r_level"]+1;
$r_id=$_SESSION["r_id"];


 $m_user=array();
$m_id=array();
$sql="select * from bom_tb_member where m_agent_id like '%*$r_id*%' ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
 $m_user[$rs['m_id']]=$rs['m_user'];
 $m_id[$rs['m_user']]=$rs['m_id'];
}	


$sql="select * from bom_tb_lotto_ok  where lot_zone=1 and  lot_rob=1 and ok_date='$d'   order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$ok_id=$re_ok['ok_id'];


$data["val"] = array();

  if($view=="a"){
	$aa=" and br_bonus_".$r_level." >0 ";
	}

$sql="select 
*, (
   	ROUND( 	(b_total)*((b_myshare_".$ag_level.")/100) ,10)
   ) as r1 ,  
(
   	ROUND( 	-( b_total - br_pay_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as r2  ,  
    (
   	ROUND( 	b_total  ,10)
   ) as c3  ,  
    (
   	ROUND( 	-( br_bonus_".$r_level.")*((b_myshare_".$ag_level.")/100) ,10)
   ) as c4 
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id'  and r_agent_id like '%*$r_id*%'   and lot_type='$type'  and b_accept=1   $aa    order by lot_type asc , play_number asc  limit 20000  ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
  $sum1=$rs['r1'];
  $sum2=$rs['r2'];
  $sum3=$rs['c3'];
   $sum4=$rs['c4'];
  $sum5=$sum1+$sum2+$sum4; 


    $data["val"][] = array(
      "number" => $rs['play_number']." : [".$lot_typeArry[$type]."]",
      "user" => $m_user[$rs['m_id']],
      "r1" => number_format($sum1,2),
      "r2" => number_format($sum2,2),
      "sum" => number_format($sum3,2),
      "r3" => number_format($sum4,2),
      "total" => _cbn($sum5,2),
    ); 
  }
  
  
  if($view=="a"){
	$aa=" and b_bonus>0 ";
	}
	
	
	$sql="select 
*,    (
   	ROUND( 	(b_total)*((b_share_m)/100) ,10)
   ) as r1 ,  
  (
   	ROUND( 	-( b_total - b_pay)*((b_share_m)/100) ,10)
   ) as r2   ,  
    (
   	ROUND( 	b_total  ,10)
   ) as c3  ,  
    (
   	ROUND( 	-( b_bonus )*((b_share_m)/100) ,10)
   ) as c4 
  from bom_tb_lotto_bill_play_live where    ok_id='$ok_id'  and r_id = '$r_id'   and lot_type='$type'  and b_accept=1   $aa    order by lot_type asc , play_number asc  limit 20000  ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
  $sum1=$rs['r1'];
  $sum2=$rs['r2'];
  $sum3=$rs['c3'];
   $sum4=$rs['c4'];
  $sum5=$sum1+$sum2+$sum4; 


    $data["val"][] = array(
      "number" => $rs['play_number']." : [".$lot_typeArry[$type]."]",
      "user" => $m_user[$rs['m_id']],
      "r1" => number_format($sum1,2),
      "r2" => number_format($sum2,2),
      "sum" => number_format($sum3,2),
      "r3" => number_format($sum4,2),
      "total" => _cbn($sum5,2),
    ); 
  }
	
	
	
  $data["type"] = $lot_typeArry[$type];

  echo json_encode($data);
?>