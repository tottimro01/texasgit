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
$bill_cus_name = trim($_GET['pname']);
$bill_no = trim($_GET['pid']);
$nbill = "21fd95";
if($_GET[zone]==""){$_GET[zone]=1;}
if($_GET[rob]==""){$_GET[rob]=1;}
$zone=$_GET[zone];
$rob=$_GET[rob];


if($bill_cus_name!=""){
	$qqname=" and  b_name='$bill_cus_name'";
	}
if($bill_no!=""){
	$qqno=" and  b_no='$bill_no'";
	}

	
$arr = array();
$i = 0;

$ball_type3= array(1 =>"ได้","ได้ครึ่ง","คืนทุน", "เสีย", "เสียครึ่ง", "ยกเลิก", "รอ"); 
/*if($zone==1){
	$sql="select * from bom_tb_lotto_bill_live where b_date='$date' and  m_id='$mid' and b_total > 0   and b_accept=1 $qqname $qqno  order by bill_id desc";
}else{*/
	$sql="select * from bom_tb_lotto_bill_live where b_date='$date' and  m_id='$mid' and b_total > 0 and  lot_zone = '$zone' and  lot_rob = '$rob' and b_accept=1 $qqname $qqno  order by bill_id desc";
//}
$num=sql_num($sql);
 if($num==0){
	 /*if($zone==1){
$sql="select * from bom_tb_lotto_bill where b_date='$date' and  m_id='$mid' and b_total > 0   and b_accept=1 $qqname $qqno  order by bill_id desc";
	 }else{*/
		 $sql="select * from bom_tb_lotto_bill where b_date='$date' and  m_id='$mid' and b_total > 0  and  lot_zone = '$zone' and  lot_rob = '$rob' and b_accept=1 $qqname $qqno  order by bill_id desc";
	 //}
 }
$re=sql_query($sql);
$x=1;
$sum1=array();
$sum2=array();
$sum3=array();
$sum4=array();
 while($rs_bill=sql_fetch($re)){
	 
	 $sum1[]=-$rs_bill["b_total"];
	 $sum2[]=$rs_bill["b_total"]-$rs_bill["b_pay"];
	 $sum3[]=$rs_bill["b_bonus"];
	 $sum4[]=(-$rs_bill["b_pay"])+$rs_bill["b_bonus"];
	 
	$arr[$i]["Nid"] = $rs_bill["bill_id"];
	 if($num==0){
	$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["b_timestam"]);
	$arr[$i]["Ntime"] = date("H:i" , $rs_bill["b_timestam"]);
	 }else{
	$arr[$i]["Ndate"] = date("d/m/Y" , $rs_bill["b_timestam"]);
	$arr[$i]["Ntime"] = date("H:i" , $rs_bill["b_timestam"]);
	 }
	$arr[$i]["Ntb"] = number_format(-$rs_bill["b_total"]);
	$arr[$i]["Ndis"] = number_format($rs_bill["b_total"]-$rs_bill["b_pay"]);
	$arr[$i]["Nbonus"] = number_format($rs_bill[b_bonus]);
	$arr[$i]["Ntotal"] = number_format((-$rs_bill["b_pay"])+$rs_bill["b_bonus"]);
	$arr[$i]["Nstatus"] = $rs_bill["b_status"];	
	$arr[$i]["Nno"] = $rs_bill["b_no"] ?: $rs_bill["b_no"]="";	
	$arr[$i]["Nname"] = $rs_bill["b_name"] ?: $rs_bill["b_name"]="";	
	if($arr[$i]["Nno"]!=""){
		if($nbill=="21fd95"){
			$arr[$i]["Ncolor"] = "21fd95";
			$nbill = "f36811";
		}else{
			$arr[$i]["Ncolor"] = "f36811";
			$nbill = "21fd95";
		}
	}else{
		$arr[$i]["Ncolor"] = "";
	}
	$i++;
}

$arr[$i]["Nid"] = "";
$arr[$i]["Ndate"] = "";
$arr[$i]["Ntime"] = "";
$arr[$i]["Ntb"] = number_format(@array_sum($sum1));
$arr[$i]["Ndis"] = number_format(@array_sum($sum2));
$arr[$i]["Nbonus"] = number_format(@array_sum($sum3));
$arr[$i]["Ntotal"] = number_format(@array_sum($sum4));
$arr[$i]["Nstatus"] = "";
$arr[$i]["Nno"] = "";
$arr[$i]["Ncolor"] = "";

echo json_encode($arr);
?>