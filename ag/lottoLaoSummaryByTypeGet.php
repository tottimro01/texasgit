


<?php 
	$config["b"]   = -3;
    $config["col"] = 10;
    $config["e"]   = 3;
    $config["n"]   = "000";
    $config["row"] = 100;
    $config["tb"]  = array();
    $config["th"]  = "<th>ตัวเลข</th><th>ซื้อ</th>";

	
	$data = array();
	$data  = array(
		'status' => true,
		'result' => "",
		'config' => $config,
	);


echo json_encode($data);

 ?>