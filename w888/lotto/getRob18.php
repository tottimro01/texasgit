<?
session_start();
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
require('../inc/conn.php');
require('../inc/function.php');
// require('../lang/member_lang.php');
require("../lang/variable_lang.php");

$arr = array();

$i=0;
$arr[$i]["block_name"] = $lang_member[686];
$arr[$i]["block_list"] = array();
$zone_i = 18;
$rob_i = 1;
for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){
	//$rs=sql_array("select * from bom_tb_lotto_ok where lot_zone = $zone_i and lot_rob = $rob_i order by ok_id desc limit 1");
	/*$arr_close = _close($zone_i,$rob_i);
	if($rob_i>72){
		$rs["o_limit_time"] = strtotime(date("y-m-d", strtotime("+1 days"))." ".$arr_close["hh"].":".$arr_close["mm"].":00");
	}else{
		$rs["o_limit_time"] = strtotime(date("y-m-d")." ".$arr_close["hh"].":".$arr_close["mm"].":00");
	}*/
	
	$url_file9="../json/lotto/ok/ok_".$zone_i."_".$rob_i.".json";		
	$d_bet=file_get_contents2($url_file9);
	$rsx = json_decode2($d_bet, true);
	$rs = $rsx[0];
	
	$arr[$i]["block_list"][$y]["z_name"] = $lot_zone["th"][$zone_i]." ".$lang_member[688]." ".$rob_i;
	$arr[$i]["block_list"][$y]["z_status"] = $rs["o_status"];
	$arr[$i]["block_list"][$y]["z_close"] = $rs["o_limit_time"];
	$arr[$i]["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
	$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
	$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
	$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
	$arr[$i]["block_list"][$y]["z_data"] = $rs;
	$rob_i++;
}

echo json_encode($arr);
?>