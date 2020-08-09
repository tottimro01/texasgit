<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require("../lang/th.php");
require('../inc/function.php');
$mid = $_GET["mid"];
$bid = $_GET["bid"];	
	
$arr = array();
$i = 0;

$ball_type3= array(1 =>"ได้","ได้ครึ่ง","คืนทุน", "เสีย", "เสียครึ่ง", "ยกเลิก", "รอ"); 

$sql="select * from bom_tb_lotto_hun_bill_play where bill_id='$bid' and  m_id='$mid'   and b_accept=1  order by lot_type asc, play_number asc";
$re=sql_query($sql);
$x=1;
$sum1=array();
while($rs_bill=sql_fetch($re)){
	
$ex_loti = explode("," , $rs_bill["lot_i"]);
   foreach ($ex_loti as &$value) {
    $value = substr($value , 1);
if($value==""){
   		continue;
   	}
if($rs_bill["b_bonus"]>0){
      $ex_bonus = explode("," , $rs_bill["b_bonus_i"]);
      if(!in_array($value, $ex_bonus)){
        $b_bonus_i = 0;
      }else{
        $b_bonus_i = $rs_bill["b_bonus"];
      }
    }


	$sum1[]=-$rs_bill["b_total"];
	$arr[$i]["i"] = $value;
	$arr[$i]["Nid"] = $rs_bill["bill_id"];
	$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["play_timestam"]);
	$arr[$i]["Ntime"] = date("H:i" , $rs_bill["play_timestam"]);
	$arr[$i]["Ntype"] = $lot_type["th"][$rs_bill[lot_type]];
	$arr[$i]["Nnum"] = _dt($rs_bill[play_number]);
	$arr[$i]["Ntb"] = number_format(-$rs_bill[b_total]);
	
	$i++;
}
}
$arr[$i]["i"] = "";
$arr[$i]["Nid"] = "";
$arr[$i]["Ndate"] = "";
$arr[$i]["Ntime"] = "";
$arr[$i]["Ntype"] = "";
$arr[$i]["Nnum"] = "";
$arr[$i]["Ntb"] = number_format(@array_sum($sum1));

echo json_encode($arr);
?>