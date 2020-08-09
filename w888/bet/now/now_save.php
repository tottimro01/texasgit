<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
//Step & YODAY
require('../inc/conn.php');
require('../inc/function.php');


$url_file="sum.json";		
$date2_js=file_get_contents($url_file);
$date2_bet = json_decode($date2_js, true);
$sum_old=$date2_bet[0][sum];
#$sum_new=$sum_old+1;



$ct=date("Hi",$time_stam);
if($ct>1300 and $ct<2359){
#	if($sum_old>0){
httpGet($hostserver."now/save.php");

$jst1=array();
$jst1[]=array("sum"=>"0");
$txt44=json_encode($jst1);
write2($url_file ,$txt44,"w+"); 
echo 'SAVE='.date("d-m-Y Hi",$time_stam);
#	}
}


?>