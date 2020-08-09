<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require("lang/variable_lang.php");
// require("lang/member_lang.php");

require('inc/conn.php');
include "game/function.php";
?>
<?
$_SESSION['mmin'] = 20;
$_SESSION['mmax'] = 100000;
$_SESSION['mxmax'] = 1000000;

unset($_SESSION['hilo_ok']); 
unset($_SESSION['fish_ok']); 



$re_m = sql_array("select * from bom_tb_member where m_id = '".$_SESSION['m_id']."'");

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?=$lang_member[37];?></title>
<link rel="stylesheet" type="text/css" href="css/style.css?v=2019">
<style>
#menu_lotto {
	width: 100%;
	height: 33px;
	background: #fff;
	box-shadow: #000 0px 2px 5px;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	overflow: hidden;
	position:relative;
	z-index:2;
}
#menu_lotto a {
	text-decoration: none;
	color: #6A4806;
	font-weight:bold;
	cursor:pointer;
}
#lotto_content {
	width:100%;
	background:#FFF;
}
.tb_title_lotto {
	background-image: linear-gradient(top, #d9a52e,  #8b691c);
	background-image: -moz-linear-gradient(top, #d9a52e, #8b691c);
	background-image: -webkit-linear-gradient(top, #d9a52e, #8b691c);
	background-image: -o-linear-gradient(top, #d9a52e, #8b691c);
	background-image: -ms-linear-gradient(top, #d9a52e, #8b691c);
	font-size: 12px;
	  color: #fff;
	  font-weight: bold;
	  text-shadow: 1px 1px 1px #000;
}
.input{
  font-size: 10pt;
  font-style: normal;
  font-weight: normal;
  height: 18px;
  color: #000000;
}
.txt_red12b {
  font-size: 12px;
  font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif;
  color: #b50000;
  font-weight: bold;
}
.txt_back11b {
  font-size: 11px;
  font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif;
  color: #000000;
  font-weight: bold;
}
.txt_blue11b {
  font-size: 11px;
  font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif;
  color: #0000ff;
  font-weight: bold;
}
.txt_blue12ntitle {
  font-size: 12px;
  font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif;
  color: #0000ff;
  text-shadow: 1px 1px 1px #cccccc;
}
.txt_white12btitle {
  font-size: 12px;
  color: #fff;
  font-weight: bold;
  text-shadow: 1px 1px 1px #000;
}
.txt_center12b {
  font-size: 12px;
  color: #333333;
  font-weight: bold;
  text-align: center;
  text-shadow: 1px 1px 1px #ffffff;
}
.txt_center12br {
  font-size: 12px;
  color: #333333;
  font-weight: bold;
  text-align: center;
  background-color: #eeeeee;
  text-shadow: 1px 1px 1px #ffffff;
}
.txt_center12n {
  font-size: 12px;
  color: #333333;
  text-align: center;
  text-shadow: 1px 1px 1px #ffffff;
  height:18px;
}
.txt_blue12n {
  font-size: 12px;
  font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif;
  color: #0000ff;
}
.txt_disabled {
  font-size: 12px;
  color: #8C8C8C;
  text-shadow: 1px 1px 1px #FFFFFF;
  text-align: center;
  background-color: #cccccc;
  text-shadow: 1px 1px 1px #cccccc;
}
.tr_lot:nth-child(even) {
  background: #fff7d9;
}
.tr_lot:nth-child(odd) {
  background: white;
}
.mlotto {
	background-image:url(img/bg_menu.gif);
	background-position: 50% 50%;
}
.mlotto:hover {
	background-image: url(img/bg_menu_over.gif); 
}
.mactive {
	background-image: url(img/bg_menu_over.gif); 
}
.cr {
	color:#F00;
}
</style>
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<script src="js/jquery-1.9.1.min.js?v=2019"></script>
<script>
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
});
function to_width(ty){
	if(ty==1){
		$("#main_left").width(975);
	}else{
		$("#main_left").width(770);
	}
}
function addCommas(nStr){
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1].substr(0,2) : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
function TrimComma(currentTags) {  
	var currentTagTokens = currentTags.split(",");
	var existingTags = "";

	for ( var i = 0; i < currentTagTokens.length; i++ ) { 
		existingTags = existingTags + currentTagTokens[i];
	}
	return existingTags;
}
</script>
<script type="application/javascript">
function _bet(val){
	var ck=  $( "#bet_time" ).html();
	if(ck!="<?=$lang_member[307];?>" && ck!="<?=$lang_member[306];?>"){
	 //$("#cion_bet").load('bacarat/cion_bet.php',{"ok":val});

	 $("#box_bet",window.parent.frames["leftx"].document).load('bacarat/cion_bet.php',{"ok":val});


	}
	}
function _bet2(val,ty){
	var ck=  $( "#bet_time2" ).html();
	if(ck!="<?=$lang_member[307];?>" && ck!="<?=$lang_member[306];?>"){
	 //$("#cion_bet2").load('hilo/cion_bet.php',{"ok":val,"ty":ty});
	  $("#box_bet",window.parent.frames["leftx"].document).load('hilo/cion_bet.php',{"ok":val,"ty":ty});
	}
	}
function _bet3(val){
	var ck=  $( "#bet_time3" ).html();
	if(ck!="<?=$lang_member[307];?>" && ck!="<?=$lang_member[306];?>"){
	 //$("#cion_bet3").load('fish/cion_bet.php',{"ok":val});
	 $("#box_bet",window.parent.frames["leftx"].document).load('fish/cion_bet.php',{"ok":val});
	}
	}
 $(document).ready(function() {
	 
  $("#bet_time").load('bacarat/time.php');
   $("#bet_time_new").load('bacarat/time_new.php');
   
   $("#bet_time2").load('hilo/time.php');
   $("#bet_time_new2").load('hilo/time_new.php');
   
   $("#bet_time3").load('fish/time.php');
   $("#bet_time_new3").load('fish/time_new.php');
   
   
   $("#player_view").load('bacarat/bet_ok.php',{"type":"p"});
    $("#banker_view").load('bacarat/bet_ok.php',{"type":"b"});
	
	$("#result_hilo").load('hilo/bet_ok.php',{"type":"hl"});
	
	$("#result_fish").load('fish/bet_ok.php',{"type":"hl"});
	
   var refreshId = setInterval(function() {
  $("#bet_time").load('bacarat/time.php');
   $("#bet_time_new").load('bacarat/time_new.php');
   
   $("#bet_time2").load('hilo/time.php');
   $("#bet_time_new2").load('hilo/time_new.php');
   
   $("#bet_time3").load('fish/time.php');
   $("#bet_time_new3").load('fish/time_new.php');
   

   $("#player_view").load('bacarat/bet_ok.php',{"type":"p"});
    $("#banker_view").load('bacarat/bet_ok.php',{"type":"b"});
	$("#view_count").load('bacarat/bet_count.php');
	
	$("#result_hilo").load('hilo/bet_ok.php',{"type":"hl"});
	$("#view_count2").load('hilo/bet_count.php');
	
	$("#result_fish").load('fish/bet_ok.php',{"type":"hl"});
	$("#view_count3").load('fish/bet_count.php');
	
   }, 1000);
   $.ajaxSetup({ cache: false });
   

   
   

});

function _vvxx(){
	 $(document).ready(function() {
		  $("#list_bet-bacara",window.parent.frames["leftx"].document).load("bacarat/view_last.php");
		  $("#my_count , #my_count2 , #my_count3").load("bacarat/my_count.php");
		  $("#bet_idx").load('bacarat/bet_id.php');
		 });
	}
function _vvxx2(){
	 $(document).ready(function() {
		 $("#list_bet-hilo",window.parent.frames["leftx"].document).load("hilo/view_last.php");
		  $("#my_count , #my_count2 , #my_count3").load("bacarat/my_count.php");
		  $("#bet_idx2").load('hilo/bet_id.php');
		 });
	}
function _vvxx3(){
	 $(document).ready(function() {
		  $("#list_bet-fish",window.parent.frames["leftx"].document).load("fish/view_last.php");
		  $("#my_count , #my_count2 , #my_count3").load("bacarat/my_count.php");
		  $("#bet_idx3").load('fish/bet_id.php');
		 });
	}
_vvxx();
_vvxx2();
_vvxx3();
</script>
</head>

<body>
<div id="main_left">
<div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[37];?></span>
  </div>

<?
	include "game/bacarat.php";
?>
<br>
<?
	include "game/hilo.php";
?>
<br>
<?
	include "game/fish.php";
?>
<br>


</div>
</body>
</html>