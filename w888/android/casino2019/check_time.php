<?
	date_default_timezone_set("Asia/Bangkok");
	header("Content-type: application/json");

	$type = $_POST['type'];
	$room = $_POST['room'];
	$lang = $_POST['lang'];
	$mid = $_POST['mid'];

	$now =  new DateTime(date('d-m-Y H:i:s'));
	$end =  new DateTime(date('d-m-Y H:i:00'));
	$end = $end->add(new DateInterval('PT' . '1' . 'M'));
	$now = $now->format('Y-m-d H:i:s');
	$end = $end->format('Y-m-d H:i:s');
	$diff = strtotime($end) - strtotime($now);
	/*if (intval(date('i')) % 2 == 0) {//คู่ไม่ทำงาน
		$res["rob_bet"] = intval(date('i')) - 1;
	}else {//คี่ทำงาน
		$res["rob_bet"] = intval(date('i'));
	}*/


	$res["rob_bet"] = intval(date('i'));
	//$res["time_start"] = $now;
	//$res["time_end"] = $end;
	$res["time_diff"] = $diff;
	$res["member_credit"] = rand(0,100000);

	echo json_encode($res);


?>
