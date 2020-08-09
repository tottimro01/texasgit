<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
date_default_timezone_set("Asia/Bangkok");
$timezone=0;
$time_stam=mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y"));


#include "../inc/connx.php";
include "../inc/function.php";
$part = "sma_api/";
$partAdmin = "http://ok.btstep.com/";
$agent_id = "3";
$check_url="7-11sport.com";
$web_server="http://ok.btstep.com/api/";

$url_real = $_SERVER['SERVER_NAME'];

$myWeb = str_replace("www." , "" , $url_real);




$arr_bank = array(1=> "กสิกรไทย" , "ไทยพาณิชย์" , "กรุงเทพ" , "กรุงไทย"  ,"ทหารไทย"  , "กรุงศรีอยุธยา");
$arr_how = array(1=> "ATM1" , "ATM2" , "ATM3" , "ATM4"  ,"ATM5"  , "ATM6");



if($agent_id==""){
	exit();
}

if($_SESSION["mid"]!=""){

	$d_js=file_get_contents2($web_server."get_member.php?mid=".$_SESSION["memid"]);
	$rs_mem = json_decode($d_js, true);

}

/*
$arr_game = array();
$sql_game = sql_query("select * from tb_game order by game_id");
while($rs_game=sql_fetch($sql_game)){
	$arr_game[] = $rs_game;
}
*/
$d_js=file_get_contents2($web_server."json/tb_game.json");
$arr_game = json_decode($d_js, true);
	/*
$arr_game2 = array();
$sql_game2 = sql_query("select * from tb_game order by game_id");
while($rs_game2=sql_fetch($sql_game2)){
	$arr_game2[$rs_game2["game_id"]] = $rs_game2;
}
*/
$d_js=file_get_contents2($web_server."json/tb_game2.json");
$arr_game2 = json_decode($d_js, true);


$arr_game2[99]["game_name"] = "กระเป๋า";





?>