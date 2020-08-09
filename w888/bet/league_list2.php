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
#box_char {
	padding:2px 20px;
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
<div id="box_char">
<? 
$arr_c = array("ก" , "ข" , "ฃ" , "ค" , "ฅ" , "ฆ" , "ง" , "จ" , "ฉ" , "ช" , "ซ" , "ฌ" , "ญ" , "ฎ" , "ฏ" , "ฐ" , "ฑ" , "ฒ" , "ณ" , "ด" , "ต" , "ถ" , "ท" , "ธ" , "น" , "บ" , "ป" , "ผ" , "ฝ" , "พ" , "ฟ" , "ภ" , "ม" , "ย" , "ร" , "ฤ" , "ล" , "ฦ" , "ว" , "ศ" , "ษ" , "ส" , "ห" , "ฬ" , "อ" , "ฮ");
for($i=0;$i<count($arr_c);$i++){ ?>
	<a href="league_list2.php?c=<?=$arr_c[$i]?>" class="orange"><?=$arr_c[$i]?></a>
    <? } ?>
    <a href="#" class="orange">เพิ่ม</a>
</div>
<? if($_GET["c"]!=""){ ?>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<? 
$i=1;
$sql=sql_query("select * from bom_tb_data_sport_today where b_name_1 like '$_GET[c]%' group by b_id order by b_asc asc , b_date_play asc");
while($rs=sql_fetch($sql)){
 ?>
  <tr class="trl">
    <td>&nbsp;&nbsp;<strong class="blue hand_hover lk_hover" onClick="parent.centerx.location.href='center_box.php?l=<?=$rs["b_zone_id"]?>';">&lt;</strong>&nbsp;&nbsp;&nbsp;<strong class="hand_hover lk_hover" onClick="parent.rightB.location.href='box_l2.php?lid=<?=$rs["b_id"]?>';"><?=$rs["b_name_1"]?></strong></td>
  </tr>
  <? $i++; } ?>
</table>
<? } ?>
</body>
</html>