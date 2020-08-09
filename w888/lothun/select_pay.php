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


$sql="select sum(b_total) as btotal from bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."'  and play_status=7 and b_accept=1 and lot_zone!=1  ";
$reb2=sql_array($sql);

if($$reb2['btotal'] != 0){
	$arr = array();
	$arr["status"] = 1;
	$arr["msg"] = "ไม่สามารถเลือกอัตราจ่ายได้ เนื่องจากมีรายการเล่นค้าง";
	echo json_encode($arr);
	exit();
}
else{
	$sql_update = sql_query("update bom_tb_member set m_lotto_hun_setbet = '$id_key' where m_id = '$_SESSION[m_id]'");
	$arr = array();
	$_SESSION['m1']['m_lotto_hun_setbet'] = $id_key;
	$arr["status"] = 1;
	$arr["msg"] = $lang_member[638];
	echo json_encode($arr);
	exit();
}
?>