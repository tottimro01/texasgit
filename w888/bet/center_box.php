<?php
require('../inc/conn.php');	
include "../inc/function.php";

$zone = $_GET["l"];
$rs_zone=sql_array("select * from bom_tb_data_sport_today where b_zone_id = '$zone' limit 1");
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
.tr_data:hover {
	background:#EFEFEF;
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
	background-image: linear-gradient(top, #fff, #9CA2AB);
	background-image: -moz-linear-gradient(top, #fff, #9CA2AB);
	background-image: -webkit-linear-gradient(top, #fff, #9CA2AB);
	background-image: -o-linear-gradient(top, #fff, #9CA2AB);
	background-image: -ms-linear-gradient(top, #fff, #9CA2AB);
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
<? if($_GET["l"]!=""){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr class="box_light">
    <td colspan="3" align="center"><?=$rs_zone["b_zone"]?></td>
  </tr>
  <? 
$i=1;
$sql=sql_query("select * from bom_tb_data_sport_today where b_zone_id = '$zone' group by b_id order by b_asc asc , b_date_play asc");
while($rs=sql_fetch($sql)){
 ?>
  <tr class="tr_data">
    <td width="5%" align="center"><?=$i?>.</td>
    <td align="left"><strong class="hand_hover lk_hover" onClick="parent.rightB.location.href='box_l2.php?lid=<?=$rs["b_id"]?>';"><?=$rs["b_name_1"]?></strong></td>
    <td width="5%" align="right" class="red"><strong class="hand_hover lk_hover">&gt;</strong>&nbsp;</td>
  </tr>
  <? $i++; } ?>
</table>
<? } ?>
</body>
</html>