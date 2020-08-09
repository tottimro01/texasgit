<?php 
require('inc_head_bySession.php');


$view_date=_bdate();

$mid = $_POST["stype"];

if(empty($_POST["sdate"]) || empty($_POST["edate"]))
{
  $_d=$view_date;
}else{
  $_d = $_POST["sdate"];
}

$arry["data"]["transfer-noti"] = 0;
$arry["data"]["deposit-noti"] = 0;
$arry["data"]["withdrawal-noti"] = 0;


$rs  = sql_array("select r_id , r_alert_in , r_alert_out from bom_tb_agent where r_id = '".$_SESSION['r_id']."'");


// $sql_withdrawal_sql = "select count(t_id) as sum from bom_tb_trans where  r_id='".$_SESSION['r_id']."'  and  t_type=1   and  t_status=3";
// $sql_withdrawal_sum =  sql_array($sql_withdrawal_sql);
// $sql_deposit_sql = "select count(t_id) as sum from bom_tb_trans where  r_id='".$_SESSION['r_id']."'  and  t_type=2   and  t_status=3";
// $sql_deposit_sum =  sql_array($sql_deposit_sql);

$arry["data"]["deposit-noti"] = ($rs["r_alert_in"] == "") ? 0 : intval($rs["r_alert_in"]);
$arry["data"]["withdrawal-noti"] = ($rs["r_alert_out"] == "") ? 0 : intval($rs["r_alert_out"]);

$transfer = intval($arry["data"]["deposit-noti"])+intval($arry["data"]["withdrawal-noti"]);

$arry["data"]["transfer-noti"] = $transfer;

// $arry["data"]["sql"] = $sql_list_tran;

echo json_encode($arry);


 ?>