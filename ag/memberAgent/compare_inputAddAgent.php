<?php 
// ข้อมูลของ agent ที่ login สำหรับเปรียบเทียบ //

    $r_open = explode(",",$rs["r_open"]);
    /*
      $r_open[1] = บอลก่อนแข่ง
      $r_open[2] = บอลกำลังแข่ง
      $r_open[3] = กีฬาก่อนแข่ง
      $r_open[4] = กีฬากำลังแข่ง
      $r_open[5] = มวยไทยก่อนแข่ง
      $r_open[6] = มวยไทยกำลังแข่ง
      $r_open[7] =  สเต็ป
      $r_open[8] =  หวย
      $r_open[9] = หวยหุ้น
      $r_open[10] = หวยชุด
      $r_open[11] = เกม
      $r_open[12] = คาสิโน
    */

  $r_nam   =  $rs["r_nam"];
  $r_nam_ok   =  $rs["r_nam_ok"];
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
  $r_lotto_max  = explode(",", $rs["r_lotto_max"]);
  $r_lotto_min  = explode(",", $rs["r_lotto_min"]);
  $r_lotto_pay1   = explode(",", $rs["r_lotto_pay1"]);
  $r_lotto_dis1   = explode(",", $rs["r_lotto_dis1"]);
  $r_lotto_pay2   = explode(",", $rs["r_lotto_pay2"]);
  $r_lotto_dis2   = explode(",", $rs["r_lotto_dis2"]); 
  $r_lotto_pay3   = explode(",", $rs["r_lotto_pay3"]);
  $r_lotto_dis3   = explode(",", $rs["r_lotto_dis3"]);
  
  $r_lotto_hun_share   = explode(",", $rs["r_lotto_hun_share"]);
  $r_lotto_hun_max  = explode(",", $rs["r_lotto_hun_max"]);
  $r_lotto_hun_min  = explode(",", $rs["r_lotto_hun_min"]);
  $r_lotto_hun_pay1   = explode(",", $rs["r_lotto_hun_pay1"]);
  $r_lotto_hun_dis1   = explode(",", $rs["r_lotto_hun_dis1"]);
  $r_lotto_hun_pay2   = explode(",", $rs["r_lotto_hun_pay2"]);
  $r_lotto_hun_dis2   = explode(",", $rs["r_lotto_hun_dis2"]);
  $r_lotto_hun_pay3   = explode(",", $rs["r_lotto_hun_pay3"]);
  $r_lotto_hun_dis3   = explode(",", $rs["r_lotto_hun_dis3"]);
  
  $r_lotto_hun_set_share   = explode(",", $rs["r_lotto_hun_set_share"]);
  $r_lotto_hun_set_pay   = explode(",", $rs["r_lotto_hun_set_pay"]);
  $r_lotto_hun_set_price   = explode(",", $rs["r_lotto_hun_set_price"]);
  
  $r_games_dis   = explode(",", $rs["r_games_dis"]);
  $r_games_min   = explode(",", $rs["r_games_min"]);
  $r_games_max   = explode(",", $rs["r_games_max"]);
  $r_games_share   = explode(",", $rs["r_games_share"]);
  $r_games_myshare   = explode(",", $rs["r_games_myshare"]);
  
  $r_casino_share = explode(",", $rs["r_casino_share"]);
  $r_casino_dis   = explode(",", $rs["r_casino_dis"]);
  $r_casino_max   = explode(",", $rs["r_casino_max"]);
  $r_casino_min   = explode(",", $rs["r_casino_min"]);
// สิ้นสุด ข้อมูลของ agent ที่ login สำหรับเปรียบเทียบ //

//tab 0
$ex_live_betmoneymax_pair = str_replace(",","",$_POST["live_betmoneymax_pair"]);
$ex_live_fbetmoneymax_pair = str_replace(",","",$_POST["live_fbetmoneymax_pair"]);
$ex_live_betmax_money = str_replace(",","",$_POST["live_betmax_money"]);
$ex_live_fbetmax_money = str_replace(",","",$_POST["live_fbetmax_money"]);
$ex_live_betmin_money = str_replace(",","",$_POST["live_betmin_money"]);
$ex_live_fbetmin_money = str_replace(",","",$_POST["live_fbetmin_money"]);

$ex_r_nam = str_replace(",","",$_POST["r_nam"]);
$ex_torup = str_replace(",","",$_POST["torup"]);
$ex_logup = str_replace(",","",$_POST["logup"]);
$ex_today_share = str_replace(",","",$_POST["today_share"]);
$ex_live_share = str_replace(",","",$_POST["live_share"]);
$ex_today_com = str_replace(",","",$_POST["today_com"]);
//tab 1
$ex_sporttoday_share = str_replace(",","",$_POST["sporttoday_share"]);
$ex_sportlive_share = str_replace(",","",$_POST["sportlive_share"]);
$ex_sport_com = str_replace(",","",$_POST["sport_com"]);
$ex_sport_betmoneymax_pair = str_replace(",","",$_POST["sport_betmoneymax_pair"]);
$ex_sport_betmax_money = str_replace(",","",$_POST["sport_betmax_money"]);
$ex_sport_betmin_money = str_replace(",","",$_POST["sport_betmin_money"]);

//tab 2
$ex_boxingtoday_share = str_replace(",","",$_POST["boxingtoday_share"]);
$ex_boxinglive_share = str_replace(",","",$_POST["boxinglive_share"]);
$ex_boxing_com = str_replace(",","",$_POST["boxing_com"]);
$ex_boxing_betmoneymax_pair = str_replace(",","",$_POST["boxing_betmoneymax_pair"]);
$ex_boxing_betmax_money = str_replace(",","",$_POST["boxing_betmax_money"]);
$ex_boxing_betmin_money = str_replace(",","",$_POST["boxing_betmin_money"]);

//tab 3
$ex_step_share = str_replace(",","",$_POST["step_share"]);
$ex_step_betmax_money = str_replace(",","",$_POST["step_betmax_money"]);
$ex_step_betmin_money = str_replace(",","",$_POST["step_betmin_money"]);
$ex_step_daymax_money = str_replace(",","",$_POST["step_daymax_money"]);
$ex_step_billmax_money = str_replace(",","",$_POST["step_billmax_money"]);
$ex_step_min_pair = str_replace(",","",$_POST["step_min_pair"]);
$ex_step_max_pair = str_replace(",","",$_POST["step_max_pair"]);
//tab 4
$ex_lotto_share = str_replace(",","",$_POST["lotto_share"]);
$ex_lotto_betmax_money = str_replace(",","",$_POST["lotto_betmax_money"]);
$ex_lotto_betmin_money = str_replace(",","",$_POST["lotto_betmin_money"]);
//tab 5
$ex_lotto_share_hun = str_replace(",","",$_POST["lotto_share_hun"]);
$ex_lotto_share_hun_betmax_money = str_replace(",","",$_POST["lotto_share_hun_betmax_money"]);
$ex_lotto_share_hun_betmin_money = str_replace(",","",$_POST["lotto_share_hun_betmin_money"]);
//tab 6
$ex_lotto_hun_set_share = str_replace(",","",$_POST["lotto_hun_set_share"]);
//tab 7
$ex_game_share = str_replace(",","",$_POST["game_share"]);
$ex_game_com = str_replace(",","",$_POST["game_com"]);
$ex_game_max = str_replace(",","",$_POST["game_max"]);
$ex_game_min = str_replace(",","",$_POST["game_min"]);

// tab 0

if($r_open[2] != 0)
{
  if($ex_today_share > $r_sport_share[1] || $ex_today_share < 0 || !is_numeric($ex_today_share)){
    warningInput(0,$lang_ag[1055],"today_share");
  }else if($ex_live_share > $r_sport_share_live[1] || $ex_live_share < 0 || !is_numeric($ex_live_share)){
    warningInput(0,$lang_ag[1056],"live_share");
  }else if($ex_r_nam > $r_nam_ok || $ex_r_nam < 0 || !is_numeric($ex_r_nam)){
    warningInput(0,$lang_ag[1985],"r_nam");
  }
  // else if($ex_torup > $r_sport_nam_tor[1] || $ex_torup < 0 || !is_numeric($ex_torup)){
  //   warningInput(0,$lang_memberAgent[72],"torup");
  // }else if($ex_logup > $r_sport_nam_rong[1] || $ex_logup < 0 || !is_numeric($ex_logup)){
  //   warningInput(0,$lang_memberAgent[73],"logup");
  // }
  else if($ex_today_com > $r_sport_dis[1] || $ex_today_com < 0 || !is_numeric($ex_today_com)){
     warningInput(0,$lang_ag[609],"today_com");
  }else if($ex_live_betmoneymax_pair > $r_sport_max[1] || $ex_live_betmoneymax_pair < 0 || !is_numeric($ex_live_betmoneymax_pair)){
     warningInput(0,$lang_ag[621],"live_betmoneymax_pair");
  }else if($ex_live_fbetmoneymax_pair > $r_sport_max[2] || $ex_live_fbetmoneymax_pair < 0 || !is_numeric($ex_live_fbetmoneymax_pair)){
    warningInput(0,$lang_ag[623],"live_fbetmoneymax_pair");
  }else if($ex_live_betmax_money > $r_sport_max[3] || $ex_live_betmax_money < 0 || !is_numeric($ex_live_betmax_money)){
    warningInput(0,$lang_ag[625],"live_betmax_money");
  }else if($ex_live_fbetmax_money > $r_sport_max[4] || $ex_live_fbetmax_money < 0 || !is_numeric($ex_live_fbetmax_money)){
    warningInput(0,$lang_ag[627],"live_fbetmax_money");
  }else if($ex_live_betmin_money > $max_betmin_money || $ex_live_betmin_money < $r_sport_min[1] || !is_numeric($ex_live_betmin_money)){
    warningInput(0,$lang_ag[628],"live_betmin_money");
  }else if($ex_live_fbetmin_money > $max_betmin_money || $ex_live_fbetmin_money < $r_sport_min[2] || !is_numeric($ex_live_fbetmin_money)){
    warningInput(0,$lang_ag[630],"live_fbetmin_money");
  }else if($ex_live_betmax_money < $ex_live_betmin_money){
    warningInput(0,$lang_ag[673],"live_betmax_money");
  }else if($ex_live_fbetmax_money < $ex_live_fbetmin_money){
    warningInput(0,$lang_ag[675],"live_fbetmax_money");
  }
}

// tab 1
if($r_open[4] != 0)
{
  if($ex_sporttoday_share > $r_sport_share[2] || $ex_sporttoday_share < 0 || !is_numeric($ex_sporttoday_share)){
    warningInput(1,$lang_ag[1055],"sporttoday_share");
  }else if($ex_sportlive_share > $r_sport_share_live[2] || $ex_sportlive_share < 0 || !is_numeric($ex_sportlive_share)){
    warningInput(1,$lang_ag[1056],"sportlive_share");
  }else if($ex_sport_com > $r_sport_dis[2] || $ex_sport_com < 0 || !is_numeric($ex_sport_com)){
    warningInput(1,$lang_ag[609],"sport_com");
  }else if($ex_sport_betmoneymax_pair > $r_sport_max[5] || $ex_sport_betmoneymax_pair < 0 || !is_numeric($ex_sport_betmoneymax_pair)){
    warningInput(1,$lang_ag[634],"sport_betmoneymax_pair");
  }else if($ex_sport_betmax_money > $r_sport_max[6] || $ex_sport_betmax_money < $r_sport_min[3] || !is_numeric($ex_sport_betmax_money)){
    warningInput(1,$lang_ag[637],"sport_betmax_money");
  }else if($ex_sport_betmin_money > $max_betmin_money || $ex_sport_betmin_money < $r_sport_min[3] || !is_numeric($ex_sport_betmin_money)){
    warningInput(1,$lang_ag[639],"sport_betmin_money");
  }else if($ex_sport_betmax_money < $ex_sport_betmin_money){
    warningInput(1,$lang_ag[642],"sport_betmax_money");
  } 
}
// tab 2
if($r_open[6] != 0)
{
  if($ex_boxingtoday_share > $r_sport_share[3] || $ex_boxingtoday_share < 0 || !is_numeric($ex_boxingtoday_share)){
    warningInput(2,$lang_ag[677],"boxingtoday_share");
  }else if($ex_boxinglive_share > $r_sport_share_live[3] || $ex_boxinglive_share < 0 || !is_numeric($ex_boxinglive_share)){
    warningInput(2,$lang_ag[678],"boxinglive_share");
  }else if($ex_boxing_com > $r_sport_dis[3] || $ex_boxing_com < 0 || !is_numeric($ex_boxing_com)){
    warningInput(2,$lang_ag[609],"boxing_com");
  }else if($ex_boxing_betmoneymax_pair > $r_sport_max[7] || $ex_boxing_betmoneymax_pair < 0 || !is_numeric($ex_boxing_betmoneymax_pair)){
    warningInput(2,$lang_ag[634],"boxing_betmoneymax_pair");
  }else if($ex_boxing_betmax_money > $r_sport_max[8] || $ex_boxing_betmax_money < $r_sport_min[4] || !is_numeric($ex_boxing_betmax_money)){
    warningInput(2,$lang_ag[637],"boxing_betmax_money");
  }else if($ex_boxing_betmin_money > $max_betmin_money || $ex_boxing_betmin_money < $r_sport_min[4] || !is_numeric($ex_boxing_betmin_money)){
    warningInput(2,$lang_ag[639],"boxing_betmin_money");
  }else if($ex_boxing_betmax_money < $ex_boxing_betmax_money){
    warningInput(2,$lang_ag[642],"boxing_betmax_money");
  } 
}

//tab 3   
if($r_open[7] != 0)
{
  if($ex_step_share > $r_sport_share[4] || $ex_step_share < 0 || !is_numeric($ex_step_share)){
    warningInput(3,$lang_ag[645],"step_share");
  }else if($ex_step_betmax_money > $r_sport_step_max[1] || $ex_step_betmax_money < $r_sport_step_min[1] || !is_numeric($ex_step_betmax_money)){
    warningInput(3,$lang_ag[637],"step_betmax_money");
  }else if($ex_step_betmin_money > $max_betmin_money || $ex_step_betmin_money < $r_sport_step_min[1] || !is_numeric($ex_step_betmax_money)){
    warningInput(3,$lang_ag[639],"step_betmin_money");
  }else if($ex_step_betmax_money < $ex_step_betmin_money){
    warningInput(3,$lang_ag[642],"step_betmax_money");
  }else if($ex_step_daymax_money > $r_sport_step_day[1] || $ex_step_daymax_money < 0 || !is_numeric($ex_step_daymax_money)){
    warningInput(3,$lang_ag[648],"step_daymax_money");
  }else if($ex_step_billmax_money > $r_sport_step_paymax[1] || $ex_step_billmax_money < 0 || !is_numeric($ex_step_billmax_money)){
    warningInput(3,$lang_ag[651],"step_billmax_money");
  }else if($ex_step_min_pair > $r_sport_step2[2] || $ex_step_min_pair < $r_sport_step2[1] || !is_numeric($ex_step_min_pair)){
    warningInput(3,$lang_ag[653],"step_min_pair");
  }else if($ex_step_max_pair > $r_sport_step2[2] || $ex_step_max_pair < $r_sport_step2[1] || !is_numeric($ex_step_max_pair)){
    warningInput(3,$lang_ag[655],"step_max_pair");
  }else if($ex_step_max_pair < $ex_step_min_pair){
    warningInput(3,$lang_ag[658],"step_min_pair");
  }else{
    for ($i=$ex_step_min_pair; $i <= $ex_step_max_pair; $i++) { 
      $ex_stepcom = str_replace(",","",$_POST["stepcom".$i.""]);
      if($ex_stepcom > $r_sport_step_dis[$i] || $ex_stepcom < 0 || !is_numeric($ex_stepcom)){
        warningInput(3,$lang_ag[659],"stepcom".$i."");
      }
    }
  } 
}

//tab 4  
if($r_open[8] != 0)
{
  if($ex_lotto_share > $r_lotto_share[1] || $ex_lotto_share < 0 || !is_numeric($ex_lotto_share)){
    warningInput(4,$lang_ag[645],"7_lotto_share");
  }else if($ex_lotto_betmax_money > $r_lotto_max[1] || $ex_lotto_betmax_money < 0 || !is_numeric($ex_lotto_betmax_money)){
    warningInput(4,$lang_ag[637],"lotto_betmax_money");
  }else if($ex_lotto_betmin_money < $r_lotto_min[1] || $ex_lotto_betmin_money > $max_betmin_money || !is_numeric($ex_lotto_betmin_money)){
    warningInput(4,$lang_ag[639],"lotto_betmin_money");
  }else if($ex_lotto_betmin_money > $ex_lotto_betmax_money){
    warningInput(4,$lang_ag[642],"lotto_betmax_money");
  }else{
      foreach ($lot_type[$_SESSION["AGlang"]][1] as $key => $value) {
        $ex_lotto_pay1 = str_replace(",","",$_POST["lotto_pay1_".$key.""]);
        if($ex_lotto_pay1 > $r_lotto_pay1[$key] || $ex_lotto_pay1 < 0 || !is_numeric($ex_lotto_pay1)){
          warningInput(4,$lang_ag[660].$value.$lang_ag[661],"lotto_pay1_".$key."");
        }
        $ex_lotto_com1 = str_replace(",","",$_POST["lotto_com1_".$key.""]);
        if($ex_lotto_com1 > $r_lotto_dis1[$key] || $ex_lotto_com1 < 0 || !is_numeric($ex_lotto_com1)){
          warningInput(4,$lang_ag[663].$value.$lang_ag[661],"7_".$key."_lotto_com1");
        }
  
        $ex_lotto_pay2 = str_replace(",","",$_POST["lotto_pay2_".$key.""]);
        if($ex_lotto_pay2 > $r_lotto_pay2[$key] || $ex_lotto_pay2 < 0 || !is_numeric($ex_lotto_pay2)){
          warningInput(4,$lang_ag[660].$value.$lang_ag[661],"lotto_pay2_".$key."");
        }
        $ex_lotto_com2 = str_replace(",","",$_POST["lotto_com2_".$key.""]);
        if($ex_lotto_com2 > $r_lotto_dis2[$key] || $ex_lotto_com2 < 0 || !is_numeric($ex_lotto_com2)){
          warningInput(4,$lang_ag[663].$value.$lang_ag[661]."999","7_".$key."_lotto_com2");
        }
  
        $ex_lotto_pay3 = str_replace(",","",$_POST["lotto_pay3_".$key.""]);
        if($ex_lotto_pay3 > $r_lotto_pay3[$key] || $ex_lotto_pay3 < 0 || !is_numeric($ex_lotto_pay3)){
          warningInput(4,$lang_ag[660].$value.$lang_ag[661],"lotto_pay3_".$key."");
        }
        $ex_lotto_com3 = str_replace(",","",$_POST["lotto_com3_".$key.""]);
        if($ex_lotto_com3 > $r_lotto_dis3[$key] || $ex_lotto_com3 < 0 || !is_numeric($ex_lotto_com3)){
          warningInput(4,$lang_ag[663].$value.$lang_ag[661],"7_".$key."_lotto_com3");
        }
  
      }
  }
}

//tab 5
if($r_open[9] != 0)
{
  if($ex_lotto_share_hun > $r_lotto_hun_share[1] || $ex_lotto_share_hun < 0 || !is_numeric($ex_lotto_share_hun)){
    warningInput(5,$lang_ag[645],"8_lotto_share");
  }else if($ex_lotto_share_hun_betmax_money > $r_lotto_hun_max[1] || $ex_lotto_share_hun_betmax_money < 0 || !is_numeric($ex_lotto_share_hun_betmax_money)){
    warningInput(5,$lang_ag[637],"lotto_share_hun_betmax_money");
  }else if($ex_lotto_share_hun_betmin_money < $r_lotto_hun_min[1] || $ex_lotto_share_hun_betmin_money > $max_betmin_money || !is_numeric($ex_lotto_share_hun_betmin_money)){
    warningInput(5,$lang_ag[639],"lotto_share_hun_betmin_money");
  }else if($ex_lotto_share_hun_betmin_money > $ex_lotto_share_hun_betmax_money){
    warningInput(5,$lang_ag[642],"lotto_share_hun_betmax_money");
  }else{
      foreach ($lot_type[$_SESSION["AGlang"]][3] as $key => $value) {
        if($key==31){continue;}      
  
        $ex_lotto_hun_pay1 = str_replace(",","",$_POST["lotto_hun_pay1_".$key.""]);
        if($ex_lotto_hun_pay1 > $r_lotto_hun_pay1[$key] || $ex_lotto_hun_pay1 < 0 || !is_numeric($ex_lotto_hun_pay1)){
          warningInput(5,$lang_ag[660].$value.$lang_ag[661],"lotto_hun_pay1_".$key."");
        }
        $ex_lotto_hun_com1 = str_replace(",","",$_POST["lotto_hun_com1_".$key.""]);
        if($ex_lotto_hun_com1 > $r_lotto_hun_dis1[$key] || $ex_lotto_hun_com1 < 0 || !is_numeric($ex_lotto_hun_com1)){
          warningInput(5,$lang_ag[663].$value.$lang_ag[661],"8_".$key."_lotto_com1");
        }
  
        $ex_lotto_hun_pay2 = str_replace(",","",$_POST["lotto_hun_pay2_".$key.""]);
        if($ex_lotto_hun_pay2 > $r_lotto_hun_pay2[$key] || $ex_lotto_hun_pay2 < 0 || !is_numeric($ex_lotto_hun_pay2)){
          warningInput(5,$lang_ag[660].$value.$lang_ag[661],"lotto_hun_pay2_".$key."");
        }
        $ex_lotto_hun_com2 = str_replace(",","",$_POST["lotto_hun_com2_".$key.""]);
        if($ex_lotto_hun_com2 > $r_lotto_hun_dis2[$key] || $ex_lotto_hun_com2 < 0 || !is_numeric($ex_lotto_hun_com2)){
          warningInput(5,$lang_ag[663].$value.$lang_ag[661],"8_".$key."_lotto_com2");
        }
  
        $ex_lotto_hun_pay3 = str_replace(",","",$_POST["lotto_hun_pay3_".$key.""]);
        if($ex_lotto_hun_pay3 > $r_lotto_hun_pay3[$key] || $ex_lotto_hun_pay3 < 0 || !is_numeric($ex_lotto_hun_pay3)){
          warningInput(5,$lang_ag[660].$value.$lang_ag[661],"lotto_hun_pay3_".$key."");
        }
        $ex_lotto_hun_com3 = str_replace(",","",$_POST["lotto_hun_com3_".$key.""]);
        if($ex_lotto_hun_com3 > $r_lotto_hun_dis3[$key] || $ex_lotto_hun_com3 < 0 || !is_numeric($ex_lotto_hun_com3)){
          warningInput(5,$lang_ag[663].$value.$lang_ag[661],"8_".$key."_lotto_com3");
        }
        
      }
  }
}
//tab 6
if($r_open[10] != 0)
{
  if($ex_lotto_hun_set_share > $r_lotto_hun_set_share[1] || $ex_lotto_hun_set_share < 0 || !is_numeric($ex_lotto_hun_set_share)){
    warningInput(6,$lang_ag[645],"9_lotto_share");
  }else{
    foreach ($lang_g["setpay"] as $key => $value) {
      $index = $key+1;
      $ex_lot_hun_set_pay = str_replace(",","",$_POST["lot_hun_set_pay".$index.""]);
      if($ex_lot_hun_set_pay > $r_lotto_hun_set_pay[$index] || $ex_lot_hun_set_pay < 0 || !is_numeric($ex_lot_hun_set_pay)){
        warningInput(6,$lang_ag[660].$value.$lang_ag[661],"lot_hun_set_pay".$index."");
      }
      if($index == 1){
        $ex_lot_hun_set_price = str_replace(",","",$_POST["lot_hun_set_price".$index.""]);
        if($ex_lot_hun_set_price < $r_lotto_hun_set_price[$index] || $ex_lot_hun_set_price > $max_betmin_money || !is_numeric($ex_lot_hun_set_price)){
          warningInput(6,$lang_ag[665],"lot_hun_set_price".$index."");
        }
      }  
    }
  }
}
//tab 7
if($r_open[11] != 0)
{
  if($ex_game_share > $r_games_share[1] || $ex_game_share < 0 || !is_numeric($ex_game_share)){
    warningInput(7,$lang_ag[645],"game_share");
  }else if($ex_game_com > $r_games_dis[1] || $ex_game_com < 0 || !is_numeric($ex_game_com)){
    warningInput(7,$lang_ag[609],"game_com");
  }else if($ex_game_max > $r_games_max[1] || $ex_game_max < $min_betmin_money || !is_numeric($ex_game_max)){
      warningInput(7,"สูงสุด/ไม้ ไม่ถูกต้อง","game_max");
  }else if($ex_game_min < $r_games_min[1] || $ex_game_min > $max_betmin_money || $ex_game_min < $min_betmin_money || !is_numeric($ex_game_min)){
      warningInput(7,"ต่ำสุด/ไม้ ไม่ถูกต้อง","game_min");
  }else  if($ex_game_max < $ex_game_min){
      warningInput(7,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","game_max");
  }
}
// tab 8 
if($r_open[12] != 0)
{
  // foreach ($lang_g["casino_share"]  as $key => $value) {
  
  //   $ex_casino_share = str_replace(",","",$_POST["casino_share".$key.""]);
  //   $ex_casino_com = str_replace(",","",$_POST["casino_com".$key.""]);
  //   $ex_rcb_maxtransfer = str_replace(",","",$_POST["rcb_maxtransfer".$key.""]);
  //   $ex_rcb_mintransfer = str_replace(",","",$_POST["rcb_mintransfer".$key.""]);
  
  //    // $xxx = $ex_rcb_maxtransfer.">".$r_casino_max[$key];
  //   // $data  = array(
  //   //   'msg'     => "99999",
  //   //   'status'  =>  false,
  //   //   'xy'  =>  $xxx,
  //   // );
  //   // echo json_encode($data);
  //   // exit();
  
  
  //   if($ex_casino_share > $r_casino_share[$key] || $ex_casino_share < 0 || !is_numeric($ex_casino_share)){
  //     warningInput(8,$lang_ag[666].$value.$lang_ag[661],"casino_share".$key."");
  //   }else if($ex_casino_com > $r_casino_dis[$key] || $ex_casino_com < 0 || !is_numeric($ex_casino_com)){
  //     warningInput(8,$lang_ag[663]." ".$value." ".$lang_ag[661],"casino_com".$key."");
  //   }else if($ex_rcb_maxtransfer > $r_casino_max[$key] || $ex_rcb_maxtransfer < $r_casino_min[$key] || !is_numeric($ex_rcb_maxtransfer)){
  //     warningInput(8,$lang_ag[667].$value.$lang_ag[661],"rcb_maxtransfer".$key."");
  //   }else if($ex_rcb_mintransfer < $r_casino_min[$key] || $ex_rcb_mintransfer > $max_betmin_money || !is_numeric($ex_rcb_mintransfer)){
  //     warningInput(8,$lang_ag[1671].$value.$lang_ag[661],"rcb_mintransfer".$key."");
  //   }else  if($ex_rcb_maxtransfer < $ex_rcb_mintransfer){
  //     warningInput(8,$lang_ag[667].$value." ".$lang_ag[1672],"rcb_maxtransfer".$key."");
  //   }
  
  // }
}

 ?>