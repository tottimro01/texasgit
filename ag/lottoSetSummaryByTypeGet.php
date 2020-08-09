<?php 

	$config["th"] = "<th>ตัวเลข</th><th>ซื้อ</th>";
	$config["col"] = 1;
	$config["row"] = 10;
	$config["b"] = -1;
	$config["e"] = 1;
	$config["n"] = "0";
	
	$data = array();
	$data = array(
		'status' => true,
		'result' => "",
		'config' => $config,
	);


echo json_encode($data);

 ?>