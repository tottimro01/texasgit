<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style>
body {
	margin:0px;
	padding:0px;
	background:#DBEAF5;
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
</style>
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script>
$(document).ready(function() {
	$("#box_over").height($( window ).height()-24);
});
$( window ).resize(function() {
  $("#box_over").height($( window ).height()-24);
});
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="title_tb">
    <td width="5%" align="center"><strong>M</strong></td>
    <td width="10%" align="center"><strong>รหัส</strong></td>
    <td width="15%" align="center"><strong>เลือก</strong></td>
    <td width="8%" align="center"><strong>บอล</strong></td>
    <td width="8%" align="center"><strong>ราคา</strong></td>
    <td width="8%" align="center"><strong>สกอร์</strong></td>
    <td width="10%" align="center"><strong>จำนวน</strong></td>
    <td width="8%" align="center"><strong>เวลา</strong></td>
    <td width="10%" align="center"><strong>User</strong></td>
    <td width="10%" align="center"><strong>betID</strong></td>
    <td width="8%"><img src="img/eye.png" height="10" style="vertical-align:text-bottom; cursor:pointer;" onClick="parent.rightx.location.href='box_right.php';"></td>
  </tr>
</table>
<div id="box_over">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <? for($y=0;$y<10;$y++){ ?>
      <tr class="tr_data">
        <td width="5%" align="center" class="td_bd_right td_bd_bottom">&nbsp;</td>
        <td width="10%" align="center" class="td_bd_right td_bd_bottom">tm1409</td>
        <td width="15%" align="left" class="td_bd_right td_bd_bottom blue">รอง อเดอาดี้</td>
        <td width="8%" align="center" class="td_bd_right td_bd_bottom">0.5+1</td>
        <td width="8%" align="center" class="td_bd_right td_bd_bottom red">-82</td>
        <td width="8%" align="center" class="td_bd_right td_bd_bottom">0 : 0</td>
        <td width="10%" align="right" class="td_bd_right td_bd_bottom">300</td>
        <td width="8%" align="center" class="td_bd_right td_bd_bottom">15.49i</td>
        <td width="10%" align="center" class="td_bd_right td_bd_bottom">t</td>
        <td width="10%" align="center" class="td_bd_right td_bd_bottom">4922053</td>
        <td width="8%" bgcolor="#DBEAF6">&nbsp;</td>
      </tr>
      <? } ?>
    </table>
</div>
</body>
</html>