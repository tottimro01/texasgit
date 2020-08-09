<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       


require('../inc/conn.php');
require('../inc/function.php');

// require("../lang/member_lang.php");
require("../lang/variable_lang.php");
require("../lang/function_array.php");

$packet = $_POST["packet"];
$id_key = $_POST["id_key"];

$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'  and play_status=7 and b_accept=1 and lot_zone=1  ";
$reb2=sql_array($sql);

if($$reb2['btotal'] != 0){
	$arr = array();
	$arr["status"] = 1;
	$arr["msg"] = "ไม่สามารถเลือกอัตราจ่ายได้ เนื่องจากมีรายการเล่นค้าง";
	echo json_encode($arr);
	exit();
}
else{
	$sql_update = sql_query("update bom_tb_member set m_lotto_setbet = '$id_key' where m_id = '$_SESSION[m_id]'");
	$arr = array();
	$_SESSION['m1']['m_lotto_setbet'] = $id_key;
	$arr["status"] = 1;
	$arr["msg"] = $lang_member[638];
	echo json_encode($arr);
	exit();
}

$fo="../json/ip/".$_SESSION[m_id].".php";
require($fo);
$token_ip = md5($_SERVER['SERVER_ADDR']);
if($token_ip!=$m_ip){ exit(); }
$arr = array();
$num_bill_play = sql_num("select bill_id from  bom_tb_lotto_bill_play_live where m_id='$_SESSION[m_id]'  and play_status=7 and b_accept <> 0");

if($num_bill_play<=0){

$rs_mem = sql_array("select * from bom_tb_member where m_id = '$_SESSION[m_id]'");

require('arr_pay.php');

$pay_txt = "pay,";
$dis_txt_super = "dis,";
$dis_txt_senior = "dis,";
$dis_txt_master = "dis,";
$dis_txt_agent = "dis,";
$dis_txt_member = "dis,";
foreach($lot_type[$_SESSION['lang']][1] as $key => $value){
	if($arr_pay_select[$_SESSION["crid4"]][$packet][$key]!=""){
		$pay_val = $arr_pay_select[$_SESSION["crid4"]][$packet][$key];
	}else{
		$pay_val = 0;
	}
	$pay_txt .= $pay_val.",";
	
	$dis_txt_super .= ($arr_dis_super_select[$_SESSION["crid4"]][$packet][$key]!="") ? $arr_dis_super_select[$_SESSION["crid4"]][$packet][$key]."," : "0,";
	$dis_txt_senior .= ($arr_dis_senior_select[$_SESSION["crid4"]][$packet][$key]!="") ? $arr_dis_senior_select[$_SESSION["crid4"]][$packet][$key]."," : "0,";
	$dis_txt_master .= ($arr_dis_master_select[$_SESSION["crid4"]][$packet][$key]!="") ? $arr_dis_master_select[$_SESSION["crid4"]][$packet][$key]."," : "0,";
	$dis_txt_agent .= ($arr_dis_agent_select[$_SESSION["crid4"]][$packet][$key]!="") ? $arr_dis_agent_select[$_SESSION["crid4"]][$packet][$key]."," : "0,";
	$dis_txt_member .= ($arr_dis_member_select[$_SESSION["crid4"]][$packet][$key]!="") ? $arr_dis_member_select[$_SESSION["crid4"]][$packet][$key]."," : "0,";
	
	/*if($arr_dis_select[$_SESSION["crid4"]][$packet][$key]!=""){
		$dis_txt_super .= $arr_dis_super_select[$_SESSION["crid4"]][$packet][$key].",";
		$dis_txt_senior .= $arr_dis_senior_select[$_SESSION["crid4"]][$packet][$key].",";
		$dis_txt_master .= $arr_dis_master_select[$_SESSION["crid4"]][$packet][$key].",";
		$dis_txt_agent .= $arr_dis_agent_select[$_SESSION["crid4"]][$packet][$key].",";
		$dis_txt_member .= $arr_dis_member_select[$_SESSION["crid4"]][$packet][$key].",";
	}else{
		$dis_txt_super .= "0,";
		$dis_txt_senior .= "0,";
		$dis_txt_master .= "0,";
		$dis_txt_agent .= "0,";
		$dis_txt_member .= "0,";
	}*/
	
}

$sql_update = sql_query("update bom_tb_member set m_lotto_pay_super = '$pay_txt' , m_lotto_pay_senior = '$pay_txt' , m_lotto_pay_master = '$pay_txt' , m_lotto_pay_agent = '$pay_txt' , m_lotto_pay_member = '$pay_txt' , m_lotto_dis_super = '$dis_txt_super' , m_lotto_dis_senior = '$dis_txt_senior' , m_lotto_dis_master = '$dis_txt_master' , m_lotto_dis_agent = '$dis_txt_agent' , m_lotto_dis_member = '$dis_txt_member' , m_packet = '$id_key', m_lotto_setbet = '$id_key' where m_id = '$_SESSION[m_id]'");
if($sql_update){
	
	##################JSON Lotto Config
	$sql="select * from  bom_tb_member where   m_id='$_SESSION[m_id]' limit 1";
	$rsm_2=sql_array($sql);
	$js1=array();
	$js1=array();
$js1["m_lotto_nummax"]="$rsm_2[m_lotto_nummax]";
$js1["m_lotto_max"]="$rsm_2[m_lotto_max]";
$js1["m_lotto_min"]="$rsm_2[m_lotto_min]";

$js1["m_lotto_hun_nummax"]="$rsm_2[m_lotto_hun_nummax]";
$js1["m_lotto_hun_max"]="$rsm_2[m_lotto_hun_max]";
$js1["m_lotto_hun_min"]="$rsm_2[m_lotto_hun_min]";

###########################หวย
$js1["m_lotto_myshare_super"]="$rsm_2[m_lotto_myshare_super]";
$js1["m_lotto_myshare_senior"]="$rsm_2[m_lotto_myshare_senior]";
$js1["m_lotto_myshare_master"]="$rsm_2[m_lotto_myshare_master]";
$js1["m_lotto_myshare_agent"]="$rsm_2[m_lotto_myshare_agent]";

$js1["m_lotto_force_super"]="$rsm_2[m_lotto_force_super]";
$js1["m_lotto_force_senior"]="$rsm_2[m_lotto_force_senior]";
$js1["m_lotto_force_master"]="$rsm_2[m_lotto_force_master]";
$js1["m_lotto_force_agent"]="$rsm_2[m_lotto_force_agent]";


$js1["m_lotto_pay_super"]="$rsm_2[m_lotto_pay_super]";
$js1["m_lotto_pay_senior"]="$rsm_2[m_lotto_pay_senior]";
$js1["m_lotto_pay_master"]="$rsm_2[m_lotto_pay_master]";
$js1["m_lotto_pay_agent"]="$rsm_2[m_lotto_pay_agent]";
$js1["m_lotto_pay_member"]="$rsm_2[m_lotto_pay_member]";

$js1["m_lotto_dis_super"]="$rsm_2[m_lotto_dis_super]";
$js1["m_lotto_dis_senior"]="$rsm_2[m_lotto_dis_senior]";
$js1["m_lotto_dis_master"]="$rsm_2[m_lotto_dis_master]";
$js1["m_lotto_dis_agent"]="$rsm_2[m_lotto_dis_agent]";
$js1["m_lotto_dis_member"]="$rsm_2[m_lotto_dis_member]";



###########################หุ้น
$js1["m_lotto_hun_myshare_super"]="$rsm_2[m_lotto_hun_myshare_super]";
$js1["m_lotto_hun_myshare_senior"]="$rsm_2[m_lotto_hun_myshare_senior]";
$js1["m_lotto_hun_myshare_master"]="$rsm_2[m_lotto_hun_myshare_master]";
$js1["m_lotto_hun_myshare_agent"]="$rsm_2[m_lotto_hun_myshare_agent]";

$js1["m_lotto_hun_force_super"]="$rsm_2[m_lotto_hun_force_super]";
$js1["m_lotto_hun_force_senior"]="$rsm_2[m_lotto_hun_force_senior]";
$js1["m_lotto_hun_force_master"]="$rsm_2[m_lotto_hun_force_master]";
$js1["m_lotto_hun_force_agent"]="$rsm_2[m_lotto_hun_force_agent]";


$js1["m_lotto_hun_pay_super"]="$rsm_2[m_lotto_hun_pay_super]";
$js1["m_lotto_hun_pay_senior"]="$rsm_2[m_lotto_hun_pay_senior]";
$js1["m_lotto_hun_pay_master"]="$rsm_2[m_lotto_hun_pay_master]";
$js1["m_lotto_hun_pay_agent"]="$rsm_2[m_lotto_hun_pay_agent]";
$js1["m_lotto_hun_pay_member"]="$rsm_2[m_lotto_hun_pay_member]";

$js1["m_lotto_hun_dis_super"]="$rsm_2[m_lotto_hun_dis_super]";
$js1["m_lotto_hun_dis_senior"]="$rsm_2[m_lotto_hun_dis_senior]";
$js1["m_lotto_hun_dis_master"]="$rsm_2[m_lotto_hun_dis_master]";
$js1["m_lotto_hun_dis_agent"]="$rsm_2[m_lotto_hun_dis_agent]";
$js1["m_lotto_hun_dis_member"]="$rsm_2[m_lotto_hun_dis_member]";

####################################################
$js1["m_min"]="$rsm_2[m_min]";
$js1["m_max"]="$rsm_2[m_max]";
$js1["m_max_match"]="$rsm_2[m_max_match]";

$js1["m_myshare_super"]="$rsm_2[m_myshare_super]";
$js1["m_myshare_senior"]="$rsm_2[m_myshare_senior]";
$js1["m_myshare_master"]="$rsm_2[m_myshare_master]";
$js1["m_myshare_agent"]="$rsm_2[m_myshare_agent]";

$js1["m_force_super"]="$rsm_2[m_force_super]";
$js1["m_force_senior"]="$rsm_2[m_force_senior]";
$js1["m_force_master"]="$rsm_2[m_force_master]";
$js1["m_force_agent"]="$rsm_2[m_force_agent]";



$js1["m_myshare_games"]="$rsm_2[m_myshare_games]";
$js1["m_force_games"]="$rsm_2[m_force_games]";
$js1["m_dis_games"]="$rsm_2[m_dis_games]";
$js1["m_max_games"]="$rsm_2[m_max_games]";
$js1["m_min_games"]="$rsm_2[m_min_games]";

$js1["m_active_bet"]="$rsm_2[m_active_bet]";

	$txt=json_encode($js1);
	$url_file="../json/config/member/LottoConfig_".$rsm_2[m_id].".json";	
	$wfile = write($url_file ,$txt,"w+"); 
	if($wfile==1){
		$arr["status"] = 1;
		$arr["msg"] = $lang_member[638];
		$arr["id_key"] = $id_key;
	}
	
}else{
	$arr["status"] = 2;
	$arr["msg"] = $lang_member[66];
	$arr["res"] = $sql_update;
}
}else{
	$arr["status"] = 3;
	$arr["msg"] = $lang_member[66];
}
echo json_encode($arr);
?>
