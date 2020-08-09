<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

 if($_SESSION["AGlang"]=="")
 {
   $_SESSION["AGlang"]="th";
 }

require('../inc/conn.php');
require('../inc/function.php');
require('../inc/ag_function.php');
require('../lang/ag_lang.php');
require('../lang/function_array.php');

if($_SESSION['uu_use'] == 1)
{
  $bap_by_type = 5;
  $bap_by_id = $_SESSION['u_id'];
}else{
  $bap_by_type = 2;
  $bap_by_id = $_SESSION['rid'];
}

if($_POST["username"] == '' || $_POST["name"] == '')
{
  $data = array(
    'msg'     =>  $lang_ag[7],
    'status'  =>  false,
  );
}else{

  include "compare_inputEditMember.php";


  $id = $_POST['id'];
  $name = $_POST['name'];
  $telephone = $_POST['telephone'];
  $bank_id =  (isset($_POST['bank_id'])) ? intval($_POST['bank_id']) : null;
  $m_b_pass = $_POST['m_b_pass'];
  $m_b_bank = (isset($_POST['m_b_bank'])) ? intval($_POST['m_b_bank']) : null;
  $m_b_code = $_POST['m_b_code'];
  $m_b_name = $_POST['m_b_name'];

  // if($m_b_bank != 0 and $m_b_code == "")
  // {
  //    $data  = array(
  //       'msg' => $lang_ag[1668],
  //       'status' => false,
  //     );

  //    echo json_encode($data);
  //    exit();
  // }else  if($m_b_bank != 0 and $m_b_name == "")
  // {
  //   $data  = array(
  //       'msg' => $lang_ag[1670],
  //       'status' => false,
  //     );

  //    echo json_encode($data);
  //    exit();
  // }

  $sql = "SELECT count(m_id) as num FROM `bom_tb_member` where m_b_code =  '$m_b_code' and m_agent_id like '%*".$_SESSION["r_id"]."*%' and m_level=".intval($_SESSION["uplevel"])." and m_id!='".$id."' ";
  $num_m_b_code = sql_array($sql);  

  if($num_m_b_code['num']!=0 and $m_b_code != "")
  {
      $data  = array(
        'msg' => $lang_ag[2376],
        'status' => false,
      );

     echo json_encode($data);
     exit();
  }


  $_count = floatval(removeComma($_POST["credit"]));


  // $d_incre = strtotime("-7 day");
  // $sql="select sum(b_total) as btotal , sum( 
  // (ROUND(  b_sum ,10))    
  //    ) as t1 from bom_tb_football_bill_live where  r_id = '".$_SESSION["r_id"]."' and b_accept!=2 and b_status=5 and r_cut_bet_4=0";
  
  // $reb1=sql_array($sql);
  // $sql="select sum(b_total) as btotal , sum( 
  // (ROUND(  b_pay ,10))  
  //    ) as t1 from bom_tb_lotto_bill_live where  r_id = '".$_SESSION["r_id"]."' and b_accept!=0 and b_status=5";
  // $reb2=sql_array($sql);
  
  // $sql="select sum(b_total) as btotal , sum( 
  // (ROUND(  b_pay ,10))  
  //    ) as t1 from bom_tb_games_bill_play_live where  r_id = '".$_SESSION["r_id"]."' and b_accept!=2 and and play_status=7  and play_timestam >= $d_incre";
  // $reb4=sql_array($sql);
  
  // $sum_kank2=$reb1["t1"]+$reb2["t1"]+$reb3["t1"]+$reb4["t1"];


  // $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$_SESSION["r_id"];
  // $re4 = sql_array($sql);

  // $rtype = "m_count_de";
  // $sql = "select sum($rtype) as xtotal , m_count from bom_tb_member where  r_id = '".$_SESSION["r_id"]."' and m_id!='".$_POST["id"]."'";
  // $re5 = sql_array($sql);

  // // ยอดรวมเครดิตที่โอนให้ member
  // $x_count_member = ($re5["xtotal"] == "") ? 0 : $re5["xtotal"];
 

  // // ยอดเครดิตทีเปิดให้ agent 
  // $lv = intval($_POST["session"]["r_level"])+1;
  // $sql = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*".$_SESSION["r_id"]."*%' and r_level=$lv ";

  // $re5 = sql_array($sql);
  // // ยอดรวมเครดิตที่โอนให้ agent
  // $x_count2 = $re4["xtotal"] - $re5["xtotal"];

  // $sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_SESSION["r_id"]."*%'  and   r_id='".$_POST["id"]."' ";
  // $rex = sql_array($sql);

  // $x_count_agent = $re5["xtotal"];
  // // เครดิตทั้งหมดที่มี ลบกับ  เครดิตที่ให้ member และ agent
  //  $x_count3  = ($re4["xtotal"]-$sum_kank2)-$x_count_member;

  // if($x_count3 <=0 )
  // {
  //   $x_count3=0;
  // }

  $load_session = $_SESSION;
  $m_id = $_POST["id"];
  include "../get_balance_reduce.php";


 //ตรวจสอบ credit ว่าเกินจากที่มีหรือไม่
 if(intval($_count) > intval($x_count3))
 {
     $data = array(
        'msg'     =>  $lang_ag[18],
        'status'  =>  false
      );
     echo json_encode($data);
     exit();
 } 

  // เปิดปิด
  $m_open_ary[] = (isset($_POST['soccer_today_active']))? 1 :0;
  $m_open_ary[] = (isset($_POST['soccer_live_active']))? 1 :0;
  $m_open_ary[] = (isset($_POST['sport_today_active']))? 1 :0;
  $m_open_ary[] = (isset($_POST['sport_live_active']))? 1 :0;
  $m_open_ary[] = (isset($_POST['boxing_today_active']))? 1 :0;
  $m_open_ary[] = (isset($_POST['boxing_live_active']))? 1 :0;
  $m_open_ary[] = (isset($_POST['step_active']))? 1 :0;
  $m_open_ary[] = (isset($_POST['lotto_active']))? 1 :0;
  $m_open_ary[] = (isset($_POST['lotto_share_active']))? 1 :0;
  $m_open_ary[] = (isset($_POST['lotto_lao_active']))? 1 :0;
  $m_open_ary[] = (isset($_POST['game_active']))? 1 :0;
  $m_open_ary[] = (isset($_POST['casino_active']))? 1 :0;
  
  $m_open = "open,".implode(",",$m_open_ary);

  //football sport step  
  $set_m_sport_dis='dis,'.$_POST["today_com"].','.$_POST["sport_com"].','.$_POST["boxing_com"];;
  // $set_m_sport_max = "max,".intval(str_replace(",","",$_POST["live_betmax_money"])).",".intval(str_replace(",","",$_POST["live_fbetmax_money"])).",".intval( str_replace(",","",$_POST["sport_betmax_money"])); 

  $set_m_sport_max = "max,".intval(str_replace(",","",$_POST["live_betmoneymax_pair"])).",".intval(str_replace(",","",$_POST["live_fbetmoneymax_pair"])).",".intval(str_replace(",","",$_POST["live_betmax_money"])).",".intval(str_replace(",","",$_POST["live_fbetmax_money"])).",".intval(str_replace(",","",$_POST["sport_betmoneymax_pair"])).",".intval(  str_replace(",","",$_POST["sport_betmax_money"])).",".intval(  str_replace(",","",$_POST["boxing_betmoneymax_pair"])).",".intval(  str_replace(",","",$_POST["boxing_betmax_money"]));
  
  $set_m_sport_min = "min,".intval(str_replace(",","",$_POST["live_betmin_money"])).",".intval(str_replace(",","",$_POST["live_fbetmin_money"])).",".intval(  str_replace(",","",$_POST["sport_betmin_money"])).",".intval(str_replace(",","",$_POST["boxing_betmin_money"])); 

  $set_m_nam = $_POST["r_nam"];

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

  $set_m_lotto_max = "max,".intval(str_replace(",","",$_POST["lotto_betmax_money"])).",0";
  $set_m_lotto_min = "min,".intval(str_replace(",","",$_POST["lotto_betmin_money"])).",0";

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

  $set_m_lotto_hun_max = "max,".intval(str_replace(",","",$_POST["lotto_share_hun_betmax_money"])).",0";
  $set_m_lotto_hun_min = "min,".intval(str_replace(",","",$_POST["lotto_share_hun_betmin_money"])).",0";

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
  $set_m_games_share = "share,".$_POST["game_share"]; 
  $set_m_games_myshare = "myshare,".(intval($r_games_share[1])-intval($_POST["game_share"]));
  $set_m_games_dis = "dis,".$_POST["game_com"]; 
  $set_m_games_max =  "max,".intval(str_replace(",","",$_POST["game_max"]));
  $set_m_games_min=  "min,".intval(str_replace(",","",$_POST["game_min"]));

  // casino 
  $set_m_casino_share = "share";
  $set_m_casino_myshare = "myshare";  
  $set_m_casino_max = "max"; 
  $set_m_casino_min = "min"; 
  $set_m_casino_dis = "dis";
  $set_m_casino_open = "p";      
      foreach ($lang_g["casino_share"] as $key => $value) {
        $set_m_casino_share .= ",".$_POST["casino_share".$key]; 
        $set_m_casino_myshare .= ",".(intval($r_casino_share[$key])-intval($_POST["casino_share".$key])); 
        $set_m_casino_max .= ",".intval(str_replace(',','',$_POST["rcb_maxtransfer".$key])); 
        $set_m_casino_min .= ",".intval(str_replace(',','',$_POST["rcb_mintransfer".$key]));
        $set_m_casino_dis .= ",".$_POST["casino_com".$key];  

        $is_casino_open_chk = (isset($_POST["casino_open".$key]))? 1 :0;
        $set_m_casino_open .= ",".$is_casino_open_chk; 

      } 
  
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
    
  $xy['lotto']['m_lotto_open'] = $m_lotto_open;  
  $xy['lotto']['set_m_lotto_pay1'] = $set_m_lotto_pay1;
  $xy['lotto']['set_m_lotto_dis1'] = $set_m_lotto_dis1;
  $xy['lotto']['set_m_lotto_pay2'] = $set_m_lotto_pay2;
  $xy['lotto']['set_m_lotto_dis2'] = $set_m_lotto_dis2;
  $xy['lotto']['set_m_lotto_pay3'] = $set_m_lotto_pay3;
  $xy['lotto']['set_m_lotto_dis3'] = $set_m_lotto_dis3;

  $xy['lotto_hun']['m_lotto_hun_open'] = $m_lotto_hun_open;  
  $xy['lotto_hun']['set_m_lotto_hun_pay1'] = $set_m_lotto_hun_pay1;
  $xy['lotto_hun']['set_m_lotto_hun_dis1'] = $set_m_lotto_hun_dis1;
  $xy['lotto_hun']['set_m_lotto_hun_pay2'] = $set_m_lotto_hun_pay2;
  $xy['lotto_hun']['set_m_lotto_hun_dis2'] = $set_m_lotto_hun_dis2;
  $xy['lotto_hun']['set_m_lotto_hun_pay3'] = $set_m_lotto_hun_pay3;
  $xy['lotto_hun']['set_m_lotto_hun_dis3'] = $set_m_lotto_hun_dis3;

  $xy['lotto_hun_set']['set_m_lotto_hun_set_pay'] = $set_m_lotto_hun_set_pay;
  $xy['lotto_hun_set']['set_m_lotto_hun_set_price'] = $set_m_lotto_hun_set_price;

  $xy['game']['set_m_games_dis'] = $set_m_games_dis;
  $xy['game']['set_m_games_max'] = $set_m_games_max;
  $xy['game']['set_m_games_min'] = $set_m_games_min;

  $xy['casino']['set_m_casino_max'] = $set_m_casino_max;
  $xy['casino']['set_m_casino_min'] = $set_m_casino_min;
  $xy['casino']['set_m_casino_dis'] = $set_m_casino_dis;
  $xy['m_open'] = $m_open;



  $sql = "SELECT * FROM `bom_tb_member` where m_id='".$id."'";
  $rem = sql_array($sql);

  $up_c = "";
  $up_c = ", m_count = '".$_count."', m_count_de = '".$_count."'";
 
  // $xy['back']['bank_id'] = $rem['bank_id'];


  $sql = "SELECT * FROM bom_tb_bank WHERE bank_id = ".$bank_id." ORDER BY bank_id DESC";
  $reb=sql_array($sql);
  // $xy['back']['bank_name'] = $rem['bank_name'];

  if(($m_b_bank == 1 and $reb['bank_name'] == 1) or ($m_b_bank == 2 and $reb['bank_name'] == 1) or ($m_b_bank == 1 and $reb['bank_name'] == 2))  
  {
    if($reb['bank_auto']==1)
    {
      $m_b_type = 2;
    }else{
      $m_b_type = 1;
    }
  }else{
    $m_b_type = 1;
  }

  if($reb['bank_name'] == 0)
  {
    $m_b_type = 0;
  }
// $xy['back']['m_b_type'] = $m_b_type;

// $sql="update IGNORE bom_tb_member set m_open = '".$m_open."' , m_nam = '".$set_m_nam."', m_name = '".$name."' $up_c , m_phone = '".$telephone."' , m_sport_dis = '".$set_m_sport_dis."' , m_sport_max = '".$set_m_sport_max."' , m_sport_min = '".$set_m_sport_min."' , m_sport_step_max = '".$set_m_sport_step_max."' , m_sport_step_min = '".$set_m_sport_step_min."' , m_sport_step_day = '".$set_m_sport_step_day."' , m_sport_step_paymax = '".$set_m_sport_step_paymax."' , m_sport_step2 = '".$set_m_sport_step2."' , m_sport_step_dis = '".$set_m_sport_step_dis."' , m_lotto_open = '".$m_lotto_open."' , m_lotto_max = '".$set_m_lotto_max."' , m_lotto_min = '".$set_m_lotto_min."' , m_lotto_pay1 = '".$set_m_lotto_pay1."' , m_lotto_dis1 = '".$set_m_lotto_dis1."' , m_lotto_pay2 = '".$set_m_lotto_pay2."' , m_lotto_dis2 = '".$set_m_lotto_dis2."' , m_lotto_pay3 = '".$set_m_lotto_pay3."' , m_lotto_dis3 = '".$set_m_lotto_dis3."' , m_lotto_hun_open = '".$m_lotto_hun_open."' , m_lotto_hun_max = '".$set_m_lotto_hun_max."' , m_lotto_hun_min = '".$set_m_lotto_hun_min."' , m_lotto_hun_pay1 = '".$set_m_lotto_hun_pay1."' , m_lotto_hun_dis1 = '".$set_m_lotto_hun_dis1."' , m_lotto_hun_pay2 = '".$set_m_lotto_hun_pay2."' , m_lotto_hun_dis2 = '".$set_m_lotto_hun_dis2."' , m_lotto_hun_pay3 = '".$set_m_lotto_hun_pay3."' , m_lotto_hun_dis3 = '".$set_m_lotto_hun_dis3."' , m_lotto_hun_set_pay = '".$set_m_lotto_hun_set_pay."' , m_lotto_hun_set_price = '".$set_m_lotto_hun_set_price."' , m_games_dis = '".$set_m_games_dis."' , m_games_max = '".$set_m_games_max."', m_games_min = '".$set_m_games_min."', m_casino_max = '".$set_m_casino_max."' , m_casino_min = '".$set_m_casino_min."', m_casino_dis = '".$set_m_casino_dis."', bank_id = '$bank_id' , m_b_pass = '$m_b_pass', m_b_type = '$m_b_type'  , m_b_bank = '$m_b_bank' , m_b_code = '$m_b_code' , m_b_name = '$m_b_name' where m_id='".$id."' ";

// ไม่มี m_b_pass = '$m_b_pass'
$sql="update IGNORE bom_tb_member set m_open = '".$m_open."' , m_nam = '".$set_m_nam."', m_name = '".$name."' $up_c , m_phone = '".$telephone."' , m_sport_dis = '".$set_m_sport_dis."' , m_sport_max = '".$set_m_sport_max."' , m_sport_min = '".$set_m_sport_min."' , m_sport_step_max = '".$set_m_sport_step_max."' , m_sport_step_min = '".$set_m_sport_step_min."' , m_sport_step_day = '".$set_m_sport_step_day."' , m_sport_step_paymax = '".$set_m_sport_step_paymax."' , m_sport_step2 = '".$set_m_sport_step2."' , m_sport_step_dis = '".$set_m_sport_step_dis."' , m_lotto_open = '".$m_lotto_open."' , m_lotto_max = '".$set_m_lotto_max."' , m_lotto_min = '".$set_m_lotto_min."' , m_lotto_pay1 = '".$set_m_lotto_pay1."' , m_lotto_dis1 = '".$set_m_lotto_dis1."' , m_lotto_pay2 = '".$set_m_lotto_pay2."' , m_lotto_dis2 = '".$set_m_lotto_dis2."' , m_lotto_pay3 = '".$set_m_lotto_pay3."' , m_lotto_dis3 = '".$set_m_lotto_dis3."' , m_lotto_hun_open = '".$m_lotto_hun_open."' , m_lotto_hun_max = '".$set_m_lotto_hun_max."' , m_lotto_hun_min = '".$set_m_lotto_hun_min."' , m_lotto_hun_pay1 = '".$set_m_lotto_hun_pay1."' , m_lotto_hun_dis1 = '".$set_m_lotto_hun_dis1."' , m_lotto_hun_pay2 = '".$set_m_lotto_hun_pay2."' , m_lotto_hun_dis2 = '".$set_m_lotto_hun_dis2."' , m_lotto_hun_pay3 = '".$set_m_lotto_hun_pay3."' , m_lotto_hun_dis3 = '".$set_m_lotto_hun_dis3."' , m_lotto_hun_set_pay = '".$set_m_lotto_hun_set_pay."' , m_lotto_hun_set_price = '".$set_m_lotto_hun_set_price."' , m_games_dis = '".$set_m_games_dis."' , m_games_max = '".$set_m_games_max."', m_games_min = '".$set_m_games_min."', m_casino_max = '".$set_m_casino_max."' , m_casino_min = '".$set_m_casino_min."', m_casino_dis = '".$set_m_casino_dis."', m_casino_open = '".$set_m_casino_open."', bank_id = '$bank_id' , m_b_type = '$m_b_type'  , m_b_bank = '$m_b_bank' , m_b_code = '$m_b_code' , m_b_name = '$m_b_name' where m_id='".$id."' ";
  
 $query = sql_query($sql);
 if($query)
 {

      $from=$rem["m_count"];  
      $have=$rem["m_count_de"]; 
      $d_user=$_SESSION['r_user'];

      if($_SESSION["uu_use"]==0)
        {
          $u_id = 'NULL';
          $by=$_SESSION["r_user"];
        }
        else
        {
          $u_id = $_SESSION["uu_id"];
          $sql="select * from bom_tb_agent where r_id='".$_SESSION["r_id"]."'";
          $rex=sql_array($sql);
          $by=$rex["r_user"];

        }

      if($_count > $rem["m_count"]) // ฝาก 
      {
        
        $p_comment= "ฝาก";
        $ptype=1;
        $pay=$_count-$from;
        $edType == "i";

        $bet_by =  1;
        $log_sum = $pay+$from;
        $d_type =  "d_in";

      

        ######################LOG ใหม่
        $sql="INSERT IGNORE INTO bom_tb_all_payment (
        bap_date, bap_ip, bap_type  ,m_id ,r_id,  m_agent_id, r_agent_id, 
        bap_before, bap_in ,bap_after,bap_comment,
        bap_code,bap_by_type,bap_by_id) values(
        now(),'"._bIP()."', '5', '$rem[m_id]','$rem[r_id]','$rem[m_agent_id]','$_SESSION[r_agent_id]',
        '$from' ,'$pay','$log_sum','เอเยนต์เพิ่มเครดิตสมาชิก',
        'EIN',$bap_by_type,'$bap_by_id') ";
        sql_query($sql);  
        ######################LOG ใหม่ 
     

      }else if($_count < $rem["m_count"]) // ถอน 
      { 
        
        $p_comment="ถอน";
        $ptype=2; 
        $pay=$_count-$from;
        $edType == "r";

        $bet_by =  2;
        $log_sum = $from-($pay*-1);
        $d_type =  "d_out";

        ######################LOG ใหม่
        $sql="INSERT IGNORE INTO bom_tb_all_payment (
        bap_date, bap_ip, bap_type  ,m_id ,r_id,  m_agent_id, r_agent_id, 
        bap_before, bap_out ,bap_after,bap_comment,
        bap_code,bap_by_type,bap_by_id) values(
        now(),'"._bIP()."', '6', '$rem[m_id]','$rem[r_id]','$rem[m_agent_id]','$_SESSION[r_agent_id]',
        '$from' ,'$pay','$log_sum','เอเยนต์ลดเครดิตสมาชิก',
        'EOT',$bap_by_type,'$bap_by_id'') ";
        sql_query($sql);  
        ######################LOG ใหม่ 
      }

      $bet=0;

      if($_count != $rem["m_count"])
      {
         $sql1="INSERT IGNORE INTO bom_tb_payment (p_date, p_from, p_bet ,p_pay  ,p_type,  m_id, r_level,  r_agent_id, p_by, p_comment , p_datename,u_id) values(now(),'$from', '$bet', '$pay','$ptype','$rem[m_id]','$rem[m_level]','$rem[m_agent_id]','$by' ,'$p_comment'  ,'".date("D")."',$u_id) ";
          sql_query($sql1);

         /*$sql2="INSERT IGNORE INTO bom_tb_databet_live (d_date,  m_id  ,d_count, $d_type  ,d_sum  ,d_by, d_user ) values(now() ,'{$id}','$from','$pay','$log_sum', $bet_by ,'$d_user')";
          sql_query($sql2);*/
      }


      $data  = array(
        'msg' => $lang_ag[5],
        'x_count3' => $x_count3,
        'xy'  =>  $xy,
        'status' => true,
      );


  }else{
   $data  = array(
     'msg' => $lang_ag[4],
     'status' => false,
   );
  }

  

  

  // $data  = array(
  //   'msg'     =>  $lang_ag[5],
  //   'status'  =>  true,
  //   'xy'  =>  $xy,
  //   'm' => $m,
  //   'sql'  =>  $sql,
  //   'sql1'  =>  $sql1,
  //   'sql3'  =>  $sql3,
  // );

}

echo json_encode($data);


 ?>