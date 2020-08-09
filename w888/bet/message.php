<?php
require('../inc/conn.php');	
include "../inc/function.php";
if($_GET[ac]=="del"){
	$sql="delete from bom_tb_news where n_id='$_GET[id]'";
	sql_query($sql);
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>จัดการข้อความ</title>
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
  background:#ADADAD;
}
.trl:nth-child(odd) {
  background: #CECECE;
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
<script>
function _w(url){
	window.location=url;
	}
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#7091B5">
  <tr>
    <td bgcolor="#54BAFF" width="5%">&nbsp;</td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="5%"><strong>ลบ</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="20%"><strong>วันที่/เวลา</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="70%"><strong>ข้อความ</strong> (เรียงลำดับตามเวลา ข้อความใหม่ล่าสุดอยู่บน)</td>
  </tr>
  <? $x=1;
$re=sql_page("bom_tb_news  $qq  ","n_id","desc",100);
while($rs=sql_fetch($re[re])){ ?>
  <tr class="trl">
    <td align="center"><?=$x;?></td>
    <td align="center"><? if($x==1){?><input type="button" value="ลบ" style="float:right;" onClick="_w('?ac=del&id=<?=$rs[n_id]?>');"><? }?></td>
    <td align="center"><?=$rs[n_date];?></td>
    <td><?=$rs[n_note];?></td>
  </tr>
   <? $x++;}?>
</table>
<table width="50%" border="0" cellspacing="1" cellpadding="5" style="margin:auto;">
<tr height="25">
    <td align="center"><button onClick="location.reload();">รีเฟชร</button> <button onClick="window.close()">ปิด</button></td>
</tr></table>
</body>
</html>