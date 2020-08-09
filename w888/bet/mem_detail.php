<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>รายละเอียดการเล่นของ tm4617</title>
<style>
body {
	margin: 0px;
	padding: 0px;
	background: #FFFFFF;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
button {
	background: #C8C4BC;
	height: 20px;
	line-height: 10px;
	cursor: pointer;
	outline:none;
}
.row:nth-child(even) {
  background:#FFF;
}
.row:nth-child(odd) {
  background:#EFEFEF;
}
.row:hover {
	background:#FEFF58;
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
	color:#fff;
}
.link_to {
	cursor:pointer;
}
.link_to:hover {
	text-decoration:underline;
}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#999999">
  <tr class="white">
    <td width="5%" align="center" bgcolor="#54BAFF"><strong>No</strong></td>
    <td width="10%" align="center" bgcolor="#54BAFF"><strong>วัน/เวลา</strong></td>
    <td width="10%" align="center" bgcolor="#54BAFF"><strong>รหัส<br>betID</strong></td>
    <td width="30%" align="center" bgcolor="#54BAFF"><strong>คู่แข่งขัน</strong></td>
    <td width="15%" align="center" bgcolor="#54BAFF"><strong>เลือก<br>
    บอล</strong></td>
    <td width="10%" align="center" bgcolor="#54BAFF"><strong>จำนวนเงิน<br>
    ยอดเข้าเวป</strong></td>
    <td width="10%" align="center" bgcolor="#54BAFF"><strong>ราคาที่เล่น</strong></td>
    <td width="10%" align="center" bgcolor="#54BAFF"><strong>ราคาถัดมา</strong></td>
  </tr>
  <? for($i=1;$i<=20;$i++){ ?>
  <tr class="row">
    <td align="center" class="gray"><?=$i?></td>
    <td align="center">20/5/2015<br>10:09:11</td>
    <td align="center"><strong>11168ne135</strong><br><span class="gray">6579881</span></td>
    <td align="center"><strong class="red">LD อลาจูเรนเซ่</strong> <span class="blue">-vs-</span> <strong class="blue">CS เฮเรเดียโน่</strong><br>ในเกม <strong>Live @ 1 : 0</strong></td>
    <td align="center"><strong class="red">(สูง) LD อลาจูเรนเซ่</strong><br><strong>2</strong></td>
    <td align="right">501.00<br>100.20</td>
    <td align="center"><strong>0.850</strong><br><span class="blue">10:09:11</span></td>
    <td align="center"><strong>0.730</strong> (12.0)<br><span class="blue">10:09:35</span></td>
  </tr>
  <? } ?>
</table>
</body>
</html>