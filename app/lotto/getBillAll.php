<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
require('../inc/conn.php');
require('../inc/function.php');
$lang_post           = trim($_GET["lang"]);
if($lang_post==""){
	$lang_post = "th";
}
$_SESSION['lang'] = $lang_post;
// require("../../lang/member_lang.php");
require("../lang/variable_lang.php");
require("../lang/function_array.php");

$mid = $_GET["mid"];
$date = $_GET["d"];	
if($_GET[zone]==""){$_GET[zone]=1;}
if($_GET[rob]==""){$_GET[rob]=1;}
$zone=$_GET[zone];
$rob=$_GET[rob];
$bill_cus_name = trim($_GET['pname']);
$bill_no = trim($_GET['pid']);
$nbill = "";
$obill = "";
$cbill = "21fd95";
if($bill_cus_name!=""){
	$qqname=" and  b_name='$bill_cus_name'";
	}
if($bill_no!=""){
	$qqno=" and  b_no='$bill_no'";
	}
	
$arr = array();
$i = 0;

$ball_type3= array(1 =>"ได้","ได้ครึ่ง","คืนทุน", "เสีย", "เสียครึ่ง", "ยกเลิก", "รอ"); 
	$sql="select * from bom_tb_lotto_bill_play_live where b_date='$date' and  m_id='$mid'  and  lot_zone = '$zone' and  lot_rob = '$rob' and b_accept=1 $qqname $qqno  order by play_id desc";

 $num=sql_num($sql);
 if($num==0){

		$sql="select * from bom_tb_lotto_bill_play where b_date='$date' and  m_id='$mid' and  lot_zone = '$zone' and  lot_rob = '$rob'  and b_accept=1 $qqname $qqno  order by play_id desc"; 
	 }
 
$re=sql_query($sql);
$x=1;
$sum1=array();
$sum2=array();
$sum3=array();
 while($rs_bill=sql_fetch($re)){
	 $sum1[]=-$rs_bill["b_total"];
	 $sum2[]=$rs_bill["b_total"]-$rs_bill["b_pay"];
	 $sum3[]=(-$rs_bill["b_pay"])+$rs_bill["b_bonus"];
	 
	$arr[$i]["Nid"] = $rs_bill["bill_id"];
	$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["play_timestam"]);
	$arr[$i]["Ntime"] = date("H:i" , $rs_bill["play_timestam"]);
	$arr[$i]["Ntype"] = $lot_type[$lang_post][$rs_bill["lot_zone"]][$rs_bill[lot_type]];
	$arr[$i]["Nnum"] = _dt($rs_bill[play_number]);
	$arr[$i]["Ntb"] = number_format(-$rs_bill["b_total"]);
	$arr[$i]["Ndis"] = number_format($rs_bill["b_total"]-$rs_bill["b_pay"]);
	$arr[$i]["Ntotal"] = number_format((-$rs_bill["b_pay"])+$rs_bill["b_bonus"]);
	 $arr[$i]["Nno"] = $rs_bill["b_no"] ?: $rs_bill["b_no"]="";	
	if($arr[$i]["Nno"]!=""){
		$nbill = $arr[$i]["Nno"];
		if($obill==$nbill || $obill==""){
			$obill = $nbill;
		}else{
			if($cbill=="21fd95"){
				$cbill = "f36811";
			}else{
				$cbill = "21fd95";
			}
			$obill = $nbill;
		}
		
		$arr[$i]["Ncolor"] = $cbill;
		
		
	}else{
		$arr[$i]["Ncolor"] = "";
	}
	$i++;
}

$arr[$i]["Nid"] = "";
$arr[$i]["Ndate"] = "";
$arr[$i]["Ntime"] = "";
$arr[$i]["Ntype"] = "";
$arr[$i]["Nnum"] = "";
$arr[$i]["Ntb"] = number_format(@array_sum($sum1));
$arr[$i]["Ndis"] = number_format(@array_sum($sum2));
$arr[$i]["Ntotal"] = number_format(@array_sum($sum3));
$arr[$i]["Nno"] = "";
$arr[$i]["Ncolor"] = "";

echo json_encode($arr);
?>