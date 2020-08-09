<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../../inc/conn.php');
require('../../inc/function.php');
$lang_post           = trim($_GET["lang"]);
if($lang_post==""){
	$lang_post = "th";
}
$_SESSION['lang'] = $lang_post;
// require("../../lang/member_lang.php");
require("../../lang/variable_lang.php");
require("../../lang/function_array.php");

$mid = $_GET["mid"];
$bid = $_GET["bid"];	
	
$arr = array();
$i = 0;

$ball_type3= array(1 =>"ได้","ได้ครึ่ง","คืนทุน", "เสีย", "เสียครึ่ง", "ยกเลิก", "รอ"); 

$sql="select * from bom_tb_lotto_bill_play_live where bill_id='$bid' and  m_id='$mid'   and b_accept=1  order by lot_type asc, play_number asc";
 $num=sql_num($sql);
 if($num==0){
$sql="select * from bom_tb_lotto_bill_play where bill_id='$bid' and  m_id='$mid'   and b_accept=1  order by lot_type asc, play_number asc";
 }
$re=sql_query($sql);
$x=1;
$sum1=array();
while($rs_bill=sql_fetch($re)){
	
	$sum1[]=-$rs_bill["b_total"];
	 
	$arr[$i]["Nid"] = $rs_bill["bill_id"];
	$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["play_timestam"]);
	$arr[$i]["Ntime"] = date("H:i" , $rs_bill["play_timestam"]);
	$arr[$i]["Ntype"] = $lot_type[$lang_post][$rs_bill[lot_zone]][$rs_bill[lot_type]];
	$arr[$i]["Nnum"] = _dt($rs_bill[play_number]);
	$arr[$i]["Ntb"] = number_format(-$rs_bill[b_total]);
	
	$i++;
}

$arr[$i]["Nid"] = "";
$arr[$i]["Ndate"] = "";
$arr[$i]["Ntime"] = "";
$arr[$i]["Ntype"] = "";
$arr[$i]["Nnum"] = "";
$arr[$i]["Ntb"] = number_format(@array_sum($sum1));

echo json_encode($arr);
?>