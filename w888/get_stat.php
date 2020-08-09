<?php
$type = $_POST['type'];
$room = $_POST['room'];


$arr = array();
if ($type == '1' /*&& $room == '1'*/) {
	for ($i=0; $i <= rand(100,200); $i++) {
		$score_dra = rand(1,10);
		$score_tig = rand(1,10);
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
		$arr[$i]["score_dra"] = $score_dra;
		$arr[$i]["score_tig"] = $score_tig;
		$arr[$i]["score_win"] = $score_win;
		$arr[$i]["type_win"] = $type_win;
	}
}else if ($type == '2' /*&& $room == '1'*/) {//บาคาร่า
	for ($i=0; $i <= rand(100,200); $i++) {
		$score_bac_pla1 = rand(1,10);
		$score_bac_pla2 = rand(1,10);
		$score_bac_pla3 = rand(1,10);
		$score_bac_player = $score_bac_pla1 + $score_bac_pla2 + $score_bac_pla3;

		$score_bac_bank1 = rand(1,10);
		$score_bac_bank2 = rand(1,10);
		$score_bac_bank3 = rand(1,10);
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

		$arr[$i]["score_player"] = $score_bac_pla1 ."-". $score_bac_pla2 ."-". $score_bac_pla3;
		$arr[$i]["score_banker"] = $score_bac_bank1 ."-". $score_bac_bank2 ."-". $score_bac_bank3;
		$arr[$i]["score_win"] = $score_win;
		$arr[$i]["type_win"] = $type_win;
	}

}else if ($type == '3' /*&& $room == '1'*/) {//ไฮโล
	for ($i=0; $i <= rand(100,100); $i++) {
		$score_hi1 = rand(1,6);
		$score_hi2 = rand(1,6);
		$score_hi3 = rand(1,6);

		$arr[$i]["score_hi1"] = $score_hi1;
		$arr[$i]["score_hi2"] = $score_hi2;
		$arr[$i]["score_hi3"] = $score_hi3;

		$scoreSum = ($score_hi1 + $score_hi2 + $score_hi3);
		$arr[$i]["score_sum"] = $scoreSum;

		$isLow = ($scoreSum >= 4 && $scoreSum <= 10) ? true : false;
		$arr[$i]["is_Low"] = $isLow;

		$arr[$i]["is_tong"] = (($score_hi1 === $score_hi2) ? (($score_hi2 === $score_hi3) ? true : false) : false);
	}

}else if ($type == '4' /*&& $room == '1'*/) {//รูเล็ต
	for ($i=0; $i <= rand(100,100); $i++) {
		$arrRed = array(1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36);
		$arrBlack = array(2,4,6,8,10,11,13,15,17,20,22,24,26,28,29,31,33,35);
		$score = rand(0,37);
		if ($score == 0) {
			$arr[$i]["score"] = "0";
		}else if ($score == 37) {
			$arr[$i]["score"] = "00";
		}else {
			$arr[$i]["score"] = $score;
			$arr[$i]["is_small"] = ($score >= 1) ? ($score <= 18) ? true : false : false;
			$arr[$i]["is_big"] = ($score >= 19) ? ($score <= 36) ? true : false : false;
			$arr[$i]["is_odd"] = ($score % 2 == 1) ? true : false;
			$arr[$i]["is_even"] = ($score % 2 == 0) ? true : false;
			$arr[$i]["is_red"] = ((in_array($score, $arrRed)) ? true : false);
			$arr[$i]["is_black"] = ((in_array($score, $arrBlack)) ? true : false);
		}
	}
}else if ($type == '5' /*&& $room == '1'*/) {//น้ำเต้าปูปลา
	for ($i=0; $i <= rand(100,100); $i++) {
		$arr[$i]["win_yu1"] = rand(1,6);
		$arr[$i]"win_yu2"] = rand(1,6);
		$arr$i]["win_yu3"] = rand(1,6);
	}
}

echo json_encode($arr);
?>
