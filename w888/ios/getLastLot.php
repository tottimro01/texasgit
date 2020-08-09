<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
require('../inc/conn.php');
require('../inc/function.php');
	//$rs_date=sql_array("select * from bom_tb_lotto_ok where lot_zone = 1 group by ok_date order by o_limit_time desc limit 1");
	
	$url_file1="../json/lotto/ok/ok_1_1.json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode($date_js, true);
$rs_date=$date_bet[0];
	
	
	$arr["LastLot"] = $rs_date[ok_date];
	$arr["CloseBig"] = $rs_date["o_limit_time"];
	$arr["CloseSmall"] = $rs_date["o_limit_time_lang"];
	
	$arr["Status"] = "1";
	$arr["Licen"] = "SC";
	

	echo json_encode($arr);
	exit();
?>