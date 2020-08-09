<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>User</title>
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
.trl {
  background: #F7F7FF;
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
	width:80px;
}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#999999">
  <tr>
    <td width="3%" align="center" bgcolor="#54BAFF" style="color: #FFF"></td>
    <td width="15%" align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>รหัส</strong></td>
    <td width="15%" align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>ชื่อ</strong></td>
    <td width="10%" align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>สถานะ</strong></td>
    <td width="5%" align="center" bgcolor="#54BAFF" style="color: #000">แก้ไข<br>User</td>
    <td width="5%" align="center" bgcolor="#54BAFF" style="color: #000">แก้ไข<br>สมาชิก</td>
    <td width="5%" align="center" bgcolor="#54BAFF" style="color: #000">แก้ไข<br>ยกเลิก<br>รายการเล่น</td>
    <td width="5%" align="center" bgcolor="#54BAFF" style="color: #000">ดูสรุป<br>แพ้ชนะ</td>
    <td width="5%" align="center" bgcolor="#54BAFF" style="color: #000">ดูหน้า<br>โอนเงิน</td>
    <td width="5%" align="center" bgcolor="#54BAFF" style="color: #000">ทำการ<br>โอนเงิน</td>
    <td width="15%" align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>เวลาใช้งานล่าสุด</strong></td>
  </tr>
  <? for($i=1;$i<=100;$i++){ ?>
  <tr class="trl">
    <td align="center" class="gray"><?=$i?></td>
    <td align="center"><input type="text" class="txt" value="333999"></td>
    <td align="center"><input type="text" class="txt" style="width:100px;" value="00000"></td>
    <td align="center"><select>
      <option value="1">ปกติ</option>
      <option value="1">ล๊อค</option>
    </select></td>
    <td align="center"><input type="checkbox" checked="checked"></td>
    <td align="center"><input type="checkbox"></td>
    <td align="center"><input type="checkbox" checked="checked"></td>
    <td align="center"><input type="checkbox"></td>
    <td align="center"><input type="checkbox" checked="checked"></td>
    <td align="center"><input type="checkbox"></td>
    <td align="center">1/1/2558 00:00:00</td>
  </tr>
  <? } ?>
  <tr>
    <td align="center" bgcolor="#F6D3D2">เพิ่ม</td>
    <td align="center" bgcolor="#F6D3D2"><input type="text" class="txt"></td>
    <td align="center" bgcolor="#F6D3D2"><input type="text" class="txt" style="width:100px;"></td>
    <td align="center" bgcolor="#F6D3D2"></td>
    <td align="center" bgcolor="#F6D3D2"><input type="checkbox"></td>
    <td align="center" bgcolor="#F6D3D2"><input type="checkbox"></td>
    <td align="center" bgcolor="#F6D3D2"><input type="checkbox"></td>
    <td align="center" bgcolor="#F6D3D2"><input type="checkbox"></td>
    <td align="center" bgcolor="#F6D3D2"><input type="checkbox"></td>
    <td align="center" bgcolor="#F6D3D2"><input type="checkbox"></td>
    <td align="center" bgcolor="#F6D3D2">on-line = 4</td>
  </tr>
</table>
<table width="50%" border="0" cellspacing="1" cellpadding="5" style="margin:auto;">
<tr height="25">
    <td align="center"><button onClick="location.reload();">รีเฟชร</button> <button>รหัสผ่าน</button> <button onClick="window.close()">ปิด</button></td>
</tr></table>
</body>
</html>