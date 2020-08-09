<?php 
	require('inc_head_bySession.php');

	$data["val"] = [];
	foreach ($lot_typeArry as $key => $value)
	{
		$data["val"][] = array(
			"lottype" => $value,
			"key" => $key,
			"all_r1" => "50.00",
			"all_r2" => "-17.50",
			"all_sum" => "32.50",
			"all_r3" => "0.00",
			"all_total" => _cbn(32.50,2),
		); 
	}

	echo json_encode($data);
?>