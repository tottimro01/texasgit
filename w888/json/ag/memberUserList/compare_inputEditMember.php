<?php 

//ดึงข้อมูลของ agent ที่ login อยู่
  $r_agent_id = $_SESSION["r_agent_id"];
  $sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_id = ".$_SESSION["rid"]." and r_level=".intval($_SESSION["r_level"])."";
  $rs = sql_array($sql);

  // ข้อมูลของ agent ที่ login สำหรับเปรียบเทียบ //
    $r_sport_nam_tor   = explode(",", $rs["r_sport_nam_tor"]);
    $r_sport_nam_rong   = explode(",", $rs["r_sport_nam_rong"]);       
    $r_sport_dis   = explode(",", $rs["r_sport_dis"]);
    $r_sport_max   = explode(",", $rs["r_sport_max"]);
    $r_sport_min   = explode(",", $rs["r_sport_min"]);
     
    $r_sport_step_max   = explode(",", $rs["r_sport_step_max"]);
    $r_sport_step_min   = explode(",", $rs["r_sport_step_min"]);
    
    $r_sport_step_max   = explode(",", $rs["r_sport_step_max"]);
    $r_sport_step_min   = explode(",", $rs["r_sport_step_min"]);
    $r_sport_step_day   = explode(",", $rs["r_sport_step_day"]);
    $r_sport_step_paymax   = explode(",", $rs["r_sport_step_paymax"]);
    $r_sport_step2   = explode(",", $rs["r_sport_step2"]);
    $r_sport_step_dis   = explode(",", $rs["r_sport_step_dis"]);
    
    $r_sport_share   = explode(",", $rs["r_sport_share"]);
    $r_sport_share_live   = explode(",", $rs["r_sport_share_live"]);
    
    $r_lotto_share   = explode(",", $rs["r_lotto_share"]);
    $r_lotto_pay1   = explode(",", $rs["r_lotto_pay1"]);
    $r_lotto_dis1   = explode(",", $rs["r_lotto_dis1"]);
    $r_lotto_pay2   = explode(",", $rs["r_lotto_pay2"]);
    $r_lotto_dis2   = explode(",", $rs["r_lotto_dis2"]); 
    $r_lotto_pay3   = explode(",", $rs["r_lotto_pay3"]);
    $r_lotto_dis3   = explode(",", $rs["r_lotto_dis3"]);
    
    $r_lotto_hun_share   = explode(",", $rs["r_lotto_share"]);
    $r_lotto_hun_pay1   = explode(",", $rs["r_lotto_hun_pay1"]);
    $r_lotto_hun_dis1   = explode(",", $rs["r_lotto_hun_dis1"]);
    $r_lotto_hun_pay2   = explode(",", $rs["r_lotto_hun_pay2"]);
    $r_lotto_hun_dis2   = explode(",", $rs["r_lotto_hun_dis2"]);
    $r_lotto_hun_pay3   = explode(",", $rs["r_lotto_hun_pay3"]);
    $r_lotto_hun_dis3   = explode(",", $rs["r_lotto_hun_dis3"]);
    
    $r_lotto_hun_set_pay   = explode(",", $rs["r_lotto_hun_set_pay"]);
    $r_lotto_hun_set_price   = explode(",", $rs["r_lotto_hun_set_price"]);
    
    $r_games_dis   = explode(",", $rs["r_games_dis"]);
    $r_games_share   = explode(",", $rs["r_games_share"]);
    $r_games_myshare   = explode(",", $rs["r_games_myshare"]);
    
    $r_casino_share = explode(",", $rs["r_casino_share"]);
    $r_casino_max   = explode(",", $rs["r_casino_max"]);
// สิ้นสุด ข้อมูลของ agent ที่ login สำหรับเปรียบเทียบ //

//tab 0
$ex_today_com = str_replace(",","",$_POST["today_com"]);
$ex_torup = str_replace(",","",$_POST["torup"]);
$ex_logup = str_replace(",","",$_POST["logup"]);
$ex_live_betmoneymax_pair = str_replace(",","",$_POST["live_betmoneymax_pair"]);
$ex_live_fbetmoneymax_pair = str_replace(",","",$_POST["live_fbetmoneymax_pair"]);
$ex_live_betmax_money = str_replace(",","",$_POST["live_betmax_money"]);
$ex_live_fbetmax_money = str_replace(",","",$_POST["live_fbetmax_money"]);
$ex_live_betmin_money = str_replace(",","",$_POST["live_betmin_money"]);
$ex_live_fbetmin_money = str_replace(",","",$_POST["live_fbetmin_money"]);

//tab 1
$ex_sport_com = str_replace(",","",$_POST["sport_com"]);
$ex_sport_betmoneymax_pair = str_replace(",","",$_POST["sport_betmoneymax_pair"]);
$ex_sport_betmax_money = str_replace(",","",$_POST["sport_betmax_money"]);
$ex_sport_betmin_money = str_replace(",","",$_POST["sport_betmin_money"]);

//tab 1
$ex_boxing_com = str_replace(",","",$_POST["boxing_com"]);
$ex_boxing_betmoneymax_pair = str_replace(",","",$_POST["boxing_betmoneymax_pair"]);
$ex_boxing_betmax_money = str_replace(",","",$_POST["boxing_betmax_money"]);
$ex_boxing_betmin_money = str_replace(",","",$_POST["boxing_betmin_money"]);

//tab 2
$ex_step_betmax_money = str_replace(",","",$_POST["step_betmax_money"]);
$ex_step_betmin_money = str_replace(",","",$_POST["step_betmin_money"]);
$ex_step_daymax_money = str_replace(",","",$_POST["step_daymax_money"]);
$ex_step_billmax_money = str_replace(",","",$_POST["step_billmax_money"]);
$ex_step_min_pair = str_replace(",","",$_POST["step_min_pair"]);
$ex_step_max_pair = str_replace(",","",$_POST["step_max_pair"]);
//tab 6
$ex_game_com = str_replace(",","",$_POST["game_com"]);


// $xy[sadf] = $r_lotto_dis1;
// $xy[ass] = $sql;
// $data  = array(
//   'msg'     => "99999",
//   'status'  =>  false,
//   'xy'  => $xy,
// );
// echo json_encode($data);
// exit();

// tab 0
if($ex_today_com > $r_sport_dis[1] || $ex_today_com < 0 || !is_numeric($ex_today_com)){
   warningInput(0,$lang_userList[79],"today_com");
}else if($ex_torup > $r_sport_nam_tor[1] || $ex_torup < 0 || !is_numeric($ex_torup)){
  warningInput(0,$lang_userList[105],"torup");
}else if($ex_logup > $r_sport_nam_rong[1] || $ex_logup < 0 || !is_numeric($ex_logup)){
  warningInput(0,$lang_userList[106],"logup");
}else if($ex_live_betmoneymax_pair > $r_sport_max[1] || $ex_live_betmoneymax_pair < 0 || !is_numeric($ex_live_betmoneymax_pair)){
   warningInput(0,$lang_userList[82],"live_betmoneymax_pair");
}else if($ex_live_fbetmoneymax_pair > $r_sport_max[2] || $ex_live_fbetmoneymax_pair < 0 || !is_numeric($ex_live_fbetmoneymax_pair)){
  warningInput(0,$lang_userList[83],"live_fbetmoneymax_pair");
}else if($ex_live_betmax_money > $r_sport_max[3] || $ex_live_betmax_money < 0 || !is_numeric($ex_live_betmax_money)){
  warningInput(0,$lang_userList[84],"live_betmax_money");
}else if($ex_live_fbetmax_money > $r_sport_max[4] || $ex_live_fbetmax_money < 0 || !is_numeric($ex_live_fbetmax_money)){
  warningInput(0,$lang_userList[85],"live_fbetmax_money");
}else if($ex_live_betmin_money > $r_sport_max[3] || $ex_live_betmin_money < $r_sport_min[1] || !is_numeric($ex_live_betmin_money)){
  warningInput(0,$lang_userList[86],"live_betmin_money");
}else if($ex_live_fbetmin_money > $r_sport_max[4] || $ex_live_fbetmin_money < $r_sport_min[2] || !is_numeric($ex_live_fbetmin_money)){
  warningInput(0,$lang_userList[87],"live_fbetmin_money");
}else if($ex_live_betmax_money < $ex_live_betmin_money){
  warningInput(0,$lang_userList[107],"live_betmax_money");
}else if($ex_live_fbetmax_money < $ex_live_fbetmin_money){
  warningInput(0,$lang_userList[108],"live_fbetmax_money");
}

// tab 1
if($ex_sport_com > $r_sport_dis[2] || $ex_sport_com < 0 || !is_numeric($ex_sport_com)){
  warningInput(1,$lang_userList[79],"sport_com");
}else if($ex_sport_betmoneymax_pair > $r_sport_max[5] || $ex_sport_betmoneymax_pair < 0 || !is_numeric($ex_sport_betmoneymax_pair)){
  warningInput(1,$lang_userList[88],"sport_betmoneymax_pair");
}else if($ex_sport_betmax_money > $r_sport_max[6] || $ex_sport_betmax_money < $r_sport_min[3] || !is_numeric($ex_sport_betmax_money)){
  warningInput(1,$lang_userList[89],"sport_betmax_money");
}else if($ex_sport_betmin_money > $r_sport_max[6] || $ex_sport_betmin_money < $r_sport_min[3] || !is_numeric($ex_sport_betmin_money)){
  warningInput(1,$lang_userList[90],"sport_betmin_money");
}else if($ex_sport_betmax_money < $ex_sport_betmin_money){
  warningInput(1,$lang_userList[91],"sport_betmax_money");
} 


// tab 2
if($ex_boxing_com > $r_sport_dis[2] || $ex_boxing_com < 0 || !is_numeric($ex_boxing_com)){
  warningInput(2,$lang_userList[79],"boxing_com");
}else if($ex_boxing_betmoneymax_pair > $r_sport_max[5] || $ex_boxing_betmoneymax_pair < 0 || !is_numeric($ex_boxing_betmoneymax_pair)){
  warningInput(2,$lang_userList[88],"boxing_betmoneymax_pair");
}else if($ex_boxing_betmax_money > $r_sport_max[6] || $ex_boxing_betmax_money < $r_sport_min[3] || !is_numeric($ex_boxing_betmax_money)){
  warningInput(2,$lang_userList[89],"boxing_betmax_money");
}else if($ex_boxing_betmin_money > $r_sport_max[6] || $ex_boxing_betmin_money < $r_sport_min[3] || !is_numeric($ex_boxing_betmin_money)){
  warningInput(2,$lang_userList[90],"boxing_betmin_money");
}else if($ex_boxing_betmax_money < $ex_boxing_betmin_money){
  warningInput(2,$lang_userList[91],"boxing_betmax_money");
} 

// tab 3
if($ex_step_betmax_money > $r_sport_step_max[1] || $ex_step_betmax_money < $r_sport_step_min[1] || !is_numeric($ex_step_betmax_money)){
  warningInput(3,$lang_userList[89],"step_betmax_money");
}else if($ex_step_betmin_money > $r_sport_step_max[1] || $ex_step_betmin_money < $r_sport_step_min[1] || !is_numeric($ex_step_betmax_money)){
  warningInput(3,$lang_userList[89],"step_betmin_money");
}else if($ex_step_betmax_money < $ex_step_betmin_money){
  warningInput(3,$lang_userList[91],"step_betmax_money");
}else if($ex_step_daymax_money > $r_sport_step_day[1] || $ex_step_daymax_money < 0 || !is_numeric($ex_step_daymax_money)){
  warningInput(3,$lang_userList[93],"step_daymax_money");
}else if($ex_step_billmax_money > $r_sport_step_paymax[1] || $ex_step_billmax_money < 0 || !is_numeric($ex_step_billmax_money)){
  warningInput(3,$lang_userList[94],"step_billmax_money");
}else if($ex_step_min_pair > $r_sport_step2[2] || $ex_step_min_pair < $r_sport_step2[1] || !is_numeric($ex_step_min_pair)){
  warningInput(3,$lang_userList[95],"step_min_pair");
}else if($ex_step_max_pair > $r_sport_step2[2] || $ex_step_max_pair < $r_sport_step2[1] || !is_numeric($ex_step_max_pair)){
  warningInput(3,$lang_userList[96],"step_max_pair");
}else if($ex_step_max_pair < $ex_step_min_pair){
  warningInput(3,$lang_userList[97],"step_min_pair");
}else{
  for ($i=$ex_step_min_pair; $i <= $ex_step_max_pair; $i++) { 
    $ex_stepcom = str_replace(",","",$_POST["stepcom".$i.""]);
    if($ex_stepcom > $r_sport_step_dis[$i] || $ex_stepcom < 0 || !is_numeric($ex_stepcom)){
      warningInput(3,$lang_userList[98],"stepcom".$i."");
    }
  }
}

//tab 4  
foreach ($lot_type[$_SESSION["AGlang"]][1] as $key => $value) {
  $ex_lotto_pay1 = str_replace(",","",$_POST["lotto_pay1_".$key.""]);
  if($ex_lotto_pay1 > $r_lotto_pay1[$key] || $ex_lotto_pay1 < 0 || !is_numeric($ex_lotto_pay1)){
    warningInput(4,$lang_userList[99].$value.$lang_userList[100],"lotto_pay1_".$key."");
  }
  $ex_lotto_com1 = str_replace(",","",$_POST["lotto_com1_".$key.""]);
  if($ex_lotto_com1 > $r_lotto_dis1[$key] || $ex_lotto_com1 < 0 || !is_numeric($ex_lotto_com1)){
    warningInput(4,"".$ex_lotto_com1.">".$r_lotto_dis1[$key].$lang_userList[101].$value.$lang_userList[100],"7_".$key."_lotto_com1");
  }

  $ex_lotto_pay2 = str_replace(",","",$_POST["lotto_pay2_".$key.""]);
  if($ex_lotto_pay2 > $r_lotto_pay2[$key] || $ex_lotto_pay2 < 0 || !is_numeric($ex_lotto_pay2)){
    warningInput(4,$lang_userList[99].$value.$lang_userList[100],"lotto_pay2_".$key."");
  }
  $ex_lotto_com2 = str_replace(",","",$_POST["lotto_com2_".$key.""]);
  if($ex_lotto_com2 > $r_lotto_dis2[$key] || $ex_lotto_com2 < 0 || !is_numeric($ex_lotto_com2)){
    warningInput(4,"".$ex_lotto_com2.">".$r_lotto_dis2[$key].$lang_userList[101].$value.$lang_userList[100],"7_".$key."_lotto_com2");
  }

  $ex_lotto_pay3 = str_replace(",","",$_POST["lotto_pay3_".$key.""]);
  if($ex_lotto_pay3 > $r_lotto_pay3[$key] || $ex_lotto_pay3 < 0 || !is_numeric($ex_lotto_pay3)){
    warningInput(4,$lang_userList[99].$value.$lang_userList[100],"lotto_pay3_".$key."");
  }
  $ex_lotto_com3 = str_replace(",","",$_POST["lotto_com3_".$key.""]);
  if($ex_lotto_com3 > $r_lotto_dis3[$key] || $ex_lotto_com3 < 0 || !is_numeric($ex_lotto_com3)){
    warningInput(4,"".$ex_lotto_com3.">".$r_lotto_dis3[$key].$lang_userList[101].$value.$lang_userList[100],"7_".$key."_lotto_com3");
  }
}

//tab 5
foreach ($lot_type[$_SESSION["AGlang"]][3] as $key => $value) {

  $ex_lotto_hun_pay1 = str_replace(",","",$_POST["lotto_hun_pay1_".$key.""]);
  if($ex_lotto_hun_pay1 > $r_lotto_hun_pay1[$key] || $ex_lotto_hun_pay1 < 0 || !is_numeric($ex_lotto_hun_pay1)){
    warningInput(5,$lang_userList[99].$value.$lang_userList[100],"lotto_hun_pay1_".$key."");
  }
  $ex_lotto_hun_com1 = str_replace(",","",$_POST["lotto_hun_com1_".$key.""]);
  if($ex_lotto_hun_com1 > $r_lotto_hun_dis1[$key] || $ex_lotto_hun_com1 < 0 || !is_numeric($ex_lotto_hun_com1)){
    warningInput(5,$lang_userList[101].$value.$lang_userList[100],"lotto_hun_com1_".$key."");
  }

  $ex_lotto_hun_pay2 = str_replace(",","",$_POST["lotto_hun_pay2_".$key.""]);
  if($ex_lotto_hun_pay2 > $r_lotto_hun_pay2[$key] || $ex_lotto_hun_pay2 < 0 || !is_numeric($ex_lotto_hun_pay2)){
    warningInput(5,$lang_userList[99].$value.$lang_userList[100],"lotto_hun_pay2_".$key."");
  }
  $ex_lotto_hun_com2 = str_replace(",","",$_POST["lotto_hun_com2_".$key.""]);
  if($ex_lotto_hun_com2 > $r_lotto_hun_dis2[$key] || $ex_lotto_hun_com2 < 0 || !is_numeric($ex_lotto_hun_com2)){
    warningInput(5,$lang_userList[101].$value.$lang_userList[100],"lotto_hun_com2_".$key."");
  }

  $ex_lotto_hun_pay3 = str_replace(",","",$_POST["lotto_hun_pay3_".$key.""]);
  if($ex_lotto_hun_pay3 > $r_lotto_hun_pay3[$key] || $ex_lotto_hun_pay3 < 0 || !is_numeric($ex_lotto_hun_pay3)){
    warningInput(5,$lang_userList[99].$value.$lang_userList[100],"lotto_hun_pay3_".$key."");
  }
  $ex_lotto_hun_com3 = str_replace(",","",$_POST["lotto_hun_com3_".$key.""]);
  if($ex_lotto_hun_com3 > $r_lotto_hun_dis3[$key] || $ex_lotto_hun_com3 < 0 || !is_numeric($ex_lotto_hun_com3)){
    warningInput(5,$lang_userList[101].$value.$lang_userList[100],"lotto_hun_com3_".$key."");
  }

}

//tab 6
foreach ($lang_g["setpay"] as $key => $value) {
  $index = $key+1;
  $ex_lot_hun_set_pay = str_replace(",","",$_POST["lot_hun_set_pay".$index.""]);
  if($ex_lot_hun_set_pay > $r_lotto_hun_set_pay[$index] || $ex_lot_hun_set_pay < 0 || !is_numeric($ex_lot_hun_set_pay)){
    warningInput(6,$lang_userList[99].$value.$lang_userList[100],"lot_hun_set_pay".$index."");
  }
  if($index == 1){
    $ex_lot_hun_set_price = str_replace(",","",$_POST["lot_hun_set_price".$index.""]);
    if($ex_lot_hun_set_price > $r_lotto_hun_set_price[$index] || $ex_lot_hun_set_price < 0 || !is_numeric($ex_lot_hun_set_price)){
      warningInput(6,$lang_userList[102],"lot_hun_set_price".$index."");
    }
  }  
}

//tab 7
if($ex_game_com > $r_games_dis[1] || $ex_game_com < 0 || !is_numeric($ex_game_com)){
  warningInput(7,$lang_userList[79],"game_com");
}

// tab 8 
foreach ($lang_g["casino_share"]  as $key => $value) {
  $ex_rcb_maxtransfer = str_replace(",","",$_POST["rcb_maxtransfer".$key.""]);
  if($ex_rcb_maxtransfer > $r_casino_max[$key] || $ex_rcb_maxtransfer < 0 || !is_numeric($ex_rcb_maxtransfer)){
    warningInput(8,$lang_userList[104].$value.$lang_userList[100],"rcb_maxtransfer".$key."");
  }
}

 ?>