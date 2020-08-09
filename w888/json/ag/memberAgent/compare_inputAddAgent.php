<?php 
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
  
  $r_lotto_hun_set_share   = explode(",", $rs["r_lotto_hun_set_share"]);
  $r_lotto_hun_set_pay   = explode(",", $rs["r_lotto_hun_set_pay"]);
  $r_lotto_hun_set_price   = explode(",", $rs["r_lotto_hun_set_price"]);
  
  $r_games_dis   = explode(",", $rs["r_games_dis"]);
  $r_games_share   = explode(",", $rs["r_games_share"]);
  $r_games_myshare   = explode(",", $rs["r_games_myshare"]);
  
  $r_casino_share = explode(",", $rs["r_casino_share"]);
  $r_casino_max   = explode(",", $rs["r_casino_max"]);
// สิ้นสุด ข้อมูลของ agent ที่ login สำหรับเปรียบเทียบ //

//tab 0
$ex_live_betmoneymax_pair = str_replace(",","",$_POST["live_betmoneymax_pair"]);
$ex_live_fbetmoneymax_pair = str_replace(",","",$_POST["live_fbetmoneymax_pair"]);
$ex_live_betmax_money = str_replace(",","",$_POST["live_betmax_money"]);
$ex_live_fbetmax_money = str_replace(",","",$_POST["live_fbetmax_money"]);
$ex_live_betmin_money = str_replace(",","",$_POST["live_betmin_money"]);
$ex_live_fbetmin_money = str_replace(",","",$_POST["live_fbetmin_money"]);
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
//tab 5
$ex_lotto_share_hun = str_replace(",","",$_POST["lotto_share_hun"]);
//tab 6
$ex_lotto_hun_set_share = str_replace(",","",$_POST["lotto_hun_set_share"]);
//tab 7
$ex_game_share = str_replace(",","",$_POST["game_share"]);
$ex_game_com = str_replace(",","",$_POST["game_com"]);

// tab 0
if($ex_today_share > $r_sport_share[1] || $ex_today_share < 0 || !is_numeric($ex_today_share)){
  warningInput(0,$lang_memberAgent[70],"today_share");
}else if($ex_live_share > $r_sport_share_live[1] || $ex_live_share < 0 || !is_numeric($ex_live_share)){
  warningInput(0,$lang_memberAgent[71],"live_share");
}else if($ex_torup > $r_sport_nam_tor[1] || $ex_torup < 0 || !is_numeric($ex_torup)){
  warningInput(0,$lang_memberAgent[72],"torup");
}else if($ex_logup > $r_sport_nam_rong[1] || $ex_logup < 0 || !is_numeric($ex_logup)){
  warningInput(0,$lang_memberAgent[73],"logup");
}else if($ex_today_com > $r_sport_dis[1] || $ex_today_com < 0 || !is_numeric($ex_today_com)){
   warningInput(0,$lang_memberAgent[74],"today_com");
}else if($ex_live_betmoneymax_pair > $r_sport_max[1] || $ex_live_betmoneymax_pair < 0 || !is_numeric($ex_live_betmoneymax_pair)){
   warningInput(0,$lang_memberAgent[75],"live_betmoneymax_pair");
}else if($ex_live_fbetmoneymax_pair > $r_sport_max[2] || $ex_live_fbetmoneymax_pair < 0 || !is_numeric($ex_live_fbetmoneymax_pair)){
  warningInput(0,$lang_memberAgent[76],"live_fbetmoneymax_pair");
}else if($ex_live_betmax_money > $r_sport_max[3] || $ex_live_betmax_money < 0 || !is_numeric($ex_live_betmax_money)){
  warningInput(0,$lang_memberAgent[77],"live_betmax_money");
}else if($ex_live_fbetmax_money > $r_sport_max[4] || $ex_live_fbetmax_money < 0 || !is_numeric($ex_live_fbetmax_money)){
  warningInput(0,$lang_memberAgent[78],"live_fbetmax_money");
}else if($ex_live_betmin_money > $r_sport_max[3] || $ex_live_betmin_money < $r_sport_min[1] || !is_numeric($ex_live_betmin_money)){
  warningInput(0,$lang_memberAgent[79],"live_betmin_money");
}else if($ex_live_fbetmin_money > $r_sport_max[4] || $ex_live_fbetmin_money < $r_sport_min[2] || !is_numeric($ex_live_fbetmin_money)){
  warningInput(0,$lang_memberAgent[80],"live_fbetmin_money");
}else if($ex_live_betmax_money < $ex_live_betmin_money){
  warningInput(0,$lang_memberAgent[81],"live_betmax_money");
}else if($ex_live_fbetmax_money < $ex_live_fbetmin_money){
  warningInput(0,$lang_memberAgent[82],"live_fbetmax_money");
}

// tab 1
if($ex_sporttoday_share > $r_sport_share[2] || $ex_sporttoday_share < 0 || !is_numeric($ex_sporttoday_share)){
  warningInput(1,$lang_memberAgent[83],"sporttoday_share");
}else if($ex_sportlive_share > $r_sport_share_live[2] || $ex_sportlive_share < 0 || !is_numeric($ex_sportlive_share)){
  warningInput(1,$lang_memberAgent[84],"sportlive_share");
}else if($ex_sport_com > $r_sport_dis[2] || $ex_sport_com < 0 || !is_numeric($ex_sport_com)){
  warningInput(1,$lang_memberAgent[74],"sport_com");
}else if($ex_sport_betmoneymax_pair > $r_sport_max[5] || $ex_sport_betmoneymax_pair < 0 || !is_numeric($ex_sport_betmoneymax_pair)){
  warningInput(1,$lang_memberAgent[85],"sport_betmoneymax_pair");
}else if($ex_sport_betmax_money > $r_sport_max[6] || $ex_sport_betmax_money < $r_sport_min[3] || !is_numeric($ex_sport_betmax_money)){
  warningInput(1,$lang_memberAgent[86],"sport_betmax_money");
}else if($ex_sport_betmin_money > $r_sport_max[6] || $ex_sport_betmin_money < $r_sport_min[3] || !is_numeric($ex_sport_betmin_money)){
  warningInput(1,$lang_memberAgent[87],"sport_betmin_money");
}else if($ex_sport_betmax_money < $ex_sport_betmin_money){
  warningInput(1,$lang_memberAgent[88],"sport_betmax_money");
} 

// tab 2
if($ex_boxingtoday_share > $r_sport_share[3] || $ex_boxingtoday_share < 0 || !is_numeric($ex_boxingtoday_share)){
  warningInput(2,$lang_memberAgent[107],"boxingtoday_share");
}else if($ex_boxinglive_share > $r_sport_share_live[3] || $ex_boxinglive_share < 0 || !is_numeric($ex_boxinglive_share)){
  warningInput(2,$lang_memberAgent[108],"boxinglive_share");
}else if($ex_boxing_com > $r_sport_dis[3] || $ex_boxing_com < 0 || !is_numeric($ex_boxing_com)){
  warningInput(2,$lang_memberAgent[74],"boxing_com");
}else if($ex_boxing_betmoneymax_pair > $r_sport_max[7] || $ex_boxing_betmoneymax_pair < 0 || !is_numeric($ex_boxing_betmoneymax_pair)){
  warningInput(2,$lang_memberAgent[85],"boxing_betmoneymax_pair");
}else if($ex_boxing_betmax_money > $r_sport_max[8] || $ex_boxing_betmax_money < $r_sport_min[4] || !is_numeric($ex_boxing_betmax_money)){
  warningInput(2,$lang_memberAgent[86],"boxing_betmax_money");
}else if($ex_boxing_betmin_money > $r_sport_max[8] || $ex_boxing_betmin_money < $r_sport_min[4] || !is_numeric($ex_boxing_betmin_money)){
  warningInput(2,$lang_memberAgent[87],"boxing_betmin_money");
}else if($ex_boxing_betmax_money < $ex_boxing_betmax_money){
  warningInput(2,$lang_memberAgent[88],"boxing_betmax_money");
} 

//tab 3   
if($ex_step_share > $r_sport_share[3] || $ex_step_share < 0 || !is_numeric($ex_step_share)){
  warningInput(3,$lang_memberAgent[89],"step_share");
}else if($ex_step_betmax_money > $r_sport_step_max[1] || $ex_step_betmax_money < $r_sport_step_min[1] || !is_numeric($ex_step_betmax_money)){
  warningInput(3,$lang_memberAgent[86],"step_betmax_money");
}else if($ex_step_betmin_money > $r_sport_step_max[1] || $ex_step_betmin_money < $r_sport_step_min[1] || !is_numeric($ex_step_betmax_money)){
  warningInput(3,$lang_memberAgent[87],"step_betmin_money");
}else if($ex_step_betmax_money < $ex_step_betmin_money){
  warningInput(3,$lang_memberAgent[88],"step_betmax_money");
}else if($ex_step_daymax_money > $r_sport_step_day[1] || $ex_step_daymax_money < 0 || !is_numeric($ex_step_daymax_money)){
  warningInput(3,$lang_memberAgent[90],"step_daymax_money");
}else if($ex_step_billmax_money > $r_sport_step_paymax[1] || $ex_step_billmax_money < 0 || !is_numeric($ex_step_billmax_money)){
  warningInput(3,$lang_memberAgent[91],"step_billmax_money");
}else if($ex_step_min_pair > $r_sport_step2[2] || $ex_step_min_pair < $r_sport_step2[1] || !is_numeric($ex_step_min_pair)){
  warningInput(3,$lang_memberAgent[92],"step_min_pair");
}else if($ex_step_max_pair > $r_sport_step2[2] || $ex_step_max_pair < $r_sport_step2[1] || !is_numeric($ex_step_max_pair)){
  warningInput(3,$lang_memberAgent[93],"step_max_pair");
}else if($ex_step_max_pair < $ex_step_min_pair){
  warningInput(3,$lang_memberAgent[94],"step_min_pair");
}else{
  for ($i=$ex_step_min_pair; $i <= $ex_step_max_pair; $i++) { 
    $ex_stepcom = str_replace(",","",$_POST["stepcom".$i.""]);
    if($ex_stepcom > $r_sport_step_dis[$i] || $ex_stepcom < 0 || !is_numeric($ex_stepcom)){
      warningInput(3,$lang_memberAgent[95],"stepcom".$i."");
    }
  }
} 

//tab 4  
if($ex_lotto_share > $r_lotto_share[1] || $ex_lotto_share < 0 || !is_numeric($ex_lotto_share)){
  warningInput(4,$lang_memberAgent[89],"7_lotto_share");
}else{
    foreach ($lot_type[$_SESSION["AGlang"]][1] as $key => $value) {
      $ex_lotto_pay1 = str_replace(",","",$_POST["lotto_pay1_".$key.""]);
      if($ex_lotto_pay1 > $r_lotto_pay1[$key] || $ex_lotto_pay1 < 0 || !is_numeric($ex_lotto_pay1)){
        warningInput(4,$lang_memberAgent[96].$value.$lang_memberAgent[97],"lotto_pay1_".$key."");
      }
      $ex_lotto_com1 = str_replace(",","",$_POST["lotto_com1_".$key.""]);
      if($ex_lotto_com1 > $r_lotto_dis1[$key] || $ex_lotto_com1 < 0 || !is_numeric($ex_lotto_com1)){
        warningInput(4,$lang_memberAgent[98].$value.$lang_memberAgent[97],"7_".$key."_lotto_com1");
      }

      $ex_lotto_pay2 = str_replace(",","",$_POST["lotto_pay2_".$key.""]);
      if($ex_lotto_pay2 > $r_lotto_pay2[$key] || $ex_lotto_pay2 < 0 || !is_numeric($ex_lotto_pay2)){
        warningInput(4,$lang_memberAgent[96].$value.$lang_memberAgent[97],"lotto_pay2_".$key."");
      }
      $ex_lotto_com2 = str_replace(",","",$_POST["lotto_com1_".$key.""]);
      if($ex_lotto_com2 > $r_lotto_dis2[$key] || $ex_lotto_com2 < 0 || !is_numeric($ex_lotto_com2)){
        warningInput(4,$lang_memberAgent[98].$value.$lang_memberAgent[97],"7_".$key."_lotto_com2");
      }

      $ex_lotto_pay3 = str_replace(",","",$_POST["lotto_pay3_".$key.""]);
      if($ex_lotto_pay3 > $r_lotto_pay3[$key] || $ex_lotto_pay3 < 0 || !is_numeric($ex_lotto_pay3)){
        warningInput(4,$lang_memberAgent[96].$value.$lang_memberAgent[97],"lotto_pay3_".$key."");
      }
      $ex_lotto_com3 = str_replace(",","",$_POST["lotto_com3_".$key.""]);
      if($ex_lotto_com3 > $r_lotto_dis3[$key] || $ex_lotto_com3 < 0 || !is_numeric($ex_lotto_com3)){
        warningInput(4,$lang_memberAgent[98].$value.$lang_memberAgent[97],"7_".$key."_lotto_com3");
      }

    }
}

//tab 5
if($ex_lotto_share_hun > $r_lotto_hun_share[1] || $ex_lotto_share_hun < 0 || !is_numeric($ex_lotto_share_hun)){
  warningInput(5,$lang_memberAgent[89],"8_lotto_share");
}else{
    foreach ($lot_type[$_SESSION["AGlang"]][3] as $key => $value) {

      $ex_lotto_hun_pay1 = str_replace(",","",$_POST["lotto_hun_pay1_".$key.""]);
      if($ex_lotto_hun_pay1 > $r_lotto_hun_pay1[$key] || $ex_lotto_hun_pay1 < 0 || !is_numeric($ex_lotto_hun_pay1)){
        warningInput(5,$lang_memberAgent[96].$value.$lang_memberAgent[97],"lotto_hun_pay1_".$key."");
      }
      $ex_lotto_hun_com1 = str_replace(",","",$_POST["lotto_hun_com1_".$key.""]);
      if($ex_lotto_hun_com1 > $r_lotto_hun_dis1[$key] || $ex_lotto_hun_com1 < 0 || !is_numeric($ex_lotto_hun_com1)){
        warningInput(5,$lang_memberAgent[98].$value.$lang_memberAgent[97],"8_".$key."_lotto_com1");
      }

      $ex_lotto_hun_pay2 = str_replace(",","",$_POST["lotto_hun_pay2_".$key.""]);
      if($ex_lotto_hun_pay2 > $r_lotto_hun_pay2[$key] || $ex_lotto_hun_pay2 < 0 || !is_numeric($ex_lotto_hun_pay2)){
        warningInput(5,$lang_memberAgent[96].$value.$lang_memberAgent[97],"lotto_hun_pay2_".$key."");
      }
      $ex_lotto_hun_com2 = str_replace(",","",$_POST["lotto_hun_com2_".$key.""]);
      if($ex_lotto_hun_com2 > $r_lotto_hun_dis2[$key] || $ex_lotto_hun_com2 < 0 || !is_numeric($ex_lotto_hun_com2)){
        warningInput(5,$lang_memberAgent[98].$value.$lang_memberAgent[97],"8_".$key."_lotto_com2");
      }

      $ex_lotto_hun_pay3 = str_replace(",","",$_POST["lotto_hun_pay3_".$key.""]);
      if($ex_lotto_hun_pay3 > $r_lotto_hun_pay3[$key] || $ex_lotto_hun_pay3 < 0 || !is_numeric($ex_lotto_hun_pay3)){
        warningInput(5,$lang_memberAgent[96].$value.$lang_memberAgent[97],"lotto_hun_pay3_".$key."");
      }
      $ex_lotto_hun_com3 = str_replace(",","",$_POST["lotto_hun_com3_".$key.""]);
      if($ex_lotto_hun_com3 > $r_lotto_hun_dis3[$key] || $ex_lotto_hun_com3 < 0 || !is_numeric($ex_lotto_hun_com3)){
        warningInput(5,$lang_memberAgent[98].$value.$lang_memberAgent[97],"8_".$key."_lotto_com3");
      }
      
    }
}

//tab 6
if($ex_lotto_hun_set_share > $r_lotto_hun_set_share[1] || $ex_lotto_hun_set_share < 0 || !is_numeric($ex_lotto_hun_set_share)){
  warningInput(6,$lang_memberAgent[89],"9_lotto_share");
}else{
  foreach ($lang_g["setpay"] as $key => $value) {
    $index = $key+1;
    $ex_lot_hun_set_pay = str_replace(",","",$_POST["lot_hun_set_pay".$index.""]);
    if($ex_lot_hun_set_pay > $r_lotto_hun_set_pay[$index] || $ex_lot_hun_set_pay < 0 || !is_numeric($ex_lot_hun_set_pay)){
      warningInput(6,$lang_memberAgent[96].$value.$lang_memberAgent[97],"lot_hun_set_pay".$index."");
    }
    if($index == 1){
      $ex_lot_hun_set_price = str_replace(",","",$_POST["lot_hun_set_price".$index.""]);
      if($ex_lot_hun_set_price > $r_lotto_hun_set_price[$index] || $ex_lot_hun_set_price < 0 || !is_numeric($ex_lot_hun_set_price)){
        warningInput(6,$lang_memberAgent[99],"lot_hun_set_price".$index."");
      }
    }  
  }
}
//tab 7
if($ex_game_share > $r_games_share[1] || $ex_game_share < 0 || !is_numeric($ex_game_share)){
  warningInput(7,$lang_memberAgent[89],"game_share");
}else if($ex_game_com > $r_games_dis[1] || $ex_game_com < 0 || !is_numeric($ex_game_com)){
  warningInput(7,$lang_memberAgent[74],"game_com");
}
// tab 8 
foreach ($lang_g["casino_share"]  as $key => $value) {
  $ex_casino_share = str_replace(",","",$_POST["casino_share".$key.""]);
  if($ex_casino_share > $r_casino_share[$key] || $ex_casino_share < 0 || !is_numeric($ex_casino_share)){
    warningInput(8,$lang_memberAgent[100].$value.$lang_memberAgent[97],"casino_share".$key."");
  }

  $ex_rcb_maxtransfer = str_replace(",","",$_POST["rcb_maxtransfer".$key.""]);
  if($ex_rcb_maxtransfer > $r_casino_max[$key] || $ex_rcb_maxtransfer < 0 || !is_numeric($ex_rcb_maxtransfer)){
    warningInput(8,$lang_memberAgent[101].$value.$lang_memberAgent[97],"rcb_maxtransfer".$key."");
  }
}




// $data  = array(
//     'msg'     => "99999",
//     'status'  =>  false,
//     'xy'  =>  $arr["list_game"],
//   );
//   echo json_encode($data);
//   exit();


 ?>