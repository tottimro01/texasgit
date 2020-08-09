<?php 
require('inc_head_bySession.php');


$view_date=_bdate();

$mid = $_POST["stype"];

// if(empty($_POST["sdate"]) || empty($_POST["edate"]))
// {
//   $_d=$view_date;
// }else{
//   $_d = $_POST["sdate"];
// }


// $e1=explode("-",$_d);
// $dbg=mktime(9,0,0,$e1[1],$e1[0],$e1[2]);
// $dbg_show=mktime(9,0,0,$e1[1],$e1[0],$e1[2]);
// $dsearch = date("Y-m-d H:i:s" , $dbg_show);

$agent_list = array();

$q = "";
if($mid != "")
{
  $q = "and m_id = $mid"; 
}else{
  $q = "and 1 != 1"; 
}

if(empty($_POST["sdate"]))
{
  $_d=$view_date;
}else{
  $_d = $_POST["sdate"];
}


$date=date_create($_d);
$_d = date_format($date,"Y-m-d");
$qq="and (play_datenow like '%$_d%' )";
$table_key = array(1,2,3,4,5,6,7,21,22,23);


$sql="SELECT `play_id`  FROM `bom_tb_casino_bill_play_live` where 1 $q $qq and casino_table IN (".implode(',', array_map('intval', $table_key)).")"; 
$num_row = sql_num($sql); 


$rowPerPage = $_POST["rowPerPage"];
$page       = $_POST["thisPage"];
$start      = ($page-1)*$rowPerPage;

$pagi_data["numrow"] =  $num_row;
$pagi_data["rowPerPage"] =  $rowPerPage;
$pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
$pagi_data["active_page"] = intval($page);
$pagi_data["start_page"]  = $start; 

$sql = "SELECT * FROM `bom_tb_casino_bill_play_live` where 1 $q $qq and casino_table IN (".implode(',', array_map('intval', $table_key)).") ORDER BY `play_id` DESC LIMIT {$start} , {$rowPerPage}";
$re = sql_query($sql);

$arr_data = array();
while($rs = sql_fetch($re)){
    $arr_data = array(); 
    $arr_data["bet_id"] = $rs['bet_id'];
    $arr_data["b_type"] = $ca_type[$rs["casino_table"]]." ".$rs["casino_table"];
    $arr_data["b_amount"] = $rs['b_total'];
    $arr_data["b_status"] = $ca_txt[$rs["casino_table"]][$rs["play_bet"]];
    $arr_data["b_status_color"] = $ca_color[$rs["casino_table"]][$rs["play_bet"]];
    $arr_data["b_total"] = "<b>".$rs['b_total']."</b>"; 
    $arr_data["play_dis"] = $rs['play_dis'];
    $arr_data["b_creidt_start"] = ($rs['b_credit_start'] === null) ? "0.00" : $rs['b_credit_start'];
    $arr_data["b_creidt_end"] = "<b>".($rs['b_credit_end'] === null) ? "0.00" : $rs['b_credit_end']."</b>";
    $arr_data["b_time_start"] = ($rs['b_time_start'] === null) ? "" : $rs['b_time_start'];
    $arr_data["b_time_end"] = ($rs['b_time_end'] === null) ? "" : $rs['b_time_end'];
    $agent_list[] = $arr_data;
}

$arry["data"]["date"]["dsearch"] = $_d;
$arry["data"]["agent_list"] = $agent_list;
$arry["data"]["pagi_data"] = $pagi_data;


echo json_encode($arry);


 ?>