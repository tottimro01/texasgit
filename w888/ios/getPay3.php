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
require("../lang/".$lang_post.".php");
require("../lang/function_".$lang_post."_new.php");
$mid = $_GET["mid"];
if($_GET[zone]==""){$_GET[zone]=1;}
if($_GET[rob]==""){$_GET[rob]=1;}
$zone=$_GET[zone];
$rob=$_GET[rob];
$arr = array();
$i=0;


if($zone==3){
	foreach($lang_g["setpay"] as $vx){
		$arr[$i]["setpay"] = $vx;
  		$arr[$i]["setwin"] = $lang_g["setwin"][$i];
		$i++;
	}

}


echo json_encode($arr);
?>