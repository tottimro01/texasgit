<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
require("../../../inc/conn.php");
require('../../../inc/function.php');

require("../../../lang/".$_SESSION['lang'].".php");

if($_SESSION['mid']==""){  exit();}


if($_POST["all"]=="all" and $_POST["val"]==1){
	$_SESSION['lotset'] = "x1";
}else if($_POST["all"]=="all" and $_POST["val"]==10){
	$_SESSION['lotset'] = "x1,x2,x3,x4,x5,x6,x7,x8,x9,x10";
}else if($_POST["all"]=="all" and $_POST["val"]==20){
	$_SESSION['lotset'] = "x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12,x13,x14,x15,x16,x17,x18,x19,x20";
}else{
	
	$arr_seti1 = explode("," , $_SESSION['lotset']);
	if(count($arr_seti1)==1 and $arr_seti1[0]=="x".$_POST["val"]){
		echo "NO";
		exit();
	}

	$_SESSION['lotset'] = "";
	foreach ($arr_seti1 as &$value) {
		$value = substr($value , 1);
		if($_SESSION['lotset']==""){
			$_SESSION['lotset'] = $value;
		}else{
			$_SESSION['lotset'] .= ",".$value;
		}
	}


	$arr_seti = explode("," , $_SESSION['lotset']);
	$_SESSION['lotset'] = "";
	if(!in_array($_POST["val"], $arr_seti)){
		$arr_seti[] = $_POST["val"];
	}else{
		$indexCompleted = array_search($_POST["val"], $arr_seti);
		unset($arr_seti[$indexCompleted]);
	}
	sort($arr_seti);
//print_r($arr_seti);
	foreach ($arr_seti as &$value) {
		if($_SESSION['lotset']==""){
			$_SESSION['lotset'] = "x".$value;
		}else{
			$_SESSION['lotset'] .= ",x".$value;
		}
	}
}


?>
