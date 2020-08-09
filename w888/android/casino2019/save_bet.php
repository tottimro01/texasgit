<?php
	$type = $_POST['type'];
	$room = $_POST['room'];
	$rob_bet = $_POST['rob_bet'];
	$txt_bet = (isset($_POST['txt_bet'])) ? $_POST['txt_bet'] : "";
	$lang = $_POST['lang'];
	$mid = $_POST['mid'];

	$arr = array();

	if ($type == 1) {//ไพ่มังกรปะทะเสือ
		$arr["status"] = "1";
		$arr["txt_bet"] = $txt_bet;
		$arr["msg"] = "แทงไพ่มังกรปะทะเสือสำเร็จ";
	}else if ($type == 2) {//บาคาร่า
		$arr["status"] = "1";
		$arr["txt_bet"] = $txt_bet;
		$arr["msg"] = "แทงบาคาร่าสำเร็จ";
	}else if ($type == 3) {//ไฮโล
		$arr["status"] = "1";
		$arr["txt_bet"] = $txt_bet;
		$arr["msg"] = "แทงไฮโลสำเร็จ";
	}else if ($type == 4) {//รูเล็ต
		$arr["status"] = "1";
		$arr["txt_bet"] = $txt_bet;
		$arr["msg"] = "แทงรูเล็ตสำเร็จ";
	}else if ($type == 5) {//น้ำเต้าปูปลา
		$arr["status"] = "1";
		$arr["txt_bet"] = $txt_bet;
		$arr["msg"] = "แทงน้ำเต้าปูปลาสำเร็จ";
	}

	echo json_encode($arr);

?>
