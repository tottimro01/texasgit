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


$empay1=@explode(',',$re_m['m_lotto_pay1']); 
$emdis1=@explode(',',$re_m['m_lotto_dis1']); 

$empay2=@explode(',',$re_m['m_lotto_pay2']); 
$emdis2=@explode(',',$re_m['m_lotto_dis2']); 

$empay3=@explode(',',$re_m['m_lotto_pay3']); 
$emdis3=@explode(',',$re_m['m_lotto_dis3']); 



if($re_m[m_lotto_convert]==1 and $zone==1){
	for ($x=4;$x<=5;$x++){ 
	  	$arr["pd1"][$i1]["lotType"] = $lot_type[$lang_post][$zone][$x];
	  	$arr["pd1"][$i1]["lotPay"] = round((1000/$empay1[$x]) - ( (1000/$empay1[$x])*($emdis1[$x]/100)) , 2);
	  	$arr["pd1"][$i1]["lotBingo"] = "1,000";

	  	$arr["pd2"][$i2]["lotType"] = $lot_type[$lang_post][$zone][$x];
	  	$arr["pd2"][$i2]["lotPay"] = round((1000/$empay2[$x]) - ( (1000/$empay2[$x])*($emdis2[$x]/100)) , 2);
	  	$arr["pd2"][$i2]["lotBingo"] = "1,000";

	  	$arr["pd3"][$i3]["lotType"] = $lot_type[$lang_post][$zone][$x];
	  	$arr["pd3"][$i3]["lotPay"] = round((1000/$empay3[$x]) - ( (1000/$empay3[$x])*($emdis3[$x]/100)) , 2);
	  	$arr["pd3"][$i3]["lotBingo"] = "1,000";

	  	$i1++; 
	  	$i2++; 
	  	$i3++; 
	}
}


echo json_encode($arr);
?>