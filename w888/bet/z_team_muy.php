<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');	
require('function.php');	
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
<title>ดึงคู่แข่งขัน มวยไทย</title>
<style>
body {
	margin:0px;
	padding:0px;
	background:#FFF;
	font-size: 14px;
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<? $x=1; foreach ($arr_league as &$value_league) { $ex_league = explode("*-*" , $value_league);  ?>
  <tr height="25">
    <td bgcolor="#72CFCB" colspan="4"><strong><?=$ex_league[1]?> = </strong><select style="min-width:50px;">
    <? for($i=0;$i<=255;$i++){ ?>
              <option value="<?=$i?>" <? if($i==$value_list["b_asc"]){ ?>selected<? } ?>><?=$i?></option>
              <? } ?>
          </select></td>
    <td bgcolor="#72CFCB">Live</td>
    <td bgcolor="#72CFCB">TV</td>
    <td bgcolor="#72CFCB">LC</td>
    <td bgcolor="#72CFCB">ดึง</td>
  </tr>
  <? /*for($y=0;$y<10;$y++){ */ foreach ($arr_list[$ex_league[0]] as &$value_list) {
  	$id = $value_list["b_id"]."_".$value_list["b_add"]."_ft";
  ?>
  <tr height="25">
    <td width="5%" align="left" bgcolor="#EAEAEA" class="red"><?=$x?></td>
    <td align="left" bgcolor="#EAEAEA"><input type="text" value="<?=$value_list["b_id"]?>" size="10"></td>
    <td bgcolor="#EAEAEA"><input type="text" value="<?=$value_list["b_name_1"]?>" size="30"> vs <input type="text" value="<?=$value_list["b_name_2"]?>" size="30"></td>
    <td bgcolor="#EAEAEA">0.5</td>
    <td bgcolor="#EAEAEA"><input type="checkbox"></td>
    <td bgcolor="#EAEAEA"><input type="text" size="5"></td>
    <td bgcolor="#EAEAEA"><input type="text" size="5"></td>
    <td bgcolor="#F6C3CB"><input type="checkbox" checked></td>
  </tr>
  <? $x++; } ?>
  <? } ?>
</table>
<table width="50%" border="0" cellspacing="1" cellpadding="5" style="margin:auto;">
<tr height="25">
    <td align="center"><button>ดึงคู่แข่งขัน</button></td>
</tr></table>
</body>
</html>