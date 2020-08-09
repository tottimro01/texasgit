<?php 

//tab 0
$ex_today_share = str_replace(",","",$_POST["today_share"]);
$ex_live_share = str_replace(",","",$_POST["live_share"]);
$ex_r_nam = str_replace(",","",$_POST["r_nam"]);
$ex_torup = str_replace(",","",$_POST["torup"]);
$ex_logup = str_replace(",","",$_POST["logup"]); 
$ex_today_com = str_replace(",","",$_POST["today_com"]);
$ex_live_betmoneymax_pair = str_replace(",","",$_POST["live_betmoneymax_pair"]);
$ex_live_fbetmoneymax_pair = str_replace(",","",$_POST["live_fbetmoneymax_pair"]);
$ex_live_betmax_money = str_replace(",","",$_POST["live_betmax_money"]);
$ex_live_fbetmax_money = str_replace(",","",$_POST["live_fbetmax_money"]);
$ex_live_betmin_money = str_replace(",","",$_POST["live_betmin_money"]);
$ex_live_fbetmin_money = str_replace(",","",$_POST["live_fbetmin_money"]);

//tab 1
$ex_sporttoday_share = str_replace(",","",$_POST["sporttoday_share"]);
$ex_sportlive_share = str_replace(",","",$_POST["sportlive_share"]);
$ex_sport_com = str_replace(",","",$_POST["sport_com"]);
$ex_sport_betmoneymax_pair = str_replace(",","",$_POST["sport_betmoneymax_pair"]);
$ex_sport_betmax_money = str_replace(",","",$_POST["sport_betmax_money"]);
$ex_sport_betmin_money = str_replace(",","",$_POST["sport_betmin_money"]);

//tab 1
$ex_boxingtoday_share = str_replace(",","",$_POST["boxingtoday_share"]);
$ex_boxinglive_share = str_replace(",","",$_POST["boxinglive_share"]);
$ex_boxing_com = str_replace(",","",$_POST["boxing_com"]);
$ex_boxing_betmoneymax_pair = str_replace(",","",$_POST["boxing_betmoneymax_pair"]);
$ex_boxing_betmax_money = str_replace(",","",$_POST["boxing_betmax_money"]);
$ex_boxing_betmin_money = str_replace(",","",$_POST["boxing_betmin_money"]);

//tab 2
$ex_step_share = str_replace(",","",$_POST["step_share"]);
$ex_step_betmax_money = str_replace(",","",$_POST["step_betmax_money"]);
$ex_step_betmin_money = str_replace(",","",$_POST["step_betmin_money"]);
$ex_step_daymax_money = str_replace(",","",$_POST["step_daymax_money"]);
$ex_step_billmax_money = str_replace(",","",$_POST["step_billmax_money"]);
$ex_step_min_pair = str_replace(",","",$_POST["step_min_pair"]);
$ex_step_max_pair = str_replace(",","",$_POST["step_max_pair"]);

//tab 3
$ex_lotto_share = str_replace(",","",$_POST["lotto_share"]);

//tab 4
$ex_lotto_share_hun = str_replace(",","",$_POST["lotto_share_hun"]);
$ex_lotto_betmax_money = str_replace(",","",$_POST["lotto_betmax_money"]);
$ex_lotto_betmin_money = str_replace(",","",$_POST["lotto_betmin_money"]);

//tab 5
$ex_lotto_hun_set_share = str_replace(",","",$_POST["lotto_hun_set_share"]);
$ex_lotto_share_hun_betmax_money = str_replace(",","",$_POST["lotto_share_hun_betmax_money"]);
$ex_lotto_share_hun_betmin_money = str_replace(",","",$_POST["lotto_share_hun_betmin_money"]);

//tab 6
$ex_game_share = str_replace(",","",$_POST["game_share"]);
$ex_game_com = str_replace(",","",$_POST["game_com"]);
$ex_game_max = str_replace(",","",$_POST["game_max"]);
$ex_game_min = str_replace(",","",$_POST["game_min"]);




 // $xxx = $ex_live_betmax_money."<".$ex_live_betmin_money;
 //  $data  = array(
 //    'msg'     => "99999",
 //    'status'  =>  false,
 //    'xy'  =>  $xxx,
 //  );
 //  echo json_encode($data);
 //  exit();

// tab 0

if($ex_today_share > $max_share_config || $ex_today_share < 0 || !is_numeric($ex_today_share)){
  warningInput(0,"หุ้นกีฬาวันนี้ ไม่ถูกต้อง","today_share");
}else if($ex_live_share > $max_share_config || $ex_live_share < 0 || !is_numeric($ex_live_share)){
    warningInput(0,"หุ้นกีฬากำลังแข่ง ไม่ถูกต้อง","live_share");
}else if($ex_today_com > $max_sport_com || $ex_today_com < 0 || !is_numeric($ex_today_com)){
    warningInput(0,"ค่าคอม ไม่ถูกต้อง","today_com");
}
else if($ex_r_nam > 8 || $ex_r_nam < 0 || !is_numeric($ex_r_nam)){
    warningInput(0,"ค่าน้ำ ไม่ถูกต้อง","torup");
}
// else if($ex_torup > 8 || $ex_torup < 0 || !is_numeric($ex_torup)){
//     warningInput(0,"เพิ่มราคาทีมต่อ ไม่ถูกต้อง","torup");
// }else if($ex_logup > 8 || $ex_logup < 0 || !is_numeric($ex_logup)){
//   warningInput(0,"เพิ่มราคาทีมรอง ไม่ถูกต้อง","logup");
// }
else if($ex_live_betmoneymax_pair < $min_betmin_money || !is_numeric($ex_live_betmoneymax_pair)){
    warningInput(0,"45 นาทีสูงสุด/คู่ ไม่ถูกต้อง","live_betmoneymax_pair");
}else if($ex_live_fbetmoneymax_pair < $min_betmin_money || !is_numeric($ex_live_fbetmoneymax_pair)){
    warningInput(0,"90 นาทีสูงสุด/คู่ ไม่ถูกต้อง","live_fbetmoneymax_pair");
}else if($ex_live_betmax_money < $min_betmin_money || !is_numeric($ex_live_betmax_money)){
    warningInput(0,"45 นาทีสูงสุด/ไม้ ไม่ถูกต้อง","live_betmax_money");
}else if($ex_live_fbetmax_money < $min_betmin_money || !is_numeric($ex_live_fbetmax_money)){
    warningInput(0,"90 นาทีสูงสุด/ไม้ ไม่ถูกต้อง","live_fbetmax_money");
}else if($ex_live_betmin_money > $max_betmin_money || $ex_live_betmin_money < $min_betmin_money || !is_numeric($ex_live_betmin_money)){
    warningInput(0,"45 นาทีต่ำสุด/ไม้ ไม่ถูกต้อง","live_betmin_money");
}else if($ex_live_fbetmin_money > $max_betmin_money || $ex_live_fbetmin_money < $min_betmin_money || !is_numeric($ex_live_fbetmin_money)){
    warningInput(0,"90 นาทีต่ำสุด/ไม้ ไม่ถูกต้อง","live_fbetmin_money");
}else if($ex_live_betmoneymax_pair < $ex_live_betmin_money || !is_numeric($ex_live_betmoneymax_pair)){
    warningInput(0,"45 นาทีสูงสุด/คู่ น้อยกว่า 45 นาทีต่ำสุด/ไม้","live_betmoneymax_pair");
}else if($ex_live_fbetmoneymax_pair < $ex_live_fbetmin_money || !is_numeric($ex_live_fbetmoneymax_pair)){
    warningInput(0,"90 นาทีสูงสุด/คู่ น้อยกว่า 90 นาทีต่ำสุด/ไม้","live_fbetmoneymax_pair");
}else if($ex_live_betmax_money < $ex_live_betmin_money || !is_numeric($ex_live_betmoneymax_pair)){
    warningInput(0,"45 นาทีสูงสุด/ไม้ น้อยกว่า 45 นาทีต่ำสุด/ไม้","live_betmax_money");
}else if($ex_live_fbetmin_money < $ex_live_fbetmin_money || !is_numeric($ex_live_fbetmoneymax_pair)){
    warningInput(0,"90 นาทีสูงสุด/คู่ น้อยกว่า 90 นาทีต่ำสุด/ไม้","live_fbetmax_money");
}

 // tab 1
if($ex_sporttoday_share > $max_share_config || $ex_sporttoday_share < 0 || !is_numeric($ex_sporttoday_share)){
    warningInput(1,"หุ้นกีฬาวันนี้ ไม่ถูกต้อง","sporttoday_share");
}else if($ex_sportlive_share > $max_share_config || $ex_sportlive_share < 0 || !is_numeric($ex_sportlive_share)){
    warningInput(1,"หุ้นกีฬากำลังแข่ง ไม่ถูกต้อง","sportlive_share");
}else if($ex_sport_com > $max_sport_com || $ex_sport_com < 0 || !is_numeric($ex_sport_com)){
    warningInput(1,"ค่าคอม ไม่ถูกต้อง","sport_com");
}else if($ex_sport_betmoneymax_pair < $min_betmin_money || !is_numeric($ex_sport_betmoneymax_pair)){
    warningInput(1,"สูงสุด/คู่ ไม่ถูกต้อง","sport_betmoneymax_pair");
}else if($ex_sport_betmax_money < $min_betmin_money || !is_numeric($ex_sport_betmax_money)){
    warningInput(1,"สูงสุด/ไม้ ไม่ถูกต้อง","sport_betmax_money");
}else if($ex_sport_betmin_money < $min_betmin_money || $ex_sport_betmin_money > $max_betmin_money || !is_numeric($ex_sport_betmin_money)){
    warningInput(1,"ต่ำสุด/ไม้ ไม่ถูกต้อง","sport_betmin_money");
}else if($ex_sport_betmoneymax_pair < $ex_sport_betmin_money){
    warningInput(1,"สูงสุด/คู่ น้อยกว่า ต่ำสุด/ไม้","sport_betmoneymax_pair");
}else if($ex_sport_betmax_money < $ex_sport_betmin_money){
    warningInput(1,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","sport_betmax_money");
} 


// tab 2
if($ex_boxingtoday_share > $max_share_config || $ex_boxingtoday_share < 0 || !is_numeric($ex_boxingtoday_share)){
   warningInput(2,"หุ้นมวยไทยวันนี้ ไม่ถูกต้อง","boxingtoday_share");
}else if($ex_boxinglive_share > $max_share_config || $ex_boxinglive_share < 0 || !is_numeric($ex_boxinglive_share)){
    warningInput(2,"หุ้นมวยไทยกำลังแข่ง ไม่ถูกต้อง","boxinglive_share");
}else if($ex_boxing_com > $max_sport_com || $ex_boxing_com < 0 || !is_numeric($ex_boxing_com)){
    warningInput(2,"ค่าคอม ไม่ถูกต้อง","boxing_com");
}else if($ex_boxing_betmoneymax_pair < $min_betmin_money || !is_numeric($ex_boxing_betmoneymax_pair)){
    warningInput(2,"สูงสุด/คู่ ไม่ถูกต้อง","boxing_betmoneymax_pair");
}else if($ex_boxing_betmax_money < $min_betmin_money || !is_numeric($ex_boxing_betmax_money)){
    warningInput(2,"สูงสุด/ไม้ ไม่ถูกต้อง","boxing_betmax_money");
}else if($ex_boxing_betmin_money < $min_betmin_money || $ex_boxing_betmin_money > $max_betmin_money || !is_numeric($ex_boxing_betmin_money)){
    warningInput(2,"45 นาทีต่ำสุด/ไม้ ไม่ถูกต้อง","boxing_betmin_money");
}else if($ex_boxing_betmoneymax_pair < $ex_boxing_betmin_money){
    warningInput(2,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","boxing_betmoneymax_pair");
}else if($ex_boxing_betmax_money < $ex_boxing_betmin_money){
    warningInput(2,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","boxing_betmax_money");
}


// tab 3

if($ex_step_share > $max_share_config || $ex_step_share < 0 || !is_numeric($ex_step_share)){
    warningInput(3,"แบ่งหุ้น ไม่ถูกต้อง","step_share");
}else if($ex_step_betmax_money < $min_betmin_money || !is_numeric($ex_step_betmax_money)){
    warningInput(3,"สูงสุด/ไม้ ไม่ถูกต้อง","step_betmax_money");
}else if($ex_step_betmin_money < $min_betmin_money || $ex_step_betmin_money > $max_betmin_money || !is_numeric($ex_step_betmax_money)){
    warningInput(3,"ต่ำสุด/ไม้ ไม่ถูกต้อง","step_betmin_money");
}else if($ex_step_betmax_money < $ex_step_betmin_money){
    warningInput(3,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","step_betmax_money");
}else if($ex_step_daymax_money < $min_betmin_money || !is_numeric($ex_step_daymax_money)){
    warningInput(3,"เล่นได้สูงสุด/วัน ไม่ถูกต้อง","step_daymax_money");
}else if($ex_step_billmax_money < $min_betmin_money || !is_numeric($ex_step_billmax_money)){
    warningInput(3,"จ่ายสูงสุด/บิล ไม่ถูกต้อง","step_billmax_money");
}else{

		if($ex_step_min_pair < 2 || $ex_step_min_pair > 19 || !is_numeric($ex_step_min_pair)){
      warningInput(3,"จำนวนคู่ต่ำสุด/บิล ไม่ถูกต้อง","step_min_pair");
    }else if($ex_step_max_pair > 20 || $ex_step_max_pair < 3 ||!is_numeric($ex_step_max_pair)){
      warningInput(3,"จำนวนคู่สูงสุด/บิล","step_max_pair");
    }else if($ex_step_min_pair > $ex_step_max_pair){
      warningInput(3,"จำนวนคู่สูงสุด/บิล น้อยกว่า จำนวนคู่ต่ำสุด/บิล","step_max_pair");
    }

		for ($i=$ex_step_min_pair; $i <= $ex_step_max_pair; $i++) { 
      $ex_stepcom = str_replace(",","",$_POST["stepcom".$i.""]);
      if($ex_stepcom > $max_share_config || $ex_stepcom < 0 || !is_numeric($ex_stepcom))
      {
        warningInput(3,"สว่นลด ".$i."คู่ ไม่ถูกต้อง","stepcom".$i);
      }
    }
}


//tab 4 
if($ex_lotto_share > $max_share_config || $ex_lotto_share < 0 || !is_numeric($ex_lotto_share)){
  warningInput(4,"แบ่งหุ้น ไม่ถูกต้อง","7_lotto_share");
}else if($ex_lotto_betmin_money < $min_betmin_money || $ex_lotto_betmin_money > $max_betmin_money || !is_numeric($ex_lotto_betmin_money)){
    warningInput(4,"ต่ำสุด/ไม้ ไม่ถูกต้อง","lotto_betmin_money");
}else if($ex_lotto_betmin_money > $ex_lotto_betmax_money){
    warningInput(4,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","lotto_betmax_money");
}else if($ex_lotto_betmax_money < $min_betmin_money){
    warningInput(4,"สูงสุด/ไม้ ไม่ถูกต้อง","lotto_betmax_money");
}else{


	// $ex_lotto_pay1_config = explode(",", $config_lotto_pay1);
 //  $ex_lotto_com1_config = explode(",", $config_lotto_dis1); 
 //  $ex_lotto_pay2_config = explode(",", $config_lotto_pay2);
 //  $ex_lotto_com2_config = explode(",", $config_lotto_dis2); 
 //  $ex_lotto_pay3_config = explode(",", $config_lotto_pay3);
 //  $ex_lotto_com3_config = explode(",", $config_lotto_dis3); 

  $ex_lotto_pay1_config = explode(",", $config_lotto_pay1_max);
  $ex_lotto_com1_config = explode(",", $config_lotto_dis1_max); 
  $ex_lotto_pay2_config = explode(",", $config_lotto_pay2_max);
  $ex_lotto_com2_config = explode(",", $config_lotto_dis2_max); 
  $ex_lotto_pay3_config = explode(",", $config_lotto_pay3_max);
  $ex_lotto_com3_config = explode(",", $config_lotto_dis3_max); 

  foreach ($lot_type[$_SESSION["AGlang"]][1] as $key => $value) {

  		$ex_lotto_pay1 = str_replace(",","",$_POST["lotto_pay1_".$key.""]);
      if($ex_lotto_pay1 > $ex_lotto_pay1_config[$key] || $ex_lotto_pay1 < 0 || !is_numeric($ex_lotto_pay1)){
        warningInput(4,"อัตราจ่าย ".$value." ไม่ถูกต้อง","lotto_pay1_".$key."");
      }

      $ex_lotto_com1 = str_replace(",","",$_POST["lotto_com1_".$key.""]);
      if($ex_lotto_com1 > $ex_lotto_com1_config[$key] || $ex_lotto_com1 < 0 || !is_numeric($ex_lotto_com1)){
        warningInput(4,"ค่าคอม ".$value." ไม่ถูกต้อง".$ex_lotto_com1_config[$key],"lotto_com1_".$key);
      }

      $ex_lotto_pay2 = str_replace(",","",$_POST["lotto_pay2_".$key.""]);
      if($ex_lotto_pay2 > $ex_lotto_pay2_config[$key] || $ex_lotto_pay2 < 0 || !is_numeric($ex_lotto_pay2)){
        warningInput(4,"อัตราจ่าย ".$value." ไม่ถูกต้อง","lotto_pay2_".$key."");
      }

      $ex_lotto_com2 = str_replace(",","",$_POST["lotto_com2_".$key.""]);
      if($ex_lotto_com2 > $ex_lotto_com2_config[$key] || $ex_lotto_com2 < 0 || !is_numeric($ex_lotto_com2)){
        warningInput(4,"ค่าคอม ".$value." ไม่ถูกต้อง","lotto_com2_".$key);
      }

      $ex_lotto_pay3 = str_replace(",","",$_POST["lotto_pay3_".$key.""]);
      if($ex_lotto_pay3 > $ex_lotto_pay3_config[$key] || $ex_lotto_pay3 < 0 || !is_numeric($ex_lotto_pay3)){
        warningInput(4,"อัตราจ่าย ".$value." ไม่ถูกต้อง","lotto_pay3_".$key."");
      }

      $ex_lotto_com3 = str_replace(",","",$_POST["lotto_com3_".$key.""]);
      if($ex_lotto_com3 > $ex_lotto_com3_config[$key] || $ex_lotto_com3 < 0 || !is_numeric($ex_lotto_com3)){
        warningInput(4,"ค่าคอม ".$value." ไม่ถูกต้อง","lotto_com3_".$key);
      }

  }
}


//tab 5
if($ex_lotto_share_hun > $max_share_config || $ex_lotto_share_hun < 0 || !is_numeric($ex_lotto_share_hun)){
    warningInput(5,"แบ่งหุ้น ไม่ถูกต้อง","8_lotto_share");
}else if($ex_lotto_share_hun_betmin_money < $min_betmin_money || $ex_lotto_share_hun_betmin_money > $max_betmin_money || !is_numeric($ex_lotto_share_hun_betmin_money)){
    warningInput(5,"ต่ำสุด/ไม้ ไม่ถูกต้อง","lotto_share_hun_betmin_money");
}else if($ex_lotto_share_hun_betmin_money > $ex_lotto_share_hun_betmax_money){
    warningInput(5,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","lotto_share_hun_betmax_money");
}else if($ex_lotto_share_hun_betmax_money < $min_betmin_money){
    warningInput(4,"สูงสุด/ไม้ ไม่ถูกต้อง","lotto_share_hun_betmax_money");
}else{

			$ex_lotto_hun_pay1_config = explode(",", $config_lotto_hun_pay1);
			$ex_lotto_hun_com1_config = explode(",", $config_lotto_hun_dis1); 
			$ex_lotto_hun_pay2_config = explode(",", $config_lotto_hun_pay2);
			$ex_lotto_hun_com2_config = explode(",", $config_lotto_hun_dis2); 
			$ex_lotto_hun_pay3_config = explode(",", $config_lotto_hun_pay3);
			$ex_lotto_hun_com3_config = explode(",", $config_lotto_hun_dis3); 

	foreach ($lot_type[$_SESSION["AGlang"]][3] as $key => $value) {
  	if($key==31){continue;}  

  		$ex_lotto_hun_pay1 = str_replace(",","",$_POST["lotto_hun_pay1_".$key.""]);
      if($ex_lotto_hun_pay1 > $ex_lotto_hun_pay1_config[$key] || $ex_lotto_hun_pay1 < 0 || !is_numeric($ex_lotto_hun_pay1))
      {
        warningInput(5,"อัตราจ่าย ".$value." ไม่ถูกต้อง","lotto_hun_pay1_".$key."");
      }

      $ex_lotto_hun_com1 = str_replace(",","",$_POST["lotto_hun_com1_".$key.""]);
      if($ex_lotto_hun_com1 > $ex_lotto_hun_com1_config[$key] || $ex_lotto_hun_com1 < 0 || !is_numeric($ex_lotto_hun_com1))
      {
        warningInput(5,"ค่าคอม ".$value." ไม่ถูกต้อง","lotto_hun_com1_".$key."");
      }

      $ex_lotto_hun_pay2 = str_replace(",","",$_POST["lotto_hun_pay2_".$key.""]);
      if($ex_lotto_hun_pay2 > $ex_lotto_hun_pay2_config[$key] || $ex_lotto_hun_pay2 < 0 || !is_numeric($ex_lotto_hun_pay2))
      {
        warningInput(5,"อัตราจ่าย ".$value." ไม่ถูกต้อง","lotto_hun_pay2_".$key."");
      }

      $ex_lotto_hun_com2 = str_replace(",","",$_POST["lotto_hun_com2_".$key.""]);
      if($ex_lotto_hun_com2 > $ex_lotto_hun_com2_config[$key] || $ex_lotto_hun_com2 < 0 || !is_numeric($ex_lotto_hun_com2))
      {
        warningInput(5,"ค่าคอม ".$value." ไม่ถูกต้อง","lotto_hun_com2_".$key."");
      }

      $ex_lotto_hun_pay3 = str_replace(",","",$_POST["lotto_hun_pay3_".$key.""]);
      if($ex_lotto_hun_pay3 > $ex_lotto_hun_pay3_config[$key] || $ex_lotto_hun_pay3 < 0 || !is_numeric($ex_lotto_hun_pay3))
      {
        warningInput(5,"อัตราจ่าย ".$value." ไม่ถูกต้อง","lotto_hun_pay3_".$key."");
      }

      $ex_lotto_hun_com3 = str_replace(",","",$_POST["lotto_hun_com3_".$key.""]);
      if($ex_lotto_hun_com3 > $ex_lotto_hun_com3_config[$key] || $ex_lotto_hun_com3 < 0 || !is_numeric($ex_lotto_hun_com3))
      {
        warningInput(5,"ค่าคอม ".$value." ไม่ถูกต้อง","lotto_hun_com3_".$key."");
      }

  }

}


//tab 6
if($ex_lotto_hun_set_share > $max_share_config || $ex_lotto_hun_set_share < 0 || !is_numeric($ex_lotto_hun_set_share)){
  warningInput(6,"แบ่งหุ้น ไม่ถูกต้อง","9_lotto_share");
}else{

	$ex_lotto_hun_set_pay_config = explode(",", $config_lotto_hun_set_pay);
  $ex_lotto_hun_set_price_config = explode(",", $config_lotto_hun_set_price);

	foreach ($lang_g["setpay"] as $key => $value) {

			$index = $key+1;
      $ex_lot_hun_set_pay = str_replace(",","",$_POST["lot_hun_set_pay".$index.""]);
      if($ex_lot_hun_set_pay > $ex_lotto_hun_set_pay_config[$index] || $ex_lot_hun_set_pay < 0 || !is_numeric($ex_lot_hun_set_pay)){
        warningInput(6,"รางวัล , 0=ปิด ".$value." ไม่ถูกต้อง","lot_hun_set_pay".$index."");
      }

       if($index == 1){
        $ex_lot_hun_set_price = str_replace(",","",$_POST["lot_hun_set_price".$index.""]);

        if($ex_lot_hun_set_price > $ex_lotto_hun_set_price_config[$index] || $ex_lot_hun_set_price < 0 || !is_numeric($ex_lot_hun_set_price)){
          warningInput(6,"ราคาส่ง ไม่ถูกต้อง","lot_hun_set_price".$index."");
        }
      } 


	}

}


 //tab 7
if($ex_game_share > $max_share_config || $ex_game_share < 0 || !is_numeric($ex_game_share)){
  warningInput(7,"แบ่งหุ้น ไม่ถูกต้อง","game_share");
}else if($ex_game_com > $max_share_config || $ex_game_com < 0 || !is_numeric($ex_game_com)){
  warningInput(7,"ค่าคอม ไม่ถูกต้อง","game_com");
}else if($ex_game_max < $min_betmin_money || !is_numeric($ex_game_max)){
    warningInput(7,"สูงสุด/ไม้ ไม่ถูกต้อง","game_max");
}else if($ex_game_min > $max_betmin_money || $ex_game_min < $min_betmin_money || !is_numeric($ex_game_min)){
    warningInput(7,"ต่ำสุด/ไม้ ไม่ถูกต้อง","game_min");
}else  if($ex_game_max < $ex_game_min){
    warningInput(7,"สูงสุด/ไม้ น้อยกว่า ต่ำสุด/ไม้","game_max");
}


 // tab 8 
 foreach ($lang_g["casino_share"]  as $key => $value) { 

 	$ex_casino_share = str_replace(",","",$_POST["casino_share".$key.""]);
  $ex_casino_com = str_replace(",","",$_POST["casino_com".$key.""]);
  $ex_rcb_maxtransfer = str_replace(",","",$_POST["rcb_maxtransfer".$key.""]);
  $ex_rcb_mintransfer = str_replace(",","",$_POST["rcb_mintransfer".$key.""]);



  if($ex_casino_share > 100 || $ex_casino_share < 0 || !is_numeric($ex_casino_share)){
	  warningInput(8,"แบ่งหุ้น ".$value." ไม่ถูกต้อง","casino_share".$key."");
	}else if($ex_casino_com > $max_sport_com || $ex_casino_com < 0.00  || !is_numeric($ex_casino_com)){
	  warningInput(8,"ค่าคอม ".$value." ไม่ถูกต้อง","casino_com".$key."");
	}else if($ex_rcb_maxtransfer < $casino_min[$key] || !is_numeric($ex_rcb_maxtransfer)){
	  warningInput(8,"สูงสุด/ไม้ ".$value." ไม่ถูกต้อง","rcb_maxtransfer".$key."");
	}else if($ex_rcb_mintransfer < $casino_min[$key] || $ex_rcb_mintransfer > $casino_max[$key] || !is_numeric($ex_rcb_mintransfer)){
	  warningInput(8,"ต่ำสุด/ไม้ ".$value." ไม่ถูกต้อง","rcb_mintransfer".$key."");
	}else  if($ex_rcb_maxtransfer < $ex_rcb_mintransfer){
	  warningInput(8,"สูงสุด/ไม้ ".$value."น้อยกว่า ต่ำสุด/ไม้","rcb_maxtransfer".$key."");
	}


 }

 ?>