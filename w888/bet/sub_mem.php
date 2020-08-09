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
	height:0px;
}
title_tb td {
	height:0px;
	overflow:hidden;
}
.tdle {
	background-image: linear-gradient(top, #fff, #9CA2AB);
	background-image: -moz-linear-gradient(top, #fff, #9CA2AB);
	background-image: -webkit-linear-gradient(top, #fff, #9CA2AB);
	background-image: -o-linear-gradient(top, #fff, #9CA2AB);
	background-image: -ms-linear-gradient(top, #fff, #9CA2AB);
	height:20px;
	border-top:1px solid #6694b8;
	border-bottom:1px solid #6694b8;
}
.td_bd_right {
	border-right:1px solid #6694b8;
}
.td_bd_bottom {
	border-bottom:1px solid #6694b8;
}
.tr_data {
	background:#B7FCBE;
}
.tr_data:hover {
	background:#E9FEEB;
}
.tr_data td {
	height:20px;
	padding:0px 2px;
}
.td_bg_white {
	background:#FFF !important;
}
.td_bg_yellow {
	background:#FFFCAD !important;
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
.lk_hover:hover {
	text-decoration:underline;
}
.hand_hover {
	cursor:pointer;
}
.tdle {
	background-image: linear-gradient(top, #DE7D79, #CA3527);
	background-image: -moz-linear-gradient(top, #DE7D79, #CA3527);
	background-image: -webkit-linear-gradient(top, #DE7D79, #CA3527);
	background-image: -o-linear-gradient(top, #DE7D79, #CA3527);
	background-image: -ms-linear-gradient(top, #DE7D79, #CA3527);
	height:20px;
	border-top:1px solid #6694b8;
	border-bottom:1px solid #6694b8;
}
</style>
<script>
function edit_mem(){
	parent.document.getElementById("frameset1").rows="25,125,24,*,130";  
	parent.footx.location.href="edit_mem.php";
}
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
  	<td width="5%" align="center" class="tdle"><span onClick="history.back();" class="hand_hover lk_hover">&lt;&lt;</span></td>
    <td colspan="10" align="left" class="tdle"><strong>ลูกเวปของ ซุปเปอร์ 1437</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <? for($y=0;$y<2;$y++){ ?>
  <tr class="tr_data">
    <td width="3%" align="center" class="td_bd_right td_bd_bottom"><?=$y+1;?></td>
    <td width="15%" align="left" class="td_bd_right td_bd_bottom"><strong class="lk_hover hand_hover" onClick="edit_mem();">1234</strong>&nbsp;<img src="img/users.png" height="15" style="vertical-align: text-top; cursor:pointer;" title="คลิก เพื่อดูลูกเวป 2 คน" onClick="sub_mem.php">&nbsp;<img src="img/thunder.png" height="15" style="vertical-align: text-top; cursor:pointer;" title="มนุษย์ไฟฟ้า">&nbsp;<img src="img/bcan.png" height="15" style="vertical-align: text-top; cursor:pointer;" title="ไม่ให้เล่น Internet Betting">&nbsp;<img src="img/keylock.png" height="15" style="vertical-align: text-top; cursor:pointer;" title="รหัสลูกค้าถูกล๊อค"></td>
    <td width="10%" align="left" class="td_bd_right td_bd_bottom">1166</td>
    <td width="5%" align="center" class="td_bd_right td_bd_bottom">ซุปเปอร์</td>
    <td width="10%" align="center" class="td_bd_right td_bd_bottom">น้ำ+<strong>0</strong> รอง+<strong>0</strong></td>
    <td width="3%" align="center" class="td_bd_right td_bd_bottom">.3</td>
    <td width="10%" align="right" class="td_bd_right td_bd_bottom">8,500,000</td>
    <td width="10%" align="right" class="td_bd_right td_bd_bottom td_bg_yellow"><span class="lk_hover hand_hover">100</span></td>
    <td width="10%" align="right" class="td_bd_right td_bd_bottom td_bg_white red"><span class="lk_hover hand_hover">-99,999.00</span></td>
    <td width="10%" align="center" class="td_bd_right td_bd_bottom">127.0.0.1</td>
    <td width="10%" align="center" class="td_bd_right td_bd_bottom"><span class="lk_hover">01/01/2558 00:00:00</span></td>
    <td width="4%" class="td_bg_white">&nbsp;</td>
  </tr>
  <? } ?>
</table>
</body>
</html>