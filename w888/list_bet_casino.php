<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');


// require("lang/member_lang.php");
require("lang/variable_lang.php");
require("lang/function_array.php");

$rec = sql_array("select * from bom_tb_config where con_id = 1;");

if($rec["con_open_casino"]==0){ 
  include 'sa_close.php'; 
  exit(); 
} 

foreach($_SESSION['arid'] as $rid){

  $r_open_page = explode(",", $_SESSION['ardata'][$rid]["r_open"]);
  
  if($r_open_page[12]==0){ 
    include 'ag_close.php'; 
    exit(); 
  } 
}

$m_open_page = explode(",", $_SESSION["m1"]["m_open"]);

if($m_open_page[12]==0){ 
  include 'ag_close.php'; 
  exit(); 
} 



$d_from = ($_GET["d_from"] != "") ? $_GET["d_from"] : date("d/m/Y");
$hr_from = ($_GET["datepicker_from_hr"] != "") ? $_GET["datepicker_from_hr"] : "11";
$mn_from = ($_GET["datepicker_from_mn"] != "") ? $_GET["datepicker_from_mn"] : "00";

#$d_to = ($_GET["d_to"] != "") ? $_GET["d_to"] : date("d/m/Y");
$ex1=@explode('/',$d_from);
$mk1=mktime(0,0,0,$ex1[1],$ex1[0]+1,$ex1[2]);
$d_to = date("d/m/Y",$mk1);
###################################
$hr_to = ($_GET["datepicker_to_hr"] != "") ? $_GET["datepicker_to_hr"] : "10";
$mn_to = ($_GET["datepicker_to_mn"] != "") ? $_GET["datepicker_to_mn"] : "59";

$btn_s = $_GET["btn_s"];

if($btn_s==1){
	##############################วันนี้
if(date("H")>11){
	###########เกิน 11.00
$d_from = date("d/m/Y");
$hr_from = "11";
$mn_from = "00";
  	
$d_to = date("d/m/Y");	
$hr_to = date("H");
$mn_to = date("i");
	}else{

$d_to = date("d/m/Y");	
$hr_to = date("H");
$mn_to = date("i");

$ex1=@explode('/',$d_to);
$mk1=mktime(0,0,0,$ex1[1],$ex1[0]-1,$ex1[2]);
$d_from = date("d/m/Y", $mk1);
###################################
$hr_from = "11";
$mn_from = "00";
  
	}

  
}else if($btn_s==2){
	
	
	##############################เมื่อวาน
if(date("H")>11){
	###########เกิน 11.00
 $d_from = date("d/m/Y" , strtotime("-1 day"));
$hr_from = "11";
$mn_from = "00";
  	
$ex1=@explode('/',$d_from);
$mk1=mktime(0,0,0,$ex1[1],$ex1[0]+1,$ex1[2]);
$d_to = date("d/m/Y", $mk1);
###################################
$hr_to ="10";
$mn_to = "59";

	}else{

	###########เกิน 11.00
$d_from = date("d/m/Y" , strtotime("-2 day"));
$hr_from = "11";
$mn_from = "00";
  	
$ex1=@explode('/',$d_from);
$mk1=mktime(0,0,0,$ex1[1],$ex1[0]+1,$ex1[2]);
$d_to = date("d/m/Y", $mk1);
###################################
$hr_to ="10";
$mn_to = "59";
  
	}
	
	

}else if($btn_s==3){
	
$date_x=date("D");   

################วันจันทร์
if($date_x=="Mon"){
	
$d_from =date("d/m/Y", strtotime('tuesday last week'));		
$hr_from = "11";
$mn_from = "00";		

$d_to = date("d/m/Y");	
$hr_to = date("H");
$mn_to = date("i");
	
}elseif($date_x=="Tue"){
	##################วันตัดยอด
	
if(date("H")>11){
	###########เกิน 11.00
$d_from =date("d/m/Y", strtotime('tuesday last week'));		
$hr_from = "11";
$mn_from = "00";		

$d_to = date("d/m/Y");	
$hr_to ="10";
$mn_to = "59";

	
}else{#if(date("H")>11){
	
$d_from =date("d/m/Y", strtotime('tuesday last week'));		
$hr_from = "11";
$mn_from = "00";		

$d_to = date("d/m/Y");	
$hr_to = date("H");
$mn_to = date("i");
	
	}#if(date("H")>11){
	
}else{
		
$d_from =date("d/m/Y", strtotime('tuesday this week'));		
$hr_from = "11";
$mn_from = "00";		

$d_to = date("d/m/Y");	
$hr_to = date("H");
$mn_to = date("i");
		
		}


}else if($btn_s==4){

$date_x=date("D");   	

################วันจันทร์
if($date_x=="Mon" or $date_x=="Tue"){
	
$d_from=date("d/m/Y", strtotime('-1 tuesday last week'));   
$hr_from = "11";
$mn_from = "00";

$ex1=@explode('/',$d_from);
$mk1=mktime(0,0,0,$ex1[1],$ex1[0]+7,$ex1[2]);
$d_to = date("d/m/Y", $mk1);
###################################
$hr_to ="10";
$mn_to = "59";	

	}else{
	
$d_from=date("d/m/Y", strtotime('tuesday last week'));   
$hr_from = "11";
$mn_from = "00";

$ex1=@explode('/',$d_from);
$mk1=mktime(0,0,0,$ex1[1],$ex1[0]+7,$ex1[2]);
$d_to = date("d/m/Y", $mk1);
###################################
$hr_to ="10";
$mn_to = "59";
	}

}

$d = explode("/",$d_from);
$res_date_from = $d[2]."-".$d[1]."-".$d[0];
$d = explode("/",$d_to);
$res_date_to = $d[2]."-".$d[1]."-".$d[0];


$s_from = strtotime($res_date_from." ".$hr_from.":".$mn_from);
$s_to = strtotime($res_date_to." ".$hr_to.":".$mn_to);


?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE><?=$app_name;?></TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">
<!-- <link rel="stylesheet" href="css/m_lothun.css?v=<?=$time_stam;?>"> -->
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<style>
/*#menu_lotto {
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
  	font-size: 12px;
}
#lotto_content {
	width:100%;
	background:#FFF;
}*/
.tb_title_lotto {
/*	background-image: linear-gradient(top, #d9a52e,  #8b691c);
	background-image: -moz-linear-gradient(top, #d9a52e, #8b691c);
	background-image: -webkit-linear-gradient(top, #d9a52e, #8b691c);
	background-image: -o-linear-gradient(top, #d9a52e, #8b691c);
	background-image: -ms-linear-gradient(top, #d9a52e, #8b691c);
	font-size: 12px;
	color: #fff;
	font-weight: bold;
	text-shadow: 1px 1px 1px #000;*/
  height: 25px;
}
/*.tb_title_set {
 	background-image: linear-gradient(top, #d92e37,  #8b1c22);
 	background-image: -moz-linear-gradient(top, #d92e37, #8b1c22);
 	background-image: -webkit-linear-gradient(top, #d92e37, #8b1c22);
 	background-image: -o-linear-gradient(top, #d92e37, #8b1c22);
 	background-image: -ms-linear-gradient(top, #d92e37, #8b1c22);
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
	width: 100%;
  font-size: 12px;
  color: #333333;
  font-weight: bold;
  text-align: center;
  background-color: #eeeeee;
  text-shadow: 1px 1px 1px #ffffff;
}
.txt_center12n {
	width: 100%;
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
	width: 100%;
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
.bg_td {
}

*/







/*
  .ui-datepicker-trigger {
     vertical-align: top !important;
     cursor:pointer;
   }
.txtq2 {
  color: #000;
  border: 1px #8b691c solid;
  font-size: 11px;
  text-align: center;
  padding: 3px;
}
.txt_white12btitle {
  font-size: 12px;
  color: #fff;
  font-weight: bold;
  text-shadow: 1px 1px 1px #000;
}
.tb_title_lotto {
  background-image: linear-gradient(top, #daad29, #8b691c);
  background-image: -moz-linear-gradient(top, #daad29, #8b691c);
  background-image: -webkit-linear-gradient(top, #daad29, #8b691c);
  background-image: -o-linear-gradient(top, #daad29, #8b691c);
  background-image: -ms-linear-gradient(top, #daad29, #8b691c);
  font-size: 13px;
    color: #fff;
    text-shadow: 1px 1px 1px #000;
        border: 1px solid #bbbbbb;
    border-top-style: hidden;
}

.tb_title_lotto td {
    border: 1px solid #bbbbbb;
}

     .res_date_form {
  max-width: none;
  display: flex;
}


.res_date_form button.calendar {
  background-color: #ffffff;
  border: 1px solid #8b691c;
  border-right: 0;
  height: 28px;
  cursor: pointer;
}

.res_date_form button.calendar img {
    height: 18px;
}

.res_date_form input[type="text"] {
  flex: 1;
  border: 1px solid #8b691c;
  height: 26px;
  padding: 0 6px;
  max-width: 130px;
  text-align: center;
}

.res_date_form input[type="button"],
.res_date_form input[type="submit"] {
  border: 1px solid;
  border-left: 0;
  height: 28px;
  min-width: 70px;

    font-size: 12px;
    color: #fff;
    font-weight: bold;
    text-shadow: 1px 1px 1px #000;
    cursor: pointer;
        padding: 0 14px;
}

.dSearch {
  background-color: #8b691c;
  border-color: #8b691c!important;
    background-image: -moz-linear-gradient(top, #d9a52e, #8b691c);
    background-image: -webkit-linear-gradient(top, #d9a52e, #8b691c);
    background-image: -o-linear-gradient(top, #d9a52e, #8b691c);
    background-image: -ms-linear-gradient(top, #d9a52e, #8b691c);
}

.dToday {
  background-color: #4CAF50;
  border-color: #2E7D32!important;
    background-image: -moz-linear-gradient(top, #4CAF50, #2e7d32);
    background-image: -webkit-linear-gradient(top, #4CAF50, #2e7d32);
    background-image: -o-linear-gradient(top, #4CAF50, #2e7d32);
    background-image: -ms-linear-gradient(top, #4CAF50, #2e7d32);
}

.dYesterday {
  background-color: #FF9800;
  border-color: #EF6C00!important;
      background-image: -moz-linear-gradient(top, #FF9800, #EF6C00);
    background-image: -webkit-linear-gradient(top, #FF9800, #EF6C00);
    background-image: -o-linear-gradient(top, #FF9800, #EF6C00);
    background-image: -ms-linear-gradient(top, #FF9800, #EF6C00);
}*/

/*.dWeek {
  background-color: #1976D2;
  border-color: #1565C0!important;
      background-image: -moz-linear-gradient(top, #42A5F5, #1976D2);
    background-image: -webkit-linear-gradient(top, #42A5F5, #1976D2);
    background-image: -o-linear-gradient(top, #42A5F5, #1976D2);
    background-image: -ms-linear-gradient(top, #42A5F5, #1976D2);
}

.dLastWeek {
  background-color: #C62828;
  border-color: #C62828!important;
      background-image: -moz-linear-gradient(top, #ec776e, #C62828);
    background-image: -webkit-linear-gradient(top, #ec776e, #C62828);
    background-image: -o-linear-gradient(top, #ec776e, #C62828);
    background-image: -ms-linear-gradient(top, #ec776e, #C62828);
}

.res_label{
  min-width: 50px;
  margin-right: 4px;
  display: inline-block;
  color: #333;
  text-shadow: none;
  line-height: 28px;
}
.dd{
  font-weight: normal;
}
.dd .ddChild li.hover,
.dd .ddChild li.selected{
  border-radius: 0;
}
select.txtq2 {
    min-width: 130px;
}*/
	.trans_history tbody td {
    color: #000;
		text-align: center;
		font-size: 12px;
		padding: 5px;
}
	.trans_history table td {
    padding: 8px 10px;
		    text-align: center;
}
	.trans_history h3 {
  padding-bottom: 10px;
  margin-bottom: 10px;
  border-bottom: 1px #333 solid; }
.trans_history .con {
  width: 1250px;
  height: 720px;
  position: relative;
  border-bottom: 1px #2b2b2b solid;
  overflow: hidden; }
.trans_history .close {
  display: block;
  width: 18px;
  height: 18px;
  position: absolute;
  top: 10px;
  right: 0px;
  background: url(../../images/player/icon_close.png) center center no-repeat; }
.trans_history .seach_day {
  color: #ccc;
  font-size: 13px;
  margin-bottom: 10px; }
.trans_history .seach_day li {
  margin-right: 10px; }
.trans_history .seach_day input {
  width: 100px;
  background: #000;
  color: #fff;
  cursor: pointer;
  border: 1px #909090 solid;
  height: 30px;
  padding: 0 8px; }
.trans_history .seach_day input:hover {
  border: 1px #CE9500 solid; }
.trans_history .seach_day .btn, .trans_history .seach_day .quick_btn {
  color: #000;
  font-size: 14px;
  background: linear-gradient(0deg, #CE9500 0%, #FFC300 100%);
  border: 1px #000 solid; }
.trans_history .seach_day .quick_btn {
  color: #333;
  background: linear-gradient(-180deg, #FFFFFF 0%, #E1E1E1 100%); }
.trans_history table {
  width: calc(100% - 12px);
  font-size: 13px; }



.trans_history tbody a {
  display: block;
  width: 20px;
  height: 20px;
  background: url(../../images/player/icon_play.png) center center no-repeat;
  margin: 0 auto; }
.trans_history tbody a:hover {
  background-image: url(../../images/player/icon_play_hover.png); }
.trans_history tbody .banker {
  color: #F10C0C; }
.trans_history tbody .player, .trans_history tbody .card_zone .banker, .card_zone .trans_history tbody .banker {
  color: #4694DE; }
.trans_history tbody .tie {
  color: #8ECB34; }
.trans_history tbody .other {
  color: #B8AB83; }
.trans_history tbody .negative {
  color: #F10C0C; }
.trans_history tbody .bet span {
  display: inline-block;
  padding: 3px;
  border-radius: 2px;
  background: #ffbc00;
  color: #000;
  font-size: 10px;
  margin-left: 10px; }
.trans_history tbody .bet p {
  width: 18px;
  height: 18px;
  background: url(../../images/player/icon_more.svg) no-repeat;
  background-size: 100% 100%;
  display: block; }
.trans_history tbody .bet p.now {
  background: url(../../images/player/icon_more_now.svg) no-repeat;
  background-size: 100% 100%; }
.trans_history tbody .del {
  color: #9a9a9a;
  background: url(../../images/player/del_bg.png) left center repeat-x; }
.trans_history tbody .del span {
  background: #4a4a4a;
  color: #9e9e9e; }
.trans_history tbody .layer2 td {
  background-color: #3c382f;
  border-bottom: 1px #000 solid;
  color: #ada89a; }
.trans_history .video {
  width: 1000px;
  background: #131313;
  position: absolute;
  z-index: 300; }
.trans_history .video .video_con {
  width: 100%;
  height: 629px;
  background: #000;
  clear: both; }
.trans_history .video a {
  display: block;
  width: 25px;
  height: 25px;
  margin: 5px 0;
  background: url(../../images/player/icon_close.png) center center no-repeat; }

.bet_win
{
  color: #3979b9!important;
}
.bet_draw
{
  color: #8ebb56!important;
}
.bet_lose
{
  color: #983230!important;
}

</style>
<script src="js/jquery-1.9.1.min.js?v=2019"></script>
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script src="js/countdown_<?=$_SESSION['lang'];?>.js" type="text/javascript"></script>

<script src="jsui/jquery-ui_<?=$_SESSION['lang'];?>.js?v=2019"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link href="jsui/jquery-ui-custom.css" rel="stylesheet">

<script src="js/datepicker_lang/datepicker_<?=$_SESSION['lang'];?>.js"></script>

 <script src="js/msDropdown/jquery.dd.min.js"></script>
  <link rel="stylesheet" href="js/msDropdown/dd.css" />


 <script src="js/msDropdown/jquery.dd.min.js"></script>
  <link rel="stylesheet" href="js/msDropdown/dd.css" />
</head>
<body>
<!-- 	<div id="main_left">
  <div id="menu_lotto">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
      <tbody>
        <tr align="center" height="32">
          <td class="mlotto" align="center"><a onClick="#">xxxxxx</a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          <td class="mlotto" align="center"><a onClick="#">xxxxxx</a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          <td class="mlotto" align="center"><a onClick="#">xxxxxx</a></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div id="lotto_content">
  
  </div>
</div> -->

<?
$rec = sql_array("select * from bom_tb_config where con_id = 1;");

?>
<? if($rec["con_open_casino"]==0){  include 'sa_close.php'; exit(); } ?>
<?

foreach($_SESSION['arid'] as $rid){

  $r_open_page = explode(",", $_SESSION['ardata'][$rid]["r_open"]);
  
  if($r_open_page[12]==0){ 
   include 'ag_close.php'; 
    exit(); 
  } 
}

$m_open_page = explode(",", $_SESSION["m1"]["m_open"]);

if($m_open_page[12]==0){ 
  include 'ag_close.php'; 
  exit(); 
} 
/*
   $jsop_ag = explode(",", $_SESSION['m_open']);
   if(
   $jsop_ag[12]==0){ include 'ag_close.php'; exit(); 
   }
   */
  ?>
<div id="main_left" style="width: 780px; margin-bottom: 10px;">
  <div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[43]?></span>
  </div>
<form action="" method="get" >
  <table width="100%" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #8b691c; border-bottom: none;color: #fff; font-weight: bold;
    text-shadow: 1px 1px 1px #000; border: 1px solid #bbbbbb; background-color: #ededed; font-size: 12px; box-sizing: content-box;">
  <tr>
    <td align="left" class="res_date_form">
      <span class="res_label">From :</span>
      <button class="calendar" onclick="$('#datepicker_from').focus(); return false;">
      <span><img src="img/calendar.png" alt=""></span>
      </button>
      <input type="text" id="datepicker_from" name="d_from" style="width: 100px;" >
      &nbsp;&nbsp;

      <select name="datepicker_from_hr" id="datepicker_from_hr" class="txtq2 dd" onChange="" style="width: 50px;">
        <? for($x=0;$x<24;$x++){ ?>
        <option value="<?=$x;?>" <? if($x==$hr_from){ echo "selected"; } ?>><?=sprintf("%02d",$x);?></option>
        <? } ?>
      </select>
      &nbsp;&nbsp;

      <select name="datepicker_from_mn" id="datepicker_from_mn" class="txtq2" onChange="" style="width: 50px;">
        <? for($x=0;$x<60;$x++){ ?>
        <option value="<?=$x;?>" <? if($x==$mn_from){ echo "selected"; } ?>><?=sprintf("%02d",$x);?></option>
        <? } ?>
      </select>
      &nbsp;&nbsp;

      <span class="res_label">To :</span>
      <button class="calendar" onclick="$('#datepicker_to').focus(); return false;">
      <span><img src="img/calendar.png" alt=""></span>
      </button>
      <input type="text" id="datepicker_to" name="d_to" style="width: 100px;" >
      &nbsp;&nbsp;
      
      <select name="datepicker_to_hr" id="datepicker_to_hr" class="txtq2 dd" onChange="" style="width: 50px;">
        <? for($x=0;$x<24;$x++){ ?>
        <option value="<?=$x;?>" <? if($x==$hr_to){ echo "selected"; } ?>><?=sprintf("%02d",$x);?></option>
        <? } ?>
      </select>
      &nbsp;&nbsp;

      <select name="datepicker_to_mn" id="datepicker_to_mn" class="txtq2" onChange="" style="width: 50px;">
        <? for($x=0;$x<60;$x++){ ?>
        <option value="<?=$x;?>" <? if($x==$mn_to){ echo "selected"; } ?>><?=sprintf("%02d",$x);?></option>
        <? } ?>
      </select>
      &nbsp;&nbsp;

      <input type="submit" value="<?=$lang_member[293]?>" class="dSearch" style="border-left: 1px solid #8b691c;">
    </td>
  </tr>
  <tr>
    <td align="left" class="res_date_form">
  <input type="button" value="<?=$lang_member[887]?>"  name="today"      class="dToday" style="margin-left: 6px; border-left: 1px solid #8b691c;" onclick="window.location.href='list_bet_casino.php?btn_s=1'">
  <input type="button" value="<?=$lang_member[1438]?>" name="yesterday"   class="dYesterday" style="margin-left: 6px; border-left: 1px solid #8b691c;" onclick="window.location.href='list_bet_casino.php?btn_s=2'">
  <input type="button" value="<?=$lang_member[1550]?>"  name="week"      class="dWeek" style="margin-left: 6px; border-left: 1px solid #8b691c;" onclick="window.location.href='list_bet_casino.php?btn_s=3'">
  <input type="button" value="<?=$lang_member[1551]?>" name="last_week"   class="dLastWeek" style="margin-left: 6px; border-left: 1px solid #8b691c;" onclick="window.location.href='list_bet_casino.php?btn_s=4'">
    
    
    </td>
    
    </tr>
</table>


<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="" style="border-collapse: collapse;" class="trans_history oho_tb">
<thead>
  <tr align="center" class="tb_title_lotto">
    <td align="center"><?=$lang_member[647]?></td>
    <td align="center"><?=$lang_member[303]?></td>
    <td align="center"><?=$lang_member[1546]?></td>
    <td align="center"><?=$lang_member[1547]?></td>
    <td align="center"><?=$lang_member[559]?></td>
    <td align="center"><?=$lang_member[780]."/".$lang_member[783]?></td>
    <td align="center"><?=$lang_member[1549]?></td>

  </tr>
</thead>
	<tbody id="transHistoryTBody">
    <? 

$sum_total = 0;
$sum_bonus = 0;

 	$sql="select * from bom_tb_casino_bill_play_live where m_id='$_SESSION[m_id]' and play_timestam between $s_from and $s_to order by play_timestam desc";
	$re=sql_query($sql);
	while($rs=sql_fetch($re)){
    ?>
		<tr id="transTemplate" style="" class="tb_ball">
							<td><?=$rs["bet_id"];?></td>
							<td><?=date("d/m/Y H:i:s",$rs["play_timestam"]);?></td>
							<td><?=$rs["casino_table"];?></td>
							<td><?=$casino_zone[$rs["casino_zone"]];?></td>
							
							<td><?=number_format($rs["b_total"]);?></td>
                            <? 
							$bo=_cbonus($rs["b_total"] , $rs["b_bonus"]  , $rs["play_status"] );
							?>
							<td class="<?=$bo["color"];?>"><?=($bo["count"]<0 ? "(" : "")?><?=number_format($bo["count"] , 2);?><?=($bo["count"]<0 ? ")" : "")?></td>
							<td class="<?=$casino_status_color[$rs["play_status"]];?>"><?=$casino_status[$rs["play_status"]];?></td>
						</tr>
<? 
$sum_total = $sum_total+$rs["b_total"];
$sum_bonus = $sum_bonus+$bo["count"];
}

  $sql="select * from bom_tb_casino_bill_play where m_id='$_SESSION[m_id]' and play_timestam between $s_from and $s_to order by play_timestam desc";
  $re=sql_query($sql);
  while($rs=sql_fetch($re)){
    ?>
    <tr id="transTemplate" style="" class="tb_ball">
              <td><?=$rs["bet_id"];?></td>
              <td><?=date("d/m/Y H:i:s",$rs["play_timestam"]);?></td>
              <td><?=$rs["casino_table"];?></td>
              <td><?=$casino_zone[$rs["casino_zone"]];?></td>
              
              <td><?=number_format($rs["b_total"]);?></td>
                            <? 
              $bo=_cbonus($rs["b_total"] , $rs["b_bonus"]  , $rs["play_status"] );
              ?>
              <td class="<?=$bo["color"];?>"><?=($bo["count"]<0 ? "(" : "")?><?=number_format($bo["count"] , 2);?><?=($bo["count"]<0 ? ")" : "")?></td>
              <td class="<?=$casino_status_color[$rs["play_status"]];?>"><?=$casino_status[$rs["play_status"]];?></td>
            </tr>
<? 
$sum_total = $sum_total+$rs["b_total"];
$sum_bonus = $sum_bonus+$bo["count"];
}
?>   

            <tr id="transTemplate" style="font-weight: bold;">
							<td><?=$lang_member[304]?></td>
							<td></td>
							<td></td>
							<td></td>
							<td><?=number_format($sum_total,2);?></td>
							<td><?=number_format($sum_bonus,2);?></td>
							<td></td>
							
						</tr>
          </tbody>
</table>

</form>


</div>
  <script>

  $( function() {
    $( ".datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Select date",
    dateFormat:"dd-mm-yy"
    });

      $("#datepicker_from").datepicker({maxDate: new Date() , dateFormat:"dd/mm/yy"});
      $("#datepicker_from").datepicker('setDate', new Date('<?=$res_date_from;?>')); 

      $("#datepicker_to").datepicker({maxDate: new Date() , dateFormat:"dd/mm/yy"});
      $("#datepicker_to").datepicker('setDate', new Date('<?=$res_date_to;?>'));

      $("body #datepicker_from_hr").msDropDown({});
      $("body #datepicker_from_mn").msDropDown({}); 

      $("body #datepicker_to_hr").msDropDown({});
      $("body #datepicker_to_mn").msDropDown({});
    });

  // function selectTodayYesterday($date){
  //   $sport = document.getElementById('sport').value;
  //   $asc = document.getElementById('asc').value;
  //   parent.rightx.location = "result.php?d="+$date+"&sport="+$sport+"&asc="+$asc;
  // }
</script>
</body>
</html>

