<?php

		$type = $_POST['type'];
		$room = $_POST['room'];
		$rob_bet = $_POST['rob_bet'];
		$lang = $_POST['lang'];
		$mid = $_POST['mid'];

			$pathImage = "http://www.ohoking.com/casino/sexy/images/player/card/";
			$arrCardName = array(
				"card_c01","card_c02","card_c03","card_c04","card_c05","card_c06","card_c07","card_c08","card_c09","card_c10","card_c11","card_c12","card_c13",
				"card_d01","card_d02","card_d03","card_d04","card_d05","card_d06","card_d07","card_d08","card_d09","card_d10","card_d11","card_d12","card_d13",
				"card_h01","card_h02","card_h03","card_h04","card_h05","card_h06","card_h07","card_h08","card_h09","card_h10","card_h11","card_h12","card_h13",
				"card_s01","card_s02","card_s03","card_s04","card_s05","card_s06","card_s07","card_s08","card_s09","card_s10","card_s11","card_s12","card_s13"
			);

		$arr = array();
		$use_img_online = false;//ใช้รูปไพ่จากแอพ(false) หรือ Server(true)

		if ($type == '1' /*&& $room == '1'*/) {//ไพ่มังกรปะทะเสือ

			$score_dra = rand(1,52);
			$score_tig = rand(1,52);
			if ($score_dra > $score_tig) {
				$score_win = $score_dra;
				$type_win = 1;//มังกรชนะ
			}else if ($score_dra < $score_tig) {
				$score_win = $score_tig;
				$type_win = 2;//เสือชนะ
			}else if ($score_dra == $score_tig) {
				$score_win = $score_dra;
				$type_win = 3;//เสมอกัน
			}

			if (intval(date('s')) > 9) {
				$arr["status"] = 1;
				$arr["msg"] = "เปิดไพ่ครบแล้ว";
				$arr["score_dra"] = $score_dra;
				$arr["score_tig"] = $score_tig;
				$arr["type_win"] = $type_win;
				$arr["sum_win"] = rand(0,100);
				$arr["use_img_online"] = $use_img_online;
				if ($use_img_online) {
					$arr["url_dra"] = $pathImage . $arrCardName[$score_dra - 1] . ".png";
					$arr["url_tiger"] = $pathImage . $arrCardName[$score_tig - 1] . ".png";
				}else {
					$arr["url_dra"] = $arrCardName[$score_dra - 1];
					$arr["url_tiger"] = $arrCardName[$score_tig - 1];
				}
			}else if (intval(date('s')) > 5) {
				$arr["status"] = 2;
				$arr["msg"] = "กำลังเปิดไพ่";
				$arr["score_dra"] = $score_dra;
				$arr["score_tig"] = $score_tig;
				$arr["use_img_online"] = $use_img_online;
				if ($use_img_online) {
					$arr["url_dra"] = $pathImage . $arrCardName[$score_dra - 1] . ".png";
					$arr["url_tiger"] = $pathImage . $arrCardName[$score_tig - 1] . ".png";
				}else {
					$arr["url_dra"] = $arrCardName[$score_dra - 1];
					$arr["url_tiger"] = $arrCardName[$score_tig - 1];
				}
			}else{
				$arr["status"] = 2;
				$arr["msg"] = "กำลังเปิดไพ่";
				$arr["score_dra"] = 0;
				$arr["score_tig"] = 0;
				$arr["use_img_online"] = $use_img_online;
				if ($use_img_online) {
					$arr["url_dra"] = "";
					$arr["url_tiger"] = "";
				}else {
					$arr["url_dra"] = "";
					$arr["url_tiger"] = "";
				}
			}

		}else if ($type == '2' /*&& $room == '1'*/) {//บาคาร่า
			$score_bac_pla1 = rand(1,52);
			$score_bac_pla2 = rand(1,52);
			$score_bac_pla3 = rand(1,52);
			$score_bac_player = $score_bac_pla1 + $score_bac_pla2 + $score_bac_pla3;

			$score_bac_bank1 = rand(1,52);
			$score_bac_bank2 = rand(1,52);
			$score_bac_bank3 = rand(1,52);
			$score_bac_banker = $score_bac_bank1 + $score_bac_bank2 + $score_bac_bank3;

			if ($score_bac_player > $score_bac_banker) {
				$score_win = $score_bac_player;
				$type_win = 1;//1 ผู้เล่นชนะ
			}else if ($score_bac_player < $score_bac_banker) {
				$score_win = $score_bac_banker;
				$type_win = 2;//2 เจ้ามือชนะ
			}else if ($score_bac_player == $score_bac_banker) {
				$score_win = $score_bac_banker;
				$type_win = 3;//3 เสมอกัน
			}

			if (intval(date('s')) < 3 ) {
				$arr["status"] = 2;
				$arr["msg"] = "กำลังเปิดไพ่";
				$arr["use_img_online"] = $use_img_online;
				if ($use_img_online) {
					$arr["url_player1"] = $pathImage . $arrCardName[$score_bac_pla1 - 1] . ".png";
					$arr["url_banker1"] = $pathImage . $arrCardName[$score_bac_bank1 - 1] . ".png";
				}else {
					$arr["url_player1"] = $arrCardName[$score_bac_pla1 - 1];
					$arr["url_banker1"] = $arrCardName[$score_bac_bank1 - 1];
				}

			}else if (intval(date('s')) < 6 ) {
				$arr["status"] = 2;
				$arr["msg"] = "กำลังเปิดไพ่";
				$arr["use_img_online"] = $use_img_online;
				if ($use_img_online) {
					$arr["url_player1"] = $pathImage . $arrCardName[$score_bac_pla1 - 1] . ".png";
					$arr["url_player2"] = $pathImage . $arrCardName[$score_bac_pla2 - 1] . ".png";
					$arr["url_banker1"] = $pathImage . $arrCardName[$score_bac_bank1 - 1] . ".png";
					$arr["url_banker2"] = $pathImage . $arrCardName[$score_bac_bank2 - 1] . ".png";
				}else {
					$arr["url_player1"] = $arrCardName[$score_bac_pla1 - 1];
					$arr["url_player2"] = $arrCardName[$score_bac_pla2 - 1];
					$arr["url_banker1"] = $arrCardName[$score_bac_bank1 - 1];
					$arr["url_banker2"] = $arrCardName[$score_bac_bank2 - 1];
				}
			}else if (intval(date('s')) < 9 ) {
				$arr["status"] = 2;
				$arr["msg"] = "กำลังเปิดไพ่";
				$arr["use_img_online"] = $use_img_online;
				if ($use_img_online) {
					$arr["url_player1"] = $pathImage . $arrCardName[$score_bac_pla1 - 1] . ".png";
					$arr["url_player2"] = $pathImage . $arrCardName[$score_bac_pla2 - 1] . ".png";
					$arr["url_player3"] = $pathImage . $arrCardName[$score_bac_pla3 - 1] . ".png";
					$arr["url_banker1"] = $pathImage . $arrCardName[$score_bac_bank1 - 1] . ".png";
					$arr["url_banker2"] = $pathImage . $arrCardName[$score_bac_bank2 - 1] . ".png";
					$arr["url_banker3"] = $pathImage . $arrCardName[$score_bac_bank3 - 1] . ".png";
				}else {
					$arr["url_player1"] = $arrCardName[$score_bac_pla1 - 1];
					$arr["url_player2"] = $arrCardName[$score_bac_pla2 - 1];
					$arr["url_player3"] = $arrCardName[$score_bac_pla3 - 1];
					$arr["url_banker1"] = $arrCardName[$score_bac_bank1 - 1];
					$arr["url_banker2"] = $arrCardName[$score_bac_bank2 - 1];
					$arr["url_banker3"] = $arrCardName[$score_bac_bank3 - 1];
				}
			}else{
				$arr["status"] = 1;
				$res["msg"] = "เปิดไพ่ครบแล้ว";
				$arr["score_player"] = $score_bac_player;//$score_bac_pla1 ."-". $score_bac_pla2 ."-". $score_bac_pla3;
				$arr["score_banker"] = $score_bac_banker;//$score_bac_bank1 ."-". $score_bac_bank2 ."-". $score_bac_bank3;
				$arr["player_pair"] = ($score_bac_player % 2 === 0) ? 4 : 0;
				$arr["banker_pair"] = ($score_bac_banker % 2 === 0) ? 5 : 0;
				$arr["backer_big_small"] = ($score_bac_banker >= 70) ? 7 : 6;
				$arr["type_win"] = $type_win;
				$arr["sum_win"] = rand(0,1000);
				$arr["use_img_online"] = $use_img_online;
				if ($use_img_online) {
					$arr["url_player1"] = $pathImage . $arrCardName[$score_bac_pla1 - 1] . ".png";
					$arr["url_player2"] = $pathImage . $arrCardName[$score_bac_pla2 - 1] . ".png";
					$arr["url_player3"] = $pathImage . $arrCardName[$score_bac_pla3 - 1] . ".png";
					$arr["url_banker1"] = $pathImage . $arrCardName[$score_bac_bank1 - 1] . ".png";
					$arr["url_banker2"] = $pathImage . $arrCardName[$score_bac_bank2 - 1] . ".png";
					$arr["url_banker3"] = $pathImage . $arrCardName[$score_bac_bank3 - 1] . ".png";
				}else {
					$arr["url_player1"] = $arrCardName[$score_bac_pla1 - 1];
					$arr["url_player2"] = $arrCardName[$score_bac_pla2 - 1];
					$arr["url_player3"] = $arrCardName[$score_bac_pla3 - 1];
					$arr["url_banker1"] = $arrCardName[$score_bac_bank1 - 1];
					$arr["url_banker2"] = $arrCardName[$score_bac_bank2 - 1];
					$arr["url_banker3"] = $arrCardName[$score_bac_bank3 - 1];
				}
			}


		}else if ($type == '3' /*&& $room == '1'*/) {//ไฮโล
			$score_hi1 = rand(1,6);
			$score_hi2 = rand(1,6);
			$score_hi3 = rand(1,6);

			if (intval(date('s')) < 5 ) {
				$arr["status"] = 2;
				$arr["msg"] = "กำลังทอยลูกเต๋า";
			}else{
				$arr["status"] = 1;
				$arr["msg"] = "ทอยลูกเต๋าเสร็จแล้ว";
				$arr["type_win_1"] = $score_hi1;
				$arr["type_win_2"] = $score_hi2;
				$arr["type_win_3"] = $score_hi3;
				$scoreSum = ($score_hi1 + $score_hi2 + $score_hi3);

				$arr["score_sum"] = $scoreSum;
				$arr["win1"] = ($score_hi1 === 1) ? 1 : ($score_hi2 === 1) ? 1 : ($score_hi3 === 1) ? 1 : 0;
				$arr["win2"] = ($score_hi1 === 2) ? 2 : ($score_hi2 === 2) ? 2 : ($score_hi3 === 2) ? 2 : 0;
				$arr["win3"] = ($score_hi1 === 3) ? 3 : ($score_hi2 === 3) ? 3 : ($score_hi3 === 3) ? 3 : 0;
				$arr["win4"] = ($score_hi1 === 4) ? 4 : ($score_hi2 === 4) ? 4 : ($score_hi3 === 4) ? 4 : 0;
				$arr["win5"] = ($score_hi1 === 5) ? 5 : ($score_hi2 === 5) ? 5 : ($score_hi3 === 5) ? 5 : 0;
				$arr["win6"] = ($score_hi1 === 6) ? 6 : ($score_hi2 === 6) ? 6 : ($score_hi3 === 6) ? 6 : 0;
				$arr["win11"] = ($scoreSum === 11 ) ? 11 : 0;
				$arr["win15"] = (($score_hi1 === 1 || $score_hi2 === 1 || $score_hi3 === 1) && ($score_hi1 === 5 || $score_hi2 === 5 || $score_hi3 === 5)) ? 12 : 0;
				$arr["win16"] = (($score_hi1 === 1 || $score_hi2 === 1 || $score_hi3 === 1) && ($score_hi1 === 6 || $score_hi2 === 6 || $score_hi3 === 6)) ? 13 : 0;
				$arr["win25"] = (($score_hi1 === 2 || $score_hi2 === 2 || $score_hi3 === 2) && ($score_hi1 === 5 || $score_hi2 === 5 || $score_hi3 === 5)) ? 14 : 0;
				$arr["win456"] = (($score_hi1 === 4 || $score_hi2 === 4 || $score_hi3 === 4) && ($score_hi1 === 5 || $score_hi2 === 5 || $score_hi3 === 5) && ($score_hi1 === 6 || $score_hi2 === 6 || $score_hi3 === 6)) ? 15 : 0;
				$arr["win36"] = (($score_hi1 === 3 || $score_hi2 === 3 || $score_hi3 === 3) && ($score_hi1 === 6 || $score_hi2 === 6 || $score_hi3 === 6)) ? 16 : 0;
				$arr["win24"] = (($score_hi1 === 2 || $score_hi2 === 2 || $score_hi3 === 2) && ($score_hi1 === 4 || $score_hi2 === 4 || $score_hi3 === 4)) ? 17 : 0;
				$arr["win35"] = (($score_hi1 === 3 || $score_hi2 === 3 || $score_hi3 === 3) && ($score_hi1 === 5 || $score_hi2 === 5 || $score_hi3 === 5)) ? 18 : 0;
				$arr["win41"] = (($score_hi1 === 4 || $score_hi2 === 4 || $score_hi3 === 4) && ($score_hi1 === 1 || $score_hi2 === 1 || $score_hi3 === 1)) ? 19 : 0;
				$arr["win123"] = (($score_hi1 === 1 || $score_hi2 === 1 || $score_hi3 === 1) && ($score_hi1 === 2 || $score_hi2 === 2 || $score_hi3 === 2) && ($score_hi1 === 3 || $score_hi2 === 3 || $score_hi3 === 3)) ? 20 : 0;
				$arr["win62"] = (($score_hi1 === 6 || $score_hi2 === 6 || $score_hi3 === 6) && ($score_hi1 === 2 || $score_hi2 === 2 || $score_hi3 === 2)) ? 21 : 0;


				$isLow = ($scoreSum >= 3 && $scoreSum <= 10) ? 7 : 0;
				$isHigh = ($scoreSum >= 12 && $scoreSum <= 18) ? 8 : 0;
				$arr["win_low"] = $isLow;
				$arr["win_high"] = $isHigh;
				$arr["win5_low"] = (($score_hi1 === 5 || $score_hi2 === 5 || $score_hi3 === 5) && $isLow) ? 9 : 0;
				$arr["win6_low"] = (($score_hi1 === 6 || $score_hi2 === 6 || $score_hi3 === 6) && $isLow) ? 10 : 0;
				$arr["is_tong"] = (($score_hi1 === $score_hi2) ? (($score_hi2 === $score_hi3) ? true : false) : false);
				$arr["sum_win"] = rand(0,10000000);
			}

		}else if ($type == '4' /*&& $room == '1'*/) {//รูเล็ต
			$arrRed = array(1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36);
			$arrBlack = array(2,4,6,8,10,11,13,15,17,20,22,24,26,28,29,31,33,35);
			$arr2To1_34 = array(1,4,7,10,13,16,19,22,25,28,31,34);
			$arr2To1_35 = array(2,5,8,11,14,17,20,23,26,29,32,35);
			$arr2To1_36 = array(3,6,9,12,15,18,21,24,27,30,33,36);
			$score = rand(0,37);

			if (intval(date('s')) > 5) {
				$arr["status"] = 1;
				$arr["msg"] = "หมุนเสร็จแล้ว";
				$arr["sum_win"] = rand(0,100000000);

				if ($score == 0) {
					$arr["score"] = "0";
				}else if ($score == 37) {
					$arr["score"] = "00";
				}else{

					$arr["score"] = $score;

					if (($score >= 1) && ($score <= 18)) {
						$arr["score_big_small"] = 148;//สกอร์เล็ก
					}else if(($score >= 19) && ($score <= 36)) {
						$arr["score_big_small"] = 149;//สกอร์ใหญ่
					}

					if (($score >= 1) && ($score <= 12)) {
						$arr["score_zone"] = 150;//สกอร์โซน 1 ถึง 12
					}else if (($score >= 13) && ($score <= 24)) {
						$arr["score_zone"] = 151;//สกอร์โซน 13 ถึง 24
					}else if (($score >= 25) && ($score <= 36)) {
						$arr["score_zone"] = 152;//สกอร์โซน 25 ถึง 26
					}else if (in_array($score, $arr2To1_34)) {
						$arr["score_zone"] = 153;//สกอร์โซน 2 ถึง 1 แถว 34
					}else if (in_array($score, $arr2To1_35)) {
						$arr["score_zone"] = 154;//สกอร์โซน 2 ถึง 1 แถว 35
					}else if (in_array($score, $arr2To1_36)) {
						$arr["score_zone"] = 155;//สกอร์โซน 2 ถึง 1 แถว 36
					}

					if ($score % 2 == 1) {
						$arr["score_odd_even"] = 146;//สกอร์คี่
					}else {
						$arr["score_odd_even"] = 147;//สกอร์คู่
					}

					if (in_array($score, $arrRed)) {
						$arr["score_red_black"] = 144;//สกอร์แดง
					}else if (in_array($score, $arrBlack)) {
						$arr["score_red_black"] = 145;//สกอร์ดำ
					}

				}
			}else{
				$arr["status"] = 2;
				$arr["msg"] = "กำลังหมุน";
			}

		}else if ($type == '5' /*&& $room == '1'*/) {//น้ำเต้าปูปลา
			$win_yu1 = rand(1,6);
			$win_yu2 = rand(1,6);
			$win_yu3 = rand(1,6);
			if (intval(date('s')) < 5 ) {
				$arr["status"] = 2;
				$arr["msg"] = "กำลังเปิด";
			}else{
				$arr["status"] = 1;
				$arr["msg"] = "เปิดเสร็จแล้ว";
				$arr["type_win_1"] = $win_yu1;
				$arr["type_win_2"] = $win_yu2;
				$arr["type_win_3"] = $win_yu3;
				$arr["calabash_win"] = (($win_yu1 == 1) ? 1 : ($win_yu2 == 1) ? 1 : ($win_yu3 == 1) ? 1 : 0);
				$arr["crab_win"] = (($win_yu1 == 2) ? 2 : ($win_yu2 == 2) ? 2 : ($win_yu3 == 2) ? 2 : 0);
				$arr["fish_win"] = (($win_yu1 == 3) ? 3 : ($win_yu2 == 3) ? 3 : ($win_yu3 == 3) ? 3 : 0);
				$arr["tiger_win"] = (($win_yu1 == 4) ? 4 : ($win_yu2 == 4) ? 4 : ($win_yu3 == 4) ? 4 : 0);
				$arr["shrimp_win"] = (($win_yu1 == 5) ? 5 : ($win_yu2 == 5) ? 5 : ($win_yu3 == 5) ? 5 : 0);
				$arr["chicken_win"] = (($win_yu1 == 6) ? 6 : ($win_yu2 == 6) ? 6 : ($win_yu3 == 6) ? 6 : 0);
				$arr["sum_win"] = rand(0,10000000);
			}
		}

	echo json_encode($arr);

?>
