<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php

if($_SESSION["AGlang"]=="")
{
  $_SESSION["AGlang"]="th";
}

require('../inc/conn.php');
require('../inc/function.php');
require('../inc/ag_function.php');
require('../lang/ag_'.$_SESSION["AGlang"].'.php');
require('../../lang/function_'.$_SESSION["AGlang"].'_new.php');

if($_POST["username"] == '' || $_POST["password"] == '' || $_POST["name"] == '')
// if(1!=1)
{
  $data = array(
    'msg'     =>  $lang_message[18],
    'status'  =>  false
  );
}
else
{
  // //ถ้า เข้าสู่ระบบด้วย เอเย่นสำรอง
  // if($_SESSION["uu_use"]!=0)
  // {
  //   $r_agent_id = $_SESSION["r_agent_id"];
  //   $sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_level=".intval($_SESSION["r_level"])."";
  //   $rs = sql_array($sql);
  //   $user = $rs["r_name"].$_POST["username"];
  // }
  // else
  // {
  //   $user = $_SESSION["r_user"].$_POST["username"];
  // }

  //ถ้า เข้าสู่ระบบด้วย เอเย่นสำรอง
  $r_agent_id = $_SESSION["r_agent_id"];
  $sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_id = ".$_SESSION["rid"]." and r_level=".intval($_SESSION["r_level"])."";
  $rs = sql_array($sql);

  $user = $rs["r_user"].$_POST["username"];

  $pass = md5($_POST["password"]);
  $name = $_POST["name"];
  $phone = $_POST["telephone"];  
  $_count = $_POST["credit"];

  $sql="select m_user from bom_tb_member where (m_user='$user')";
  $num_user =sql_num($sql);

  if($num_user == 0)
  {
    //ดึง credit 
    //$re4["xtotal"] คือ ยอดเครดิตทั้งหมด
    //$x_count_agent คือ ยอดเครดิตที่เปิดให้ agent
    //$x_count_member คือ ยอดเครดิตที่เปิดให้ member
    //$x_count3  คือ ยอดเครดิตคงเหลือ (ยอดเครดิตทั้งหมด หักลบ เครดิตที่เปิดให้ agent และ member)
  
    $d_incre = strtotime("-7 day");
    $sql = "select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*".$_SESSION["r_id"]."*%'  and r_cut_bet_4=0";
    $reb1 = sql_array($sql);
    $sql = "select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*".$_SESSION["r_id"]."*%' and b_status=5";
    $reb2 = sql_array($sql);
    $sql = "select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*".$_SESSION["r_id"]."*%' and play_timestam >= $d_incre";
    $reb3 = sql_array($sql);
    $sql = "select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*".$_SESSION["r_id"]."*%' and play_timestam >= $d_incre";
    $reb4 = sql_array($sql);
    $sum_kank2 = $reb1["btotal"] + $reb2["btotal"] + $reb3["btotal"] + $reb4["btotal"];
    
    $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$_SESSION["r_id"];
    $re4 = sql_array($sql);
    
    $rtype = "m_count";
    $sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$_SESSION["r_id"]."*%'";
    $re5 = sql_array($sql);
    
    // ยอดรวมเครดิตที่โอนให้ member
    $x_count_member = ($re5["xtotal"] + $sum_kank2);
    
    // ยอดเครดิตทีเปิดให้ agent 
    $lv = intval($_SESSION["r_level"])+1;
    $sql = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*".$_SESSION["r_id"]."*%' and r_level=$lv ";
    $re5 = sql_array($sql);
    // ยอดรวมเครดิตที่โอนให้ agent
    $x_count2 = $re4["xtotal"] - $re5["xtotal"];
    
    $sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_SESSION["r_id"]."*%'  and   r_id='".$_POST["id"]."' ";
    $rex = sql_array($sql);
    
    $x_count_agent = $re5["xtotal"];
    // เครดิตทั้งหมดที่มี ลบกับ  เครดิตที่ให้ member และ agent
    $x_count3 = $re4["xtotal"] - ($x_count_agent + $x_count_member);
    
    if($x_count3 <=0 )
    {
      $x_count3=0;
    }
  
    //ตรวจสอบ credit ว่าเกินจากที่มีหรือไม่
    if(number_format($_count,2) <= number_format($x_count3,2))
    {
      include "compare_inputAddMember.php";

      $m_agent_id =   $_SESSION["r_agent_id"].$_SESSION["r_id"].'*';
      $m_level    =   intval($_SESSION["uplevel"]);

      // เปิดปิด
      $m_open_ary[] = (isset($_POST['soccer_today_active']))? 1 :0;
      $m_open_ary[] = (isset($_POST['soccer_live_active']))? 1 :0;
      $m_open_ary[] = (isset($_POST['sport_today_active']))? 1 :0;
      $m_open_ary[] = (isset($_POST['sport_live_active']))? 1 :0;
      $m_open_ary[] = (isset($_POST['step_active']))? 1 :0;
      $m_open_ary[] = (isset($_POST['lotto_active']))? 1 :0;
      $m_open_ary[] = (isset($_POST['lotto_share_active']))? 1 :0;
      $m_open_ary[] = (isset($_POST['lotto_lao_active']))? 1 :0;
      $m_open_ary[] = (isset($_POST['game_active']))? 1 :0;
      $m_open_ary[] = (isset($_POST['casino_active']))? 1 :0;
      $m_open = "open,".implode(",",$m_open_ary);

    //football sport step 
      $set_m_sport_dis='dis,'.$_POST["today_com"].','.$_POST["sport_com"].','.$_POST["boxing_com"];
      $set_m_sport_max = "max,".intval(str_replace(",","",$_POST["live_betmoneymax_pair"])).",".intval(str_replace(",","",$_POST["live_fbetmoneymax_pair"])).",".intval(str_replace(",","",$_POST["live_betmax_money"])).",".intval(str_replace(",","",$_POST["live_fbetmax_money"])).",".intval(str_replace(",","",$_POST["sport_betmoneymax_pair"])).",".intval(  str_replace(",","",$_POST["sport_betmax_money"])).",".intval(str_replace(",","",$_POST["boxing_betmoneymax_pair"])).",".intval(  str_replace(",","",$_POST["boxing_betmax_money"]));
      $set_m_sport_min = "min,".intval(str_replace(",","",$_POST["live_betmin_money"])).",".intval(str_replace(",","",$_POST["live_fbetmin_money"])).",".intval(str_replace(",","",$_POST["sport_betmin_money"])).",".intval(str_replace(",","",$_POST["boxing_betmin_money"]));  
      $set_m_sport_nam_tor = "tor,".$_POST["torup"].",0,0"; 
      $set_m_sport_nam_rong = "rong,".$_POST["logup"].",0,0"; 

    //step  
      $set_m_sport_step_max = "max,".intval(str_replace(",","",$_POST["step_betmax_money"]));
      $set_m_sport_step_min = "min,".intval(str_replace(",","",$_POST["step_betmin_money"]));
      $set_m_sport_step_day = "day,".intval(str_replace(",","",$_POST["step_daymax_money"]));
      $set_m_sport_step_paymax = "pay,".intval(str_replace(",","",$_POST["step_billmax_money"]));
      $set_m_sport_step2 = "step,".$_POST["step_min_pair"].",".$_POST["step_max_pair"]; 
      $set_m_sport_step_dis ='dis,'.($_POST["stepcom1"]).','.($_POST["stepcom2"]).','.($_POST["stepcom3"]).','.($_POST["stepcom4"]).','.($_POST["stepcom5"]).','.($_POST["stepcom6"]).','.($_POST["stepcom7"]).','.($_POST["stepcom8"]).','.($_POST["stepcom9"]).','.($_POST["stepcom10"]).','.($_POST["stepcom11"]).','.($_POST["stepcom12"]).','.($_POST["stepcom13"]).','.($_POST["stepcom14"]).','.($_POST["stepcom15"]).','.($_POST["stepcom16"]).','.($_POST["stepcom17"]).','.($_POST["stepcom18"]).','.($_POST["stepcom19"]).','.($_POST["stepcom20"]);

    // lotto 

    $m_lotto_open_ary[] = (isset($_POST['lotto_typeAOpen']))? 1 :0;
		$m_lotto_open_ary[] = (isset($_POST['lotto_typeBOpen']))? 1 :0;
		$m_lotto_open_ary[] = (isset($_POST['lotto_typeCOpen']))? 1 :0;
		$m_lotto_open = "open,".implode(",",$m_lotto_open_ary);		

      $set_m_lotto_pay1='pay,'.(str_replace(',','',$_POST["lotto_pay1_1"])).','.(str_replace(',','',$_POST["lotto_pay1_2"])).','.(str_replace(',','',$_POST["lotto_pay1_3"])).','.(str_replace(',','',$_POST["lotto_pay1_4"])).','.(str_replace(',','',$_POST["lotto_pay1_5"])).','.(str_replace(',','',$_POST["lotto_pay1_6"])).','.(str_replace(',','',$_POST["lotto_pay1_7"])).','.(str_replace(',','',$_POST["lotto_pay1_8"])).','.(str_replace(',','',$_POST["lotto_pay1_9"])).','.(str_replace(',','',$_POST["lotto_pay1_10"])).','.(str_replace(',','',$_POST["lotto_pay1_11"])).','.(str_replace(',','',$_POST["lotto_pay1_12"])).','.(str_replace(',','',$_POST["lotto_pay1_13"])).','.(str_replace(',','',$_POST["lotto_pay1_14"])).','.(str_replace(',','',$_POST["lotto_pay1_15"])).','.(str_replace(',','',$_POST["lotto_pay1_16"])).','.(str_replace(',','',$_POST["lotto_pay1_17"])).','.(str_replace(',','',$_POST["lotto_pay1_18"])).','.(str_replace(',','',$_POST["lotto_pay1_19"])).','.(str_replace(',','',$_POST["lotto_pay1_20"])).','.(str_replace(',','',$_POST["lotto_pay1_21"])).','.(str_replace(',','',$_POST["lotto_pay1_22"])).','.(str_replace(',','',$_POST["lotto_pay1_23"])).','.(str_replace(',','',$_POST["lotto_pay1_24"])).','.(str_replace(',','',$_POST["lotto_pay1_25"])).','.(str_replace(',','',$_POST["lotto_pay1_26"])).','.(str_replace(',','',$_POST["lotto_pay1_27"])).','.(str_replace(',','',$_POST["lotto_pay1_28"])).','.(str_replace(',','',$_POST["lotto_pay1_29"])).','.(str_replace(',','',$_POST["lotto_pay1_30"])).','.(str_replace(',','',$_POST["lotto_pay1_31"])).','.(str_replace(',','',$_POST["lotto_pay1_32"])).','.(str_replace(',','',$_POST["lotto_pay1_33"])).','.(str_replace(',','',$_POST["lotto_pay1_34"])).','.(str_replace(',','',$_POST["lotto_pay1_35"]));

      $set_m_lotto_dis1='dis,'.($_POST["lotto_com1_1"]).','.($_POST["lotto_com1_2"]).','.($_POST["lotto_com1_3"]).','.($_POST["lotto_com1_4"]).','.($_POST["lotto_com1_5"]).','.($_POST["lotto_com1_6"]).','.($_POST["lotto_com1_7"]).','.($_POST["lotto_com1_8"]).','.($_POST["lotto_com1_9"]).','.($_POST["lotto_com1_10"]).','.($_POST["lotto_com1_11"]).','.($_POST["lotto_com1_12"]).','.($_POST["lotto_com1_13"]).','.($_POST["lotto_com1_14"]).','.($_POST["lotto_com1_15"]).','.($_POST["lotto_com1_16"]).','.($_POST["lotto_com1_17"]).','.($_POST["lotto_com1_18"]).','.($_POST["lotto_com1_19"]).','.($_POST["lotto_com1_20"]).','.($_POST["lotto_com1_21"]).','.($_POST["lotto_com1_22"]).','.($_POST["lotto_com1_23"]).','.($_POST["lotto_com1_24"]).','.($_POST["lotto_com1_25"]).','.($_POST["lotto_com1_26"]).','.($_POST["lotto_com1_27"]).','.($_POST["lotto_com1_28"]).','.($_POST["lotto_com1_29"]).','.($_POST["lotto_com1_30"]).','.($_POST["lotto_com1_31"]).','.($_POST["lotto_com1_32"]).','.($_POST["lotto_com1_33"]).','.($_POST["lotto_com1_34"]).','.($_POST["lotto_com1_35"]);

      $set_m_lotto_pay2='pay,'.(str_replace(',','',$_POST["lotto_pay2_1"])).','.(str_replace(',','',$_POST["lotto_pay2_2"])).','.(str_replace(',','',$_POST["lotto_pay2_3"])).','.(str_replace(',','',$_POST["lotto_pay2_4"])).','.(str_replace(',','',$_POST["lotto_pay2_5"])).','.(str_replace(',','',$_POST["lotto_pay2_6"])).','.(str_replace(',','',$_POST["lotto_pay2_7"])).','.(str_replace(',','',$_POST["lotto_pay2_8"])).','.(str_replace(',','',$_POST["lotto_pay2_9"])).','.(str_replace(',','',$_POST["lotto_pay2_10"])).','.(str_replace(',','',$_POST["lotto_pay2_11"])).','.(str_replace(',','',$_POST["lotto_pay2_12"])).','.(str_replace(',','',$_POST["lotto_pay2_13"])).','.(str_replace(',','',$_POST["lotto_pay2_14"])).','.(str_replace(',','',$_POST["lotto_pay2_15"])).','.(str_replace(',','',$_POST["lotto_pay2_16"])).','.(str_replace(',','',$_POST["lotto_pay2_17"])).','.(str_replace(',','',$_POST["lotto_pay2_18"])).','.(str_replace(',','',$_POST["lotto_pay2_19"])).','.(str_replace(',','',$_POST["lotto_pay2_20"])).','.(str_replace(',','',$_POST["lotto_pay2_21"])).','.(str_replace(',','',$_POST["lotto_pay2_22"])).','.(str_replace(',','',$_POST["lotto_pay2_23"])).','.(str_replace(',','',$_POST["lotto_pay2_24"])).','.(str_replace(',','',$_POST["lotto_pay2_25"])).','.(str_replace(',','',$_POST["lotto_pay2_26"])).','.(str_replace(',','',$_POST["lotto_pay2_27"])).','.(str_replace(',','',$_POST["lotto_pay2_28"])).','.(str_replace(',','',$_POST["lotto_pay2_29"])).','.(str_replace(',','',$_POST["lotto_pay2_30"])).','.(str_replace(',','',$_POST["lotto_pay2_31"])).','.(str_replace(',','',$_POST["lotto_pay2_32"])).','.(str_replace(',','',$_POST["lotto_pay2_33"])).','.(str_replace(',','',$_POST["lotto_pay2_34"])).','.(str_replace(',','',$_POST["lotto_pay2_35"]));

      $set_m_lotto_dis2='dis,'.($_POST["lotto_com2_1"]).','.($_POST["lotto_com2_2"]).','.($_POST["lotto_com2_3"]).','.($_POST["lotto_com2_4"]).','.($_POST["lotto_com2_5"]).','.($_POST["lotto_com2_6"]).','.($_POST["lotto_com2_7"]).','.($_POST["lotto_com2_8"]).','.($_POST["lotto_com2_9"]).','.($_POST["lotto_com2_10"]).','.($_POST["lotto_com2_11"]).','.($_POST["lotto_com2_12"]).','.($_POST["lotto_com2_13"]).','.($_POST["lotto_com2_14"]).','.($_POST["lotto_com2_15"]).','.($_POST["lotto_com2_16"]).','.($_POST["lotto_com2_17"]).','.($_POST["lotto_com2_18"]).','.($_POST["lotto_com2_19"]).','.($_POST["lotto_com2_20"]).','.($_POST["lotto_com2_21"]).','.($_POST["lotto_com2_22"]).','.($_POST["lotto_com2_23"]).','.($_POST["lotto_com2_24"]).','.($_POST["lotto_com2_25"]).','.($_POST["lotto_com2_26"]).','.($_POST["lotto_com2_27"]).','.($_POST["lotto_com2_28"]).','.($_POST["lotto_com2_29"]).','.($_POST["lotto_com2_30"]).','.($_POST["lotto_com2_31"]).','.($_POST["lotto_com2_32"]).','.($_POST["lotto_com2_33"]).','.($_POST["lotto_com2_34"]).','.($_POST["lotto_com2_35"]);

      $set_m_lotto_pay3='pay,'.(str_replace(',','',$_POST["lotto_pay3_1"])).','.(str_replace(',','',$_POST["lotto_pay3_2"])).','.(str_replace(',','',$_POST["lotto_pay3_3"])).','.(str_replace(',','',$_POST["lotto_pay3_4"])).','.(str_replace(',','',$_POST["lotto_pay3_5"])).','.(str_replace(',','',$_POST["lotto_pay3_6"])).','.(str_replace(',','',$_POST["lotto_pay3_7"])).','.(str_replace(',','',$_POST["lotto_pay3_8"])).','.(str_replace(',','',$_POST["lotto_pay3_9"])).','.(str_replace(',','',$_POST["lotto_pay3_10"])).','.(str_replace(',','',$_POST["lotto_pay3_11"])).','.(str_replace(',','',$_POST["lotto_pay3_12"])).','.(str_replace(',','',$_POST["lotto_pay3_13"])).','.(str_replace(',','',$_POST["lotto_pay3_14"])).','.(str_replace(',','',$_POST["lotto_pay3_15"])).','.(str_replace(',','',$_POST["lotto_pay3_16"])).','.(str_replace(',','',$_POST["lotto_pay3_17"])).','.(str_replace(',','',$_POST["lotto_pay3_18"])).','.(str_replace(',','',$_POST["lotto_pay3_19"])).','.(str_replace(',','',$_POST["lotto_pay3_20"])).','.(str_replace(',','',$_POST["lotto_pay3_21"])).','.(str_replace(',','',$_POST["lotto_pay3_22"])).','.(str_replace(',','',$_POST["lotto_pay3_23"])).','.(str_replace(',','',$_POST["lotto_pay3_24"])).','.(str_replace(',','',$_POST["lotto_pay3_25"])).','.(str_replace(',','',$_POST["lotto_pay3_26"])).','.(str_replace(',','',$_POST["lotto_pay3_27"])).','.(str_replace(',','',$_POST["lotto_pay3_28"])).','.(str_replace(',','',$_POST["lotto_pay3_29"])).','.(str_replace(',','',$_POST["lotto_pay3_30"])).','.(str_replace(',','',$_POST["lotto_pay3_31"])).','.(str_replace(',','',$_POST["lotto_pay3_32"])).','.(str_replace(',','',$_POST["lotto_pay3_33"])).','.(str_replace(',','',$_POST["lotto_pay3_34"])).','.(str_replace(',','',$_POST["lotto_pay3_35"]));

      $set_m_lotto_dis3='dis,'.($_POST["lotto_com3_1"]).','.($_POST["lotto_com3_2"]).','.($_POST["lotto_com3_3"]).','.($_POST["lotto_com3_4"]).','.($_POST["lotto_com3_5"]).','.($_POST["lotto_com3_6"]).','.($_POST["lotto_com3_7"]).','.($_POST["lotto_com3_8"]).','.($_POST["lotto_com3_9"]).','.($_POST["lotto_com3_10"]).','.($_POST["lotto_com3_11"]).','.($_POST["lotto_com3_12"]).','.($_POST["lotto_com3_13"]).','.($_POST["lotto_com3_14"]).','.($_POST["lotto_com3_15"]).','.($_POST["lotto_com3_16"]).','.($_POST["lotto_com3_17"]).','.($_POST["lotto_com3_18"]).','.($_POST["lotto_com3_19"]).','.($_POST["lotto_com3_20"]).','.($_POST["lotto_com3_21"]).','.($_POST["lotto_com3_22"]).','.($_POST["lotto_com3_23"]).','.($_POST["lotto_com3_24"]).','.($_POST["lotto_com3_25"]).','.($_POST["lotto_com3_26"]).','.($_POST["lotto_com3_27"]).','.($_POST["lotto_com3_28"]).','.($_POST["lotto_com3_29"]).','.($_POST["lotto_com3_30"]).','.($_POST["lotto_com3_31"]).','.($_POST["lotto_com3_32"]).','.($_POST["lotto_com3_33"]).','.($_POST["lotto_com3_34"]).','.($_POST["lotto_com3_35"]);  


    // lotto_hun 

    $m_lotto_hun_open_ary[] = (isset($_POST['lotto_hun_typeAOpen']))? 1 :0;
		$m_lotto_hun_open_ary[] = (isset($_POST['lotto_hun_typeBOpen']))? 1 :0;
		$m_lotto_hun_open_ary[] = (isset($_POST['lotto_hun_typeCOpen']))? 1 :0;
		$m_lotto_hun_open = "open,".implode(",",$m_lotto_hun_open_ary);	
			 
     $set_m_lotto_hun_pay1='pay,'.(str_replace(',','',$_POST["lotto_hun_pay1_1"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_2"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_3"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_4"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_5"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_6"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_7"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_8"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_9"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_10"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_11"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_12"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_13"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_14"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_15"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_16"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_17"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_18"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_19"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_20"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_21"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_22"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_23"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_24"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_25"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_26"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_27"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_28"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_29"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_30"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_31"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_32"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_33"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_34"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_35"]));

      $set_m_lotto_hun_dis1='dis,'.($_POST["lotto_hun_com1_1"]).','.($_POST["lotto_hun_com1_2"]).','.($_POST["lotto_hun_com1_3"]).','.($_POST["lotto_hun_com1_4"]).','.($_POST["lotto_hun_com1_5"]).','.($_POST["lotto_hun_com1_6"]).','.($_POST["lotto_hun_com1_7"]).','.($_POST["lotto_hun_com1_8"]).','.($_POST["lotto_hun_com1_9"]).','.($_POST["lotto_hun_com1_10"]).','.($_POST["lotto_hun_com1_11"]).','.($_POST["lotto_hun_com1_12"]).','.($_POST["lotto_hun_com1_13"]).','.($_POST["lotto_hun_com1_14"]).','.($_POST["lotto_hun_com1_15"]).','.($_POST["lotto_hun_com1_16"]).','.($_POST["lotto_hun_com1_17"]).','.($_POST["lotto_hun_com1_18"]).','.($_POST["lotto_hun_com1_19"]).','.($_POST["lotto_hun_com1_20"]).','.($_POST["lotto_hun_com1_21"]).','.($_POST["lotto_hun_com1_22"]).','.($_POST["lotto_hun_com1_23"]).','.($_POST["lotto_hun_com1_24"]).','.($_POST["lotto_hun_com1_25"]).','.($_POST["lotto_hun_com1_26"]).','.($_POST["lotto_hun_com1_27"]).','.($_POST["lotto_hun_com1_28"]).','.($_POST["lotto_hun_com1_29"]).','.($_POST["lotto_hun_com1_30"]).','.($_POST["lotto_hun_com1_31"]).','.($_POST["lotto_hun_com1_32"]).','.($_POST["lotto_hun_com1_33"]).','.($_POST["lotto_hun_com1_34"]).','.($_POST["lotto_hun_com1_35"]);

      $set_m_lotto_hun_pay2='pay,'.(str_replace(',','',$_POST["lotto_hun_pay2_1"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_2"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_3"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_4"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_5"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_6"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_7"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_8"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_9"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_10"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_11"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_12"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_13"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_14"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_15"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_16"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_17"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_18"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_19"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_20"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_21"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_22"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_23"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_24"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_25"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_26"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_27"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_28"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_29"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_30"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_31"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_32"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_33"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_34"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_35"]));

      $set_m_lotto_hun_dis2='dis,'.($_POST["lotto_hun_com2_1"]).','.($_POST["lotto_hun_com2_2"]).','.($_POST["lotto_hun_com2_3"]).','.($_POST["lotto_hun_com2_4"]).','.($_POST["lotto_hun_com2_5"]).','.($_POST["lotto_hun_com2_6"]).','.($_POST["lotto_hun_com2_7"]).','.($_POST["lotto_hun_com2_8"]).','.($_POST["lotto_hun_com2_9"]).','.($_POST["lotto_hun_com2_10"]).','.($_POST["lotto_hun_com2_11"]).','.($_POST["lotto_hun_com2_12"]).','.($_POST["lotto_hun_com2_13"]).','.($_POST["lotto_hun_com2_14"]).','.($_POST["lotto_hun_com2_15"]).','.($_POST["lotto_hun_com2_16"]).','.($_POST["lotto_hun_com2_17"]).','.($_POST["lotto_hun_com2_18"]).','.($_POST["lotto_hun_com2_19"]).','.($_POST["lotto_hun_com2_20"]).','.($_POST["lotto_hun_com2_21"]).','.($_POST["lotto_hun_com2_22"]).','.($_POST["lotto_hun_com2_23"]).','.($_POST["lotto_hun_com2_24"]).','.($_POST["lotto_hun_com2_25"]).','.($_POST["lotto_hun_com2_26"]).','.($_POST["lotto_hun_com2_27"]).','.($_POST["lotto_hun_com2_28"]).','.($_POST["lotto_hun_com2_29"]).','.($_POST["lotto_hun_com2_30"]).','.($_POST["lotto_hun_com2_31"]).','.($_POST["lotto_hun_com2_32"]).','.($_POST["lotto_hun_com2_33"]).','.($_POST["lotto_hun_com2_34"]).','.($_POST["lotto_hun_com2_35"]);

      $set_m_lotto_hun_pay3='pay,'.(str_replace(',','',$_POST["lotto_hun_pay3_1"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_2"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_3"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_4"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_5"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_6"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_7"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_8"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_9"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_10"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_11"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_12"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_13"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_14"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_15"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_16"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_17"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_18"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_19"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_20"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_21"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_22"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_23"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_24"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_25"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_26"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_27"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_28"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_29"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_30"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_31"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_32"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_33"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_34"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_35"]));

      $set_m_lotto_hun_dis3='dis,'.($_POST["lotto_hun_com3_1"]).','.($_POST["lotto_hun_com3_2"]).','.($_POST["lotto_hun_com3_3"]).','.($_POST["lotto_hun_com3_4"]).','.($_POST["lotto_hun_com3_5"]).','.($_POST["lotto_hun_com3_6"]).','.($_POST["lotto_hun_com3_7"]).','.($_POST["lotto_hun_com3_8"]).','.($_POST["lotto_hun_com3_9"]).','.($_POST["lotto_hun_com3_10"]).','.($_POST["lotto_hun_com3_11"]).','.($_POST["lotto_hun_com3_12"]).','.($_POST["lotto_hun_com3_13"]).','.($_POST["lotto_hun_com3_14"]).','.($_POST["lotto_hun_com3_15"]).','.($_POST["lotto_hun_com3_16"]).','.($_POST["lotto_hun_com3_17"]).','.($_POST["lotto_hun_com3_18"]).','.($_POST["lotto_hun_com3_19"]).','.($_POST["lotto_hun_com3_20"]).','.($_POST["lotto_hun_com3_21"]).','.($_POST["lotto_hun_com3_22"]).','.($_POST["lotto_hun_com3_23"]).','.($_POST["lotto_hun_com3_24"]).','.($_POST["lotto_hun_com3_25"]).','.($_POST["lotto_hun_com3_26"]).','.($_POST["lotto_hun_com3_27"]).','.($_POST["lotto_hun_com3_28"]).','.($_POST["lotto_hun_com3_29"]).','.($_POST["lotto_hun_com3_30"]).','.($_POST["lotto_hun_com3_31"]).','.($_POST["lotto_hun_com3_32"]).','.($_POST["lotto_hun_com3_33"]).','.($_POST["lotto_hun_com3_34"]).','.($_POST["lotto_hun_com3_35"]);


    // lotto_set 
      $set_m_lotto_hun_set_pay="pay";
      foreach ($lang_g["setpay"] as $key => $value) {
        $set_m_lotto_hun_set_pay .= ",".(str_replace(',','',$_POST["lot_hun_set_pay".($key+1)]));
      }
      $set_m_lotto_hun_set_price="price,".(str_replace(',','',$_POST["lot_hun_set_price1"])); 

    // game 
      $set_m_games_dis = "dis,".$_POST["game_com"];   

    // casino 
      $set_m_casino_max = "max";    
      foreach ($lang_g["casino_share"] as $key => $value) {
        $set_m_casino_share .= ",".$_POST["casino_share".$key]; 
        $set_m_casino_myshare .= ",".(intval($r_casino_share[$key])-intval($_POST["casino_share".$key])); 
        $set_m_casino_max .= ",".intval(str_replace(',','',$_POST["rcb_maxtransfer".$key])); 
      }

      //////////////////////  set format data ////////////////// 

      $xy['sprot']['set_m_sport_dis'] = $set_m_sport_dis;
      $xy['sprot']['set_m_sport_max'] = $set_m_sport_max; 
      $xy['sprot']['set_m_sport_min'] = $set_m_sport_min; 
      $xy['sprot']['set_m_sport_nam_tor'] = $set_m_sport_nam_tor; 
      $xy['sprot']['set_m_sport_nam_rong'] = $set_m_sport_nam_rong;

      $xy['step']['set_m_sport_step_max'] = $set_m_sport_step_max;
      $xy['step']['set_m_sport_step_min'] = $set_m_sport_step_min;
      $xy['step']['set_m_sport_step_day'] = $set_m_sport_step_day;
      $xy['step']['set_m_sport_step_paymax'] = $set_m_sport_step_paymax;
      $xy['step']['set_m_sport_step2'] = $set_m_sport_step2;
      $xy['step']['set_m_sport_step_dis'] = $set_m_sport_step_dis;

      $xy['lotto']['set_m_lotto_pay1'] = $set_m_lotto_pay1;
      $xy['lotto']['set_m_lotto_dis1'] = $set_m_lotto_dis1;
      $xy['lotto']['set_m_lotto_pay2'] = $set_m_lotto_pay2;
      $xy['lotto']['set_m_lotto_dis2'] = $set_m_lotto_dis2;
      $xy['lotto']['set_m_lotto_pay3'] = $set_m_lotto_pay3;
      $xy['lotto']['set_m_lotto_dis3'] = $set_m_lotto_dis3;

      $xy['lotto_hun']['set_m_lotto_hun_pay1'] = $set_m_lotto_hun_pay1;
      $xy['lotto_hun']['set_m_lotto_hun_dis1'] = $set_m_lotto_hun_dis1;
      $xy['lotto_hun']['set_m_lotto_hun_pay2'] = $set_m_lotto_hun_pay2;
      $xy['lotto_hun']['set_m_lotto_hun_dis2'] = $set_m_lotto_hun_dis2;
      $xy['lotto_hun']['set_m_lotto_hun_pay3'] = $set_m_lotto_hun_pay3;
      $xy['lotto_hun']['set_m_lotto_hun_dis3'] = $set_m_lotto_hun_dis3;

      $xy['lotto_hun_set']['set_m_lotto_hun_set_pay'] = $set_m_lotto_hun_set_pay;
      $xy['lotto_hun_set']['set_m_lotto_hun_set_price'] = $set_m_lotto_hun_set_price;
          
      $xy['game']['set_m_games_dis'] = $set_m_games_dis;
      
      $xy['casino']['set_m_casino_max'] = $set_m_casino_max;
      $xy['m_open'] = $m_open;

      $xy['test'] = $user;  

      $sql="INSERT IGNORE INTO  bom_tb_member (m_open,m_name,m_phone,m_user,m_pass,  m_level , m_regis, m_count,m_agent_id,m_sport_dis,m_sport_max,m_sport_min,m_sport_nam_tor,m_sport_nam_rong,m_sport_step_max,m_sport_step_min,m_sport_step_day,m_sport_step_paymax,m_sport_step2,m_sport_step_dis,m_lotto_open,m_lotto_pay1,m_lotto_dis1,m_lotto_pay2,m_lotto_dis2,m_lotto_pay3,m_lotto_dis3,m_lotto_hun_open,m_lotto_hun_pay1,m_lotto_hun_dis1,m_lotto_hun_pay2,m_lotto_hun_dis2,m_lotto_hun_pay3,m_lotto_hun_dis3,m_lotto_hun_set_pay,m_lotto_hun_set_price,m_games_dis,m_casino_max) values ('$m_open','$name','$phone','$user','$pass',$m_level,now(),$_count,'$m_agent_id','$set_m_sport_dis','$set_m_sport_max','$set_m_sport_min','$set_m_sport_nam_tor','$set_m_sport_nam_rong','$set_m_sport_step_max','$set_m_sport_step_min','$set_m_sport_step_day','$set_m_sport_step_paymax','$set_m_sport_step2','$set_m_sport_step_dis','$m_lotto_open','$set_m_lotto_pay1','$set_m_lotto_dis1','$set_m_lotto_pay2','$set_m_lotto_dis2','$set_m_lotto_pay3','$set_m_lotto_dis3','$m_lotto_hun_open','$set_m_lotto_hun_pay1','$set_m_lotto_hun_dis1','$set_m_lotto_hun_pay2','$set_m_lotto_hun_dis2','$set_m_lotto_hun_pay3','$set_m_lotto_hun_dis3','$set_m_lotto_hun_set_pay','$set_m_lotto_hun_set_price','$set_m_games_dis','$set_m_casino_max')";

      // $sql="INSERT IGNORE INTO  bom_tb_member (m_open,m_name,m_phone,m_user,m_pass,  m_level , m_regis, m_count,m_agent_id,m_sport_dis,m_sport_max,m_sport_min,m_sport_nam_tor,m_sport_nam_rong,m_sport_step_max,m_sport_step_min,m_sport_step_day,m_sport_step_paymax,m_sport_step2,m_sport_step_dis,m_lotto_pay1,m_lotto_dis1,m_lotto_hun_pay1,m_lotto_hun_dis1,m_lotto_hun_set_pay,m_lotto_hun_set_price,m_games_dis,m_casino_max) values ('$m_open','$name','$phone','$user','$pass',$m_level,now(),$_count,'$m_agent_id','$set_m_sport_dis','$set_m_sport_max','$set_m_sport_min','$set_m_sport_nam_tor','$set_m_sport_nam_rong','$set_m_sport_step_max','$set_m_sport_step_min','$set_m_sport_step_day','$set_m_sport_step_paymax','$set_m_sport_step2','$set_m_sport_step_dis','$set_m_lotto_pay1','$set_m_lotto_dis1','$set_m_lotto_hun_pay1','$set_m_lotto_hun_dis1','$set_m_lotto_hun_set_pay','$set_m_lotto_hun_set_price','$set_m_games_dis','$set_m_casino_max')";
      
      $rs = sql_query($sql);
      if($rs)
      {
       $data = array(
         'msg'     =>  $lang_message[5],
         'status'  =>  true
       );
      }
      else
      {
       $data = array(
         'msg'     =>  $lang_message[4],
         'status'  =>  false,
         // 'sql'  =>  $sql,
       );
      }

      // $data = array(
      //     'msg'     =>  $lang_message[5],
      //     'status'  =>  true,
      //     'xy'  =>  $xy,
      //     'sql'  =>  $sql,
      //   );  

    }else{ 
      //ถ้า credit เกินจากที่มีหรือไม่
      $data = array(
        'msg'     =>  $lang_message[19],
        'status'  =>  false
      );
    } 
    
  }else
  {
    $data = array(
      'msg'     =>  $lang_message[20],
      'status'  =>  false
    );
  }

}

echo json_encode($data);