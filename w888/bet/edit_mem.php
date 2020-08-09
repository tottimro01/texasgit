<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style>
body {
	margin:0px;
	padding:0px;
	background:#ECE9D8;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
button {
	background: #C8C4BC;
	height: 18px;
	line-height: 10px;
	cursor: pointer;
	outline:none;
	min-width:50px;
}
.txt {
	height: 14px;
	outline:none;
	width:100px;
}
.txt_center {
	text-align:center;
}
.txt_right {
	text-align:right;
}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="right"><strong>รหัส :</strong></td>
    <td><input type="text" class="txt" style="width:50px;" value="1234"></td>
    <td rowspan="5">&nbsp;</td>
    <td align="right"><strong>ราคา :</strong></td>
    <td>น้ำ+<input type="text" class="txt txt_center" style="width:20px;" value="0"> รอง+<input type="text" class="txt txt_center" style="width:20px;" value="0"></td>
    <td align="right"><strong>โทรศัพท์ :</strong></td>
    <td><input type="text" class="txt" value="08999999"></td>
    <td align="right"><strong>เครดิต :</strong></td>
    <td><input type="text" class="txt txt_right" value="1,000,000"></td>
    <td align="right"><strong>Max :</strong></td>
    <td colspan="3"><input type="text" class="txt txt_right" value="200,000"></td>
    <td rowspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><strong>Password :</strong></td>
    <td width="100"><input type="text" class="txt"></td>
    <td align="right"><strong>ค่าคอม :</strong></td>
    <td width="100"><input type="text" class="txt txt_center" value=".3"></td>
    <td align="right"><strong>ธนาคาร :</strong></td>
    <td width="100"><input type="text" class="txt" value="กส"></td>
    <td align="right"><strong>Max ต่อคู่ :</strong></td>
    <td width="100"><input type="text" class="txt txt_right" value="200,000"></td>
    <td align="right"><strong>Min :</strong></td>
    <td colspan="3"><input type="text" class="txt txt_right" value="100"></td>
  </tr>
  <tr>
    <td align="right"><strong>ชื่อ :</strong></td>
    <td><input type="text" class="txt" value="1166"></td>
    <td colspan="2" rowspan="3">&nbsp;</td>
    <td align="right"><strong>สาขา :</strong></td>
    <td><input type="text" class="txt"></td>
    <td align="right"><strong>ต่อคู่ Live :</strong></td>
    <td><input type="text" class="txt txt_right" value="100,000"></td>
    <td align="right"><strong>Bet :</strong></td>
    <td width="30"><input type="checkbox" checked="checked"></td>
    <td width="40" align="right"><strong>Vip :</strong></td>
    <td width="30"><input type="checkbox" checked="checked"></td>
  </tr>
  <tr>
    <td align="right"><strong>ประเภท :</strong></td>
    <td><select>
              <option value="1">ซุปเปอร์</option>
              <option value="1">มาสเตอร์</option>
              <option value="1">เอเย่นต์</option>
              <option value="1">สมาชิก</option>
    </select></td>
    <td align="right"><strong>ชื่อบัญชี :</strong></td>
    <td><input type="text" class="txt" value="ธงชัย"></td>
    <td align="right"><strong>ต่อคู่ O/U :</strong></td>
    <td><input type="text" class="txt txt_right" value="100,000"></td>
    <td align="right"><strong>ไฟฟ้า :</strong></td>
    <td><input type="checkbox"></td>
    <td align="right"><strong>ล๊อค :</strong></td>
    <td><input type="checkbox"></td>
  </tr>
  <tr>
    <td align="right"><strong>แบ่งหุ้นให้ถือ :</strong></td>
    <td><select>
              <option value="11">50</option>
    </select></td>
    <td align="right"><strong>เลขที่บัญชี :</strong></td>
    <td><input type="text" class="txt" value="1234-5678"></td>
    <td align="right"><strong>ต่อคู่ E/O :</strong></td>
    <td><input type="text" class="txt txt_right" value="100,000"></td>
    <td colspan="4">&nbsp;</td>
    <td><button onClick="parent.document.getElementById('frameset1').rows='25,125,24,*,0'; ">ปิด</button></td>
  </tr>
</table>
</body>
</html>