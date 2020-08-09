<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php

header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);

if($_GET['lang']=="")
{
  $_SESSION['lang']="th";
}else{
  $_SESSION['lang']=$_GET['lang'];
}
require('../inc/conn.php');
require('../inc/function.php');
require("../lang/variable_lang.php");

    $lang = $_GET['lang'];
    $mid = $_GET['mid'];
    $index = 0;
    $arr = array();

    $ab_status_1= array(1 =>$lang_member[629], $lang_member[67], $lang_member[352]); 
    $sql = "select * from bom_tb_trans where m_id='".$mid."'  and t_type=2 order by t_id desc , t_status desc limit 100"; 
    $sql_list_tran = sql_query($sql);
    while($rs=sql_fetch($sql_list_tran)){

      $ex_date_save = explode(" ", $rs['t_date']);
      $timestamp = strtotime($ex_date_save[0]);
      $ex=explode("@",$rs['t_note']);

      $arr[$index]["bank_name"] = (isset($ab_bank[$rs['t_bank']])) ? $ab_bank[$rs['t_bank']] : "" ;
      $arr[$index]["withdrawal_account"] = "******".substr($ex[1], -4,4);
      $arr[$index]["date_save"] = date("d/m/Y" , $timestamp);
      $arr[$index]["time_save"] = $ex_date_save[1];
      $arr[$index]["amount"] =  number_format($rs['t_count'], 2, '.', '');
      $arr[$index]["status"] = $rs['t_status'];//0 รอ 1 สำเร็จ 2 ผิดพลาด
      $arr[$index]["msg"] = $ab_status_1[$rs['t_status']];

      $index++;

    }


  echo json_encode($arr);

?>
