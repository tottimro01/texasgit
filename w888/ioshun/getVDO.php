<?php
require('../inc/conn.php');

	$mid = $_POST["mid"];
$arr = array();

	#$arr["VDO"] = "rtmp://202.142.207.150/live/liveinfinity1";
	$arr["VDO"] = $streaming;
	
	$arr["Status"] = "1";
	$arr["Licen"] = "SC";

	
	echo json_encode($arr);
	exit();
?>