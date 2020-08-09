<?
	date_default_timezone_set("Asia/Bangkok");
	header("Content-type: application/json");

	$now =  new DateTime(date('d-m-Y H:i:s'));
	$end =  new DateTime(date('d-m-Y H:i:0'.($_GET['room'] * 2)));
	$end = $end->add(new DateInterval('PT' . '1' . 'M'));
	$now = $now->format('Y-m-d H:i:s');
	$end = $end->format('Y-m-d H:i:s');
	$diff = strtotime($end) - strtotime($now);
	$res["time_start"] = $now;
	$res["time_end"] = $end;
	$res["time_diff"] = $diff;
	$res["username"] = "ฟหกด่าสว" ;
	$res["credit"] = rand(0,10000000);

	echo json_encode($res);


?>
