<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
require('inc/conn.php');
require('inc/function.php');

if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}
$token = md5(uniqid(rand(),1));
$_SESSION['bettoken']=$token;
$fo="json/login/token_bet/".$_SESSION['m_id'].".php";
write($fo,'<? $bet_token="'.$token.'"; ?>',"w+"); 



$arson = array();

$ex_step2=explode(',',$_SESSION['m_step2']);
$mix_min=$ex_step2[0];
$mix_max=$ex_step2[1];

if($_POST["ty"]==1){
	$_SESSION["ttt"] = "";    
	$ar = $_REQUEST['ball'];
	$_SESSION["ttt"] =$ar;
	$ex = explode("," , $ar[0]);
#	echo $ex[0];
			$arson['type']=$ex[0];
			$arson['maxstep']=$mix_max;
			echo json_encode($arson);
		#	exit();
}else{
	$ns = 0;
	for($iy=0;$iy<count($_SESSION["ttt"]);$iy++){
		$Arb = explode("," , $_SESSION["ttt"][$iy]);
		if($Arb[0]!=""){
			$ns=$ns+1;
		}	
	}
	$aq =  $_SESSION["ttt"];
	$_SESSION["ttt"] = "";    
	$ar = $_REQUEST['ball'];
	$ex = explode("," , $ar[0]);
	if(count($aq)>0){
		$in_ar = 1;
		for($i=0;$i<count($aq);$i++){
			$ex2 = explode("," , $aq[$i]);
			if($ex[0]==$ex2[0]){
				$aq[$i] = $ar[0];
				$in_ar = 0;
				break;
			}
		}
	}else{
		$aq[0] = $ar[0];
	}
	if($in_ar==1){
		if($ns<$mix_max){
			$aq[] = $ar[0];
		}else{
			#echo "f";
			$_SESSION["ttt"] =$aq;
			$arson['type']="f";
			$arson['maxstep']=$mix_max;
			echo json_encode($arson);
			exit();
		}
	}
	$_SESSION["ttt"] =$aq;
#	echo $ex[0];
			$arson['type']=$ex[0];
			$arson['maxstep']=$mix_max;
			echo json_encode($arson);
	#	exit();
}




?>