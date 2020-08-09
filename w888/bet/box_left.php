<?php
require('../inc/conn.php');	
include "../inc/function.php";
if($_GET["ac"]=="all"){
	//$sql=sql_query("update bom_tb_data_sport_today set b_asc = '$asc' where b_zone_id = '$zone'");
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style>
body {
	margin:0px;
	padding:0px;
	background:#DEEAF5;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
.title_tb {
	height:24px;
	background:url(img/bg_title.png);
	
}
.td_bd_right {
	border-right:1px solid #6694b8;
}
.td_bd_bottom {
	border-bottom:1px solid #6694b8;
}
#box_over {
	/*width:100%;*/
	height:101px;
	overflow-y:scroll;
	box-shadow: inset 0 0 2px #000000;
	border-right:2px solid #ECE9D7;
}
.td_bd_right {
	border-right:1px solid #6694b8;
}
.td_bd_bottom {
	border-bottom:1px solid #6694b8;
}
.tr_data td {
	height:20px;
	padding:0px 2px;
	background:#FEFFA4;
}
.tr_data:hover {
	background:#FEFFA4;
}
.red {
	color:#F00;
}
.blue {
	color:#00F;
}
.gray {
	color:#CCC;
}
</style>
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script>
$(document).ready(function() {
	$("#box_over").height($( window ).height()-24);
});
$( window ).resize(function() {
  $("#box_over").height($( window ).height()-24);
});
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="title_tb">
    <td width="10%" align="center"><strong>รหัส</strong></td>
    <td width="34%" align="center"><strong>เลือก</strong></td>
    <td width="8%" align="center"><strong>บอล</strong></td>
    <td width="8%" align="center"><strong>ราคา</strong></td>
    <td width="8%" align="center"><strong>สกอร์</strong></td>
    <td width="10%" align="center"><strong>จำนวน</strong></td>
    <td width="8%" align="center"><strong>เวลา</strong></td>
    <td width="10%" align="center"><strong>User</strong></td>
    <td width="4%" style="border-right:2px solid #ECE9D7;" align="center"><img src="img/refresh.png" height="14" style="vertical-align:text-bottom; cursor:pointer" onClick="parent.leftx.location.href='box_left.php';"></td>
  </tr>
</table>
<div id="box_over">
    <table width="96%" border="0" cellspacing="0" cellpadding="0">
    <? for($y=0;$y<2;$y++){ ?>
      <tr class="tr_data">
        <td width="10%" align="center" class="td_bd_right td_bd_bottom">tm1409</td>
        <td width="35%" align="left" class="td_bd_right td_bd_bottom blue">รอง อเดอาดี้</td>
        <td width="8%" align="center" class="td_bd_right td_bd_bottom">0.5+1</td>
        <td width="8%" align="center" class="td_bd_right td_bd_bottom red">-82</td>
        <td width="8%" align="center" class="td_bd_right td_bd_bottom">0 : 0</td>
        <td width="10%" align="right" class="td_bd_right td_bd_bottom">300</td>
        <td width="8%" align="center" class="td_bd_right td_bd_bottom">15.49i</td>
        <td width="10%" align="center" class="td_bd_right td_bd_bottom">t</td>
      </tr>
      <? } ?>
    </table>
</div>
</body>
</html>