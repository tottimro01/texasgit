<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
/*
use ElephantIO\Client,
    ElephantIO\Engine\SocketIO\Version1X;
*/

header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);


$lang_post           = trim($_POST["lang"]);
if($lang_post==""){
	$lang_post = "th";
}


require('../../inc/conn.php');
require('../../inc/function.php');
$_SESSION['lang'] = $lang_post;
// require("../../lang/member_lang.php");
require("../../lang/variable_lang.php");
require("../../lang/function_array.php");



$mid           = trim($_POST["mid"]);
$bf            = trim($_POST["bf"]);
$lat           = trim($_POST["lat"]);
$lon           = trim($_POST["lon"]);
$strNum = trim($_POST["txt"]);
$lat = trim($_POST["lat"]);
$lon = trim($_POST["lon"]);
$_POST["zone"] = trim($_POST["zone"]);
$_POST["rob"]  = trim($_POST["rob"]);
$bill_cus_name = mysql_escape_mimic(trim($_POST['pname']));
$bill_no = trim($_POST['pid']);


	if($_POST["zone"]==1){
		include "save_lot_lotto.php";
	}else{
		include "save_lot_lothun.php";
	}


function factorial($n){
	$number = $n;
	$a = substr("$number", -3, 1);   
$b = substr("$number", -2, 1);   
$c = substr("$number", -1); 
	
	$ret = array();
	
	 $n1 = $a.$b.$c;
	 $ret[] = $n1;
	 $n2 = $a.$c.$b;
	 $ret[] = $n2;
	 $n3 = $b.$a.$c; 
	 $ret[] = $n3;
	 $n4 = $b.$c.$a; 
	 $ret[] = $n4;
	 $n5 = $c.$a.$b; 
	 $ret[] = $n5;
	 $n6 = $c.$b.$a; 
	 $ret[] = $n6;
	 
	return array_unique($ret);
}
?>
