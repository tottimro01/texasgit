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
$i=0;


$sql             = "select * from bom_tb_member where m_id='$mid'";
$re_m            = sql_array($sql);

$empay1=@explode(',',$re_m['m_lotto_hun_set_pay']); 

if($zone==3){
	foreach($lang_g["setpay"] as $vx){
		if($empay1[$i+1]>0){
			$arr[$i]["setpay"] = $vx;
	  		$arr[$i]["setwin"] = $empay1[$i+1];
			$i++;
		}
	}

}


echo json_encode($arr);
?>