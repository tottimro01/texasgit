<?php
header('Content-type: application/json');
 require('inc_head_bySession.php'); ?>
<?php 

$data = [];

$play_id = ["4303240","4303239"];


for ($i=0; $i <=1 ; $i++) { 

	$data["calcel_list"][] = array(
		'play_id' => $play_id[$i],
		'lot_zone' => "หวยหุ้นไทย : 3",
		'play_timestam' => "01/04/2019 10:20:35",
		'm_user' => "aaaa03",
		'lot_type' => "2บน",
		'play_number' =>  "10",
		'b_total' => number_format(10,2),
		'sum10a' => number_format(0.00,2),
		'sum11a' => number_format(-3.50,2),
		'xm_sum3' => _cbn(-3.50,2),
	);
}

for ($i=0; $i <=1 ; $i++) { 

	$data["calceled_list"][] = array(
		'play_id' => $play_id[$i],
		'lot_zone' => "หวยหุ้นไทย : 3",
		'play_timestam' => "01/04/2019 10:20:35",
		'm_user' => "aaaa03",
		'lot_type' => "2บน",
		'play_number' =>  "10",
		'b_total' => number_format(10,2),
		'sum10a' => number_format(0.00,2),
		'sum11a' => number_format(-3.50,2),
		'xm_sum3' => _cbn(-3.50,2),
		'cancel_by' => "a",
		'cancel_time' => "2019-03-26 14:52:47",
	);
}

echo json_encode($data);

 ?>
