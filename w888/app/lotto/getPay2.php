<?
session_start();
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
require('../../inc/conn.php');
require('../../inc/function.php');
//include("../process/num_limit.php");  
$lang_post           = trim($_GET["lang"]);
if($lang_post==""){
	$lang_post = "th";
}
$_SESSION['lang'] = $lang_post;
// require("../../lang/member_lang.php");
require("../../lang/variable_lang.php");
require("../../lang/function_array.php");

$mid = $_GET["mid"];
if($_GET[zone]==""){$_GET[zone]=1;}
if($_GET[rob]==""){$_GET[rob]=1;}
$zone=$_GET[zone];
$rob=$_GET[rob];
$arr = array();
$i=0;

$sql             = "select * from bom_tb_member where m_id='$mid'";
$re_m            = sql_array($sql);

$url_file="../../json/config/member/LottoConfig_".$mid.".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode2($lot6_js, true);

$empay=@explode(',',$lot_m['m_lotto_pay_member']); 
$emdis=@explode(',',$lot_m['m_lotto_dis_member']); 


if($re_m[m_bet_tou]==1 and $zone==1){

	
  	$arr[$i]["lotType"] = $lot_type[$lang_post][$zone][4];
  	$arr[$i]["lotPay"] = round((1000/$empay[4]) - ( (1000/$empay[4])*($emdis[4]/100)) , 2);
  	$arr[$i]["lotBingo"] = "1,000";

}


echo json_encode($arr);
?>