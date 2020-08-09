<?php
require('../inc/conn.php');	
include "../inc/function.php";
if($_POST["btn_save"]=="save"){
	$nzone = $_POST["txt_nzone"];
	for($i=0;$i<$nzone;$i++){
		$asc = $_POST["txt_asc".$i];	
		$zone = $_POST["txt_zone".$i];	
		$sql=sql_query("update bom_tb_data_sport_today set b_asc = '$asc' where b_zone_id = '$zone'");
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>เรียงเลขลำดับลีก</title>
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
.white {
	color:#FFF;
}
.trl:nth-child(even) {
  background: white;
}
.trl:nth-child(odd) {
  background: #E1ECF6;
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
.hand_hover {
	cursor:pointer;
}
.lk_hover:hover {
	text-decoration:underline;
}
</style>
</head>

<body>
&nbsp;<button>ดึงลีก</button>
<select onChange="window.location.href='z_league.php?st='+this.value;">
<? for($i=1;$i<=count($sport_type);$i++){ ?>
  <option value="<?=$i?>" <? if($i==$_GET["st"]){ ?>selected<? } ?>><?=$sport_type[$i];?></option>
<? } ?>
</select>
<form method="post">
<table width="50%" border="0" cellspacing="1" cellpadding="5" style="margin:auto;" bgcolor="#3399FF">
<tr height="25">
    <td bgcolor="#55BCFF" align="center" class="white"><strong>(0-255)</strong></td>
    <td bgcolor="#55BCFF" align="center" class="white"><strong>เรียงเลขลำดับลีก</strong></td>
  </tr>
<? 
$i=0;
$sql=sql_query("select * from bom_tb_data_sport_today group by b_zone_id order by b_asc asc , b_date_play asc");
while($rs=sql_fetch($sql)){
 ?>
  <tr height="25" class="trl">
    <td align="center"><input name="txt_asc<?=$i?>" type="text" id="txt_asc<?=$i?>" style="text-align:right;" value="<?=$rs["b_asc"]?>" size="5"><input name="txt_zone<?=$i?>" type="hidden" id="txt_zone<?=$i?>" style="text-align:right;" value="<?=$rs["b_zone_id"]?>" size="5"></td>
    <td align="left"><div class="box_light"></div> <strong class="hand_hover"><?=$rs["b_zone"]?></strong></td>
  </tr>
  <? $i++; } ?>
</table>
<input name="txt_nzone" type="hidden" id="txt_nzone" style="text-align:right;" value="<?=$i?>" size="5">
<table width="50%" border="0" cellspacing="1" cellpadding="5" style="margin:auto;">
<tr height="25">
    <td align="center"><button onClick="location.reload();">รีเฟชร</button> <button name="btn_save" id="btn_save" type="submit" value="save">บันทึก</button> <button onClick="window.close()">ปิด</button></td>
</tr></table>
</form>
</body>
</html>