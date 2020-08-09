<?php
require('../inc/conn.php');	
include "../inc/function.php";
$ex_id = explode("_" , $_GET["id"]);
$id = $ex_id[0];
$add = $ex_id[1];
$type = $ex_id[2];
$ty = $_GET["ty"];
$rs=sql_array("select * from bom_tb_data_sport_today where b_id = '$id' and b_add = '$add'");
if($ty==1){
	$t1 = $rs["b_count_1"];
	$t2 = $rs["b_count_2"];
	$sum = $t1-$t2;
}else if($ty==2){
	$t1 = $rs["b_count_3"];
	$t2 = $rs["b_count_4"];
	$sum = $t1-$t2;
}else if($ty==3){
	$t1 = $rs["b_1h_count_1"];
	$t2 = $rs["b_1h_count_2"];
	$sum = $t1-$t2;
}else if($ty==4){
	$t1 = $rs["b_1h_count_3"];
	$t2 = $rs["b_1h_count_4"];
	$sum = $t1-$t2;
}else if($ty==5){
	$t1 = $rs["b_count_5"];
	$tx = $rs["b_count_6"];
	$t2 = $rs["b_count_7"];
	$sum = $t1-$tx-$t2;
}else if($ty==6){
	$t1 = $rs["b_1h_count_5"];
	$tx = $rs["b_1h_count_6"];
	$t2 = $rs["b_1h_count_7"];
	$sum = $t1-$tx-$t2;
}else if($ty==7){
	$t1 = $rs["b_count_8"];
	$t2 = $rs["b_count_9"];
	$sum = $t1-$t2;
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
	background:#ECE9D8;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
.red {
	color:#F00;
}
button {
	background: #C8C4BC;
	height: 18px;
	line-height: 10px;
	cursor: pointer;
	outline:none;
	min-width:50px;
}
</style>
</head>

<body>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="80%">
    <table width="100%" border="1" cellspacing="1" cellpadding="5">
  <tr>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF"><strong><?=str_replace("-" , " : " , $rs["b_score_live"])?></strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF"><strong><?=$rs["b_name_1"]?> - <?=$rs["b_name_2"]?></strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF"><strong><? if($ty==7){ ?>ของคี่<? }else{ ?>ของเจ้าบ้าน<? } ?></strong></td>
    <? if($ty==5 || $ty==6){ ?>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>ของเสมอ</strong></td>
    <? } ?>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF"><strong><? if($ty==7){ ?>ของคู่<? }else{ ?>ของทีมเยือน<? } ?></strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>2 - 0</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>1 - 0</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>0 - 0</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>0 - 1</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>0 - 2</strong></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">ก่อนเตะ</td>
    <td align="right" bgcolor="#FFFFFF"><strong><?=number_format($sum);?></strong></td>
    <td align="right" bgcolor="#FEFFA3"><?=number_format($t1);?></td>
    <? if($ty==5 || $ty==6){ ?>
    <td align="right" bgcolor="#FEFFA3"><?=number_format($tx);?></td>
    <? } ?>
    <td align="right" bgcolor="#FEFFA3"><?=number_format($t2);?></td>
    <td align="right" bgcolor="#FFFFFF">8,697</td>
    <td align="right" bgcolor="#FFFFFF">8,697</td>
    <td align="right" bgcolor="#FFFFFF" class="red">-3,427</td>
    <td align="right" bgcolor="#FFFFFF" class="red">-6,419</td>
    <td align="right" bgcolor="#FFFFFF" class="red">-6,419</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#C8FEB6"><strong>รวม</strong></td>
    <td align="right" bgcolor="#C8FEB6"><strong><?=number_format($sum);?></strong></td>
    <td align="right" bgcolor="#DDDF81"><?=number_format($t1);?></td>
    <? if($ty==5 || $ty==6){ ?>
    <td align="right" bgcolor="#DDDF81"><?=number_format($tx);?></td>
    <? } ?>
    <td align="right" bgcolor="#DDDF81"><?=number_format($t2);?></td>
    <td align="right" bgcolor="#C8FEB6">8,697</td>
    <td align="right" bgcolor="#C8FEB6">8,697</td>
    <td align="right" bgcolor="#C8FEB6" class="red">-3,427</td>
    <td align="right" bgcolor="#C8FEB6" class="red">-6,419</td>
    <td align="right" bgcolor="#C8FEB6" class="red">-6,419</td>
  </tr>
</table>
    </td>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><button onClick="location.reload();">รีเฟชร</button></td>
  </tr>
  <tr>
    <td><button onClick="parent.document.getElementById('frameset2').rows='24,*,0'; ">ปิด</button></td>
  </tr>
</table>
    </td>
  </tr>
</table>
</body>
</html>