<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
$rs_mem_af = sql_array("select * from bom_tb_member where m_id = '".$_SESSION['m_id']."'");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
  <meta charset="UTF-8">
  <TITLE><?=$app_title;?></TITLE>
  <link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
  <link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui_<?=$_SESSION['lang'];?>.js" charset="utf-8"></script>
<link rel="stylesheet" href="css/style2.css?v=0002">
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script>
$(function() {
    $( ".datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Select date",
	  dateFormat:"yy-mm-dd"
    });
  });
  
   function numberonly(event){
  	var e=window.event?window.event:event;
   	var keycode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;

	if ((keycode>=96 && keycode<=105)||(keycode>=48 && keycode<=57)||(keycode==106 )||(keycode==8 )||(keycode==110 )){
    return true;
   }else{
	   return false;
	   }
}

  </script>
  <style>
  .ui-datepicker-trigger {
	   vertical-align: bottom !important;
	   cursor:pointer;
	 }
  </style>
<script>
var fw;
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
	 parent.leftx.get_credit();
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
</script>
<!--   <style>
  .ui-datepicker-trigger {
	   vertical-align: middle !important;
	   cursor:pointer;
	 }
.txtq2 {
  color: #000;
  border: 1px #333 solid;
  font-size: 12px;
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

</style> -->
</head>

<body>
	<?
   include("popvdo.php");
?>
<div id="main_left" style="overflow:visible;">
<div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[139];?></span>
  </div>

<!--  -->
<div style="padding: 0 20px;">

<p class="ref-title"><?=$lang_member[141];?></p>
<!--<p class="ref-title"><?=$lang_member[105];?></p> -->
  <?
	$arr_af = array();
	$sql_af = sql_query("select * from bom_tb_bonus_ref where m_id = '".$_SESSION['m_id']."' order by bf_datenow desc limit 100");
	 while($rs_af=sql_fetch($sql_af)){
		 $arr_af[] = $rs_af;
	 }
	?>
<table cellpadding="0" cellspacing="0" class="txt_back11n bg_table" style="width: 700px;">
    <tr class="tb_title_lotto">
      <th width="139"><? #=$lang_member[106];?><?=$lang_member[106]?></th>
      <th width="165"><? #=$lang_member[107];?><?=$lang_member[1910]?> <?=$lang_member[304]?></th>
      <th width="215"><? #=$lang_member[109];?><?=$lang_member[95]?></th>
      <th width="179"><? #=$lang_member[110];?><?=$lang_member[611]?> <?=$lang_member[1374]?></th>
    </tr>
        <? foreach($arr_af as &$vale){ ?>
    <tr class="">
      <td align="left"><?=$vale["bf_datenow"]?></td>
      <td><?=number_format($vale["bf_bonus"],2)?></td>
      <td><?=number_format($vale["m_count"],2)?></td>
      <td><?=number_format($vale["m_count"]+$vale["bf_bonus"],2)?></td>
  </tr>
      <? } ?>
  </table>
  <br>  
  <br>

  <button class="btn_le" onclick="parent.rightx.location.href='main_affiliate.php';"><?=$lang_member[147];?></button>

</body>
</html>