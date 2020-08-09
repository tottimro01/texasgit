<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
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
if($_GET[zone]==""){$_GET[zone]=1;}
if($_GET[rob]==""){$_GET[rob]=1;}
$zone=$_GET[zone];
$rob=$_GET[rob];
$arr = array();
$i = 0;


$sql             = "select * from bom_tb_member where m_id='$mid'";
$re_m            = sql_array($sql);

$url_file="../../json/config/member/LottoConfig_".$mid.".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode2($lot6_js, true);

$empay=@explode(',',$lot_m['m_lotto_pay_member']); 
$emdis=@explode(',',$lot_m['m_lotto_dis_member']); 


$ball_type3= array(1 =>"ได้","ได้ครึ่ง","คืนทุน", "เสีย", "เสียครึ่ง", "ยกเลิก", "รอ"); 

	$sql="select * from bom_tb_lotto_bill_play_live where bill_id='$bid' and  m_id='$mid' and  lot_zone = '$zone' and  lot_rob = '$rob'  and b_accept=1  order by lot_type asc, play_number asc";

 $num=sql_num($sql);
 if($num==0){

		$sql="select * from bom_tb_lotto_bill_play where bill_id='$bid' and  m_id='$mid' and  lot_zone = '$zone' and  lot_rob = '$rob'  and b_accept=1  order by lot_type asc, play_number asc"; 
	 
 }
$re=sql_query($sql);
$x=1;
$sum1=array();
while($rs_bill=sql_fetch($re)){
	
	
	if($re_m[m_bet_tou]==1 and ($rs_bill[lot_type]==4 or $rs_bill[lot_type]==5 or $rs_bill[lot_type]==18) and $zone==1){
		
		$sum1[]=-($rs_bill["b_pay"]);
	}else{
		$sum1[]=-$rs_bill["b_total"];
	}
	 
	$arr[$i]["Nid"] = $rs_bill["bill_id"];
	$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["play_timestam"]);
	$arr[$i]["Ntime"] = date("H:i" , $rs_bill["play_timestam"]);
	$arr[$i]["Ntype"] = $lot_type[$lang_post][$rs_bill[lot_zone]][$rs_bill[lot_type]];
	$arr[$i]["Nnum"] = _dt($rs_bill[play_number]);
	
if($re_m[m_bet_tou]==1 and ($rs_bill[lot_type]==4 or $rs_bill[lot_type]==5 or $rs_bill[lot_type]==18) and $zone==1){
$rPay =(1000/$empay[$rs_bill[lot_type]]);
$arr[$i]["Ntb"] = number_format($rs_bill[b_total]/$rPay).' ตัว';
}else{
$arr[$i]["Ntb"] = number_format(-$rs_bill[b_total],2);
	}
#$arr[$i]["Ntb"] = number_format(-$rs_bill[b_total]);	
	
	$i++;
}

$arr[$i]["Nid"] = "";
$arr[$i]["Ndate"] = "";
$arr[$i]["Ntime"] = "";
$arr[$i]["Ntype"] = "";
$arr[$i]["Nnum"] = "";
$arr[$i]["Ntb"] = number_format(@array_sum($sum1),2);

echo json_encode($arr);
?>