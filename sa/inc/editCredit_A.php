<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

if($_SESSION["AGlang"]=="")
{
  $_SESSION["AGlang"]="th";
}

require('../lang/sa_lang.php');
require('conn.php');
require('function.php');
require('ag_function.php');
require('../../lang/function_array.php');

$r_id = $_POST['id'];

  // ลบ
  if($_POST["edType"] == "r")
  {

     $lv = intval($_SESSION["r_level"])+2;
     
      // ยอดเครดิตทีเปิดให้ member 
   
     // $d_incre = strtotime("-7 day");
     // $sql="select sum(b_total) as btotal , sum( 
     // (ROUND(  b_sum ,10))    
     //    ) as t1 from bom_tb_football_bill_live where  r_id = '".$r_id."' and b_accept!=2 and b_status=5 and r_cut_bet_4=0";
     
     // $reb1=sql_array($sql);
     // $sql="select sum(b_total) as btotal , sum( 
     // (ROUND(  b_pay ,10))  
     //    ) as t1 from bom_tb_lotto_bill_live where  r_id = '".$r_id."' and b_accept!=0 and b_status=5";
     // $reb2=sql_array($sql);
     
     // $sql="select sum(b_total) as btotal , sum( 
     // (ROUND(  b_pay ,10))  
     //    ) as t1 from bom_tb_games_bill_play_live where  r_id = '".$r_id."' and b_accept!=2 and and play_status=7  and play_timestam >= $d_incre";
     // $reb4=sql_array($sql);
     
     // $sum_kank2=$reb1["t1"]+$reb2["t1"]+$reb3["t1"]+$reb4["t1"];
         

     //  $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$r_id;
     //  $re4 = sql_array($sql);

     //  $rtype = "m_count_de";
     //  $sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$r_id."*%' and m_level=$lv";
     //  $re5 = sql_array($sql);

     //  // ยอดรวมเครดิตที่โอนให้ member
     //  $x_count_member = ($re5["xtotal"]);

     //  // ยอดเครดิตทีเปิดให้ agent 
     //  $sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$r_id."*%' and r_level=$lv  ";
     //  $re6=sql_array($sql);

     //  $x_count_agent = $re6["xtotal"];
     //  $x_count_total = ($x_count_agent+$x_count_member);
     //  $x_count = ($re4["xtotal"]-$sum_kank2)-$x_count_total;


      $sql = "select * from bom_tb_agent where r_id='".$r_id."' ";
      $rex = sql_array($sql);
      $rex["r_name"] = ($rex["r_name"] != "") ? $rex["r_name"] : "ไม่ระบุ";



    $load_session = $_SESSION;
    $r_id = $_POST["id"];
    $ag_level = $rex[r_level];
    include "get_balance.php";  



    $array_item = [];
    // $array_item['x_count_member'] = $x_count_member;
    $array_item['x_count'] = $x_count3;
    $array_item['r_count'] = $rex["r_count"];
    $array_item['r_name'] = $rex["r_name"];
    $array_item['sum_kank2'] = $sum_kank2;
    $array_item['r_name'] = $rex["r_name"];

    echo json_encode($array_item);


  }else if($_POST["edType"] == "i")  // เพิ่ม
  {
    // ยอดเครดิตทีเปิดให้ member 
      $d_incre = strtotime("-7 day");
      $sql = "select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*".$r_id."*%'  and r_cut_bet_4=0";
      $reb1 = sql_array($sql);
      $sql = "select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*".$r_id."*%' and b_status=5";
      $reb2 = sql_array($sql);
      $sql = "select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*".$r_id."*%' and play_timestam >= $d_incre";
      $reb3 = sql_array($sql);
      $sql = "select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*".$r_id."*%' and play_timestam >= $d_incre";
      $reb4 = sql_array($sql);
      $sum_kank2 = $reb1["btotal"] + $reb2["btotal"] + $reb3["btotal"] + $reb4["btotal"];

      $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$r_id;
      $re4 = sql_array($sql);

      $rtype = "m_count";
      $sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$r_id."*%'";
      $re5 = sql_array($sql);

      // ยอดรวมเครดิตที่โอนให้ member
      $x_count_member = ($re5["xtotal"] + $sum_kank2);


      // ยอดเครดิตทีเปิดให้ agent 
      $lv = intval($_SESSION["r_level"])+2;

      $sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$r_id."*%' and r_level=$lv  ";
      $re3=sql_array($sql);

      $sql = "select * from bom_tb_agent where r_id='".$r_id."' ";
      $rex = sql_array($sql);

      $x_count=$rex["r_count"]-($x_count_member+$re3["xtotal"]);
      $rex["r_name"] = ($rex["r_name"] != "") ? $rex["r_name"] : "ไม่ระบุ";




    $array_item = [];
    $array_item['x_count_member'] = $x_count_member;
    $array_item['x_count'] = $x_count;
    $array_item['r_count'] = $rex["r_count"];
    $array_item['r_name'] = $rex["r_name"];

    echo json_encode($array_item);  


  }

?>