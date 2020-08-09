<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>On-line สมาชิก</title>
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
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#999999">
  <tr>
    <td width="16%" align="center" bgcolor="#BE2100" style="color: #FFF"><strong>รหัส</strong></td>
    <td width="16%" align="center" bgcolor="#BE2100" style="color: #FFF"><strong>เวลาใช้งานล่าสุด</strong></td>
    <td width="2%" align="center" bgcolor="#BE2100" style="color: #FFF">&nbsp;</td>
    <td width="16%" align="center" bgcolor="#BE2100" style="color: #FFF"><strong>รหัส</strong></td>
    <td width="16%" align="center" bgcolor="#BE2100" style="color: #FFF"><strong>เวลาใช้งานล่าสุด</strong></td>
    <td width="2%" align="center" bgcolor="#BE2100" style="color: #FFF">&nbsp;</td>
    <td width="16%" align="center" bgcolor="#BE2100" style="color: #FFF"><strong>รหัส</strong></td>
    <td width="16%" align="center" bgcolor="#BE2100" style="color: #FFF"><strong>เวลาใช้งานล่าสุด</strong></td>
  </tr>
  <? for($i=1;$i<=100;$i++){ ?>
  <tr class="trl">
    <td align="center"><strong>u43710</strong></td>
    <td align="center">1/1/2558 00:00:00</td>
    
    <td align="center" bgcolor="#ADADAD">&nbsp;</td>
    
    <td align="center"><strong>u43710</strong></td>
    <td align="center">1/1/2558 00:00:00</td>
    
    <td align="center" bgcolor="#ADADAD">&nbsp;</td>
    
    <td align="center"><strong>u43710</strong></td>
    <td align="center">1/1/2558 00:00:00</td>
  </tr>
  <? } ?>
  <tr>
  	<td colspan="8" align="center" bgcolor="#FADFDE">On-line = 31</td>
  </tr>
</table>
<table width="50%" border="0" cellspacing="1" cellpadding="5" style="margin:auto;">
<tr height="25">
    <td align="center"><button onClick="location.reload();">รีเฟชร</button> <button onClick="window.close()">ปิด</button></td>
</tr></table>
</body>
</html>