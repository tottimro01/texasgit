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



if($_POST["username"] == '' || $_POST["name"] == '')
{
	$data = array(
		'msg'     =>  $lang_ag[7],
		'status'  =>  false,
	);
}else{

  include "compare_inputEditAgent.php";

	$id = $_POST['id'];
	$name = $_POST['name'];
	$telephone = $_POST['telephone'];

	// เปิดปิด
		$r_open_ary[] = (isset($_POST['soccer_today_active']))? 1 :0;
		$r_open_ary[] = (isset($_POST['soccer_live_active']))? 1 :0;
		$r_open_ary[] = (isset($_POST['sport_today_active']))? 1 :0;
		$r_open_ary[] = (isset($_POST['sport_live_active']))? 1 :0;
		$r_open_ary[] = (isset($_POST['boxing_today_active']))? 1 :0;
		$r_open_ary[] = (isset($_POST['boxing_live_active']))? 1 :0;
		$r_open_ary[] = (isset($_POST['step_active']))? 1 :0;
		$r_open_ary[] = (isset($_POST['lotto_active']))? 1 :0;
		$r_open_ary[] = (isset($_POST['lotto_share_active']))? 1 :0;
		$r_open_ary[] = (isset($_POST['lotto_lao_active']))? 1 :0;
		$r_open_ary[] = (isset($_POST['game_active']))? 1 :0;
		$r_open_ary[] = (isset($_POST['casino_active']))? 1 :0;
		
		$r_open = "open,".implode(",",$r_open_ary);	

		
		//football sport step 
			$set_r_sport_share = "share,".$_POST["today_share"].",".$_POST["sporttoday_share"].",".$_POST["boxingtoday_share"] .",".$_POST["step_share"]; 
			$set_r_sport_share_live = "share,".$_POST["live_share"].",".$_POST["sportlive_share"].",".$_POST["boxinglive_share"];

			$set_r_sport_myshare = "myshare,".(intval($r_sport_share[1])-intval($_POST["today_share"])).",".(intval($r_sport_share[2])-intval($_POST["sporttoday_share"])).",".(intval($r_sport_share[3])-intval($_POST["boxingtoday_share"])).",".(intval($r_sport_share[4])-intval($_POST["step_share"]));

			$set_r_sport_myshare_live = "myshare,".(intval($r_sport_share_live[1])-intval($_POST["live_share"])).",".(intval($r_sport_share_live[2])-intval($_POST["sportlive_share"])).",".(intval($r_sport_share_live[3])-intval($_POST["boxinglive_share"])); 


			$set_r_sport_force = "force,".(intval($r_sport_share[1])-intval($_POST["today_share"])).",".(intval($r_sport_share[2])-intval($_POST["sporttoday_share"])).",".(intval($r_sport_share[3])-intval($_POST["boxingtoday_share"])).",".(intval($r_sport_share[4])-intval($_POST["step_share"]));

			$set_r_sport_force_live = "force,".(intval($r_sport_share_live[1])-intval($_POST["live_share"])).",".(intval($r_sport_share_live[2])-intval($_POST["sportlive_share"])).",".(intval($r_sport_share_live[3])-intval($_POST["boxinglive_share"]));  
			 

			$set_r_sport_dis='dis,'.$_POST["today_com"].','.$_POST["sport_com"].','.$_POST["boxing_com"];

			$set_r_sport_max = "max,".intval(str_replace(",","",$_POST["live_betmoneymax_pair"])).",".intval(str_replace(",","",$_POST["live_fbetmoneymax_pair"])).",".intval(str_replace(",","",$_POST["live_betmax_money"])).",".intval(str_replace(",","",$_POST["live_fbetmax_money"])).",".intval(str_replace(",","",$_POST["sport_betmoneymax_pair"])).",".intval(str_replace(",","",$_POST["sport_betmax_money"])).",".intval(str_replace(",","",$_POST["boxing_betmoneymax_pair"])).",".intval(str_replace(",","",$_POST["boxing_betmax_money"]));

			$set_r_sport_min = "min,".intval(str_replace(",","",$_POST["live_betmin_money"])).",".intval(str_replace(",","",$_POST["live_fbetmin_money"])).",".intval(	str_replace(",","",$_POST["sport_betmin_money"])).",".intval(	str_replace(",","",$_POST["boxing_betmin_money"])); 

			

			if(isset($_POST["r_nam"]))
			{
				$set_r_nam = $_POST["r_nam"];
				$set_r_nam_ok =  intval(str_replace(",","",$r_nam_ok))-intval(str_replace(",","",$_POST["r_nam"]));

				$r_nam_update = "";
  				$r_nam_update = ", r_nam = '".$set_r_nam."', r_nam_ok = '".$set_r_nam_ok."'";
			}

			$set_r_sport_nam_tor = "tor,".$_POST["torup"].",0,0"; 
			$set_r_sport_nam_rong = "rong,".$_POST["logup"].",0,0"; 

		//step 	
			$set_r_sport_step_max = "max,".str_replace(",","",$_POST["step_betmax_money"]);
			$set_r_sport_step_min = "min,".str_replace(",","",$_POST["step_betmin_money"]);
			$set_r_sport_step_day = "day,".str_replace(",","",$_POST["step_daymax_money"]);
			$set_r_sport_step_paymax = "pay,".intval(str_replace(",","",$_POST["step_billmax_money"]));
			$set_r_sport_step2 = "step,".$_POST["step_min_pair"].",".$_POST["step_max_pair"];
			$set_r_sport_step_dis	='dis,'.($_POST["stepcom1"]).','.($_POST["stepcom2"]).','.($_POST["stepcom3"]).','.($_POST["stepcom4"]).','.($_POST["stepcom5"]).','.($_POST["stepcom6"]).','.($_POST["stepcom7"]).','.($_POST["stepcom8"]).','.($_POST["stepcom9"]).','.($_POST["stepcom10"]).','.($_POST["stepcom11"]).','.($_POST["stepcom12"]).','.($_POST["stepcom13"]).','.($_POST["stepcom14"]).','.($_POST["stepcom15"]).','.($_POST["stepcom16"]).','.($_POST["stepcom17"]).','.($_POST["stepcom18"]).','.($_POST["stepcom19"]).','.($_POST["stepcom20"]); 

		// lotto 
			// $set_r_lotto_share = "share,".$_POST["lotto_share"];
			// $set_r_lotto_myshare = "myshare,".(intval($r_lotto_share[1])-intval($_POST["lotto_share"])); 
			$set_r_lotto_share = "share";
			$set_r_lotto_myshare = "myshare";
			$set_r_lotto_force = "force";
			$set_r_lotto_max = "max,".intval(str_replace(",","",$_POST["lotto_betmax_money"])).",0";
			$set_r_lotto_min = "min,".intval(str_replace(",","",$_POST["lotto_betmin_money"])).",0";

			foreach ($lot_type[$_SESSION["AGlang"]][1] as $key => $value) {
				$set_r_lotto_share .= ",".$_POST["lotto_share"];
				$set_r_lotto_myshare .= ",".(intval($r_lotto_share[1])-intval($_POST["lotto_share"]));
				$set_r_lotto_force .= ",".(intval($r_lotto_share[1])-intval($_POST["lotto_share"]));
			}

			$r_lotto_open_ary[] = (isset($_POST['lotto_typeAOpen']))? 1 :0;
			$r_lotto_open_ary[] = (isset($_POST['lotto_typeBOpen']))? 1 :0;
			$r_lotto_open_ary[] = (isset($_POST['lotto_typeCOpen']))? 1 :0;
			$r_lotto_open = "open,".implode(",",$r_lotto_open_ary);		

			$set_r_lotto_pay1='pay,'.(str_replace(',','',$_POST["lotto_pay1_1"])).','.(str_replace(',','',$_POST["lotto_pay1_2"])).','.(str_replace(',','',$_POST["lotto_pay1_3"])).','.(str_replace(',','',$_POST["lotto_pay1_4"])).','.(str_replace(',','',$_POST["lotto_pay1_5"])).','.(str_replace(',','',$_POST["lotto_pay1_6"])).','.(str_replace(',','',$_POST["lotto_pay1_7"])).','.(str_replace(',','',$_POST["lotto_pay1_8"])).','.(str_replace(',','',$_POST["lotto_pay1_9"])).','.(str_replace(',','',$_POST["lotto_pay1_10"])).','.(str_replace(',','',$_POST["lotto_pay1_11"])).','.(str_replace(',','',$_POST["lotto_pay1_12"])).','.(str_replace(',','',$_POST["lotto_pay1_13"])).','.(str_replace(',','',$_POST["lotto_pay1_14"])).','.(str_replace(',','',$_POST["lotto_pay1_15"])).','.(str_replace(',','',$_POST["lotto_pay1_16"])).','.(str_replace(',','',$_POST["lotto_pay1_17"])).','.(str_replace(',','',$_POST["lotto_pay1_18"])).','.(str_replace(',','',$_POST["lotto_pay1_19"])).','.(str_replace(',','',$_POST["lotto_pay1_20"])).','.(str_replace(',','',$_POST["lotto_pay1_21"])).','.(str_replace(',','',$_POST["lotto_pay1_22"])).','.(str_replace(',','',$_POST["lotto_pay1_23"])).','.(str_replace(',','',$_POST["lotto_pay1_24"])).','.(str_replace(',','',$_POST["lotto_pay1_25"])).','.(str_replace(',','',$_POST["lotto_pay1_26"])).','.(str_replace(',','',$_POST["lotto_pay1_27"])).','.(str_replace(',','',$_POST["lotto_pay1_28"])).','.(str_replace(',','',$_POST["lotto_pay1_29"])).','.(str_replace(',','',$_POST["lotto_pay1_30"])).','.(str_replace(',','',$_POST["lotto_pay1_31"])).','.(str_replace(',','',$_POST["lotto_pay1_32"])).','.(str_replace(',','',$_POST["lotto_pay1_33"])).','.(str_replace(',','',$_POST["lotto_pay1_34"])).','.(str_replace(',','',$_POST["lotto_pay1_35"]));

			$set_r_lotto_dis1='dis,'.($_POST["lotto_com1_1"]).','.($_POST["lotto_com1_2"]).','.($_POST["lotto_com1_3"]).','.($_POST["lotto_com1_4"]).','.($_POST["lotto_com1_5"]).','.($_POST["lotto_com1_6"]).','.($_POST["lotto_com1_7"]).','.($_POST["lotto_com1_8"]).','.($_POST["lotto_com1_9"]).','.($_POST["lotto_com1_10"]).','.($_POST["lotto_com1_11"]).','.($_POST["lotto_com1_12"]).','.($_POST["lotto_com1_13"]).','.($_POST["lotto_com1_14"]).','.($_POST["lotto_com1_15"]).','.($_POST["lotto_com1_16"]).','.($_POST["lotto_com1_17"]).','.($_POST["lotto_com1_18"]).','.($_POST["lotto_com1_19"]).','.($_POST["lotto_com1_20"]).','.($_POST["lotto_com1_21"]).','.($_POST["lotto_com1_22"]).','.($_POST["lotto_com1_23"]).','.($_POST["lotto_com1_24"]).','.($_POST["lotto_com1_25"]).','.($_POST["lotto_com1_26"]).','.($_POST["lotto_com1_27"]).','.($_POST["lotto_com1_28"]).','.($_POST["lotto_com1_29"]).','.($_POST["lotto_com1_30"]).','.($_POST["lotto_com1_31"]).','.($_POST["lotto_com1_32"]).','.($_POST["lotto_com1_33"]).','.($_POST["lotto_com1_34"]).','.($_POST["lotto_com1_35"]);

			$set_r_lotto_pay2='pay,'.(str_replace(',','',$_POST["lotto_pay2_1"])).','.(str_replace(',','',$_POST["lotto_pay2_2"])).','.(str_replace(',','',$_POST["lotto_pay2_3"])).','.(str_replace(',','',$_POST["lotto_pay2_4"])).','.(str_replace(',','',$_POST["lotto_pay2_5"])).','.(str_replace(',','',$_POST["lotto_pay2_6"])).','.(str_replace(',','',$_POST["lotto_pay2_7"])).','.(str_replace(',','',$_POST["lotto_pay2_8"])).','.(str_replace(',','',$_POST["lotto_pay2_9"])).','.(str_replace(',','',$_POST["lotto_pay2_10"])).','.(str_replace(',','',$_POST["lotto_pay2_11"])).','.(str_replace(',','',$_POST["lotto_pay2_12"])).','.(str_replace(',','',$_POST["lotto_pay2_13"])).','.(str_replace(',','',$_POST["lotto_pay2_14"])).','.(str_replace(',','',$_POST["lotto_pay2_15"])).','.(str_replace(',','',$_POST["lotto_pay2_16"])).','.(str_replace(',','',$_POST["lotto_pay2_17"])).','.(str_replace(',','',$_POST["lotto_pay2_18"])).','.(str_replace(',','',$_POST["lotto_pay2_19"])).','.(str_replace(',','',$_POST["lotto_pay2_20"])).','.(str_replace(',','',$_POST["lotto_pay2_21"])).','.(str_replace(',','',$_POST["lotto_pay2_22"])).','.(str_replace(',','',$_POST["lotto_pay2_23"])).','.(str_replace(',','',$_POST["lotto_pay2_24"])).','.(str_replace(',','',$_POST["lotto_pay2_25"])).','.(str_replace(',','',$_POST["lotto_pay2_26"])).','.(str_replace(',','',$_POST["lotto_pay2_27"])).','.(str_replace(',','',$_POST["lotto_pay2_28"])).','.(str_replace(',','',$_POST["lotto_pay2_29"])).','.(str_replace(',','',$_POST["lotto_pay2_30"])).','.(str_replace(',','',$_POST["lotto_pay2_31"])).','.(str_replace(',','',$_POST["lotto_pay2_32"])).','.(str_replace(',','',$_POST["lotto_pay2_33"])).','.(str_replace(',','',$_POST["lotto_pay2_34"])).','.(str_replace(',','',$_POST["lotto_pay2_35"]));

			$set_r_lotto_dis2='dis,'.($_POST["lotto_com2_1"]).','.($_POST["lotto_com2_2"]).','.($_POST["lotto_com2_3"]).','.($_POST["lotto_com2_4"]).','.($_POST["lotto_com2_5"]).','.($_POST["lotto_com2_6"]).','.($_POST["lotto_com2_7"]).','.($_POST["lotto_com2_8"]).','.($_POST["lotto_com2_9"]).','.($_POST["lotto_com2_10"]).','.($_POST["lotto_com2_11"]).','.($_POST["lotto_com2_12"]).','.($_POST["lotto_com2_13"]).','.($_POST["lotto_com2_14"]).','.($_POST["lotto_com2_15"]).','.($_POST["lotto_com2_16"]).','.($_POST["lotto_com2_17"]).','.($_POST["lotto_com2_18"]).','.($_POST["lotto_com2_19"]).','.($_POST["lotto_com2_20"]).','.($_POST["lotto_com2_21"]).','.($_POST["lotto_com2_22"]).','.($_POST["lotto_com2_23"]).','.($_POST["lotto_com2_24"]).','.($_POST["lotto_com2_25"]).','.($_POST["lotto_com2_26"]).','.($_POST["lotto_com2_27"]).','.($_POST["lotto_com2_28"]).','.($_POST["lotto_com2_29"]).','.($_POST["lotto_com2_30"]).','.($_POST["lotto_com2_31"]).','.($_POST["lotto_com2_32"]).','.($_POST["lotto_com2_33"]).','.($_POST["lotto_com2_34"]).','.($_POST["lotto_com2_35"]);

			$set_r_lotto_pay3='pay,'.(str_replace(',','',$_POST["lotto_pay3_1"])).','.(str_replace(',','',$_POST["lotto_pay3_2"])).','.(str_replace(',','',$_POST["lotto_pay3_3"])).','.(str_replace(',','',$_POST["lotto_pay3_4"])).','.(str_replace(',','',$_POST["lotto_pay3_5"])).','.(str_replace(',','',$_POST["lotto_pay3_6"])).','.(str_replace(',','',$_POST["lotto_pay3_7"])).','.(str_replace(',','',$_POST["lotto_pay3_8"])).','.(str_replace(',','',$_POST["lotto_pay3_9"])).','.(str_replace(',','',$_POST["lotto_pay3_10"])).','.(str_replace(',','',$_POST["lotto_pay3_11"])).','.(str_replace(',','',$_POST["lotto_pay3_12"])).','.(str_replace(',','',$_POST["lotto_pay3_13"])).','.(str_replace(',','',$_POST["lotto_pay3_14"])).','.(str_replace(',','',$_POST["lotto_pay3_15"])).','.(str_replace(',','',$_POST["lotto_pay3_16"])).','.(str_replace(',','',$_POST["lotto_pay3_17"])).','.(str_replace(',','',$_POST["lotto_pay3_18"])).','.(str_replace(',','',$_POST["lotto_pay3_19"])).','.(str_replace(',','',$_POST["lotto_pay3_20"])).','.(str_replace(',','',$_POST["lotto_pay3_21"])).','.(str_replace(',','',$_POST["lotto_pay3_22"])).','.(str_replace(',','',$_POST["lotto_pay3_23"])).','.(str_replace(',','',$_POST["lotto_pay3_24"])).','.(str_replace(',','',$_POST["lotto_pay3_25"])).','.(str_replace(',','',$_POST["lotto_pay3_26"])).','.(str_replace(',','',$_POST["lotto_pay3_27"])).','.(str_replace(',','',$_POST["lotto_pay3_28"])).','.(str_replace(',','',$_POST["lotto_pay3_29"])).','.(str_replace(',','',$_POST["lotto_pay3_30"])).','.(str_replace(',','',$_POST["lotto_pay3_31"])).','.(str_replace(',','',$_POST["lotto_pay3_32"])).','.(str_replace(',','',$_POST["lotto_pay3_33"])).','.(str_replace(',','',$_POST["lotto_pay3_34"])).','.(str_replace(',','',$_POST["lotto_pay3_35"]));

			$set_r_lotto_dis3='dis,'.($_POST["lotto_com3_1"]).','.($_POST["lotto_com3_2"]).','.($_POST["lotto_com3_3"]).','.($_POST["lotto_com3_4"]).','.($_POST["lotto_com3_5"]).','.($_POST["lotto_com3_6"]).','.($_POST["lotto_com3_7"]).','.($_POST["lotto_com3_8"]).','.($_POST["lotto_com3_9"]).','.($_POST["lotto_com3_10"]).','.($_POST["lotto_com3_11"]).','.($_POST["lotto_com3_12"]).','.($_POST["lotto_com3_13"]).','.($_POST["lotto_com3_14"]).','.($_POST["lotto_com3_15"]).','.($_POST["lotto_com3_16"]).','.($_POST["lotto_com3_17"]).','.($_POST["lotto_com3_18"]).','.($_POST["lotto_com3_19"]).','.($_POST["lotto_com3_20"]).','.($_POST["lotto_com3_21"]).','.($_POST["lotto_com3_22"]).','.($_POST["lotto_com3_23"]).','.($_POST["lotto_com3_24"]).','.($_POST["lotto_com3_25"]).','.($_POST["lotto_com3_26"]).','.($_POST["lotto_com3_27"]).','.($_POST["lotto_com3_28"]).','.($_POST["lotto_com3_29"]).','.($_POST["lotto_com3_30"]).','.($_POST["lotto_com3_31"]).','.($_POST["lotto_com3_32"]).','.($_POST["lotto_com3_33"]).','.($_POST["lotto_com3_34"]).','.($_POST["lotto_com3_35"]);

		// lotto_hun 
			// $set_r_lotto_hun_share = "share,".$_POST["lotto_share_hun"]; 
			// $set_r_lotto_hun_myshare = "myshare,".(intval($r_lotto_hun_share[1])-intval($_POST["lotto_share_hun"]));
			$set_r_lotto_hun_share = "share";
			$set_r_lotto_hun_myshare = "myshare";
			$set_r_lotto_hun_force = "force";
			$set_r_lotto_hun_max = "max,".intval(str_replace(",","",$_POST["lotto_share_hun_betmax_money"])).",0";
			$set_r_lotto_hun_min = "min,".intval(str_replace(",","",$_POST["lotto_share_hun_betmin_money"])).",0";

			foreach ($lot_type[$_SESSION["AGlang"]][3] as $key => $value) {
				$set_r_lotto_hun_share .= ",".$_POST["lotto_share_hun"]; 
				$set_r_lotto_hun_myshare .= ",".(intval($r_lotto_hun_share[1])-intval($_POST["lotto_share_hun"]));
				$set_r_lotto_hun_force .= ",".(intval($r_lotto_hun_share[1])-intval($_POST["lotto_share_hun"]));
			}

			$r_lotto_hun_open_ary[] = (isset($_POST['lotto_hun_typeAOpen']))? 1 :0;
			$r_lotto_hun_open_ary[] = (isset($_POST['lotto_hun_typeBOpen']))? 1 :0;
			$r_lotto_hun_open_ary[] = (isset($_POST['lotto_hun_typeCOpen']))? 1 :0;
			$r_lotto_hun_open = "open,".implode(",",$r_lotto_hun_open_ary);	


			$set_r_lotto_hun_pay1='pay,'.(str_replace(',','',$_POST["lotto_hun_pay1_1"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_2"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_3"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_4"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_5"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_6"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_7"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_8"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_9"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_10"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_11"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_12"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_13"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_14"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_15"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_16"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_17"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_18"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_19"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_20"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_21"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_22"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_23"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_24"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_25"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_26"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_27"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_28"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_29"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_30"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_31"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_32"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_33"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_34"])).','.(str_replace(',','',$_POST["lotto_hun_pay1_35"]));

			$set_r_lotto_hun_dis1='dis,'.($_POST["lotto_hun_com1_1"]).','.($_POST["lotto_hun_com1_2"]).','.($_POST["lotto_hun_com1_3"]).','.($_POST["lotto_hun_com1_4"]).','.($_POST["lotto_hun_com1_5"]).','.($_POST["lotto_hun_com1_6"]).','.($_POST["lotto_hun_com1_7"]).','.($_POST["lotto_hun_com1_8"]).','.($_POST["lotto_hun_com1_9"]).','.($_POST["lotto_hun_com1_10"]).','.($_POST["lotto_hun_com1_11"]).','.($_POST["lotto_hun_com1_12"]).','.($_POST["lotto_hun_com1_13"]).','.($_POST["lotto_hun_com1_14"]).','.($_POST["lotto_hun_com1_15"]).','.($_POST["lotto_hun_com1_16"]).','.($_POST["lotto_hun_com1_17"]).','.($_POST["lotto_hun_com1_18"]).','.($_POST["lotto_hun_com1_19"]).','.($_POST["lotto_hun_com1_20"]).','.($_POST["lotto_hun_com1_21"]).','.($_POST["lotto_hun_com1_22"]).','.($_POST["lotto_hun_com1_23"]).','.($_POST["lotto_hun_com1_24"]).','.($_POST["lotto_hun_com1_25"]).','.($_POST["lotto_hun_com1_26"]).','.($_POST["lotto_hun_com1_27"]).','.($_POST["lotto_hun_com1_28"]).','.($_POST["lotto_hun_com1_29"]).','.($_POST["lotto_hun_com1_30"]).','.($_POST["lotto_hun_com1_31"]).','.($_POST["lotto_hun_com1_32"]).','.($_POST["lotto_hun_com1_33"]).','.($_POST["lotto_hun_com1_34"]).','.($_POST["lotto_hun_com1_35"]);

			$set_r_lotto_hun_pay2='pay,'.(str_replace(',','',$_POST["lotto_hun_pay2_1"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_2"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_3"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_4"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_5"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_6"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_7"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_8"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_9"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_10"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_11"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_12"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_13"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_14"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_15"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_16"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_17"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_18"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_19"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_20"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_21"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_22"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_23"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_24"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_25"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_26"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_27"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_28"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_29"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_30"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_31"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_32"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_33"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_34"])).','.(str_replace(',','',$_POST["lotto_hun_pay2_35"]));

			$set_r_lotto_hun_dis2='dis,'.($_POST["lotto_hun_com2_1"]).','.($_POST["lotto_hun_com2_2"]).','.($_POST["lotto_hun_com2_3"]).','.($_POST["lotto_hun_com2_4"]).','.($_POST["lotto_hun_com2_5"]).','.($_POST["lotto_hun_com2_6"]).','.($_POST["lotto_hun_com2_7"]).','.($_POST["lotto_hun_com2_8"]).','.($_POST["lotto_hun_com2_9"]).','.($_POST["lotto_hun_com2_10"]).','.($_POST["lotto_hun_com2_11"]).','.($_POST["lotto_hun_com2_12"]).','.($_POST["lotto_hun_com2_13"]).','.($_POST["lotto_hun_com2_14"]).','.($_POST["lotto_hun_com2_15"]).','.($_POST["lotto_hun_com2_16"]).','.($_POST["lotto_hun_com2_17"]).','.($_POST["lotto_hun_com2_18"]).','.($_POST["lotto_hun_com2_19"]).','.($_POST["lotto_hun_com2_20"]).','.($_POST["lotto_hun_com2_21"]).','.($_POST["lotto_hun_com2_22"]).','.($_POST["lotto_hun_com2_23"]).','.($_POST["lotto_hun_com2_24"]).','.($_POST["lotto_hun_com2_25"]).','.($_POST["lotto_hun_com2_26"]).','.($_POST["lotto_hun_com2_27"]).','.($_POST["lotto_hun_com2_28"]).','.($_POST["lotto_hun_com2_29"]).','.($_POST["lotto_hun_com2_30"]).','.($_POST["lotto_hun_com2_31"]).','.($_POST["lotto_hun_com2_32"]).','.($_POST["lotto_hun_com2_33"]).','.($_POST["lotto_hun_com2_34"]).','.($_POST["lotto_hun_com2_35"]);

			$set_r_lotto_hun_pay3='pay,'.(str_replace(',','',$_POST["lotto_hun_pay3_1"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_2"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_3"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_4"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_5"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_6"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_7"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_8"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_9"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_10"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_11"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_12"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_13"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_14"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_15"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_16"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_17"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_18"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_19"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_20"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_21"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_22"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_23"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_24"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_25"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_26"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_27"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_28"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_29"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_30"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_31"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_32"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_33"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_34"])).','.(str_replace(',','',$_POST["lotto_hun_pay3_35"]));

			$set_r_lotto_hun_dis3='dis,'.($_POST["lotto_hun_com3_1"]).','.($_POST["lotto_hun_com3_2"]).','.($_POST["lotto_hun_com3_3"]).','.($_POST["lotto_hun_com3_4"]).','.($_POST["lotto_hun_com3_5"]).','.($_POST["lotto_hun_com3_6"]).','.($_POST["lotto_hun_com3_7"]).','.($_POST["lotto_hun_com3_8"]).','.($_POST["lotto_hun_com3_9"]).','.($_POST["lotto_hun_com3_10"]).','.($_POST["lotto_hun_com3_11"]).','.($_POST["lotto_hun_com3_12"]).','.($_POST["lotto_hun_com3_13"]).','.($_POST["lotto_hun_com3_14"]).','.($_POST["lotto_hun_com3_15"]).','.($_POST["lotto_hun_com3_16"]).','.($_POST["lotto_hun_com3_17"]).','.($_POST["lotto_hun_com3_18"]).','.($_POST["lotto_hun_com3_19"]).','.($_POST["lotto_hun_com3_20"]).','.($_POST["lotto_hun_com3_21"]).','.($_POST["lotto_hun_com3_22"]).','.($_POST["lotto_hun_com3_23"]).','.($_POST["lotto_hun_com3_24"]).','.($_POST["lotto_hun_com3_25"]).','.($_POST["lotto_hun_com3_26"]).','.($_POST["lotto_hun_com3_27"]).','.($_POST["lotto_hun_com3_28"]).','.($_POST["lotto_hun_com3_29"]).','.($_POST["lotto_hun_com3_30"]).','.($_POST["lotto_hun_com3_31"]).','.($_POST["lotto_hun_com3_32"]).','.($_POST["lotto_hun_com3_33"]).','.($_POST["lotto_hun_com3_34"]).','.($_POST["lotto_hun_com3_35"]);

			// lotto_set 
			$set_r_lotto_hun_set_pay="pay";
			foreach ($lang_g["setpay"] as $key => $value) {
				$set_r_lotto_hun_set_pay .= ",".(str_replace(',','',$_POST["lot_hun_set_pay".($key+1)]));
			}
			$set_r_lotto_hun_set_price="price,".(str_replace(',','',$_POST["lot_hun_set_price1"]));	

			$set_r_lotto_hun_set_share = "share";
			$set_r_lotto_hun_set_myshare = "myshare";
			foreach ($lang_g["setpay"] as $key => $value) {
				$set_r_lotto_hun_set_share .= ",".$_POST["lotto_hun_set_share"]; 
				$set_r_lotto_hun_set_myshare .= ",".(intval($r_lotto_hun_share[1])-intval($_POST["lotto_hun_set_share"]));
			}

			// game 
			$set_r_games_share = "share,".$_POST["game_share"]; 
			$set_r_games_myshare = "myshare,".(intval($r_games_share[1])-intval($_POST["game_share"]));
			$set_r_games_force = "force,".(intval($r_games_share[1])-intval($_POST["game_share"]));
			$set_r_games_dis = "dis,".$_POST["game_com"]; 
			$set_r_games_max = "max,".intval(str_replace(",","",$_POST["game_max"])); 
      		$set_r_games_min=  "min,".intval(str_replace(",","",$_POST["game_min"])); 	

		// casino 
			$set_r_casino_share = "share";
			$set_r_casino_myshare = "myshare";
			$set_r_casino_force = "force";	
			$set_r_casino_max = "max";	
			$set_r_casino_min = "min"; 
  			$set_r_casino_dis = "dis";  
  			$set_r_casino_open = "p";   	
			foreach ($lang_g["casino_share"] as $key => $value) {
				$set_r_casino_share .= ",".$_POST["casino_share".$key]; 
				$set_r_casino_myshare .= ",".(intval($r_casino_share[$key])-intval($_POST["casino_share".$key]));
				$set_r_casino_force .= ",".(intval($r_casino_share[$key])-intval($_POST["casino_share".$key]));		
				$set_r_casino_max .= ",".intval(str_replace(',','',$_POST["rcb_maxtransfer".$key])); 
				$set_r_casino_min .= ",".intval(str_replace(',','',$_POST["rcb_mintransfer".$key]));
        		$set_r_casino_dis .= ",".$_POST["casino_com".$key]; 

        		$is_casino_open_chk = (isset($_POST["casino_open".$key]))? 1 :0;
        		$set_r_casino_open .= ",".$is_casino_open_chk; 
			}	
	
		$xy['sprot']['set_r_sport_share'] = $set_r_sport_share;
		$xy['sprot']['set_r_sport_share_live'] = $set_r_sport_share_live;
		$xy['sprot']['set_r_sport_myshare'] = $set_r_sport_myshare;
		$xy['sprot']['set_r_sport_myshare_live'] = $set_r_sport_myshare_live;
		$xy['sprot']['set_r_sport_dis'] = $set_r_sport_dis;
		$xy['sprot']['set_r_sport_max'] = $set_r_sport_max;	
		$xy['sprot']['set_r_sport_min'] = $set_r_sport_min;	
		$xy['sprot']['set_r_sport_nam_tor'] = $set_r_sport_nam_tor;	
		$xy['sprot']['set_r_sport_nam_rong'] = $set_r_sport_nam_rong;

		$xy['step']['set_r_sport_step_max'] = $set_r_sport_step_max;
		$xy['step']['set_r_sport_step_min'] = $set_r_sport_step_min;
		$xy['step']['set_r_sport_step_day'] = $set_r_sport_step_day;
		$xy['step']['set_r_sport_step_paymax'] = $set_r_sport_step_paymax;
		$xy['step']['set_r_sport_step2'] = $set_r_sport_step2;
		$xy['step']['set_r_sport_step_dis'] = $set_r_sport_step_dis;

		$xy['lotto']['set_r_lotto_share'] = $set_r_lotto_share;
		$xy['lotto']['set_r_lotto_myshare'] = $set_r_lotto_myshare;
		$xy['lotto']['set_r_lotto_pay1'] = $set_r_lotto_pay1;
		$xy['lotto']['set_r_lotto_dis1'] = $set_r_lotto_dis1;
		$xy['lotto']['set_r_lotto_pay2'] = $set_r_lotto_pay2;
		$xy['lotto']['set_r_lotto_dis2'] = $set_r_lotto_dis2;
		$xy['lotto']['set_r_lotto_pay3'] = $set_r_lotto_pay3;
		$xy['lotto']['set_r_lotto_dis3'] = $set_r_lotto_dis3;

		$xy['lotto_hun']['set_r_lotto_hun_share'] = $set_r_lotto_hun_share;
		$xy['lotto_hun']['set_r_lotto_hun_myshare'] = $set_r_lotto_hun_myshare;
		$xy['lotto_hun']['set_r_lotto_hun_pay1'] = $set_r_lotto_hun_pay1;
		$xy['lotto_hun']['set_r_lotto_hun_dis1'] = $set_r_lotto_hun_dis1;
		$xy['lotto_hun']['set_r_lotto_hun_pay2'] = $set_r_lotto_hun_pay2;
		$xy['lotto_hun']['set_r_lotto_hun_dis2'] = $set_r_lotto_hun_dis2;
		$xy['lotto_hun']['set_r_lotto_hun_pay3'] = $set_r_lotto_hun_pay3;
		$xy['lotto_hun']['set_r_lotto_hun_dis3'] = $set_r_lotto_hun_dis3;

		$xy['lotto_hun_set']['set_r_lotto_hun_set_share'] = $set_r_lotto_hun_set_share;
		$xy['lotto_hun_set']['set_r_lotto_hun_set_myshare'] = $set_r_lotto_hun_set_myshare;
		$xy['lotto_hun_set']['set_r_lotto_hun_set_pay'] = $set_r_lotto_hun_set_pay;
		$xy['lotto_hun_set']['set_r_lotto_hun_set_price'] = $set_r_lotto_hun_set_price;

		$xy['game']['set_r_games_share'] = $set_r_games_share;
		$xy['game']['set_r_games_force'] = $set_r_games_force;
		$xy['game']['set_r_games_myshare'] = $set_r_games_myshare;
		$xy['game']['set_r_games_dis'] = $set_r_games_dis;
		$xy['game']['set_r_games_min'] = $set_r_games_min;
		$xy['game']['set_r_games_max'] = $set_r_games_max;
		
		$xy['casino']['set_r_casino_share'] = $set_r_casino_share;
		$xy['casino']['set_r_casino_force'] = $set_r_casino_force;
		$xy['casino']['set_r_casino_myshare'] = $set_r_casino_myshare;
		$xy['casino']['set_r_casino_max'] = $set_r_casino_max;
		$xy['casino']['set_r_casino_min'] = $set_r_casino_min;
  		$xy['casino']['set_r_casino_dis'] = $set_r_casino_dis;
  		$xy['casino']['set_r_casino_open'] = $set_r_casino_open;
		$xy['r_open'] = $r_open;
		$xy['lot_type'] = $lang_g["setpay"];

		$sql="update IGNORE bom_tb_agent set r_open = '".$r_open."' ".$r_nam_update." ,r_name = '".$name."', r_phone = '".$telephone."' ,r_sport_share = '".$set_r_sport_share."' ,r_sport_share_live = '".$set_r_sport_share_live."' ,r_sport_myshare = '".$set_r_sport_myshare."' ,r_sport_myshare_live = '".$set_r_sport_myshare_live."' ,r_sport_force = '".$set_r_sport_force."' ,r_sport_force_live = '".$set_r_sport_force_live."',r_sport_dis = '".$set_r_sport_dis."' ,r_sport_max = '".$set_r_sport_max."' ,r_sport_min = '".$set_r_sport_min."' ,r_sport_step_max = '".$set_r_sport_step_max."' ,r_sport_step_min = '".$set_r_sport_step_min."' ,r_sport_step_day = '".$set_r_sport_step_day."' ,r_sport_step_paymax = '".$set_r_sport_step_paymax."' ,r_sport_step2 = '".$set_r_sport_step2."' ,r_sport_step_dis = '".$set_r_sport_step_dis."' ,r_lotto_share = '".$set_r_lotto_share."' ,r_lotto_myshare = '".$set_r_lotto_myshare."' ,r_lotto_force = '".$set_r_lotto_force."' ,r_lotto_open = '".$r_lotto_open."' ,r_lotto_max = '".$set_r_lotto_max."',r_lotto_min = '".$set_r_lotto_min."',r_lotto_pay1 = '".$set_r_lotto_pay1."' ,r_lotto_dis1 = '".$set_r_lotto_dis1."' ,r_lotto_pay2 = '".$set_r_lotto_pay2."' ,r_lotto_dis2 = '".$set_r_lotto_dis2."',r_lotto_pay3 = '".$set_r_lotto_pay3."' ,r_lotto_dis3 = '".$set_r_lotto_dis3."',r_lotto_hun_share = '".$set_r_lotto_hun_share."' ,r_lotto_hun_myshare = '".$set_r_lotto_hun_myshare."' ,r_lotto_hun_force = '".$set_r_lotto_hun_force."' ,r_lotto_hun_open = '".$r_lotto_hun_open."' ,r_lotto_hun_max = '".$set_r_lotto_hun_max."',r_lotto_hun_min = '".$set_r_lotto_hun_min."',r_lotto_hun_pay1 = '".$set_r_lotto_hun_pay1."' ,r_lotto_hun_dis1 = '".$set_r_lotto_hun_dis1."' ,r_lotto_hun_pay2 = '".$set_r_lotto_hun_pay2."' ,r_lotto_hun_dis2 = '".$set_r_lotto_hun_dis2."' ,r_lotto_hun_pay3 = '".$set_r_lotto_hun_pay3."' ,r_lotto_hun_dis3 = '".$set_r_lotto_hun_dis3."' ,r_lotto_hun_set_share = '".$set_r_lotto_hun_set_share."',r_lotto_hun_set_myshare = '".$set_r_lotto_hun_set_myshare."',r_lotto_hun_set_pay = '".$set_r_lotto_hun_set_pay."' ,r_lotto_hun_set_price = '".$set_r_lotto_hun_set_price."' ,r_games_share = '".$set_r_games_share."' ,r_games_force = '".$set_r_games_force."' ,r_games_myshare = '".$set_r_games_myshare."' ,r_games_dis = '".$set_r_games_dis."' ,r_games_max = '".$set_r_games_max."' ,r_games_min = '".$set_r_games_min."' ,r_casino_share = '".$set_r_casino_share."' ,r_casino_force = '".$set_r_casino_force."' ,r_casino_myshare = '".$set_r_casino_myshare."' ,r_casino_max = '".$set_r_casino_max."' ,r_casino_min = '".$set_r_casino_min."' ,r_casino_dis = '".$set_r_casino_dis."' ,r_casino_open = '".$set_r_casino_open."' where r_id='".$id."' ";  
			$query = sql_query($sql);

		if($query)
		{
			$data  = array(
				'msg'     =>  $lang_ag[5],
				'status'  =>  true,
			);
		}else{
			$data  = array(
				'msg' => $lang_ag[4],
				'status' => false,
			);
		}	

		// $data  = array(
		// 		'msg'     =>  $lang_message[5],
		// 		'status'  =>  true,
		// 		'xy'  =>  $xy,
		// 		'xxx'  =>  $set_r_lotto_min,
		// 		'sql'  =>  $sql,
		// 	);

}

echo json_encode($data);


 ?>