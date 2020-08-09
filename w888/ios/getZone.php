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

$url_file="../json/lotto_hun_new.json";	
$op_js=file_get_contents2($url_file);
$jsop = json_decode($op_js, true);
$ex_jsop = explode("," , $jsop["open"]);

$url_file="../json/config/member/LottoConfig_".$_GET[mid].".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode($lot6_js, true);

$exn1 = explode("," , $lot_m["m_lotto_pay_super"]);
$n1 = count($exn1);
$exn2 = explode("," , $lot_m["m_lotto_pay_senior"]);
$n2 = count($exn2);
$exn3 = explode("," , $lot_m["m_lotto_pay_master"]);
$n3 = count($exn3);
$exn4 = explode("," , $lot_m["m_lotto_pay_agent"]);
$n4 = count($exn4);
$exn5 = explode("," , $lot_m["m_lotto_pay_member"]);
$n5 = count($exn5);
if($n1<26){
	$lot_m["m_lotto_pay_super"] = $lot_m["m_lotto_pay_super"].",0";	
}
if($n2<26){
	$lot_m["m_lotto_pay_senior"] = $lot_m["m_lotto_pay_senior"].",0";	
}
if($n3<26){
	$lot_m["m_lotto_pay_master"] = $lot_m["m_lotto_pay_master"].",0";	
}
if($n4<26){
	$lot_m["m_lotto_pay_agent"] = $lot_m["m_lotto_pay_agent"].",0";	
}
if($n5<26){
	$lot_m["m_lotto_pay_member"] = $lot_m["m_lotto_pay_member"].",0";	
}


$arrp1 = str_replace(',,',',0,',$lot_m["m_lotto_pay_super"]);
$arrp2 = str_replace(',,',',0,',$lot_m["m_lotto_pay_senior"]);
$arrp3 = str_replace(',,',',0,',$lot_m["m_lotto_pay_master"]);
$arrp4 = str_replace(',,',',0,',$lot_m["m_lotto_pay_agent"]);
$arrp5 = str_replace(',,',',0,',$lot_m["m_lotto_pay_member"]);

$arrp1_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_super"]);
$arrp2_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_senior"]);
$arrp3_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_master"]);
$arrp4_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_agent"]);
$arrp5_hun = str_replace(',,',',0,',$lot_m["m_lotto_hun_pay_member"]);



$arr = array();
$i=0;
$arr[$i]["block_name"] = $lang_g['getZone'][1]; 
$arr[$i]["block_show"] = 1;
$arr[$i]["block_list"] = array();
$zone_i = 1;
$rob_i = 1;

//$rs=sql_array("select * from bom_tb_lotto_ok where lot_zone = $zone_i and lot_rob = $rob_i order by ok_id desc limit 1");
$url_file9="../json/lotto/ok/ok_1_1.json";		
$d_bet=file_get_contents2($url_file9);
$rsx = json_decode2($d_bet, true);
$rs = $rsx[0];

$arr[$i]["block_list"][0]["z_name"] = $lang_g['lotZone'][$zone_i];
$arr[$i]["block_list"][0]["z_status"] = "1";
$arr[$i]["block_list"][0]["z_close"] = $rs["o_limit_time"];
//$arr[$i]["block_list"][0]["z_close"] = strtotime(date("Y-m-d 17:06:00"));
$arr[$i]["block_list"][0]["z_close_date"] = date("d/m/Y" , $rs["o_limit_time"]);
$arr[$i]["block_list"][0]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
$arr[$i]["block_list"][0]["z_zone"] = $zone_i;
$arr[$i]["block_list"][0]["z_rob"] = $rob_i;
$arr[$i]["block_list"][0]["z_data"] = $rs;
$arr[$i]["block_list"][0]["z_pay"]["lot_pay_big1"] = str_replace(',,',',0,', $arrp1);
$arr[$i]["block_list"][0]["z_pay"]["lot_pay_big2"] = str_replace(',,',',0,', $arrp2);
$arr[$i]["block_list"][0]["z_pay"]["lot_pay_big3"] = str_replace(',,',',0,', $arrp3);
$arr[$i]["block_list"][0]["z_pay"]["lot_pay_big4"] = str_replace(',,',',0,', $arrp4);
$arr[$i]["block_list"][0]["z_pay"]["lot_pay_big5"] = str_replace(',,',',0,', $arrp5);

$zone_i = 18;
$rob_i = 96;
$rs = array();
$arr[$i]["block_list"][1]["z_name"] = $lang_g['lotZone'][$zone_i]; //"จับยี่กี";
$arr[$i]["block_list"][1]["z_status"] = ($ex_jsop[$zone_i]==0) ? 0 : "24";
$arr[$i]["block_list"][1]["z_close"] = 0;
$arr[$i]["block_list"][1]["z_close_date"] = 0;
$arr[$i]["block_list"][1]["z_close_time"] = 0;
$arr[$i]["block_list"][1]["z_zone"] = $zone_i;
$arr[$i]["block_list"][1]["z_rob"] = $rob_i;
$rs["o_file"] = "getRob".$zone_i.".php";
$arr[$i]["block_list"][1]["z_data"] = $rs;
$arr[$i]["block_list"][1]["z_pay"]["lot_pay_big1"] = "";
$arr[$i]["block_list"][1]["z_pay"]["lot_pay_big2"] = "";
$arr[$i]["block_list"][1]["z_pay"]["lot_pay_big3"] = "";
$arr[$i]["block_list"][1]["z_pay"]["lot_pay_big4"] = "";
$arr[$i]["block_list"][1]["z_pay"]["lot_pay_big5"] = "";


$i=1;
$arr[$i]["block_name"] = $lang_g['lotZone'][2];//"หวยหุ้นไทย";
$arr[$i]["block_show"] = 1;
$arr[$i]["block_list"] = array();
$zone_i = 2;
$rob_i = 1;
for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){
	//$rs=sql_array("select * from bom_tb_lotto_ok where lot_zone = $zone_i and lot_rob = $rob_i order by ok_id desc limit 1");
	
	$url_file9="../json/lotto/ok/ok_".$zone_i."_".$rob_i.".json";		
	$d_bet=file_get_contents2($url_file9);
	$rsx = json_decode2($d_bet, true);
	$rs = $rsx[0];
	//$arr_close = _close($zone_i,$rob_i);
	//$rs["o_limit_time"] = strtotime(date("y-m-d")." ".$arr_close["hh"].":".$arr_close["mm"].":00");
	$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i].$lang_g['lotrob'][$rob_i];
	$arr[$i]["block_list"][$y]["z_status"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_status"];
	$arr[$i]["block_list"][$y]["z_close"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_limit_time"];
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

$i=2;
$arr[$i]["block_name"] = $lang_g['_lotZone'][3]; //"หวยหุ้นต่างประเทศ";
$arr[$i]["block_show"] = 1;
$arr[$i]["block_list"] = array();
$nr=0;
for($x=3;$x<18;$x++){
	$zone_i = $x;
	$rob_i = 1;
	for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){
		/*$rs=sql_array("select * from bom_tb_lotto_ok where lot_zone = $zone_i and lot_rob = $rob_i order by ok_id desc limit 1");
		$arr_close = _close($zone_i,$rob_i);
		$rs["o_limit_time"] = strtotime(date("y-m-d")." ".$arr_close["hh"].":".$arr_close["mm"].":00");*/
		$url_file9="../json/lotto/ok/ok_".$zone_i."_".$rob_i.".json";		
		$d_bet=file_get_contents2($url_file9);
		$rsx = json_decode2($d_bet, true);
		$rs = $rsx[0];
		
		$arr[$i]["block_list"][$nr]["z_name"] = $lang_g['lotZone'][$zone_i].($lot_zone_nrob[$zone_i] > 1 ? $lang_g['lotrob'][$rob_i] : '');
		$arr[$i]["block_list"][$nr]["z_status"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_status"];
		$arr[$i]["block_list"][$nr]["z_close"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_limit_time"];
		$arr[$i]["block_list"][$nr]["z_close_date"] = date("d/m/Y" , $rs["o_limit_time"]);
		$arr[$i]["block_list"][$nr]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
		$arr[$i]["block_list"][$nr]["z_zone"] = $zone_i;
		$arr[$i]["block_list"][$nr]["z_rob"] = $rob_i;
		$arr[$i]["block_list"][$nr]["z_data"] = $rs;
		$arr[$i]["block_list"][$nr]["z_pay"]["lot_pay_big1"] = str_replace(',,',',0,', $arrp1_hun);
		$arr[$i]["block_list"][$nr]["z_pay"]["lot_pay_big2"] = str_replace(',,',',0,', $arrp2_hun);
		$arr[$i]["block_list"][$nr]["z_pay"]["lot_pay_big3"] = str_replace(',,',',0,', $arrp3_hun);
		$arr[$i]["block_list"][$nr]["z_pay"]["lot_pay_big4"] = str_replace(',,',',0,', $arrp4_hun);
		$arr[$i]["block_list"][$nr]["z_pay"]["lot_pay_big5"] = str_replace(',,',',0,', $arrp5_hun);
		$rob_i++;
		$nr++;
	}
	//$nr=$nr+$lot_zone_nrob[$zone_i];
}


$i=3;
$arr[$i]["block_name"] = $lang_g['lotZone'][19]; //"หวยรายวัน";
$arr[$i]["block_show"] = 1;
$arr[$i]["block_list"] = array();
$zone_i = 19;
$rob_i = 1;
for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){
	/*$rs=sql_array("select * from bom_tb_lotto_ok where lot_zone = $zone_i and lot_rob = $rob_i order by ok_id desc limit 1");
	$arr_close = _close($zone_i,$rob_i);
	$rs["o_limit_time"] = strtotime(date("y-m-d")." ".$arr_close["hh"].":".$arr_close["mm"].":00");*/
	
	$url_file9="../json/lotto/ok/ok_".$zone_i."_".$rob_i.".json";		
	$d_bet=file_get_contents2($url_file9);
	$rsx = json_decode2($d_bet, true);
	$rs = $rsx[0];
	
	$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i]." ".$lang_m[40]." ".$lot_robmun[$rob_i];
	$arr[$i]["block_list"][$y]["z_status"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_status"];
	$arr[$i]["block_list"][$y]["z_close"] = ($ex_jsop[$zone_i]==0) ? 0 : $rs["o_limit_time"];
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
/*
$i=4;
$arr[$i]["block_name"] = "จับยี่กี";
$arr[$i]["block_show"] = 2;
$arr[$i]["block_list"] = array();
$zone_i = 18;
$rob_i = 1;
for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){
	$rs=sql_array("select * from bom_tb_lotto_ok where lot_zone = $zone_i and lot_rob = $rob_i order by ok_id desc limit 1");
	$arr_close = _close($zone_i,$rob_i);
	if($rob_i>72){
		$rs["o_limit_time"] = strtotime(date("y-m-d", strtotime("+1 days"))." ".$arr_close["hh"].":".$arr_close["mm"].":00");
	}else{
		$rs["o_limit_time"] = strtotime(date("y-m-d")." ".$arr_close["hh"].":".$arr_close["mm"].":00");
	}
	$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i]." รอบ ".$rob_i;
	$arr[$i]["block_list"][$y]["z_status"] = 0;
	$arr[$i]["block_list"][$y]["z_close"] = $rs["o_limit_time"];
	$arr[$i]["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
	$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
	$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
	$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
	$arr[$i]["block_list"][$y]["z_data"] = $rs;
	$rob_i++;
}
*/
echo json_encode($arr);
?>