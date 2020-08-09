<?php
require('../inc/conn.php');	
include "../inc/function.php";
if($_POST["btn_save"]=="save"){
	
	$nzone = $_POST["s_num"];
	for($i=0;$i<$nzone;$i++){
		$id_r = $_POST["sid_".$i];
		$val_ft = $_POST["score1_".$i]."-".$_POST["score2_".$i];
		$val_1h = $_POST["score3_".$i]."-".$_POST["score4_".$i];
		$sql=sql_query("update bom_tb_data_sport_today set b_score_1h = '$val_1h' , b_score_ft = '$val_ft' where b_id = '$id_r'");
	}
}
$arr_league = array();
$arr_list = array();
$sql=sql_query("select * from bom_tb_data_sport_today group by b_id order by b_asc asc , b_date_play asc");
while($rs=sql_fetch($sql)){
	$arr_league[] = $rs["b_zone_id"]."*-*".$rs["b_zone"];
	$arr_list[$rs["b_zone_id"]][] = $rs;
}
$arr_league = array_unique($arr_league);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>บันทึกผลการแข่งขัน</title>
<style>
body {
	margin:0px;
	padding:0px;
	background:#FFF;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
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
.white {
	color:#FFF;
}
.trl:nth-child(even) {
  background:#FFF;
}
.trl:nth-child(odd) {
  background: #EFEFEF;
}
.trl:hover {
	background: #FEFF58;
}
button {
	background: #C8C4BC;
	height: 18px;
	line-height: 10px;
	cursor: pointer;
	outline:none;
	min-width:50px;
}
.box_light {
	background-image: linear-gradient(top, #fff, #9CA2AB);
	background-image: -moz-linear-gradient(top, #fff, #9CA2AB);
	background-image: -webkit-linear-gradient(top, #fff, #9CA2AB);
	background-image: -o-linear-gradient(top, #fff, #9CA2AB);
	background-image: -ms-linear-gradient(top, #fff, #9CA2AB);
}
.hand_hover {
	cursor:pointer;
}
.lk_hover:hover {
	text-decoration:underline;
}
.txt {
	height: 14px;
	outline:none;
	width:25px;
}
.acenter {
	text-align:center;
}
</style>
</head>

<body>
<form method="post">
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#717171">
  <tr>
    <td bgcolor="#54BAFF" width="5%" rowspan="2">&nbsp;</td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="14%" rowspan="2"><strong>วันที่/เวลา</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="19%" rowspan="2"><strong>เจ้าบ้าน</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="19%" rowspan="2"><strong>ทีมเยือน</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="14%" colspan="2"><strong>เต็มเวลา</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="14%" colspan="2"><strong>ครึ่งแรก</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="10%" rowspan="2"><strong>จบ - คลิกเครื่องหมายถูก</strong></td>
  </tr>
  <tr>
  	<td align="center" bgcolor="#54BAFF" style="color: #FFF" width="7%"><strong>เจ้าบ้าน</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="7%"><strong>ทีมเยือน</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="7%"><strong>เจ้าบ้าน</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="7%"><strong>ทีมเยือน</strong></td>
  </tr>
  <? $i=0; foreach ($arr_league as &$value_league) { $ex_league = explode("*-*" , $value_league); ?>
  <tr class="box_light">
    <td colspan="9" align="center"><?=$ex_league[1]?></td>
  </tr>
  <? foreach ($arr_list[$ex_league[0]] as &$value_list) { 
  $ex_score_ft = explode("-",$value_list["b_score_ft"]);
  $ex_score_1h = explode("-",$value_list["b_score_1h"]);
  ?>
  <tr class="trl">
    <td align="center"><?=$value_list["b_id"]?></td>
    <td align="center"><?=_cvf($value_list["b_date_play"] , 8)?></td>
    <td align="right"><strong class="<?=($value_list['b_big'] == 1) ? 'red' : 'blue'?>"><?=$value_list["b_name_1"]?></strong> </td>
    <td align="left"> <strong class="<?=($value_list['b_big'] == 2) ? 'red' : 'blue'?>"><?=$value_list["b_name_2"]?></strong></td>
    <td align="right"><input type="text" class="txt acenter" name="score1_<?=$i?>" id="score1_<?=$i?>" value="<?=$ex_score_ft[0]?>"></td>
    <td align="left"><input type="text" class="txt acenter" name="score2_<?=$i?>" id="score2_<?=$i?>" value="<?=$ex_score_ft[1]?>"></td>
    <td align="right"><input type="text" class="txt acenter" name="score3_<?=$i?>" id="score3_<?=$i?>" value="<?=$ex_score_1h[0]?>"></td>
    <td align="left"><input type="text" class="txt acenter" name="score4_<?=$i?>" id="score4_<?=$i?>" value="<?=$ex_score_1h[1]?>"></td>
    <td align="center"><input type="checkbox"><input type="hidden" class="txt acenter" name="sid_<?=$i?>" id="sid_<?=$i?>" value="<?=$value_list["b_id"]?>"></td>
  </tr>
  <? $i++; } ?>
  <? } ?>
</table>
<input type="hidden" class="txt acenter" id="s_num" name="s_num" value="<?=$i?>">
<table width="50%" border="0" cellspacing="1" cellpadding="5" style="margin:auto;">
<tr height="25">
    <td align="center"><button name="btn_save" value="save">บันทึก</button> <button onClick="window.close()">ปิด</button></td>
</tr></table>
</form>
</body>
</html>