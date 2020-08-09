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
$_SESSION['lang'] = $lang_post;
// require("../../lang/member_lang.php");
require("../lang/variable_lang.php");
require("../lang/function_array.php");

$mid = $_GET["mid"];
if($_GET[zone]==""){$_GET[zone]=1;}
if($_GET[rob]==""){$_GET[rob]=1;}
$zone=$_GET[zone];
$rob=$_GET[rob];
$arr = array();
$i1=0;
$i2=0;
$i3=0;


$sql             = "select * from bom_tb_member where m_id='$mid'";
$re_m            = sql_array($sql);

if($zone!=1){
	$zone = 3;
	$num_bill_play = sql_num("select bill_id from  bom_tb_lotto_bill_play_live where m_id='$mid' and lot_zone <> 1  and play_status=7 and b_accept <> 0");
}else{
	$num_bill_play = sql_num("select bill_id from  bom_tb_lotto_bill_play_live where m_id='$mid' and lot_zone = 1  and play_status=7 and b_accept <> 0");
}


$arr["num_bill_play"] = $num_bill_play;
if($zone==1){
	$empay1=@explode(',',$re_m['m_lotto_pay1']); 
	$emdis1=@explode(',',$re_m['m_lotto_dis1']); 

	$empay2=@explode(',',$re_m['m_lotto_pay2']); 
	$emdis2=@explode(',',$re_m['m_lotto_dis2']); 

	$empay3=@explode(',',$re_m['m_lotto_pay3']); 
	$emdis3=@explode(',',$re_m['m_lotto_dis3']); 
}else{
	$empay1=@explode(',',$re_m['m_lotto_hun_pay1']); 
	$emdis1=@explode(',',$re_m['m_lotto_hun_dis1']); 

	$empay2=@explode(',',$re_m['m_lotto_hun_pay2']); 
	$emdis2=@explode(',',$re_m['m_lotto_hun_dis2']); 

	$empay3=@explode(',',$re_m['m_lotto_hun_pay3']); 
	$emdis3=@explode(',',$re_m['m_lotto_hun_dis3']); 
}

foreach ($lot_type[$lang_post][$zone] as $x => $value){ 
	if($empay1[$x]>0){ 
		$arr["pd1"][$i1]["lotType"] = $lot_type[$lang_post][$zone][$x];
		$arr["pd1"][$i1]["lotPay"] = $empay1[$x];
		$arr["pd1"][$i1]["lotDis"] = $emdis1[$x]."%";

		$i1++; 
	} 

	if($empay2[$x]>0){ 
		$arr["pd2"][$i2]["lotType"] = $lot_type[$lang_post][$zone][$x];
		$arr["pd2"][$i2]["lotPay"] = $empay2[$x];
		$arr["pd2"][$i2]["lotDis"] = $emdis2[$x]."%";

		$i2++; 
	} 

	if($empay3[$x]>0){ 
		$arr["pd3"][$i3]["lotType"] = $lot_type[$lang_post][$zone][$x];
		$arr["pd3"][$i3]["lotPay"] = $empay3[$x];
		$arr["pd3"][$i3]["lotDis"] = $emdis3[$x]."%";

		$i3++; 
	} 
}


echo json_encode($arr);
?>