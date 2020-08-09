<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style>
body {
	margin:0px;
	padding:0px;
	background:#D8BDDE;
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
	color:#999;
}
#box_over {
	/*width:100%;*/
	height:125px;
	overflow-y:scroll;
	box-shadow: inset 0 0 2px #000000;
	border-right:2px solid #ECE9D7;
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
<div id="box_over">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td align="center"><strong>ไม่มี User On-line : </strong><select style="min-width:200px;">
              <option value="">ระบบไม่รับ Betting</option>
              <option value="">ระบบเปิดรับ Betting ปกติ</option>
          </select>&nbsp;&nbsp;&nbsp;<strong>ปิดก่อนเตะ</strong> <input type="text" size="5" value="1" style="text-align:right;">&nbsp;&nbsp;&nbsp;<strong>Lastcall</strong> <input type="text" size="5" value="30" style="text-align:right;"></td>
  </tr>
  <tr>
    <td align="center">
    <textarea rows="3" style="width:80%;">ข้อความ</textarea>
    </td>
  </tr>
  <tr>
    <td align="center">
    <strong>ปรับราคาอัตโนมัติ ในเกม : </strong><input type="text" size="10" value="300,000" style="text-align:right;">&nbsp;&nbsp;&nbsp;<strong>ปรับ</strong> <input type="text" size="5" value="1" style="text-align:right;">&nbsp;&nbsp;&nbsp;<strong>สูงต่ำ : </strong> <input type="text" size="10" value="200,000" style="text-align:right;">&nbsp;&nbsp;&nbsp;<strong>ปรับ</strong> <input type="text" size="5" value="5" style="text-align:right;">
    </td>
  </tr>
</table>
</div>
</body>
</html>