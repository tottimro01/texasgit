<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>รายละเอียดการเล่นย้อนหลัง</title>
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui_th.js?v=2019"></script>
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
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#717171">
  <tr>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="4%">No</td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="7%"><strong>วัน/เวลา<br>User</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="7%"><strong>รหัส</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="19%"><strong>คู่แข่งขัน</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="8%"><strong>เลือก<br>บอล</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="7%"><strong>สถานะ<br>ผลบอล</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="8%"><strong>ยอดการเล่น<br>ราคา</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="8%"><strong>เวปไซต์ได้เสีย<br>ค่าคอม</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="8%"><strong>สมาชิกชั้นที่ 1<br>ค่าคอม</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="8%"><strong>สมาชิกชั้นที่ 2<br>ค่าคอม</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="8%"><strong>สมาชิกชั้นที่ 3<br>ค่าคอม</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="8%"><strong>สมาชิกชั้นที่ 4<br>ค่าคอม</strong></td>
  </tr>
  <? for($i=1;$i<=10;$i++){ ?>
  <tr class="trl">
    <td align="center"><?=$i?></td>
    <td align="center">1/1/2015</td>
    <td align="center"><strong>1112</strong><br>1694438</td>
    <td align="center"><strong class="red">อูดิเนเซ่</strong> <span class="blue">-vs-</span> <strong class="blue">กายารี</strong><br>Handicap</td>
    <td align="center">รอง กายารี<br><strong>0</strong></td>
    <td align="center"><span class="red">เสีย</span><br><strong>ผล=4:1</strong></td>
    <td align="right">4,500.00<br>-0.640</td>
    <td align="right" bgcolor="#FEFFA3">2,880.00<br>-13.50</td>
    <td align="right">0%<br>
    2,880.00<br>-13.50</td>
    <td align="right">0%<br>0.00<br>0.00</td>
    <td align="right">0%<br>0.00<br>0.00</td>
    <td align="right">0%<br>0.00<br>0.00</td>
  </tr>
  <? } ?>
</table>
</body>
</html>