<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
require('../inc/conn.php');

	$mid = $_POST["mid"];
$arr = array();
	$Moon_close = "02-08-2017 20:00";
	$arr["Moon_close"] = strtotime($Moon_close);
	$arr["Status"] = "1";
	$arr["Licen"] = "SC";

	
	echo json_encode($arr);
	exit();
?>