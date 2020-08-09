<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
//Step & YODAY
require('../inc/conn.php');
require('../inc/function.php');

$url_file="sum.json";		
$date2_js=file_get_contents($url_file);
$date2_bet = json_decode($date2_js, true);
$sum_old=$date2_bet[0][sum];



$ct=date("Hi",$time_stam);
if($ct>1300 and $ct<2359){
	#	if($sum_old>0){
 live_write("/");
echo 'NOW='.date("d-m-Y Hi",$time_stam);


#		}
}
?>