<?php
require('../inc/conn.php');
require('../inc/function.php');
if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}

  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  header("content-type: application/x-javascript; charset=utf-8");
  

	$log = array();  
  
$url_file="../games/json/bet_close.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_close=$date2_bet[0][con_bacara_close];

if($bet_close==0){
#	echo'ปิดพนัน';
	$txt='ปิดพนัน'.$bet_close;
	$log["time1"] = $txt; 
	$log["time2"] = $txt; 
	$log["time3"] = $txt; 
	$log["time4"] = $txt; 
	$log["time5"] = $txt; 
	
	echo json_encode($log);
	
	exit();
}
	
$url_file="../games/json/bet_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];


$url_file="../games/json/bet_time.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_time=$date2_bet[0][timex];
$new_time=(90)-(time()-$bet_time);




if($new_time<=0){
	
	
	if($new_time<=0 and $new_time>=(-2) ){
	#echo'หมดเวลา';
	$txt='หมดเวลา';
	$log["time1"] = $txt; 
	$log["time2"] = $txt; 
	$log["time3"] = $txt; 
	$log["time4"] = $txt; 
	$log["time5"] = $txt; 
	$log["bet_id"] = $bet_id; 
	$log["time1a"] = ''; 
	$log["time1b"] = ''; 
	$log["time1c"] = ''; 
	$log["time1d"] = ''; 
	
	$log["announced"] = 1;
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
	$log["bet_id"] = $bet_id; 
	$log["announced"] = 2;
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

	$log["bet_id"] = $bet_id; 
	$log["announced"] = 0;
	
	echo json_encode($log);
}

?>