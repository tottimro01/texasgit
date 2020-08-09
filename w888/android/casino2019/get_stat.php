<?php

$type = $_POST['type'];
$room = $_POST['room'];
$lang = $_POST['lang'];
$mid = $_POST['mid'];

$arr = array();
if ($type == '1' /*&& $room == '1'*/) {
	for ($i=0; $i <= (intval(date('i')) == 0 ? 1000 : intval(date('i'))); $i++) {
		$score_dra = rand(1,10);
		$score_tig = rand(1,10);
		if ($score_dra > $score_tig) {
			$arr[$i]["type_win"] = 1;//มังกรชนะ
		}else if ($score_dra < $score_tig) {
			$score_win = $score_tig;
			$arr[$i]["type_win"] = 2;//เสือชนะ
		}else if ($score_dra == $score_tig) {
			$arr[$i]["type_win"] = 3;//เสมอกัน
		}
	}
}else if ($type == '2' /*&& $room == '1'*/) {//บาคาร่า
for ($i=0; $i <= (intval(date('i')) == 0 ? 1000 : intval(date('i'))); $i++) {
		$score_player = rand(0,9);
		$score_banker = rand(0,9);

		if ($score_player > $score_banker) {
			$arr[$i]["type_win"] = 1;//1 ผู้เล่นชนะ
		}else if ($score_player < $score_banker) {
			$arr[$i]["type_win"] = 2;//2 เจ้ามือชนะ
		}else if ($score_player == $score_banker) {
			$arr[$i]["type_win"] = 3;//3 เสมอกัน
		}

		if ($score_banker >= 5 && $score_banker <= 9) {
			$arr[$i]["backer_big_small"] = 7;//เจ้ามือไพ่ใหญ่
		}else{
			$arr[$i]["backer_big_small"] = 6;//เจ้ามือไพ่เล็ก
		}

		if ($score_player % 2 == 0) {
			$arr[$i]["player_pair"] = 4;//ผู้เล่นคู่
		}else{
			$arr[$i]["player_pair"] = 0;//ผู้เล่นคี่
		}

		if ($score_banker % 2 == 0) {
			$arr[$i]["banker_pair"] = 5;//เจ้ามือคู่
		}else{
			$arr[$i]["banker_pair"] = 0;//เจ้ามือคี่
		}
	}

}else if ($type == '3' /*&& $room == '1'*/) {//ไฮโล
	for ($i=0; $i <= (intval(date('i')) == 0 ? 1000 : intval(date('i'))); $i++) {
		$score_hi1 = rand(1,6);
		$score_hi2 = rand(1,6);
		$score_hi3 = rand(1,6);

		$arr[$i]["type_win_1"] = $score_hi1;
		$arr[$i]["type_win_2"] = $score_hi2;
		$arr[$i]["type_win_3"] = $score_hi3;

		$scoreSum = ($score_hi1 + $score_hi2 + $score_hi3);
		if ($scoreSum >= 3 && $scoreSum <= 10) {
			$arr[$i]["type_11_hi_lo"] = 7;//ต่ำ
		}else if ($scoreSum >= 12 && $scoreSum <= 18) {
			$arr[$i]["type_11_hi_lo"] = 8;//สูง
		}else {
			$arr[$i]["type_11_hi_lo"] = 11;//11ไฮโล
		}
	}
}else if ($type == '4' /*&& $room == '1'*/) {//รูเล็ต
	for ($i=0; $i <= (intval(date('i')) == 0 ? 1000 : intval(date('i'))); $i++) {
		$arrRed = array(1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36);
		//$arrBlack = array(2,4,6,8,10,11,13,15,17,20,22,24,26,28,29,31,33,35);
		$score = rand(0,37);
		if ($score == 0) {
			$arr[$i]["score"] = "0";
		}else if ($score == 37) {
			$arr[$i]["score"] = "00";
		}else {
			$arr[$i]["score"] = $score;
			$arr[$i]["score_big_small"] = ($score >= 19) ? ($score <= 36) ? 148 : 149 : 149;
			$arr[$i]["score_odd_even"] = ($score % 2 == 1) ? 146 : 147;
			$arr[$i]["score_red_black"] = ((in_array($score, $arrRed)) ? 144 : 145);
		}
	}
}else if ($type == '5' /*&& $room == '1'*/) {//น้ำเต้าปูปลา
	for ($i=0; $i <= (intval(date('i')) == 0 ? 1000 : intval(date('i'))); $i++) {
		$arr[$i]["type_win_1"] = rand(1,6);
		$arr[$i]["type_win_2"] = rand(1,6);
		$arr[$i]["type_win_3"] = rand(1,6);
	}
}

echo json_encode($arr);
?>
