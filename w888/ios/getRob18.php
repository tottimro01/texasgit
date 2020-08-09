<?
session_start();
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
require('../inc/conn.php');
require('../inc/function.php');

$lang_post           = trim($_GET["lang"]);
if($lang_post==""){
	$lang_post = "th";
}
require("../lang/".$lang_post.".php");

$url_file="../json/config/member/LottoConfig_".$_GET[mid].".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode($lot6_js, true);

$arrp1_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_super"]);
$arrp2_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_senior"]);
$arrp3_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_master"]);
$arrp4_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_agent"]);
$arrp5_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_member"]);


$arr = array();

$i=0;
$arr[$i]["block_name"] = $lang_g['lotZone'][18]; //"จับยี่กี"
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
	
	$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i]." ".$lang_g['_rob']." ".$rob_i;
	$arr[$i]["block_list"][$y]["z_status"] = $rs["o_status"];
	$arr[$i]["block_list"][$y]["z_close"] = $rs["o_limit_time"];
	$arr[$i]["block_list"][$y]["z_close_date"] = date("d/m/Y" , $rs["o_limit_time"]);
	$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
	$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
	$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
	$arr[$i]["block_list"][$y]["z_data"] = $rs;
	$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big1"] = str_replace(',,',',0,', $arrp1_hun);
	$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big2"] = str_replace(',,',',0,', $arrp2_hun);
	$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big3"] = str_replace(',,',',0,', $arrp3_hun);
	$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big4"] = str_replace(',,',',0,', $arrp4_hun);
	$arr[$i]["block_list"][$y]["z_pay"]["lot_pay_big5"] = str_replace(',,',',0,', $arrp5_hun);
	$rob_i++;
}

echo json_encode($arr);
?>