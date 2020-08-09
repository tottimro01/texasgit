<?php
require('../inc/conn.php');
require('../inc/function.php');

$zone = trim($_POST["zone"]);

	
$rs_date = array();


################OPEN BET maintenance 
$url_file="../json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode($mm_js, true);
if($jsmm["open"]==0){

$arr["Status"] = "2";	
echo json_encode($arr);
exit();

	}



if($zone==3){
	
$url_file1="../json/lotto_hun/ok_mun.json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode($date_js, true);
$rs_date=$date_bet[0];	
	
}else{
$url_file1="../json/lotto_hun/ok.json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode($date_js, true);
$rs_date=$date_bet[0];
}
	
	echo json_encode($rs_date);
	exit();
?>