<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');
require("lang/variable_lang.php");

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



?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?=$lang_member[38];?></title>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">

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

.bttn_container {
	position:absolute;
	bottom: 20px;
	right: 70px;
	padding: 1px;
	font-size: 16px;
	font-weight: bold;
}

.bttn_container button {
    cursor: pointer;
    min-width: 70px;
    font-size: 14px;
    border-radius: 4px;
    border: 0;
    height: 22px;

    background: #f5f6f6;
background: -moz-linear-gradient(top, #f5f6f6 0%, #dbdce2 50%, #b8bac6 93%);
background: -webkit-linear-gradient(top, #f5f6f6 0%,#dbdce2 50%,#b8bac6 93%);
background: linear-gradient(to bottom, #f5f6f6 0%,#dbdce2 50%,#b8bac6 93%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f6f6', endColorstr='#b8bac6',GradientType=0 );
}

.ht_st_container {
	display: none;
}

.ht_tb {
	width: 55%;
}

.ht_tb td {
	padding-right: 4px;
	padding-left: 4px;
}

.st_tb {
	width: auto;
}

.st_tb td {
	width: 30px;
	height: 30px;
	text-align: center;
	vertical-align: middle;
}

img.stats_res {
	display: block;
    width: 26px;
    height: 26px;
    margin: 0 auto;
}

span.stats_res {
	font-weight: bold;
}
span.stats_res._red {
	color: #E53935;
}
span.stats_res._blue {
	color: #3949AB;
}
span.stats_res._green {
	color: #388E3C;;
}*/
</style>
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<script src="js/jquery-1.9.1.min.js?v=2019"></script>
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script>
var fw;
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
});
function to_width(ty){
	if(ty==1){
		$("#main_left").width(975);
		fw = 1;
	}else{
		$("#main_left").width(770);
		fw = 0;
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
</head>

<body>
<div id="main_left">
  <?
    include 'mname_tmpl.php'; 
    include 'mtimezone_tmpl.php';
?>

<div id="menu_lotto">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
      <tbody>
        <tr align="center" height="32">

          <td class="mlotto<? if($_GET["tlot"]==""){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_casino.php?tlot=&vvw='+fw">&nbsp;&nbsp;<?=$lang_member[961];?>&nbsp;&nbsp;</a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          <td class="mlotto<? if($_GET["tlot"]=="list"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_casino.php?tlot=list&vvw='+fw"><?=$lang_member[960];?></a></td>
          <td width="2"><img src="img/spacer.gif" width="2" height="32"></td>
          <td class="mlotto<? if($_GET["tlot"]=="result"){ ?> mactive<? } ?>" align="center"><a onClick="window.location.href = 'main_casino.php?tlot=result&vvw='+fw">&nbsp;&nbsp;<?=$lang_member[959];?>&nbsp;&nbsp;</a></td>
        </tr>
      </tbody>
    </table>
  </div>
<div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[958];?></span>
    
  </div>

<a href="casino/sexy/player/gamehall.php?dm=1&title=1"><img src="casino/sexy/images/player/gamehall_kv/th/1/banner01_1045x220.jpg" alt="" width="100%"></a>



</div>










<!--UA-136827315-2 -->



</body>
</html>

