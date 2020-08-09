<?
session_start();
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
require('../inc/conn.php');
require('../inc/function.php');
//include("../process/num_limit.php");  

$lang_post           = trim($_GET["lang"]);
if($lang_post==""){
	$lang_post = "th";
}
require("../lang/".$lang_post.".php");

$mid = $_GET["mid"];

	
$url_file1="../json/lotto/ok/ok_1_1.json";	
$date_js=file_get_contents2($url_file1);
$date_bet = json_decode2($date_js, true);
$ok_date=$date_bet[0];
#print_r($date_bet);

$view_date=$ok_date[ok_date];


$arr_bill = array();

$arr_bill_list = array();
$ir = 0;
$sql_bill=sql_query("select * from bom_tb_lotto_topmax where m_id='$mid' order by play_timestam desc");
while($rs_bill=sql_fetch($sql_bill)){
	$arr_bill_list["bill_data"][$rs_bill["bill_id"]][$ir] = $rs_bill;
	$arr_bill_list["bill_date"][$rs_bill["bill_id"]] = $rs_bill["play_timestam"];
	$arr_bill_list["bill_cus_name"][$rs_bill["bill_id"]] = $rs_bill["b_name"];
	$arr_bill_list["bill_no"][$rs_bill["bill_id"]] = $rs_bill["b_no"];
	$ir++;
}




$arr = array();
$ir = 0; 
foreach($arr_bill_list["bill_data"] as &$value){ 
	$bill_id = array_keys($arr_bill_list["bill_data"],$value); 
	
	$arr[$ir]["bill_id"] = $bill_id[0];
	$arr[$ir]["bill_cus_name"] = $arr_bill_list["bill_cus_name"][$bill_id[0]];
	$arr[$ir]["bill_no"] = $arr_bill_list["bill_no"][$bill_id[0]];
	$arr[$ir]["bill_time"] = date("d/m/Y H:i:s" , $arr_bill_list["bill_date"][$bill_id[0]]);
	
	$ac_all = 1; 
	$sum_win = 0;
	$ird = 0;
	foreach($value as &$rs){ 
		if($rs["tp_status"]==0){ $ac_all = 0; } 
		if($rs["tp_status"]==0){ $sum_win = $sum_win+$rs["tp_win"]; } 
		
		
		$arr[$ir]["bill_data"][$ird]["num"] = _dt($rs["play_number"]);
		$arr[$ir]["bill_data"][$ird]["type"] = $lot_type["th"][$rs["lot_type"]];
		$arr[$ir]["bill_data"][$ird]["sum"] = number_format($rs["b_total"] , 2);
		$arr[$ir]["bill_data"][$ird]["pay"] = number_format($rs["tp_win"] , 2);
		$arr[$ir]["bill_data"][$ird]["bingo"] = number_format($rs["b_total"]*$rs["tp_win"] , 2);
		
		if($rs["tp_win"]<=0){
			$arr[$ir]["bill_data"][$ird]["status"] = 0;
			$arr[$ir]["bill_data"][$ird]["id"] = 0;
		}else{
			if($rs["tp_status"]==1){
				$arr[$ir]["bill_data"][$ird]["status"] = 1;
				$arr[$ir]["bill_data"][$ird]["id"] = 0;
			}else{
				$arr[$ir]["bill_data"][$ird]["status"] = 2;
				$arr[$ir]["bill_data"][$ird]["id"] = $rs["tp_id"];
			}
		}
		if($ac_all==0 and $sum_win>0){
			$arr[$ir]["bill_button"] = 1;
		}else{
			$arr[$ir]["bill_button"] = 0;
		}
			
		$ird++;
	}
	$ir++; 
}




echo json_encode($arr);
?>