<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  header("content-type: application/x-javascript; charset=utf-8");
  
  
require('../inc/conn.php');
require('../inc/function.php');

if($_SESSION['lang']==""){
	$_SESSION['lang']="th";
}

// require("../lang/member_lang.php");
require('../lang/variable_lang.php');
require("../lang/function_array.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");

#if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}


  

	$log = array();  
  
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);

if($rec['con_open_games']==0){
#	echo'ปิดพนัน';
	$txt=$lang_member[306];
	$log["time1"] = $txt; 
	$log["time2"] = $txt; 
	$log["time3"] = $txt; 
	$log["time4"] = $txt; 
	$log["time5"] = $txt; 
	
	echo json_encode($log);
	
	exit();
}
	


$bet_time=$rec['con_time_games'];
$new_time=(40)-($time_stam-$bet_time);




if($new_time<=0){
	
	
	if($new_time<=0 and $new_time>=(-2) ){
	#echo'หมดเวลา';
	$txt=$lang_member[307];
	$log["time1"] = $txt; 
	$log["time2"] = $txt; 
	$log["time3"] = $txt; 
	$log["time4"] = $txt; 
	$log["time5"] = $txt; 
	
	echo json_encode($log);
	
	}else{
	#	echo'ออกผล';	
		#$txt='ออกผล';
	include("view_1.php");
	$log["time1"] = ''; 
	$log["time1a"] = $txt1a; 
	$log["time1b"] = $txt1b; 
	$log["time1c"] = $txt1c; 
	$log["time1d"] = $txt1d; 
	
	
	include("view_2.php");
	$log["time2"] = $txt2; 
	
	include("view_3.php");
	$log["time3"] = $txt3; 
	
	include("view_4.php");
	$log["time4"] = $txt4; 
	
	include("view_5.php");
	$log["time5"] = $txt; 
	$log["time5a"] = $txt5a; 
	$log["time5b"] = $txt5b; 
	
	
	echo json_encode($log);
	}
	

	
	}else{
	#echo $new_time;	
	$log["time1"] = $new_time; 
	$log["time2"] = $new_time; 
	$log["time3"] = $new_time; 
	$log["time4"] = $new_time; 
	$log["time5"] = $new_time; 
	
	$log["time1a"] = ''; 
	$log["time1b"] = ''; 
	$log["time1c"] = ''; 
	$log["time1d"] = ''; 
	
	$log["time5a"] = ''; 
	$log["time5b"] = ''; 
	
	echo json_encode($log);
}

?>