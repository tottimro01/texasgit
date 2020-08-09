<?php
require('../inc/conn.php');	
include "../inc/function.php";
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
	background:#FFF;
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
.trl:nth-child(even) {
  background: white;
}
.trl:nth-child(odd) {
  background: #E1ECF6;
}
.box_light {
	float:left;
	height:15px;
	width:20px;
	background-image: linear-gradient(top, #fff, #9CA2AB);
	background-image: -moz-linear-gradient(top, #fff, #9CA2AB);
	background-image: -webkit-linear-gradient(top, #fff, #9CA2AB);
	background-image: -o-linear-gradient(top, #fff, #9CA2AB);
	background-image: -ms-linear-gradient(top, #fff, #9CA2AB);
	margin-right:5px;
}
.orange {
	color:#F90;
}
.hand_hover {
	cursor:pointer;
}
.lk_hover:hover {
	text-decoration:underline;
}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#6694b8">
  <tr class="title_tb">
    <td width="50%" align="center"><strong>ลีก</strong>&nbsp;<a href="#" class="orange">เพิ่ม</a></td>
    <td width="20%" align="center"><strong>Maxในเกม</strong></td>
    <td width="20%" align="center"><strong>Maxสูงต่ำ</strong></td>
    <td width="10%" align="center"><strong>ทีม</strong></td>
  </tr>
<? 
$i=0;
$sql=sql_query("select * from bom_tb_data_sport_today group by b_zone_id order by b_asc asc , b_date_play asc");
while($rs=sql_fetch($sql)){
 ?>
  <tr class="trl">
    <td><div class="box_light"></div><strong class="hand_hover lk_hover" onClick="parent.leftB.location.href='box_l1.php?lid=<?=$rs["b_zone_id"]?>'; parent.centerx.location.href='center_box.php?l=<?=$rs["b_zone_id"]?>';"><?=$rs["b_zone"]?></strong></td>
    <td align="right" class="hand_hover">100,000</td>
    <td align="right" class="hand_hover">50,000</td>
    <td align="right" class="hand_hover">0</td>
  </tr>
  <? $i++; } ?>
</table>
</body>
</html>