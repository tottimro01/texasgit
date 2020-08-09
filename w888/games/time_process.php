<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header("Pragma-directive: no-cache");
header("Cache-directive: no-cache");
header("Cache-control: no-cache");
header("Pragma: no-cache");
header("Expires: 0");
	

if($_SESSION['lang']==""){
	$_SESSION['lang']="th";
}	

require('../inc/conn.php');
require('../inc/function.php');
require('function.php');

// require("../lang/member_lang.php");
require('../lang/variable_lang.php');
require("../lang/function_array.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");

#if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}


  


$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);

if($rec['con_open_games']==0){
	echo $lang_member[306];
	exit();
}
	
/*
$url_file="json/bet_time.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
*/
$bet_time=$rec['con_time_games'];
$new_time=(40)-($time_stam-$bet_time);



if($new_time<=0){
	
	if($new_time<=0 and $new_time>=(-2) ){
	echo $lang_member[307];
	}else{
		echo $lang_member[308];	
	}
	

	
	if($new_time==(-1)){
/*
$url_file="json/bet_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
*/
$bet_id=$rec['con_id_games'];
		
	include("process_1.php");
	include("process_2.php");
	include("process_3.php");
	include("process_4.php");
	include("process_5.php");
	}
	
	
		if($new_time<(-20)){
	include("ok_new.php");
		}
	
	}else{
	echo $new_time;	
	
/*	
$url_file="json/bet_close_fake.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_close=$date2_bet[0][con_fake_close];
if($bet_close==1){
	if(($new_time%2)==0){
		if($new_time<=60){
include("fake_auto.php");
		}
	}
}
*/
}

?>